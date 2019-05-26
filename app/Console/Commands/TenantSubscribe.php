<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Hyn\Tenancy\Models\Hostname;
use Hyn\Tenancy\Middleware\HostnameActions;
use App\Tenant;
use phpDocumentor\Reflection\Types\Null_;

class TenantSubscribe extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenant:subscribe';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $hostname = Hostname::where('fqdn','test.')->first();
        $tenant = new Tenant($hostname->website,$hostname);
        // $this->info($hostname->created_at);
        // $tenant->subsrcibe();
        // dd($tenant->website);
        // dd($tenant->hostname);
        // $this->info(dd($hostname->website()->all())->uuid);
    }
}
