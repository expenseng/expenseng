<?php

namespace App\Http\Controllers;

use App\Ministry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MinistryController extends Controller
{
    public function index(Request $request)
    {
        $ministries = Ministry::all();
        echo $ministries;
    }
    
    public function show(Ministry $ministry)
    {
        return view('pages.ministry.single', compact($ministry));
    }

    public function autocomplete(Request $request)
    {
        if ($request->get('query')) {
            $query = $request->get('query');
            $data = DB::table('ministries_profile')->where('ministry_name', 'LIKE', "%$query%")->get();
            echo $data;
        }
    }

    public function profile()
    {
        $ministries = Ministry::all();
        return view('pages.ministry.profile')->with('ministries', $ministries);
    }
}
