<?php

namespace App\Http\Controllers\Api\Tenant;

use App\Repositories\Tenant\ItemRepository;

class ItemController extends EntityController
{
    public function __construct(ItemRepository $item)
    {
        $this->entity = $item;
    }
}
