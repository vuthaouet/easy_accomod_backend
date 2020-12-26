<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeBoarding extends Model
{
    use HasFactory;
    public function boardings()
    {
        return $this->hasMany(TypeBoarding::class);
    }
}
