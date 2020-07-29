<?php

namespace App\Http\Controllers;

use App\Expense;
use App\Payment;
use App\Ministry;
use App\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExpenseController extends Controller
{

    public function report()
    {
        $today = date('Y-m-d');
        $collection['daily'] = Payment::where('description', '!=', '')
                                ->whereDate('payment_date', '=', $today)
                                ->orderby('payment_date', 'desc')
                                ->paginate(20)->onEachSide(1);
        $miniTableData['all'] = $this->ministriesFiveYear();
        return view('pages.expense.index')
        ->with(['collection' => $collection,
                'miniTableData' => $miniTableData
                ]);
    }

    public function ministry()
    {
        $year = date('Y');
        $collection['nondescriptive'] = Payment::where('description', '')
                                        ->whereYear('payment_date', '=', $year)
                                        ->orderby('payment_date', 'desc')
                                        ->paginate(20)->onEachSide(1);
        $collection['summary'] = Payment::where('description', '!=', '')
                                ->whereYear('payment_date', '=', $year)
                                ->orderby('payment_date', 'desc')
                                ->paginate(20)->onEachSide(1);
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
       
        $givenTime = date('Y');
        
        if($id === 'apply-filter'){
            $option = "!=";
        }else if(($id === 'apply-filter2')){
            $option = "=";
        }
        
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

    public function getChartData($ministries, $yr, $mth, $day, $sort)
    {
        $amounts = array();
        $mdas = array();
        $store = array();
        
        foreach ($ministries as $ministry) {
            $code = $ministry->code;
            $payments = DB::table('payments')
                ->where('payment_code', 'LIKE', "$code%")
                ->whereYear('payment_date', $yr);
            if($mth != null){
                $payments = $payments->whereMonth('payment_date', $mth);
            }
            if($day != null){
                $payments = $payments->whereDay('payment_date', $day);
            }
            $payments = $payments->get();                 
            $total = $payments->sum('amount');
            $store[$ministry->shortname] = $total;
            
        }
        if ($sort == "asc"){
            asort($store);
        }else if ($sort == 'desc'){
            arsort($store);
        }
        foreach($store as $key => $value){
            array_push($mdas, $key);
            array_push($amounts, $value);
        }
       
        return ['ministries' => $mdas, 'amounts' => $amounts];
    }

    public function chartReport($id, $date, $sort)
    {
        $givenTime = date('Y-m-d');
        if ($date != 'undefined'){
            $givenTime = $date;
            $userdate = true;
        }
        
        $day_pattern = '/(\d{4})-(\d{2})-(\d{2})/';
        $mth_pattern = '/([A-Za-z]+)\s(\d{4})/';
        $yr_pattern = '/(\d{4})/';
        if (preg_match($day_pattern, $givenTime, $match)) {
            $day = $match[3];
            $mth = $match[2];
            $yr = $match[1]; 
            $type = 'Daily';
        } else if (preg_match($mth_pattern, $givenTime, $match)) {
            $m = date_parse($match[1]);
            $day = null;
            $mth = $m['month'];
            $yr = $match[2]; 
            $type = 'Monthly';    
        } elseif (preg_match($yr_pattern, $givenTime, $match)) {
            $day = null;
            $mth = null;
            $yr = $match[1]; 
            $type = $userdate == true ?  'Yearly': 'Daily';
        } 
        
        $ministries = Ministry::select('*')
                    ->orderby('shortname', 'asc')
                    ->get();
        $result = $this->getChartData($ministries, $yr, $mth, $day, $sort);
        $result['type'] = $type;
        $result['date'] = $givenTime;
        return $result;
        
    }
    
}
