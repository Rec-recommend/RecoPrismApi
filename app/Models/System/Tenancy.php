<?php

namespace App\Models\System;

use App\Models\System\Plan;
use Illuminate\Support\Str;
use Hyn\Tenancy\Models\Website;
use Hyn\Tenancy\Models\Hostname;
use Hyn\Tenancy\Repositories\WebsiteRepository;
use Hyn\Tenancy\Repositories\HostnameRepository;
use App\Models\Tenant\Setting;
use Illuminate\Support\Facades\DB;
use App\Models\Tenant\TenantAdmin;

/**
 * @property Website website
 * @property Hostname hostname
 */

class Tenancy
{
    public $website;
    public $hostname;

    public function __construct(Website $website = null, Hostname $hostname = null)
    {
        $this->website = $website;
        $this->hostname = $hostname;
    }

    public static function delete($hostname, $website)
    {
        app(WebsiteRepository::class)->delete($website, true);
        app(HostnameRepository::class)->delete($hostname, true);
        return true;
    }

    public static function create(Client $client): Tenancy
    {
        // Create New Website
        $website = new Website;
        $website->uuid = "tn_" . Str::random(29);
        app(WebsiteRepository::class)->create($website);

        // associate the website with a hostname
        $hostname = new Hostname;
        $hostname->client_id=$client->id;
        $hostname->fqdn = strtolower($client->subdomain) . "." . env('TENANT_URL_BASE');
        app(HostnameRepository::class)->attach($hostname, $website);
        //  current connection: tenant


        // Generate AN API_KEY
        Setting::create([
            'key'=>'api-key',
            'value'=>Setting::generate_api_key()
        ]);



        // puts owner in tenant database
        $admin = new TenantAdmin([
            'name'=>$client->name,
            'email'=>$client->email,
            'password'=>$client->password,
            'is_owner'=>true
        ]);
        $admin->save();

        
        return new Tenancy($website, $hostname);
    }
}
