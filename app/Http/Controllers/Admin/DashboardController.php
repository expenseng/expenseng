<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ParsingSheet;
use App\Report;
use http\Env\Response;
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
    public function parse(Request $request)
    {
        if ($request->ajax()) {
            try {
                $report = Report::whereId($request->id)->first();
                if (preg_match('/daily/i', $report->type)) {
                    $parse = new ParsingSheet();
                    return $parse->parseDaily($report);
                } elseif (preg_match('/monthly/i', $report->type)) {
                    $parse = new ParsingSheet();
                    return $parse->parseMonthly($report);
                }
                return Response::json(array("errors" => 'file not fount'), 422);
            } catch (\Exception $e) {
                return Response::json(array("errors" => 'file not fount'), 422);
            }
        }
        return Response::json(array("errors" => 'file not fount'), 422);
    }
}
