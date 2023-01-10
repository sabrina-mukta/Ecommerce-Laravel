<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    public $table = "products";
    public $fillable = [
        'product_name',
        'product_sort_des',
        'product_regular_price',
        'product_price',
        'product_brand_id',
        'product_category_id',
        'user_image',
        'product_description'
    ];
}
