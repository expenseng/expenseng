<?php

namespace App\Http\Controllers;

use App\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyReportController extends Controller
{
    //
    public function __construct()
    {
       
    }

     public function getReport()
    {
        $yearlyTotals = $this->getYearlyTotal();
        $monthlyTotals = $this->getMonthlyTotal();
        return view('pages.companyReports')->with(['yearlyTotals'=> $yearlyTotals, 'monthlyTotals' => $monthlyTotals]);
    }

    public function getYearlyTotal()
    {
       $yearlyTotals = DB::table('expenses')
            ->select(DB::raw('company, SUM(amount) as total_amount, YEAR(payment_date) as year'))
            ->groupBy(DB::raw('(company) ASC, YEAR(payment_date) ASC'))
            ->get();
       return $yearlyTotals;
    }


    public function getMonthlyTotal()
    {
        $monthlyTotals = DB::table('expenses')
            ->select(DB::raw('company, SUM(amount) as total_amount, YEAR(payment_date) as year, Month(payment_date) as month'))
            ->groupBy(DB::raw('(company) ASC, YEAR(payment_date) ASC, Month(payment_date) ASC' ))
            ->get();
        return $monthlyTotals;

    }
}
