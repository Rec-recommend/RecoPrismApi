<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class Attribute extends Model
{
    use UsesTenantConnection;
    protected $table = 'attributes';

    protected $fillable = ['label', 'weight','entity_id' ];

    public function entity()
    {
        return $this->belongsTo(Entity::class);
    }
}
