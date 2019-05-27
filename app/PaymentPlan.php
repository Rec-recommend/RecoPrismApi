<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentPlan extends Model
{
    protected $table='payment_plans';
    protected $fillable = [
        'name', 'price'
    ];
}
