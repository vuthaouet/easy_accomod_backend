<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Address extends Model
{

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
       return DB::table('users')->where('id', $address_id);
    }
    //Update
    function updateAddress(Address $newAdd){
        $this->number = $request->number;
        $this->street = $request->street;
        $this->wards = $request->wards;
        $this->district = $request->district;
        $this->provinces = $request->provinces;
        $this->save();
    }
}
