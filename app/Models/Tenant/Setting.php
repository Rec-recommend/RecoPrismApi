<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class Setting extends Model
{
    use UsesTenantConnection;

    protected $table='settings';
    protected $fillable =['key','value']; 


    public static function generate_api_key(){
            return $result = md5(rand()); 
    }
}
    