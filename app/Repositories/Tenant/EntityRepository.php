<?php
namespace App\Models\Tenant;

use App\Models\Tenant\IAV;
use App\Models\Tenant\Item;
use Illuminate\Support\Facades\DB;

abstract class EntityRepository
{
    public function store($items)
    {
        dd($items);
        $iav_sql  = "insert into iav (`item_id`, `attribute_id`, `value`) values ";
        $item_sql = "insert into items (`id`) values ";
        $eavs = [];
        $item_ids = [];
        $attr_label_to_id = [];

        foreach (Attribute::get(['id','label'])->toArray() as $attr) {
            $attr_label_to_id[$attr['label']] = $attr['id'];
        }

        foreach ($items as $item) {
            $item_sql .= "('" . $item['id'] . "'), ";
            foreach ($item as $attr_label => $attr_value) {
                if($attr_label !== "id"){
                    $iav_sql .= " (";
                    $iav_sql .= " '" . addslashes($item["id"])                    . "', ";
                    $iav_sql .= " '" . addslashes($attr_label_to_id[$attr_label]) . "', ";
                    $iav_sql .= " '" . addslashes($attr_value)                    . "' ";
                    $iav_sql .= "), ";
                }
            }
        }

        $iav_sql  = substr($iav_sql, 0, -2);
        $item_sql = substr($item_sql, 0, -2);
        DB::statement($item_sql);
        DB::statement($iav_sql);
    }
}

/*
    [
        { 'id':1,'title':'iphone','price':1000 },
        { 'id':2,'title':'samsung','price':2000 },
    ]
*/