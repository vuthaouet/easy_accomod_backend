<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory;

    public function boarding()
    {
        return $this->hasOne(Boarding::class);
    }
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
