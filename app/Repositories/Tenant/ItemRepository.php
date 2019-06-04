<?php
namespace App\Repositories\Tenant;

use App\Models\Tenant\IAV;
use App\Models\Tenant\Item;
use App\Models\Tenant\Attribute;
use Illuminate\Support\Facades\DB;

class ItemRepository
{
    public function store($items)
    {
    }

}

/*
    [
        { 'id':1,'title':'iphone','price':1000 },
        { 'id':2,'title':'samsung','price':2000 },
    ]
*/