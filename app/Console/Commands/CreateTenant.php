<?php
namespace App\Console\Commands;

use App\User;
use App\Tenant;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class CreateTenant extends Command
{
    protected $signature = 'tenant:create';
    protected $description = 'Creates a tenant with the provided name and email address e.g. php artisan tenant:create boise boise@example.com';
    public function handle()
    {
        $subdomain = 'test';
        $user = User::where([
            'email'=>'test@tester.com',
        ])->first();
        Tenant::create($user,$subdomain);
        $this->info("Tenant '{$subdomain}' is created and is now accessible at {$user->name}");
    }
}