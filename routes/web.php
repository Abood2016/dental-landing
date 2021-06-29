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

    Route::group(['prefix' => 'consultions'], function () {
        Route::get('/', [consultionController::class, 'index'])->name('consultion.index');
        Route::get('/edit/{id}', [consultionController::class, 'edit']);
        Route::post('/update', [consultionController::class, 'update']);
        Route::get('/delete/{id}', [consultionController::class, 'delete']);
    });

    Route::group(['prefix' => 'users'], function () {
        Route::get('/', [UserController::class,'index'])->name('users.index');
        Route::post('/add-new',[UserController::class, 'store'])->name('user.store');
        Route::get('/edit/{id}', [UserController::class, 'edit']);
        Route::post('/update', [UserController::class, 'update']);
        Route::get('/delete/{id}', [UserController::class, 'destroy']);
        Route::get('/show-profile/{id}', [UserController::class, 'profile'])->name('profile.show');
        Route::post('/update-profile', [UserController::class, 'updateProfile'])->name('profile.update');

    });

    Route::group(['prefix' => 'services'], function () {
        Route::get('/', [ServiceController::class, 'index'])->name('services.index');
        Route::post('/add-new', [ServiceController::class, 'store'])->name('service.store');
        Route::get('/edit/{id}', [ServiceController::class, 'edit']);
        Route::post('/update', [ServiceController::class, 'update']);
        Route::get('/delete/{id}', [ServiceController::class, 'destroy']);
    });
    Route::group(['prefix'=>'general'],function(){
        Route::get('/',[GeneralController::class,'index'])->name('general.index');
        Route::get('/testimonials',[GeneralController::class,'getTestimonials'])->name('testimonial.get');
        Route::post('/testimonials/set',[GeneralController::class,'setTestimonials'])->name('testimonial.set');
        Route::get('/appoinments',[GeneralController::class,'getappoinments'])->name('appoinments.get');
        Route::post('/appointments/set',[GeneralController::class,'setAppoinments'])->name('appoinments.set');
    });

    Route::group(['prefix' => 'settings'], function () {
        Route::get('/', [SettingController::class, 'index'])->name('settings.index');
        Route::get('/edit/{id}', [SettingController::class, 'edit']);
        Route::post('/update', [SettingController::class, 'update']);
    });
    Route::group(['prefix' => 'appoinments'], function () {
        Route::get('/', [AppoinmentsController::class, 'index'])->name('appoinments.index');
        Route::get('/edit/{id}', [AppoinmentsController::class, 'edit']);
        Route::post('/update', [AppoinmentsController::class, 'update']);
        Route::get('/delete/{id}', [AppoinmentsController::class, 'delete']);
    });

});
