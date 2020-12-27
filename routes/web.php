<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
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
Route::get('/test/{id}',[PostController::class, 'GetPost']);
Route::group(['prefix'=>'user'], function () {
    //Đổi mất khẩu
    Route::post('/change_password',[UserController::class, 'Update']);
    //Lấy thông tin cá nhân
    Route::get('/{id}/check_user',[UserController::class, 'checkUser']);
    Route::get('/{id}',[UserController::class, 'show']);
    //Phê duyệt chủ trọ
    Route::get('/{id}/approval_user',[UserController::class, 'approvalUser']);
    //Lấy số tiền cần trả của 1 user
    Route::get('/{user_id}/payment_user',[PostController::class, 'paymentUser']);
    //Lấy ra sanh sách yêu thích của một user
    Route::get('/{user_id}/post_like',[PostController::class, 'getPostLike']);
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

Route::post('reset_password',[ResetPasswordController::class, 'sendMail'] )->name('password.reset');
Route::put('reset_password/{token}', [ResetPasswordController::class, 'reset']);

//Bài viết

Route::group(['prefix'=>'post'], function () {
    //Lây một bài viết
    Route::get('/{id}',[PostController::class, 'GetPost']);
    //tạo bài viết mới
    Route::post('/create_post',[PostController::class, 'CreatePost']);
    //Sửa bài viết
    Route::post('/{id}/update_post',[PostController::class, 'UploadPost']);
    //Đổi trạng thái phòng trọ và post
    Route::post('/{id}/upload_boarding',[PostController::class, 'UploadBoarding']);
    //Phê duyệt bài post
    Route::post('/{id}/approval_post',[PostController::class, 'approvalPost']);
    //Lấy ds bài post đã được phê duyệt
    Route::get('/approved_post',[PostController::class, 'getApprovedPost']);
    //Lấy ds bài post đã được chưa phê duyệt
    Route::get('/admin/unapproval_post',[PostController::class, 'getUnapprovedPost']);
    //Lấy ds bài post đã hết hạn hoặc trọ đã được thuê
    Route::get('/admin/expired_post',[PostController::class, 'getExpiredPost']);
    //Lấy ds bài post đã được phê duyệt của một chủ trọ
    Route::get('/{user_id}/approved_post_of_user',[PostController::class, 'getApprovedPostOfUser']);
    //Lấy ds bài post chưa được phê duyệt của một chủ trọ
    Route::get('/{user_id}/unapproval_post_of_user',[PostController::class, 'getUnapprovedPostOfUser']);
    //Lấy ds bài post đã hết hạn hoặc trọ của một chủ trọ
    Route::get('/{user_id}/expired_post_of_user',[PostController::class, 'getExpiredPostOfUser']);
    //gia hạn bài đăng
    Route::post('/{post_id}/post_extension',[PostController::class,'postExtension']);
    //Lưu vào danh sach yêu thích
    Route::get('/{post_id}/post_like_post',[PostController::class,'postLikePost']);
    //Xóa khỏi danh sách yêu thích
    Route::get('/{post_id}/unlike_post',[PostController::class,'UnLikePost']);
    //Lấy ra lượt like của post
    Route::get('/{user_id}/like_post',[PostController::class, 'getLikePost']);
    //lấy thống kê
    Route::get('/{post_id}/thong_ke',[PostController::class,'thongKeDay']);

});
