<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    public $table = "orders";
    public $fillable = [
        'orders_customer_id',
        'orders_product_id',
        'orders_product_name',
        'orders_product_image',
        'orders_product_qty',
        'orders_product_price',
        'orders_date'
    ];
}
