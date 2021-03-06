<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    //xác định quan hệ với user
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
