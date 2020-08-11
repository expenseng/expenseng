<?php

namespace App\Http\Controllers;

use App\Ministry;
use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MinistrySearchController extends Controller
{
    public function latestDate($code){
        $latestExpenses = Payment::select('*')
        ->where('payment_code', 'LIKE', "$code%")
        ->orderby('payment_date', 'desc')
        ->first();

        return $latestExpenses->payment_date;
    }

    public function filterExpenses(Request $request)
    {

        $id = $request->get('id');
        $ministry = Ministry::find($id);
        $code = $ministry->code;
        $latestDate =  $this->latestDate($code);
        $givenTime = null;
        if ($request->has('date')) {
            $givenTime = $request->get('date');
        }
       
        $day_pattern = '/(\d{4})-(\d{2})-(\d{2})/';
        $mth_pattern = '/([A-Za-z]+)\s(\d{4})/';
        $yr_pattern = '/\d{4}/';

        if (preg_match($mth_pattern, $givenTime, $match)) {
            $m = date_parse($match[1]);
            $month = $m['month'];
            $year = $match[2];
            $payments = DB::table('payments')
                    ->where('payment_code', 'LIKE', "$code%")
                    ->whereMonth('payment_date', '=', $month)
                    ->whereYear('payment_date', '=', $year);
        } elseif (preg_match($day_pattern, $givenTime, $match)) {
            $payments = DB::table('payments')
                    ->where('payment_code', 'LIKE', "$code%")
                    ->where('payment_date', '=', "$givenTime");
        } elseif (preg_match($yr_pattern, $givenTime, $match)) {
            $payments = DB::table('payments')
                    ->where('payment_code', 'LIKE', "$code%")
                    ->whereYear('payment_date', '=', "$givenTime");
        } else {
            $payments = DB::table('payments')
                    ->where('payment_code', 'LIKE', "$code%")
                    ->whereDate('payment_date', $latestDate);
        };

        if ($request->has('query')) {
            $query = $request->get('query');
            $payments = $payments->where('description', 'LIKE', "%$query%");
        }

        if ($request->has('sort')) {
            $payments = $payments->orderby('amount', $request->get('sort'));
        } else {
            $payments = $payments->orderby('payment_date', 'desc');
        }
        
        $payments = $payments->paginate(10);
       
        return view('pages.ministry.pagination')
        ->with(['ministry'=> $ministry,
                'payments' => $payments,
             ]);
    }
}
