<?php

namespace App\Models\Tenant;

use App\Models\Tenant\User;
use Illuminate\Database\Eloquent\Model;
use PHPUnit\Framework\Constraint\Attribute;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class UAV extends Model
{
    use UsesTenantConnection;

    protected $fillable = ["user_id", "attribute_id", "value"];
    protected $table = "uav";

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }
}
