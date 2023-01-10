<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    public $table = "categories";
    public $fillable = [
        'category_name',
        'brand_id'
    ];
}
