<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;

class TenantUser extends Model
{
    protected $fillable = ['id','name','email','email_verified_at','password'];
}
