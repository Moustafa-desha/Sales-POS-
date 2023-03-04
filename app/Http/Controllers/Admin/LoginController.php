<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{



   public function show(){
        return view('admin.auth.login');
    }

   public function adminLogin(LoginRequest $request){


       if (auth()->guard('admin')->attempt($request->only(['email','password']))){
           return redirect()->route('admin.dashboard');
       } else{

           return redirect()->route('admin.loginView');
       }

   }

   public function logout(){
       Auth::logout();
       return redirect()->route('admin.loginView');
   }

}
