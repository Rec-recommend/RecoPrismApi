<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class Entity extends Model
{
    use UsesTenantConnection;
    protected $table = 'entities';
    protected $fillable = ['name'];

    public function attributes(){
        return $this->hasMany(Attribute::class);
    }
}
