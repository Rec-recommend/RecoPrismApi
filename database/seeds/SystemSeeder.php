<?php

use App\User;
use App\Tenant;
use Illuminate\Database\Seeder;


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
        Tenant::create($user, $subdomain);
    }
}
