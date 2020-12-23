<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $user = $users = DB::table('users')
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
    public function update(Request $request, $id)
    {
        $address = new Address;
        $user = new User;
        $user = $user->getUserById($id);
        $address =$address->getAddressById($id);
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
