<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sales_typesRequest;
use App\Http\Requests\Sales_typesUpdateRequest;
use App\Models\Admin\Admin;
use App\Models\Admin\Sales_Matiral_types;
use Illuminate\Http\Request;

class Sales_Matiral_TypesController extends Controller
{
    public function index(){

        $data = Sales_Matiral_types::select()->orderBy('id','DESC')->get();

        if (!empty($data)){
            foreach ($data as $info){
                $info->added_by_admin = Admin::where('id',$info->added_by)->value('name');
                $info->updated_by_admin = Admin::where('id',$info->updated_by)->value('name');
            }

        }

        return view('admin.sales_matiral_types.index',compact('data'));
    }


    public function store(Sales_typesRequest $request){

        $com_code = auth()->user()->com_code;

        $checkExists = Sales_Matiral_types::where(['name'=>$request->name,'com_code'=>$com_code])->first();
        if ($checkExists==null){

        $data['name'] = $request->name;
        $data['active'] = $request->active;
        $data['added_by'] = auth()->id();
        $data['com_code'] = $com_code;

        Sales_Matiral_types::create($data);
        return redirect()->route('admin.sales_matiral_types.index')->with(['success'=>'تم إضافه الفئه بنجاح']);

        }else{
            return redirect()->back()->with(['error'=>'اسم الفئه موجود من قبل'])->withInput();
        }
    } // End Method


    public function update($id ,Sales_typesUpdateRequest $request){

            $data = Sales_Matiral_types::findOrFail($id);

            if (!empty($data)){
                $data->update([
                    'name' => $request->name,
                    'active' => $request->active,
                    'added_by' => auth()->id(),
                    'updated_by' => auth()->id(),
                    'com_code' => auth()->user()->com_code,
                ]);

                return redirect()->route('admin.sales_matiral_types.index')->with(['success'=>'تم تحديث البيانات بنجاح']);

            }else{
                return redirect()->back()->withErrors()->withInput();
            }

    }// END Method

    public function delete($id){
        try {
            $data = Sales_Matiral_types::findOrFail($id);
            $data->delete();
            return redirect()->route('admin.sales_matiral_types.index')->with(['success'=>'تم حذف البيانات بنجاح']);

        }catch (\Exception $e){
            return redirect()->back()->with(['error','something wrong',$e->getMessage()]);
        }
    }
}
