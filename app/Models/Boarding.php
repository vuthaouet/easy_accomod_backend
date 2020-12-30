<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boarding extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function addresses()
    {
        return $this->belongsTo(Address::class);
    }
    public function type_boardings()
    {
        return $this->belongsTo(TypeBoarding::class);
    }
    public function furnitures()
    {
        return $this->belongsToMany(Furniture::class,'boarding_furnitures','boarding_id','furniture_id');
    }
    public function place_arounds()
    {
        return $this->belongsToMany(PlaceAround::class,'boarding_place_arounds','boarding_id','palce_around_id');
    }
}
