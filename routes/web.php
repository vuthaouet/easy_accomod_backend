<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
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
Route::get('/test/{id}',[UserController::class, 'show'])
Route::group(['prefix'=>'user'], function () {
    //Đăng nhập, đăng ký
    Route::post('/registers',[RegisterController::class, 'store'])->name('user.register');
    Route::post('/login',[RegisterController::class, 'login'])->name('user.login');
    Route::get('/logout',[RegisterController::class, 'logout']);
    //Lấy thông tin cá nhân
    Route::get('/{id}/check_user',[UserController::class, 'checkUser']);
    Route::get('/{id}',[UserController::class, 'show']);
//
//    Route::get('dangtin','UserController@get_dangtin')->middleware('dangtinmiddleware');
//    Route::post('dangtin','UserController@post_dangtin')->name('user.dangtin')->middleware('dangtinmiddleware');
//
//    Route::get('profile','UserController@getprofile')->middleware('dangtinmiddleware');
//    Route::get('profile/edit','UserController@getEditprofile')->middleware('dangtinmiddleware');
//    Route::post('profile/edit','UserController@postEditprofile')->name('user.edit')->middleware('dangtinmiddleware');
});


