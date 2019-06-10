<?php

namespace App\Models\Tenant;
use App\Models\Common\Admin;
use Illuminate\Support\Facades\Config;
use Illuminate\Database\Eloquent\Model;

class TenantAdmin extends Admin 
{
    public function __construct($attributes = array())
    {
        $this->table = Config::set('auth.current_admin_table','tenant_admins');
        $this->table = 'tenant_admins';
        $this->fillable = array_merge(['is_owner'], $this->fillable);
        parent::__construct($attributes);
    }
    protected $table = 'tenant_admins';
}
