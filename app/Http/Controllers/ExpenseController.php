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

    public function chartReport($id, $date, $sort, $chartType="ministry")
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
        
        if($chartType === 'ministries'){
            $ministries = Ministry::select('*')
                    ->orderby('shortname', 'asc')
                    ->get();
            $result = $this->getChartData($ministries, $yr, $mth, $day, $sort);
        }else if($chartType === 'days'){
            $result = $this->getDailyTotals($yr, $mth, $day, $sort, $type);
        }
        
        $result['type'] = $type;
        $result['date'] = $givenTime;
        return $result;
    }

    public function getDailyTotals($yr="2020", $mth=6, $day=null, $sort="desc", $type='t'){
        
        $amounts = array();
        $days = array();
        $payments = Payment::select(
            DB::raw(
                'SUM(amount) as amount, payment_date'
            )
        )
        ->whereYear('payment_date', '=', $yr);
        if($mth != null){
            $payments = $payments->whereMonth('payment_date', $mth);
        }if($day != null){
            $payments = $payments->whereDay('payment_date', $day);
        }
            $payments = $payments->groupby('payment_date');
        if ($sort == "asc" OR $sort == "desc" ){
            $payments = $payments->orderby('amount', $sort);
        }
            $payments = $payments->get();
                    
        foreach($payments as $payment){
            array_push($days,  date("d-m-Y", strtotime($payment->payment_date)));
            array_push($amounts, $payment->amount);
        }
        
        if(count($days) == 0){
            if($type == 'Daily'){
                array_push($days, date("d-m-Y"));
                array_push($amounts, 0);
            }else if($type == 'Monthly'){
                $result = $this->getDays($days, $amounts);
                $days = $result['days'];
                $amounts = $result['amounts'];
            }else if($type == 'Yearly'){
                for ($i = 1; $i <= 12; $i++) {
                    $timestamp = mktime(0, 0, 0, $i);
                    array_push($days, date("M", $timestamp));
                    array_push($amounts, 0);
                }
            }
        }
       
        return ['days' => $days, 'amounts' => $amounts];
    }
    
    public function getDays($days, $amounts){
        $year = date('Y');
        $month = date('m');
    
        $dayCount = cal_days_in_month(CAL_GREGORIAN,$month,$year);
    
        for ($i = 1; $i <= $dayCount; $i++)
        {
            array_push($days, $i."-".$month."-".$year);
            array_push($amounts, 0);
        }
        return ['days'=> $days, 'amounts'=> $amounts];
    }
}
