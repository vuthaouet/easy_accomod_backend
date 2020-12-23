<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ResetPasswordController;
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

Route::get('/', function () {
    return view('welcome');
});

//Route::resource('registers', \App\Http\Controllers\RegisterController::class);
Route::get('/test/{id}',[UserController::class, 'test']);
Route::group(['prefix'=>'user'], function () {
    //Lấy thông tin cá nhân
    Route::get('/{id}/check_user',[UserController::class, 'checkUser']);
    Route::get('/{id}',[UserController::class, 'show']);
});


//xác thực
Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('signup', [AuthController::class, 'signup'])->name('auth.singup');

    Route::group([
        'middleware' => 'auth:api'
    ], function() {
        Route::get('logout',  [AuthController::class, 'logout']);
        Route::get('user', [AuthController::class, 'user']);
    });
});

Route::post('reset-password',[ResetPasswordController::class, 'sendMail'] )->name('password.reset');
Route::put('reset-password/{token}', [ResetPasswordController::class, 'reset']);
