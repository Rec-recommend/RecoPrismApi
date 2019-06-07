<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $table='plans';
    protected $fillable = [
        'name', 'cost', 'description', 'slug', 'stripe_plan'
    ];
}
