<?php

namespace App\Http\Controllers;

use App\Ministry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MinistrySearchController extends Controller
{
    public function index(Request $request)
    {
        $ministries = Ministry::all();
        echo $ministries;
    }
    
    public function show(Request $request)
    {
        $ministry_name = $request->get('ministry');
        $ministry = DB::table('ministries')->where('name', '=', "$ministry_name")->get();
        echo $ministry;
    }

   
}
