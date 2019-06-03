<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class Attribute extends Model
{
    use UsesTenantConnection;

    protected $table = 'attributes';

    protected $fillable = ['label', 'weight','entity_id'];

    public function entity()
    {
        $fillable = ['label',"entity_id"];
        return $this->belongsTo(Entity::class);
    }

    public static function rules(){
        return [
            'label' => 'required|unique:tenant.attributes,label',
            'weight' => 'numeric|min:1'
        ];
    }
}
