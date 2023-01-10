<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    public $table = "customers";
    public $fillable = [
        'customers_name',
        'customers_username',
        'customers_email',
        'customers_phone',
        'customers_password',
        'customers_zipcode',
        'customers_address_line',
        'customers_address_line_two',
        'customers_district',
        'customers_country'
    ];
}