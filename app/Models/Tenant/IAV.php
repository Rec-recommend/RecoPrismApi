<?php

namespace App\Models\Tenant;

use App\Models\Tenant\Attribute;
use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class IAV extends Model
{
    use UsesTenantConnection;

    protected $fillable = ["item_id", "attribute_id", "value"];
    protected $table = "iav";


    public function item(){
        return $this->belongsTo(Item::class);
    }
    public function attribute(){
        return $this->belongsTo(Attribute::class);
    }

}
