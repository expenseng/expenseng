<?php

namespace App\Http\Controllers;

use App\Expense;
use App\Payment;
use App\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExpenseController extends Controller
{

    public function report()
    {
        return view('pages.expense.index');
    }

    public function ministry()
    {
        $collection['nondescriptive'] = Payment::where('description', '')->paginate(20)->onEachSide(1);
        $collection['summary'] = Payment::where('description', '!=', '')->paginate(20)->onEachSide(1);
        $miniTableData['all'] = $this->ministriesFiveYear();
        $miniTableData['nondescriptive'] = $this->ministriesFiveYearNoDescription();
        return view('pages.expense.ministry')->with(['collection' => $collection,
                                                     'miniTableData' => $miniTableData
                                                    ]);
    }

    public function ministriesFiveYear()
    {
        
        $payments = DB::table('payments')
        ->select(DB::raw('SUM(amount) as total, YEAR(payment_date) as year'))
        ->groupBy(DB::raw('YEAR(payment_date)'))
        ->orderBy('year', 'desc')
        ->take(5)
        ->get();
    
        return $payments;
    }

    public function ministriesFiveYearNoDescription()
    {
        
        $payments = DB::table('payments')
        ->select(DB::raw('SUM(amount) as total, YEAR(payment_date) as year'))
        ->where('description', '')
        ->groupBy(DB::raw('YEAR(payment_date)'))
        ->orderBy('year', 'desc')
        ->take(5)
        ->get();
    
        return $payments;
    }

    public function filterExpensesAll($id, $date, $sort)
    { 
        echo "id: {$id} <br>";
        echo "date: {$date} <br/>";
        echo "sort: {$sort} <br/>";
        $givenTime = date('Y');
        
        if($id === 'apply-filter'){
            $option = "!=";
        }else if(($id === 'apply-filter2')){
            $option = "=";
        }
        // echo $id;
        if ($date != 'undefined'){
            $givenTime = $date;
        }
        
        $day_pattern = '/(\d{4})-(\d{2})-(\d{2})/';
        $mth_pattern = '/([A-Za-z]+)\s(\d{4})/';
        $yr_pattern = '/\d{4}/';
        $data = Payment::where('description', $option, '');
        if (preg_match($mth_pattern, $givenTime, $match)) {
            $m = date_parse($match[1]);
            $month = $m['month'];
            $year = $match[2];
            $data = $data->whereMonth('payment_date', '=', $month)
                    ->whereYear('payment_date', '=', $year);
        } elseif (preg_match($day_pattern, $givenTime, $match)) {
            $data = $data->where('payment_date', '=', "$givenTime");                  
        } elseif (preg_match($yr_pattern, $givenTime, $match)) {
            $data = $data->whereYear('payment_date', '=', "$givenTime");     
        } else {
            $data = $data->where('payment_date', '=', "$givenTime");
        };

        if ($sort != "undefined") {
            $data = $data->orderby('amount', $sort);
        } else {
            $data = $data->orderby('payment_date', 'desc');
        }
        
        $data = $data->paginate(20)->onEachSide(1);
        
        if($id === 'apply-filter'){
            $collection['summary'] = $data;
            return view('pages.expense.tables.ministries')->with('collection', $collection);
        }else if($id === 'apply-filter2'){
            $collection['nondescriptive'] = $data;
            return view('pages.expense.tables.ministries_nodesc')->with('collection', $collection);
        }
    }
}
