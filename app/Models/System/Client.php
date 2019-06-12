<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;
use Laravel\Cashier\Billable;
use PharIo\Manifest\Email;

class Client extends Model
{
    use Billable;
    protected $table = 'clients';    
    protected $fillable = [
        'name', 'email', 'password','subdomain'
    ];

    public static function rules() {
        return 
        [
            'email'=>'required|unique:clients',
            'subdomain'=>'required|unique:clients'
        ];
    } 
}
