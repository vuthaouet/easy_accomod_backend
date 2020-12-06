<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists = User::all();
        return response()->json($lists);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'repassword' => 'required|same:password',
        ],[
            'email.unique' => 'Email đã tồn tại trên hệ thống',
            'email.required' => 'Vui lòng nhập Email',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu phải lớn hơn 6 kí tự',
            'repassword.required' => 'Vui lòng nhập lại mật khẩu',
            'repassword.same' => 'Mật khẩu nhập lại không trùng khớp',
        ]);
//        Tạo địa chỉ mới
        $address = new Address;
        $address->storeAddress($request);

//        Tao nguoi dung moi
        $user = new User;
        $user->storeUser($request, $address->id);
        return response()->json("true");
    }
    public function test(Request $request){

    }
    public function login(Request $req){
        $req->validate([
            'email' => 'required',
            'password' => 'required',

        ],[
            'email.required' => 'Vui lòng nhập email',
            'password.required' => 'Vui lòng nhập mật khẩu'

        ]);
        if(Auth::attempt(['email'=>$req->email,'password'=>$req->password])){
            return response()->json("true");
        }
        else
            return response()->json("false");
    }
    public function logout(){
        Auth::logout();
        return response()->json("true");
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
