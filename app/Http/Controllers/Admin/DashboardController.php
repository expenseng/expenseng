<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Budget;
use App\Expense;
use App\Company;
use App\Ministry;
use App\Payment;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $year = date('Y'); // get current year
        $total_ministry = count(Ministry::all());
        $total_company = count(Company::all());
        $total_budgets = Budget::where('year', $year)->get('amount');
        $amount = 0; // initialize total budget amount
        $recent_expenses = Payment::orderBY('payment_date', 'DESC')
            ->limit(7)
            ->get();

        if (count($total_budgets) > 0) {
            for ($i = 0; $i < count($total_budgets); $i++) {
                $amount += $total_budgets[$i]->amount;
            }
        } else {
        }

        return view('backend.dashboard')->with([
            'total_ministry' => $total_ministry,
            'total_company' => $total_company,
            'total_budgets' => $total_budgets,
            'amount' => $amount,
            'recent_expenses' => $recent_expenses,
        ]);
    }
}
