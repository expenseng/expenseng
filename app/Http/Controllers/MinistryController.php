<?php

namespace App\Http\Controllers;

use App\Ministry;
use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MinistryController extends Controller
{
    /**
     * List ministries on page load
     */
    public function profile()
    {
        $ministries = Ministry::all();
        return view('pages.ministry.index')->with('ministries', $ministries);
    }

     /**
     * Renders all the ministries each time the search box's content is cleared
     */
    public function index()
    {
        $ministries = Ministry::all();
        echo $ministries;
    }

     /**
     * Displays the ministry that matches the search result;
     * called when a user clicks on one of the suggested autocomplete words
     */
    public function showMatch(Request $request)
    {
        $ministry_name = $request->get('id');
        echo $ministry_name;
        $ministry = DB::table('ministries')->where('name', '=', "$ministry_name")->get();
        echo $ministry;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.ministry.createForm');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $data = request()->validate([
            'code' => 'required',
            'name' => 'required',
            'shortname' => 'required',
            'twitter' => 'required',
            'website' => 'required',
            'sector_id' => 'required'
        ]);
        
        Ministry::create($data);

        return back();
    }

    /**
     * Display the specified resource.
     * Called when user clicks on a ministry in profile.blade.php
     */
    public function show(Ministry $ministry)
    {     
        $yr = ["2020" => 4020, "2019" => 3019, "2018" => 5018, "2017" => 6017 ];

            $code = $ministry->code;
            $cabinets = $ministry->cabinet;
            $payments = DB::table('payments')
                        ->where('payment_code', 'LIKE', "$code%")
                        ->orderby('payment_date', 'desc')
                        ->get();

            function getTrend($payments){
                $currentYr = date("Y");
                $years = [$currentYr, $currentYr - 1, $currentYr - 2, $currentYr - 3, $currentYr - 4];
                $yearByYear = [];
                $currentYrPmts = [];
                for($x = 0; $x < count($years); $x++){
                    $filtered = $payments->filter(function ($value, $key) use (&$years, $x) {
                        return date('Y', strtotime($value->payment_date)) == $years[$x];
                    });
                    if($x == 0){
                        $currentYrPmts = $filtered;
                    }
                    $sum = $filtered->sum('amount');
                    $yearByYear[$years[$x]] = $sum;
                }
                return [$currentYrPmts, $yearByYear];
            }

            $data = getTrend($payments);
            return view('pages.ministry.single')
            ->with(['ministry'=> $ministry, 
                    'cabinets' => $cabinets,
                    'payments' => $data[0],
                    'trend' => $data[1]
                 ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $ministry)
    {
        $data = request()->validate([
            'code' => 'required',
            'name' => 'required',
            'shortname' => 'required',
            'twitter' => 'required',
            'website' => 'required',
            'sector_id' => 'required'
        ]);

        Ministry::where('id', $ministry)->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy($ministry=29)
    {
        echo "deleted";
        // Ministry::where('id', $ministry)->delete();
    }


     /**
     * Suggests words to user while typing
     */
    public function autocomplete(Request $request)
    {
        // echo $request->get('query');
        if ($request->get('query')) {
            $query = $request->get('query');
            $data = DB::table('ministries')->where('name', 'LIKE', "%$query%")->get();
            echo $data;
        }
    }
    
}
