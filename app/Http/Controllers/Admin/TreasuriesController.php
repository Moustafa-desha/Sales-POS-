<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TreasuriesUpdateRequest;
use App\Models\Admin\Admin;
use App\Models\Admin\Treasuries;
use App\Models\Admin\Treasuries_Delivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class TreasuriesController extends Controller
{

    public function index(){

        $data = Treasuries::select()->orderBy('id','DESC')->paginate(PAGIANATION_COUNT);

        if (!empty($data)){
            foreach ($data as $info){
                $info->added_by_admin = Admin::where('id',$info->added_by)->value('name');

                $info->updated_by_admin = Admin::where('id',$info->updated_by)->value('name');
            }

        }
        return view('admin.treasuries.index',['data'=>$data]);

    }

    public function create(){

        return view('admin.treasuries.create');
    }

    public function store(TreasuriesUpdateRequest $request){


        try {

            $com_code = auth()->user()->com_code;

            //check that name is unique  and next step only one Main Treasurie in column
            $nameExists = Treasuries::where(['name'=>$request->name ,'com_code'=>$com_code])->first();

            if ($nameExists == null){
                //only one Main Treasurie in column
                if ($request->is_master == 1){
                    $isMasterExists = Treasuries::where(['is_master' => 1 ,'com_code'=>$com_code])->first();
                        if ($isMasterExists != null){
                            return redirect()->back()->with(['error'=>'there Main treasurie Before already'])->withInput();
                        }

                }


                $data['name'] = $request->name;
                $data['is_master'] = $request->is_master;
                $data['last_receipt_exchange'] = $request->last_receipt_exchange;
                $data['last_receipt_collect'] = $request->last_receipt_collect;
                $data['active'] = $request->active;
                $data['added_by'] = auth()->id();
                $data['updated_by'] = auth()->id();
                $data['com_code'] = $com_code;

                Treasuries::create($data);

                return redirect()->route('admin.treasuries.create')->with(['success'=>'تم ادخال البيانات بنجاح']);


            }else{
                return redirect()->back()->with(['error'=>'Name already exists before'])->withInput();

            }


        }catch (\Exception $ex){
            return redirect()->back()->with(['error'=>'something wrong'.$ex->getMessage()])->withInput();

        }

    }

    public function edit($id){
        $data = Treasuries::findOrFail($id);
        return view('admin.treasuries.edit',['data'=>$data]);
    } //End Method


    public function update($id,TreasuriesUpdateRequest $request){

    $com_code = auth()->user()->com_code;
    $data = Treasuries::findOrfail($id);
        try {

            if (empty($data)){
                return redirect()->back()->with(['error'=>'please choose right data'])->withInput();
            }
            //we check is only one master in table
            $checkIsMaster = Treasuries::where(['is_master'=>1,'com_code'=>$com_code])->first();

            if ($request->is_master==1 & $checkIsMaster != null){
                return redirect()->back()->with(['error'=>'there Main treasurie Before already'])->withInput();

                }else{

                $Udata['name'] = $request->name;
                $Udata['is_master'] = $request->is_master;
                $Udata['last_receipt_exchange'] = $request->last_receipt_exchange;
                $Udata['last_receipt_collect'] = $request->last_receipt_collect;
                $Udata['active'] = $request->active;
                $Udata['added_by'] = auth()->id();
                $Udata['updated_by'] = auth()->id();
                $Udata['com_code'] = $com_code;

                Treasuries::where(['id'=>$id,'com_code'=>$com_code])->update($Udata);

                return redirect()->route('admin.treasuries.index')->with(['success'=>'تم تحديث البيانات بنجاح']);

                }
        } catch (\Exception $ex){
            return redirect()->back()->with(['error'=>'something wrong'.$ex->getMessage()])->withInput();

        }

    } // END Method


    public function ajax_search(Request $request){

        if ($request->ajax()){
            $search = $request->search_by_text;

            $data = Treasuries::where('name','LIKE',"%{$search}%")->orderBy('id','DESC')->paginate(PAGIANATION_COUNT);
            return view('admin.treasuries.ajax_search',['data'=>$data]);
        }
    }

    public function details($id){

        try {

            $com_code = auth()->user()->com_code;
            $data = Treasuries::findOrFail($id);

            $data->added_by_admin = Admin::where('id',$data->added_by)->value('name');
            $data->updated_by_admin = Admin::where('id',$data->updated_by)->value('name');


            $treasuries_delivery = Treasuries_Delivery::where('treasuries_id',$id)->orderBy('id','DESC')->get();

            if (!empty($treasuries_delivery)){
                foreach ($treasuries_delivery as $info){
                    $info->name = Treasuries::where('id',$info->treasuries_can_delivery_id)->value('name');
                    $info->added_by_admin = Admin::where('id',$info->added_by)->value('name');

                }
            }

            return view('admin.treasuries.details',compact('data','treasuries_delivery'));



        }catch (\Exception){
            return redirect()->back()->with(['error'=>'something wrong']);
        }

    }// END METHOD


    public function addTreasuriesDelivery($id){

        try {
            $com_code = auth()->user()->com_code;

            $data = Treasuries::select('id','name')->find($id);

            if (empty($data)){
                return redirect()->back()->with(['error'=>'غير قادر للوصول الي البيانات المطلوبه']);
            }
            $treasuries= Treasuries::select('id','name')->where(['com_code'=>$com_code,'active'=>1])->get();

            return view('admin.treasuries.add_treasuriesDelivery',compact('treasuries','data'));



        }catch (\Exception $e){
            return redirect()->back()->with(['error'=>'something wrong'.$e->getMessage()]);
        }

    } //END METHOD


    public function storeTreasuriesDelivery($id,Request $request){

        $validator = Validator::make($request->all(),[
            'treasuries_can_delivery_id' => 'required',
            ],
            ['treasuries_can_delivery_id.required' => 'هذا الحقل مطلوب']);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        try {

            $com_code = auth()->user()->com_code;

            $data = Treasuries::select('id','name')->find($id);

            if (empty($data)){
                return redirect()->back()->with(['error'=>'غير قادر للوصول الي البيانات المطلوبه']);
            }


            $checkExists = Treasuries_Delivery::where(['treasuries_id'=>$id,'treasuries_can_delivery_id'=>$request->treasuries_can_delivery_id,'com_code'=>$com_code])->first();
            if (!empty($checkExists)){
                return redirect()->back()->with(['error'=>'هذه الخزنه مضافه بالفعل من قبل'])->withInput();
            }

            $newData['treasuries_id'] = $id;
            $newData['treasuries_can_delivery_id'] = $request->treasuries_can_delivery_id;
            $newData['com_code'] = $com_code;
            $newData['added_by'] = auth()->id();


            Treasuries_Delivery::create($newData);
            return redirect()->route('admin.treasuries.details',$id)->with(['success'=>'تم إضافه الخزنه بنجاح']);


        }catch (\Exception $e){
            return redirect()->back()->with(['error'=>'something wrong'.$e->getMessage()]);

        }
    } //END METHOD


    public function deleteTreasuriesDelivery($id){


            $data = Treasuries_Delivery::findOrFail($id);
            $data->delete();
            return redirect()->back()->with(['success'=>'تم الحذف بنجاح']);


    }


}
