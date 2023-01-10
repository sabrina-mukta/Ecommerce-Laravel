<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class brand extends Model
{
    public $table = "brands";
    public $fillable = [
        'brand_id',
        'brand_name'
    ];

    //use HasFactory;
}
