<?php 
namespace App\Repositories\Tenant;

use App\Models\Tenant\EntityRepository;

class UserRepository extends Repository
{
    public function transaction($users, $headers)
    {
        DB::statement($this->prepareRatingsInsertStatement($users, $headers));
    }

    public function prepareUsersInsertStatement($users, $labels_indeces)
    {
        $end_user_sql = "insert into end_users (`id`) values ";
        foreach ($users as $end_user) {
            $end_user_id = $end_user[$labels_indeces['user_id']];

            $end_user_sql .= " ('". $end_user_id . "'),";
        }
        $end_user_sql = substr($end_user_sql, 0, -2);
        return $end_user_sql;
    }
}