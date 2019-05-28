<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class Rating extends Model
{
    use UsesTenantConnection;    
    protected $fillable =['item_id','tenant_user_id','value']; 

}
