<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MinistrySearchController extends Controller
{
    function index()
    {
        return view('ministry.minsearch');
    }

    function show(Request $request)
    {
        $ministry_name = $request->get('ministry');
        $ministry = DB::table('ministries_profile')->where('ministry_name', '=', "$ministry_name")->get();
        echo $ministry;
    }

    function autocomplete(Request $request)
    {
        // dd($request->get('query'));
        if ($request->get('query')) {
            $query = $request->get('query');
            $data = DB::table('ministries_profile')->where('ministry_name', 'LIKE', "%$query%")->get();
            echo $data;
        }
    }
}
