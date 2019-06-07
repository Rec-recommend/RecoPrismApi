<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';    
    protected $fillable = [
        'name', 'email', 'password','subdomain'
    ];
}
