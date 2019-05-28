<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use PHPUnit\Framework\Constraint\Attribute;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class EavTenantUser extends Model
{
    use UsesTenantConnection;

    protected $fillable = ["tenant_user_id", "attribute_id", "value"];
    protected $table = "eav_tenant_users";

    public function tenant_user(){
        return $this->belongsTo(TenantUser::class);
    }
    public function attribute(){
        return $this->belongsTo(Attribute::class);
    }
}
