<?php

use App\Http\Controllers\dashboard\consultionController;
use App\Http\Controllers\dashboard\dashboardController;
use App\Http\Controllers\dashboard\ServiceController;
use App\Http\Controllers\dashboard\UserController;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'dashboard', 'namespace' => 'dashboard'], function () {
    Route::get('/', [dashboardController::class, 'index']);

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
    });

    Route::group(['prefix' => 'services'], function () {
        Route::get('/', [ServiceController::class, 'index'])->name('services.index');
        Route::post('/add-new', [ServiceController::class, 'store'])->name('service.store');
        Route::get('/edit/{id}', [ServiceController::class, 'edit']);
        Route::post('/update', [ServiceController::class, 'update']);
        Route::get('/delete/{id}', [ServiceController::class, 'destroy']);
    });

});
