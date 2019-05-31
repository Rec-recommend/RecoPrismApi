<?php

use App\User;
use App\Tenant;
use Carbon\Carbon;
use App\PaymentPlan;
use App\Models\Tenant\Entity;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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
            "email" => "test@gmail.com",
            "password" => Hash::make("12345678"),
        ]);

        $subdomain = 'test';
        $user = User::where([
            'email' => 'test@gmail.com',
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
