<?php

namespace App\Http\Controllers\System;

use Redirect;
use App\Tenant;
use App\Models\Api\Item;
use Illuminate\Http\Request;
use Hyn\Tenancy\Models\Website;
use Hyn\Tenancy\Models\Hostname;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Factories\TenantModelFactory;
use App\Models\Common\Admin as User;;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Hyn\Tenancy\Repositories\WebsiteRepository;
use Hyn\Tenancy\Repositories\HostnameRepository;


class TenantController extends Controller
{
    use UsesTenantConnection;

    public function __construct()
    { }

    public function index()
    {
        $hostnames = Hostname::all();
        return view('tenantApps')->with('hostnames', $hostnames);
    }

    public function destroy($id)
    {
        $hostname = Hostname::find($id);
        $website = $hostname->website()->first();
        $tenantDBName = $website->first()->uuid;
        Schema::getConnection()->getDoctrineSchemaManager()->dropDatabase("`{$tenantDBName}`");
        app(WebsiteRepository::class)->delete($website, true);
        app(HostnameRepository::class)->delete($hostname, true);
        return redirect('/applications');
    }
}
