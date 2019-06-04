<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

class PaymentPlan extends Model
{
    protected $table='payment_plans';
    protected $fillable = [
        'name', 'price'
    ];
}
