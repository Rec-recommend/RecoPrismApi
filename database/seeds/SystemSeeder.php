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
        
        $this->call(TenantSeeder::class);
        
        Config::set('database.default', 'system');

        $tenant->subsrcibe($pp);
    }
}
