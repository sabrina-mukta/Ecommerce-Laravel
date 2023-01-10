<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    public $table = "carts";
    public $fillable = [
        'cart_product_id',
        'cart_product_name',
        'cart_product_image',
        'cart_product_price',
        'cart_product_qty',
        'cart_product_session_id'
    ];
}
