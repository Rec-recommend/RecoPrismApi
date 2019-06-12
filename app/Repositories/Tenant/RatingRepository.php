<?php
namespace App\Repositories\Tenant;

use Illuminate\Support\Facades\DB;

class RatingRepository extends Repository
{
    public function transaction($ratings, $headers)
    {
        DB::statement($this->prepareRatingsInsertStatement($ratings, $headers));
    }

    public function prepareRatingsInsertStatement($ratings, $labels_indeces)
    {
        $rating_sql = "replace into ratings (`end_user_id` , `item_id`, `value`) values ";
        foreach ($ratings as $rating) {
            $end_user_id = $rating[$labels_indeces['user_id']];
            $item_id     = $rating[$labels_indeces['item_id']];
            $value       = $rating[$labels_indeces['value']];

            $rating_sql .= " (";
            $rating_sql .= " '" . $end_user_id . "', ";
            $rating_sql .= " '" . $item_id     . "', ";
            $rating_sql .= " '" . $value       . "' ";
            $rating_sql .= "), ";
        }
        $rating_sql = substr($rating_sql, 0, -2);
        return $rating_sql;
    }
}