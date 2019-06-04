<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

class TestController extends Controller
{
    public function index(){
        // $tables = DB::connection()->getDoctrineSchemaManager()->listTableNames();
        // dd($tables);
        return view('landingPage');
    }
}
