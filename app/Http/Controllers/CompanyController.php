<?php

namespace App\Http\Controllers;

use App\Company;
use App\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{

    public function index()
    {
        return view('pages.contract.index');
    }

    public function show(Company $company)
    {
        return view('pages.contract.single', compact($company));
    }

    public function getReport()
    {
        $yearlyTotals = $this->getYearlyTotal();
        $monthlyTotals = $this->getMonthlyTotal();
        return [
            'status' => 'success',
            'message' => 'Total amounts received by various Contractors and Organsations',
            'data' => $yearlyTotals
        ];
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
            ->select(DB::raw('company, SUM(amount) as total_amount,
                YEAR(payment_date) as year,
                Month(payment_date) as month'))
            ->groupBy(DB::raw('(company) ASC, YEAR(payment_date) ASC, Month(payment_date) ASC'))
            ->get();
        return $monthlyTotals;
    }
}
