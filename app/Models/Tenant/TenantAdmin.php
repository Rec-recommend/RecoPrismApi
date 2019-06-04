<?php

namespace App\Models\Tenant;
use App\Models\Common\Admin;
use Illuminate\Database\Eloquent\Model;

class TenantAdmin extends Admin 
{
    protected $table = 'tenant_admins';
}
