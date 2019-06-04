<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class EndUser extends Model
{
    use UsesTenantConnection;
    protected $table = "end_users";

    public function ratings(){
        return $this->hasMany(Rating::class);
    }

    public function purchases(){
        return $this->hasMany(Purchase::class);
    }
}
