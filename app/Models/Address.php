<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Address extends Model
{
    public function User()
    {
        return $this->hasOne('App\Models\User', 'address_id');
    }
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'id';
    //Tạo mới địa chỉ
    function storeAddress(Request $request){
        $this->number = $request->number;
        $this->street = $request->street;
        $this->wards = $request->wards;
        $this->district = $request->district;
        $this->provinces = $request->provinces;
        $this->save();
    }
    //Lấy ra địa chỉ
    function getAddressById($address_id){
       return Address::find($address_id);
    }
    //Lấy ra địa chỉ theo User_id
    function getAddressByUserId($user_id){
        $user = User::find($user_id);
        return Address::find($user->address_id);

    }
    //Update
//    function updateAddress(Address $newAdd){
//        $this->number = $request->number;
//        $this->street = $request->street;
//        $this->wards = $request->wards;
//        $this->district = $request->district;
//        $this->provinces = $request->provinces;
//        $this->save();
//    }
}
