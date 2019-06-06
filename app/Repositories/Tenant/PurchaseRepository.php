<?php
namespace App\Repositories\Tenant;

use App\Models\Tenant\IAV;
use App\Models\Tenant\Item;
use App\Models\Tenant\Attribute;
use Illuminate\Support\Facades\DB;

class PurchaseRepository
{
    public function store($purchases)
    {
        $headers = $purchases[0];
        $headers = array_flip($headers);
        unset($purchases[0]);
        DB::statement($this->preparePurchaseInsertStatement($purchases, $headers));
    }

    public function preparePurchaseInsertStatement($purchases, $labels_indeces)
    {
        $purchase_sql = "insert into purchase (`end_user_id` , `item_id`, `count`) values ";
        foreach ($purchases as $purchase) {
            $end_user_id = $purchase[$labels_indeces['user_id']];
            $item_id     = $purchase[$labels_indeces['item_id']];
            $count       = $purchase[$labels_indeces['count']];

            $purchase_sql .= " (";
            $purchase_sql .= " '" . $end_user_id . "', ";
            $purchase_sql .= " '" . $item_id     . "', ";
            $purchase_sql .= " '" . $count       . "' ";
            $purchase_sql .= "), ";
        }
        $purchase_sql = substr($purchase_sql, 0, -2);
        return $purchase_sql;
    }
}