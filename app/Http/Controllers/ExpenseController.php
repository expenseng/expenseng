<?php

namespace App\Http\Controllers;

use App\Sector;
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
        $collection['daily'] = Payment::whereDate('payment_date', '=', $today)
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
        $sectors = Sector::all();
        $collection['summary'] = Payment::whereYear('payment_date', '=', $year)
                                ->orderby('payment_date', 'desc')
                                ->paginate(20)->onEachSide(1);
        $miniTableData['all'] = $this->ministriesFiveYear();
        return view('pages.expense.ministry')->with(['collection' => $collection,
                                                     'miniTableData' => $miniTableData,
                                                     'sectors' => $sectors
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

    public function sectorFiveYear($sector='all', $codes=0)
    {
        if($sector !== 'all'){
            $totals = DB::table('payments')
            ->select(DB::raw('SUM(amount) as total, YEAR(payment_date) as year'))
            ->Where(function ($query) use($codes) {
                for ($i = 0; $i < count($codes); $i++){
                    $query->orwhere('payment_code', 'LIKE',  $codes[$i]. '%');
                }
            })
            ->groupBy(DB::raw('YEAR(payment_date)'))
            ->orderBy('year', 'desc')
            ->take(5)
            ->get();
            
        }else{
            $totals = $this->ministriesFiveYear();
        }
        return $totals;
    }

    public function filterExpensesAll($id, $date, $sort, $sector="all")
    { 
       
        $givenTime = ($id === 'apply-filter-exp')? date('Y-m-d'): date('Y');
        
        if ($date != 'undefined'){
            $givenTime = $date;
        }
        
        $day_pattern = '/(\d{4})-(\d{2})-(\d{2})/';
        $mth_pattern = '/([A-Za-z]+)\s(\d{4})/';
        $yr_pattern = '/\d{4}/';
        
        $data = Payment::select('*');
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

        if($sector != null){
            // $code = 0;
            if($sector !== 'all'){
                $sector = intval($sector);
                if($sector != 0){
                    $codes = Sector::with('ministry')
                    ->where('id', $sector)
                    ->get()
                    ->pluck('ministry.*.code')
                    ->collapse();
                    $data = $data->Where(function ($query) use($codes) {
                                for ($i = 0; $i < count($codes); $i++){
                                    $query->orwhere('payment_code', 'LIKE',  $codes[$i]. '%');
                                }
                            });
                    $miniTableData['all'] = $this->sectorFiveYear($sector, $codes);
                } 
            }else{
                    $miniTableData['all'] = $this->sectorFiveYear();
            }
            // echo 'code: '. $code;
            // echo 'sector:'. $sector;
        }
       
        if ($sort != "undefined") {
            $data = $data->orderby('amount', $sort);
        } else {
            $data = $data->orderby('payment_date', 'desc');
        }
        
        $data = $data->paginate(20)->onEachSide(1);
        
        if($id === 'apply-filter'){
            $collection['summary'] = $data;
            return view('pages.expense.tables.ministries')->with('collection', $collection);
        }else if($id === 'apply-filter-exp'){
            $collection['daily'] = $data;
            return view('pages.expense.tables.dailyExpenditure')->with('collection', $collection);
        }else if($id === 'apply-filter-sector'){
            $collection['summary'] = $data;
            return view('pages.expense.tables.combo')->with(['collection' => $collection,
                                                                'miniTableData' => $miniTableData,
                                                            ]);
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
