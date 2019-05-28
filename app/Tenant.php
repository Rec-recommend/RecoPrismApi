<?php

namespace App;

use App\PaymentPlan;
use Illuminate\Support\Str;
use Hyn\Tenancy\Environment;
use Hyn\Tenancy\Models\Website;
use Hyn\Tenancy\Models\Hostname;
use Illuminate\Support\Facades\Artisan;
use Hyn\Tenancy\Repositories\WebsiteRepository;
use Hyn\Tenancy\Repositories\HostnameRepository;

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
        $this->website = $website;
        $this->hostname = $hostname;
    }

    public static function delete($hostname, $website)
    {
        app(WebsiteRepository::class)->delete($website, true);
        app(HostnameRepository::class)->delete($hostname, true);
        return true;
    }

    public static function create(User $user, String $subdomain): Tenant
    {
        // Create New Website
        $website = new Website;
        $website->uuid = "tn_" . Str::random(29);
        app(WebsiteRepository::class)->create($website);

        // associate the website with a hostname
        $hostname = new Hostname;
        $hostname->user_id = $user->id;
        $hostname->fqdn = strtolower($subdomain) . "." . env('TENANT_URL_BASE');
        app(HostnameRepository::class)->attach($hostname, $website);

        // make hostname current
        // app(Environment::class)->tenant($website);

        Artisan::call('passport:install');

        return new Tenant($website, $hostname);
    }

    public function subsrcibe(PaymentPlan $plan)
    {
        Subscription::new($this->hostname, $plan);
    }

    public function suspend()
    {
        Subscription::suspend($this->hostname);
    }

    public static function tenantExists($name)
    {
        return Hostname::where('fqdn', $name)->exists();
    }
    public static function rules()
    {
        return [
            'fqdn' => 'unique:hostnames|max:30|min:5',
        ];
    }
}
