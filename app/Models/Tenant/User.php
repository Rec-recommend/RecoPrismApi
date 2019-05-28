<?php

namespace App\Models\Tenant;

use App\Models\Tenant\IAV;
use App\Models\Tenant\UAV;
use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class User extends Model
{
    use UsesTenantConnection;
    protected $table = "users";
    protected $fillable = ['entity_id'];

    public function attributes(){
        return $this->hasManyThrough(Attribute::class, IAV::class);
    }

    public function attributeValues(){
        return $this->hasMany(UAV::class);
    }

    public function ratings(){
        return $this->hasMany(Rating::class);
    }

    public function purchases(){
        return $this->hasMany(Purchase::class);
    }
}
