<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Furniture extends Model
{
    public $table = "furnitures";
    use HasFactory;
    protected $fillable = ['name'];
    public $timestamps = false;
    public function boardings()
    {
        return $this->belongsToMany(Boarding::class,'boarding_furnitures','furniture_id','boarding_id');
    }
}
