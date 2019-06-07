<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;
use Laravel\Cashier\Billable;

class Client extends Model
{
    use Billable;
    protected $table = 'clients';    
    protected $fillable = [
        'name', 'email', 'password','subdomain'
    ];
}
