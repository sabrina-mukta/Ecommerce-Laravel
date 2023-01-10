<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feedbackCustomer extends Model
{
    //use HasFactory;

    public $table = "feedback_customers";
    public $fillable = [
        'feedback_first_name',
        'feedback_last_name',
        'feedback_email',
        'feedback_phone',
        'feedback_message',
        'feedback_date'
    ];
}
