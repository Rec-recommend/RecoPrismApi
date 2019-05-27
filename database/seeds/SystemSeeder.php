<?php

use App\User;
use App\Models\Tenant\Entity;
use App\PaymentPlan;
use App\Tenant;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Hyn\Tenancy\Traits\UsesSystemConnection;

class SystemSeeder extends Seeder
{
    use UsesSystemConnection;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Config::set('database.default', 'system');

        User::create([
            "name" => "test",
            "email" => "test@tester.com",
            "password" => "12345678",
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $subdomain = 'test';
        $user = User::where([
            'email' => 'test@tester.com',
        ])->first();

        $pp = PaymentPlan::create([
            'name' => 'basic',
            'price' => 25
        ]);

        
        $tenant = Tenant::create($user, $subdomain);
        $now = Carbon::now('utc')->toDateTimeString();

        $entities = array(
            array(
                'name' => 'item', 
                'created_at' => $now,
                'updated_at' => $now
            ),
            array(
                'name' => 'user',
                'created_at' => $now,
                'updated_at' => $now
            ),
        );
        Entity::insert($entities);
        $attributes = array(
            array(
                'label' => 'name', 
                'created_at' => $now,
                'updated_at' => $now
            ),
            array(
                'label' => 'price',
                'created_at' => $now,
                'updated_at' => $now
            ),
        );
        
        Config::set('database.default', 'system');

        $tenant->subsrcibe($pp);
    }
}
