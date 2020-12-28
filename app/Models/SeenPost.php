<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeenPost extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['time_seen'];
}
