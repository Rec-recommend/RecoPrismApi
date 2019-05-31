<?php 
namespace App\Repositories\Tenant;

use App\Models\Tenant\EntityRepository;

class UserRepository  extends EntityRepository
{
    public function __construct()
    {
        $this->entity_id = 2;
        $this->entity_name = "user";
        $this->entity_model = \App\Models\Tenant\User::class;
        $this->entity_eav = \App\Models\Tenant\UAV::class;
    }
}