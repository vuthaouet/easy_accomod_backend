<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static updateOrCreate(array $array, array $array1)
 * @method static where(string $string, $token)
 */
class PasswordReset extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'token',
    ];
}
