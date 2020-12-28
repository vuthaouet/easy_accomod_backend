<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Laravel\Passport\HasApiTokens;


/**
 * @method static where(string $string, mixed $email)
 */
class User extends Authenticatable
{
    use HasApiTokens,HasFactory, Notifiable;


    //xác định quan hệ với role
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    //xác định quan hệ với post
    public function Post()
    {
        return $this->hasOne('App\Models\Post', 'user_id');
    }

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




    // Tạo người dùng mới
    function storeUser(Request $request, $address_id){
        $this->firstname=$request->firstname;
        $this->lastname=$request->lastname;
        $this->email=$request->email;
        $this->phone_number=$request->phone_number;
        $this->address_id=$address_id;
        $this->password=bcrypt($request->password);
        $this->cmnd=$request->cmnd;
        if($request->role == "owner")
        {
            $this->role_id=2;
        }
        else{
            $this->role_id=3;
        }

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
    //Lấy người dùng theo id
    //
    function getUserById($id){
        return User::find($id);
    }

    //Phân quyền

    public function authorizeRoles($roles_id)
    {
        if (is_array($roles_id)) {
            return $this->hasAnyRole($roles_id) ||
                abort(401, 'This action is unauthorized.');
        }
        return $this->hasRole($roles_id) ||
            abort(401, 'This action is unauthorized.');
    }
    /**
     * Check multiple roles
     * @param array $roles_id
     */
    public function hasAnyRole($roles_id)
    {
        return null !== $this->roles()->whereIn(‘role_id’, $roles_id)->first();
    }
    /**
     * Check one role
     * @param string $role
     */
    public function hasRole($roles_id)
    {
        return null !== $this->roles()->where(‘role_id’, $roles_id)->first();
    }

    public function approvalUser($id){
        $this->status = 1;
    }

}
