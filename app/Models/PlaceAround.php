<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaceAround extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    public $timestamps = false;
    public function boardings()
    {
        return $this->belongsToMany(Boarding::class,'boarding_place_arounds','palce_around_id','boarding_id');
    }
}
