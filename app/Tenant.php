<?php

namespace App;

use App\PaymentPlan;
use Illuminate\Support\Str;
use Hyn\Tenancy\Environment;
use Hyn\Tenancy\Models\Website;
use Hyn\Tenancy\Models\Hostname;
use Illuminate\Support\Facades\Artisan;
use Hyn\Tenancy\Contracts\Repositories\WebsiteRepository;
use Hyn\Tenancy\Contracts\Repositories\HostnameRepository;

/**
 * @property Website website
 * @property Hostname hostname
 */
 
class Tenant
{
    public $website;
    public $hostname;
    
    public function __construct(Website $website = null, Hostname $hostname = null)
    {
        $this->website = $website ;
        $this->hostname = $hostname ;
    }
    
    public function delete()
    {
        app(HostnameRepository::class)->delete($this->hostname, true);
        app(WebsiteRepository::class)->delete($this->website, true);
    }
    
    public static function create(User $user, String $subdomain): Tenant
    {
        // Create New Website
        $website = new Website;
        $website->uuid = "tn_".Str::random(29);
        app(WebsiteRepository::class)->create($website);
        
        // associate the website with a hostname
        $hostname = new Hostname;
        $hostname->user_id= $user->id;
        $hostname->fqdn = strtolower($subdomain).".".env('TENANT_URL_BASE');
        app(HostnameRepository::class)->attach($hostname, $website);
        // make hostname current
        app(Environment::class)->tenant($website);
        Artisan::call('passport:install');
        return new Tenant($website, $hostname);
    }
    
    public function subsrcibe(PaymentPlan $plan)
    {
        Subscription::new($this->hostname, $plan);
    } 
    public function get_api_key(){
        return Subscription::where("hostname_id",$this->hostname->id)->get('api_key')->first()->api_key;
    }

    public function suspend(){
        Subscription::suspend($this->hostname);
    }
    
    public static function tenantExists($name)
    {
        return Hostname::where('fqdn', $name)->exists();
    }
}
