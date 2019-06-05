<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $table = 'registrations';    
    protected $fillable = [
        'name', 'email', 'password','subdomain','payment_plan_id'
    ];
}
