<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\User;
use Cassandra\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class AuthController extends Controller
{
    /**
     * Create user
     *
     */
    public function signup(Request $request)
    {
        try{
        $request->validate([
            'phone_number' => 'required|min:10|numeric',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'repassword' => 'required|same:password',
            'firstname'=>'required',
            'lastname'=>'required',


        ],[
            'email.unique' => 'Email đã tồn tại trên hệ thống',
            'email.required' => 'Vui lòng nhập Email',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu phải lớn hơn 6 kí tự',
            'repassword.required' => 'Vui lòng nhập lại mật khẩu',
            'repassword.same' => 'Mật khẩu nhập lại không trùng khớp',
            'lastname.required'=>'Vui lòng nhập tên',
            'firstname.required'=>'Vui lòng nhập tên',
            'phone_number.required'=>'Vui lòng nhập số điện thoại',
            'phone_number.min'=>'Vui lòng nhập đúng số điện thoại'
        ]);
//        Tạo địa chỉ mới
        $address = new Address;
        $address->storeAddress($request);

//        Tao nguoi dung moi
        $user = new User;
        $user->storeUser($request, $address->id);
        return response()->json([
            'message' => 'Đăng ký thành công!'
        ], 201);
        }
        catch (Exception $e) {
            return response()->json([
                'message' => 'Đăng ký không thành công!'
            ], 401);
        }
    }

    /**
     * Login user and create token
     *
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);
        $credentials = request(['email', 'password']);
        if(!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Đăng nhập không thành công'
            ], 401);
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();
        return response()->json([
            'message' => 'Đăng nhập thành công',
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString(),
        ],201);
    }

    /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function user(Request $request)
    {
        return response()->json($request->user());
    }


}
