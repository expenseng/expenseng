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
        $latestDate = $this->latestDate();
        $collection['daily'] = Payment::whereDate('payment_date', '=', $latestDate)
            ->orderby('payment_date', 'desc')
            ->paginate(20)->onEachSide(1);
        return view('pages.expense.index')
            ->with([
                'collection' => $collection,
                'latestDate' => $latestDate
            ]);
    }

    public function ministry($page)
    {
        if(is_numeric($page))
        {
                // $year = date('Y');
            $ministries = Ministry::select('*')
                ->orderby('shortname', 'asc')
                ->get();
            $collection['summary'] = Payment::select('*')
                ->orderby('payment_date', 'desc')
                ->paginate(20, ['*'], 'page', $page)->onEachSide(1);
            return view('pages.expense.ministry')->with([
                'collection' => $collection,
                'ministries' => $ministries
            ]);
        }
            return view('errors.404');
   
    }

    public function show(string $slug)
    {
        $payment = Payment::where('slug', $slug)->first();
        if ($payment) {
            //            dd($payment->ministry()['cabinet']->toArray());
            $payment->ministry = $payment->ministry()['name'];
            $payment->ministry_twitter = $payment->ministry()['twitter'];
            $payment->minister = $payment->ministry()['cabinet']->toArray() ? $payment->ministry()['cabinet'][0]->name : 'N/A';
            $payment->minister_twitter = $payment->ministry()['cabinet']->toArray() ? $payment->ministry()['cabinet'][0]->twitter_handle : false;
            if (count($payment->company()) > 0) {
                $payment->company = $payment->company()[0]->name;
                $payment->company_twitter = $payment->company()[0]->twitter;
            } else {
                $payment->company = $payment->beneficiary;
            }

            return view('pages.expense_summary')->with(['payment' => $payment]);
        } else {
            return  redirect('error404');
        }
    }

    public function social(string $code)
    {
        $slug = Payment::where('payment_no', base64_decode($code))->first()->slug;

        return redirect('/expenses/'.$slug);
    }

    public function latestDate()
    {
        $latestExpenses = Payment::select('*')
            ->orderby('payment_date', 'desc')
            ->first();

        return $latestExpenses->payment_date;
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

    public function sectorFiveYear($sector = 'all', $codes = 0)
    {
        if ($sector !== 'all') {
            $totals = DB::table('payments')
                ->select(DB::raw('SUM(amount) as total, YEAR(payment_date) as year'))
                ->Where(function ($query) use ($codes) {
                    for ($i = 0; $i < count($codes); $i++) {
                        $query->orwhere('payment_code', 'LIKE', $codes[$i] . '%');
                    }
                })
                ->groupBy(DB::raw('YEAR(payment_date)'))
                ->orderBy('year', 'desc')
                ->take(5)
                ->get();
        } else {
            $totals = $this->ministriesFiveYear();
        }
        return $totals;
    }


    public function filterExpensesAll(Request $request, $id, $date, $sort, $ministry = "all")
    {
        $latestDate = $this->latestDate();
        $givenTime = ($id === 'apply-filter-exp') ?  $latestDate : 'all';

        if ($date != 'undefined') {
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
        }

        if ($request->has('query')) {
            $query = $request->get('query');
            $data = $data->where('description', 'LIKE', "%$query%");
        }

        if ($ministry !== null) {
            if ($ministry !== 'all') {
                $data = $data->where('payment_code', 'LIKE', "$ministry%");
            }
        }

        if ($sort != "undefined") {
            $data = $data->orderby('amount', $sort);
        } else {
            $data = $data->orderby('payment_date', 'desc');
        }

        $data = $data->paginate(20)->onEachSide(1);

        if ($id === 'apply-filter' || $id === 'apply-filter-ministry') {
            $collection['summary'] = $data;
            return view('pages.expense.tables.ministries')->with('collection', $collection);
        } elseif ($id === 'apply-filter-exp') {
            $collection['daily'] = $data;
            return view('pages.expense.tables.dailyExpenditure')->with('collection', $collection);
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
            if ($mth != null) {
                $payments = $payments->whereMonth('payment_date', $mth);
            }
            if ($day != null) {
                $payments = $payments->whereDay('payment_date', $day);
            }
            $payments = $payments->get();
            $total = $payments->sum('amount');
            $store[$ministry->shortname] = $total;
        }
        if ($sort == "asc") {
            asort($store);
        } elseif ($sort == 'desc') {
            arsort($store);
        }
        foreach ($store as $key => $value) {
            array_push($mdas, $key);
            array_push($amounts, $value);
        }

        return ['ministries' => $mdas, 'amounts' => $amounts];
    }

    public function chartReport($id, $date, $sort, $chartType = "ministry")
    {
        $givenTime = $this->latestDate();
        if ($date != 'undefined') {
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
        } elseif (preg_match($mth_pattern, $givenTime, $match)) {
            $m = date_parse($match[1]);
            $day = null;
            $mth = $m['month'];
            $yr = $match[2];
            $type = 'Monthly';
        } elseif (preg_match($yr_pattern, $givenTime, $match)) {
            $day = null;
            $mth = null;
            $yr = $match[1];
            $type = $userdate == true ?  'Yearly' : 'Daily';
        }

        if ($chartType === 'ministries') {
            $ministries = Ministry::select('*')
                ->orderby('shortname', 'asc')
                ->get();
            $result = $this->getChartData($ministries, $yr, $mth, $day, $sort);
        } elseif ($chartType === 'days') {
            $result = $this->getDailyTotals($yr, $mth, $day, $sort, $type);
        }

        $result['type'] = $type;
        $result['date'] = $givenTime;
        return $result;
    }

    public function getDailyTotals($yr, $mth, $day, $sort, $type)
    {

        $amounts = array();
        $days = array();
        $payments = Payment::select(
            DB::raw(
                'SUM(amount) as amount, payment_date'
            )
        )
            ->whereYear('payment_date', '=', $yr);
        if ($mth != null) {
            $payments = $payments->whereMonth('payment_date', $mth);
        }
        if ($day != null) {
            $payments = $payments->whereDay('payment_date', $day);
        }
        $payments = $payments->groupby('payment_date');
        if ($sort == "asc" or $sort == "desc") {
            $payments = $payments->orderby('amount', $sort);
        }
        $payments = $payments->get();

        foreach ($payments as $payment) {
            array_push($days, date("d-m-Y", strtotime($payment->payment_date)));
            array_push($amounts, $payment->amount);
        }

        if (count($days) == 0) {
            if ($type == 'Daily') {
                array_push($days, $day . '-' . $mth . '-' . $yr);
                array_push($amounts, 0);
            } elseif ($type == 'Monthly') {
                $result = $this->getDays($days, $amounts, $mth, $yr);
                $days = $result['days'];
                $amounts = $result['amounts'];
            } elseif ($type == 'Yearly') {
                for ($i = 1; $i <= 12; $i++) {
                    $timestamp = mktime(0, 0, 0, $i);
                    array_push($days, date("M", $timestamp));
                    array_push($amounts, 0);
                }
            }
        }

        return ['days' => $days, 'amounts' => $amounts];
    }

    public function getDays($days, $amounts, $mth, $yr)
    {

        $dayCount = cal_days_in_month(CAL_GREGORIAN, $mth, $yr);

        for ($i = 1; $i <= $dayCount; $i++) {
            array_push($days, $i . "-" . $mth . "-" . $yr);
            array_push($amounts, 0);
        }
        return ['days' => $days, 'amounts' => $amounts];
    }
}
