<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class Purchase extends Model
{
    use UsesTenantConnection;
    protected $fillable =['item_id','end_user_id', 'count']; 
}
