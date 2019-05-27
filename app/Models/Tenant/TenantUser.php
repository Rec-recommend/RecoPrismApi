<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class TenantUser extends Model
{
    use UsesTenantConnection;
    protected $table = "tenant_users";

    public function attributes(){
        return $this->hasManyThrough(Attribute::class, ItemAttributeValues::class);
    }

    public function attributeValues(){
        return $this->hasMany(UserAttributeValues::class);
    }

    public function ratings(){
        return $this->hasMany(Rating::class);
    }

    public function purchases(){
        return $this->hasMany(Purchase::class);
    }
}
