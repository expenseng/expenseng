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

   
}
