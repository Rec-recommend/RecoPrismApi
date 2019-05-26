<?php

use App\User;
use App\Tenant;
use Illuminate\Database\Seeder;
use App\PaymentPlan;

class SystemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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

        PaymentPlan::create([
            'name'=>'basic',
            'price'=>25
        ]);
        Tenant::create($user, $subdomain);
    }
}
