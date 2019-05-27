<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use PHPUnit\Framework\Constraint\Attribute;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class EavItems extends Model
{
    use UsesTenantConnection;

    protected $fillable = ["item_id", "attribute_id", "value"];
    protected $table = "eav_items";

    public function item(){
        return $this->belongsTo(Item::class);
    }
    public function attribute(){
        return $this->belongsTo(Attribute::class);
    }
}
