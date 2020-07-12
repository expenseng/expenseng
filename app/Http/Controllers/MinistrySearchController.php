<?php

namespace App\Http\Controllers;

use App\Ministry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MinistrySearchController extends Controller
{

    public function getMinistries($ministries)
    {
        $currentYr = date("Y").'-01-01';
        foreach($ministries as $ministry){
            $code = $ministry->code;
            $payments = DB::table('payments')
                        ->where('payment_code', 'LIKE', "$code%")
                        ->where('payment_date', '>=', "$currentYr")
                        ->get();
            $total = $payments->sum('amount');
            $ministry->total = $total;
        }
        return $ministries;
    }

     /**
     * Re-renders all the ministries each time the search box's content is cleared
     */

    public function index(Request $request)
    {
        $result = Ministry::all();
        $ministries = $this->getMinistries($result);
        echo $ministries;
    }
    
    /**
     * Renders a specific ministry when a user clicks an autocomplete suggestion
     */
    public function show(Request $request)
    {
        $ministry_name = $request->get('ministry');
        $result = DB::table('ministries')->where('name', '=', "$ministry_name")->get();
        $ministry = $this->getMinistries($result);
        echo $ministry;
    }

    public function filterExpenses(Request $request)
    {  
        $id = $request->get('id');
        $givenTime = $request->get('date');

        $ministry = Ministry::find($id);
        $code = $ministry->code;
        $day_pattern = '/(\d{4})-(\d{2})-(\d{2})/';
        $mth_pattern = '/([A-Za-z]+)\s(\d{4})/';
        $yr_pattern = '/\d{4}/';

        if(preg_match($mth_pattern, $givenTime, $match)){
            $m = date_parse($match[1]);
            $month = $m['month'];
            $year = $match[2];
            $payments = DB::table('payments')
                    ->where('payment_code', 'LIKE', "$code%")
                    ->whereMonth('payment_date', '=', $month)
                    ->whereYear('payment_date', '=', $year);
                    
        }else if(preg_match($day_pattern, $givenTime, $match)){
            $payments = DB::table('payments')
                    ->where('payment_code', 'LIKE', "$code%")
                    ->where('payment_date', '=', "$givenTime");

        }else if(preg_match($yr_pattern, $givenTime, $match)){
            $payments = DB::table('payments')
                    ->where('payment_code', 'LIKE', "$code%")
                    ->whereYear('payment_date', '=', "$givenTime");
        };

        if ($request->has('sort')) {
            $payments = $payments->orderby('amount', $request->get('sort'));
        }else{
            $payments = $payments->orderby('payment_date', 'desc');
        }
        
        $payments = $payments->get();
        $total = $payments->sum('amount');
        $ministry->payments = $payments;
        $ministry->total = $total;
        $ministry->givenTime = $givenTime;
      
        echo $ministry;
    }
}
