<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin_Panel_SettingsRequest;
use App\Models\Admin\Admin;
use App\Models\Admin\Admin_Panel_Settings;

class Admin_Panel_SettingsController extends Controller
{
    public function index()
    {

        $data = Admin_Panel_Settings::where('com_code',auth()->user()->com_code)->first();
        if (!empty($data)){
            if ($data['updated_by'] > 0 and $data['updated_by'] != null){
                $data['updated_by_admin'] = Admin::where('id',$data['updated_by'])->value('name');
            }
        }

        return view('admin.admin_panel_settings.index',['data'=>$data]);
    }


    public function edit(){
        $data = Admin_Panel_Settings::where('com_code',auth()->user()->com_code)->first();

        return view('admin.admin_panel_settings.edit',['data'=>$data]);
    }

    public function update(Admin_Panel_SettingsRequest $request){

        try {
            $Panel_Settings = Admin_Panel_Settings::where('com_code',auth()->user()->com_code)->first();

            $Panel_Settings->system_name   = $request->system_name;
            $Panel_Settings->phone         = $request->phone;
            $Panel_Settings->address       = $request->address;
            $Panel_Settings->general_alert = $request->general_alert;
            $Panel_Settings->updated_at    = date(now());
            $Panel_Settings->updated_by    = auth()->user()->id;

             $photo = $Panel_Settings->photo;

            if ($request->has('photo')){
                $request->validate([
                'photo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                ]);

                //delete old photo before store now
                unlink("public/assets/admin/uploads/$photo");

                $fileName = time().$request->photo->getClientOriginalName();
                $request->photo->move(public_path('assets/admin/uploads'), $fileName);


                $Panel_Settings->photo = $fileName;
            }

            $Panel_Settings->save();
            return redirect()->route('admin.AdminPanelSettings.index')->with(['success'=>'Success Update']);


        }catch (\Exception $ex){
            return redirect()->route('admin.AdminPanelSettings.index')->with(['error'=>'something wrong']);
        }
    }

}
