<?php

use App\Models\System\Plan;
use App\Models\System\Tenant;
use Illuminate\Database\Seeder;
use App\Models\System\SystemAdmin;
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

        //Super Admin
        SystemAdmin::create([
            "name" => "admin",
            "email" => "admin@gmail.com",
            "password" => Hash::make("12345678"),
        ]);

        $subdomain = 'test';
     
        $pp = Plan::create([
            'name' => 'Basic',
            'cost' => 25,
            'slug' => 'basic',
            'stripe_plan'=>'plan_FBzkdlFLUa5PC9',
            'description'=> 'Unlimited Entrance
            Comfortable Seat
            Paid Certificate
            Day One Workshop
            One Certificate'
        ]);

        
        $tenant = Tenant::create($subdomain);
        
        $this->call(TenantSeeder::class);
        
        Config::set('database.default', 'system');

        $tenant->subsrcibe($pp);
    }
}
