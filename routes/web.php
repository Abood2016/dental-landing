<?php

use App\Http\Controllers\dashboard\consultionController;
use App\Http\Controllers\dashboard\dashboardController;
use App\Http\Controllers\dashboard\ServiceController;
use App\Http\Controllers\dashboard\SettingController;
use App\Http\Controllers\dashboard\UserController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\dashboard\GeneralController;
use App\Http\Controllers\dashboard\LoginController;
use App\Http\Controllers\dashboard\AppoinmentsController;
use App\Http\Controllers\front\frontController;
use \App\Http\Controllers\dashboard\PermssionController;
use \App\Http\Controllers\dashboard\LinksController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('layouts.app');
// });

Route::get('/dashboard', function () {
    return view('admin.dashboard');
});
Route::get('/login',   [LoginController::class, 'index'])->name('login');
Route::post('/login-store',   [LoginController::class, 'login'])->name('login.store');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth' , 'namespace' => 'dashboard'], function () {
    Route::get('/', [dashboardController::class, 'index'])->name('dashboard.index');

 /*   Route::group(['prefix' => 'consultions'], function () {
        Route::get('/', [consultionController::class, 'index'])->name('consultion.index');
        Route::get('/edit/{id}', [consultionController::class, 'edit']);
        Route::post('/update', [consultionController::class, 'update']);
        Route::get('/delete/{id}', [consultionController::class, 'delete']);
    });*/

    Route::group(['prefix' => 'users'], function () {
        Route::get('/', [UserController::class,'index'])->name('users_index')->middleware('permission:users_index');
        Route::post('/add-new',[UserController::class, 'store'])->middleware('permission:user_add')->name('user.store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->middleware('permission:user_edit');
        Route::post('/update', [UserController::class, 'update'])->middleware('permission:user_edit');
        Route::get('/delete/{id}', [UserController::class, 'destroy'])->middleware('permission:user_delete');
        Route::get('/show-profile/{id}', [UserController::class, 'profile'])->name('profile.show');
        Route::post('/update-profile', [UserController::class, 'updateProfile'])->name('profile.update');

    });

    Route::group(['prefix' => 'services'], function () {
        Route::get('/', [ServiceController::class, 'index'])->name('services_index')->middleware('permission:services_index');
        Route::post('/add-new', [ServiceController::class, 'store'])->name('service.store')->middleware('permission:services_index');
        Route::get('/edit/{id}', [ServiceController::class, 'edit'])->middleware('permission:services_edit');
        Route::post('/update', [ServiceController::class, 'update'])->middleware('permission:services_edit');
        Route::get('/delete/{id}', [ServiceController::class, 'destroy'])->middleware('permission:services_delete');
    });
    Route::group(['prefix'=>'general'],function(){
        Route::get('/',[GeneralController::class,'index'])->name('general.index')->middleware('permission:setting_index');;
        Route::get('/testimonials',[GeneralController::class,'getTestimonials'])->name('testimonial.get')->middleware('permission:setting_show');
        Route::post('/testimonials/set',[GeneralController::class,'setTestimonials'])->name('testimonial.set')->middleware('permission:setting_show');
        Route::get('/appoinments',[GeneralController::class,'getappoinments'])->name('appoinments.get')->middleware('permission:setting_show');
        Route::post('/appointments/set',[GeneralController::class,'setAppoinments'])->name('appoinments.set')->middleware('permission:setting_show');
    });

    Route::group(['prefix' => 'settings'], function () {
        Route::get('/', [SettingController::class, 'index'])->name('settings_index')->middleware('permission:settings_index');
        Route::get('/edit/{id}', [SettingController::class, 'edit'])->middleware('permission:setting_edit');
        Route::post('/update', [SettingController::class, 'update'])->middleware('permission:setting_edit');;
    });
    Route::group(['prefix' => 'appoinments'], function () {
        Route::get('/', [AppoinmentsController::class, 'index'])->name('appoinments_index')->middleware('permission:appoinments_index');
        Route::get('/edit/{id}', [AppoinmentsController::class, 'edit'])->middleware('permission:apppoinments_show');
        Route::post('/update', [AppoinmentsController::class, 'update'])->middleware('permission:apppoinments_show');
        Route::get('/delete/{id}', [AppoinmentsController::class, 'delete'])->middleware('permission:apppoinments_show');
        Route::get('/change_status',[AppoinmentsController::class,'changeStatus'])->middleware('permission:apppoinments_show');
        Route::get('/done-appoinments', [AppoinmentsController::class, 'doneAppoinment'])->name('appoinments_done')->middleware('permission:apppoinments_done');;


    });
    Route::group(['prefix' => 'permissions'], function () {
        Route::get('/{id}',[PermssionController::class,'getPermission'])->middleware('permission:permission');
        Route::post('/set',[PermssionController::class,'setPermission'])->middleware('permission:permission');
    });

    Route::group(['prefix'=>'links'],function(){
    Route::get('/',[LinksController::class,'index']);
    Route::post('/set_links',[LinksController::class,'create']);
    Route::get('/get_main',[LinksController::class,'get_main']);
    });
});



Route::group(['namespace' => 'front'], function () {
    Route::get('/', [frontController::class, 'index'])->name('front.index');
    Route::post('/appoinments/set',[frontController::class,'setAppoinments']);
    Route::get('/service/{id}',[frontController::class,'serviceShow'])->name('service.show');
    Route::post('/appoinments/service/set', [frontController::class, 'setAppoinmentsForService']);

});

Route::get('/set_permission',[frontController::class,'permission']);
