<?php

namespace App\Http\Controllers;

use App\Expense;
use App\Payment;
use App\Subscription;
use Illuminate\Http\Request;


class ExpenseController extends Controller
{

    public function report()
    {

        return view('pages.expense.index');
    }

    public function ministry()
    {
        $collection['nondescriptive'] = Payment::where('description', '')->paginate(20);
        $collection['summary'] = Payment::where('description', '!=', '')->paginate(20);
        return view('pages.expense.ministry')->with('collection', $collection);
    }


    public function filterExpensesAll(Request $request)
    {
        echo "Did it come here";
        $id = $request->get('id');
        $givenTime = null;
        if ($request->has('date')){
            $givenTime = $request->get('date');
        }
        
        $yr = date('Y-m-d');
        
        $day_pattern = '/(\d{4})-(\d{2})-(\d{2})/';
        $mth_pattern = '/([A-Za-z]+)\s(\d{4})/';
        $yr_pattern = '/\d{4}/';

        if (preg_match($mth_pattern, $givenTime, $match)) {
            $m = date_parse($match[1]);
            $month = $m['month'];
            $year = $match[2];
            $collection['summary'] = Payment::where('description', '!=', '')
                    ->whereMonth('payment_date', '=', $month)
                    ->whereYear('payment_date', '=', $year);
        } elseif (preg_match($day_pattern, $givenTime, $match)) {
            $collection['summary'] = Payment::where('description', '!=', '')
                    ->where('payment_date', '=', "$givenTime");
        } elseif (preg_match($yr_pattern, $givenTime, $match)) {
            $collection['summary'] = Payment::where('description', '!=', '')
                    ->whereYear('payment_date', '=', "$givenTime");
        } else {
            $collection['summary'] = Payment::whereYear('payment_date', '=', "$yr");
        };

        if ($request->has('sort')) {
            $collection['summary'] = $collection['summary']->orderby('amount', $request->get('sort'));
        } else {
            $collection['summary'] = $collection['summary']->orderby('payment_date', 'desc');
        }
        
        $collection['summary'] = $collection['summary']->paginate(20);
        
        return view('pages.expense.ministry_table')->with('collection', $collection);
        
    }
  
}
