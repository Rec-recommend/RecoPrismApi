<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable =['id','item_id','tenant_user_id']; 
}
