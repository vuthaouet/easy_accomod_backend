<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Address()
    {
        return $this->hasOne('App\Models\Address', 'address_id');
    }

    // Tạo người dùng mới
    function storeUser(Request $request, $address_id){
        $this->firstname=$request->firstname;
        $this->lastname=$request->lastname;
        $this->email=$request->email;
        $this->phone_number=$request->phone_number;
        $this->address_id=$address_id;
        $this->role_id=$request->role_id;
        $this->password=bcrypt($request->password);
        $this->cmnd=$request->cmnd;
        $this->save();
    }


    // lấy quyền và trạng thái
    function getRole($id){
        $user = DB::table('users')
            ->select("role_id","status")
            ->where('id', $id)
            ->get();
        return $user;
    }

}
