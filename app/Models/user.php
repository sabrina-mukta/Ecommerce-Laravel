<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    public $table = "users";
    public $fillable = [
        'user_full_name',
        'user_name',
        'user_email',
        'user_phone',
        'user_password',
        'user_image',
        'user_role_id'
    ];
}
