<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user  = DB::table('users')
            ->where('id', $id)
            ->get();
        return response()->json($user);
    }
    /**
     * Hiển thị trạng thái chủ nhà trọ
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function checkUser($id)
    {
        $user = new User;
        $user = $user->getRole($id);
        return response()->json($user);
    }
    /**
     * Hiển thị Phê duyệt chủ nhà trọ
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function approvalUser($id)
    {
        if (Auth::Check() && Auth::User()->role_id == 1){
            $user = User::find($id);
            $user->status = 1;
            $user->save();
            return response()->json([
                'message' => 'Phê duyệt người dùng thành công!'
            ], 201);

        }
        else{
            return response()->json([
                'message' => 'Bạn không có quyền phê duyệt!',

            ], 201);
        }
    }

    /**
     * test
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function test($id)
    {
        $address = new Address;
        $address =$address->getAddressByUserId($id);
        return response()->json($address);
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
    public function Update(Request $request)
    {
        if(Auth::Check())
        {
            $request_data = $request->All();
            $request->validate([
                'old-password' => 'required',
                'new-password' => 'required',
                'retype-password' => 'required|same:new-password',
            ],[
                'old-password.required' => 'Vui lòng nhập mật khẩu hiện tại',
                'new-password.required' => 'Vui lòng nhập mật khẩu',
                'retype-password' =>'Vui lòng nhập lại mật khẩu'
            ]);
                $current_password = Auth::User()->password;
                if(Hash::check($request_data['old-password'], $current_password))
                {
                    $user_id = Auth::User()->id;
                    $obj_user = User::find($user_id);
                    $obj_user->password = Hash::make($request_data['new-password']);
                    $obj_user->save();
                    return response()->json([
                        'message' => 'Đổi mật khẩu thành công'
                    ], 201);
                }
                else
                {
                    $error = array('old-password' => 'Vui lòng nhập đúng mật khẩu hiện tại');
                    return response()->json(array('error' => $error), 400);
                }
        }
        else
        {
            return redirect()->to('/');
        }
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
