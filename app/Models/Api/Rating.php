<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    
    protected $fillable =['id','value,','item_id','tenant_user_id']; 
}
