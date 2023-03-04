<?php


use App\Http\Controllers\Admin\Admin_Panel_SettingsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\TreasuriesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

// for paginator use in every controller easy to edit quickly
define('PAGIANATION_COUNT',3);

Route::group(['namespace'=>'Admin','prefix'=>'admin','middleware'=> 'auth:admin'],function (){
    Route::get('dashboard',[DashboardController::class,'dashboard'])->name('admin.dashboard');
    Route::POST('logout',[LoginController::class,'logout'])->name('admin.logout');




//    Admin Panel Settings
    Route::get('adminPanelSettings/index',[Admin_Panel_SettingsController::class,'index'])->name('admin.AdminPanelSettings.index');
    Route::get('adminPanelSettings/edit',[Admin_Panel_SettingsController::class,'edit'])->name('admin.AdminPanelSettings.edit');
    Route::post('adminPanelSettings/update',[Admin_Panel_SettingsController::class,'update'])->name('admin.AdminPanelSettings.update');


//    TreasuriesController
    Route::get('treasuries/index',[TreasuriesController::class,'index'])->name('admin.treasuries.index');
    Route::get('treasuries/create',[TreasuriesController::class,'create'])->name('admin.treasuries.create');
    Route::post('treasuries/store',[TreasuriesController::class,'store'])->name('admin.treasuries.store');
    Route::get('treasuries/edit/{id}',[TreasuriesController::class,'edit'])->name('admin.treasuries.edit');
    Route::post('treasuries/update/{id}',[TreasuriesController::class,'update'])->name('admin.treasuries.update');
    Route::post('treasuries/ajax_search',[TreasuriesController::class,'ajax_search'])->name('admin.treasuries.ajax_search');
});

Route::group(['namespace'=>'Admin','prefix'=>'admin','middleware'=>'guest:admin'],function (){
    Route::get('login',[LoginController::class,'show'])->name('admin.loginView');
    Route::POST('check/login',[LoginController::class,'adminLogin'])->name('admin.login');
});






