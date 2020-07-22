<?php

namespace App\Http\Controllers;

use App\Budget;
use Illuminate\Http\Request;
use App\Expense;
use App\Company;
use App\Ministry;
use App\Feedback;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

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
        if (Gate::denies('active', 'manage')) {
            return redirect(route('profile'));
        }

        $year = date('Y'); // get current year
        $total_ministry = count(Ministry::all());
        $total_company = count(Company::all());
        $total_budgets = Budget::where('year', $year)->get('amount');
        $amount = 0; // initialize total budget amount
        $recent_expenses = Expense::orderBY('id', 'DESC')
            ->limit(7)
            ->get();


            
            
        if (count($total_budgets) > 0) {
            for ($i = 0; $i < count($total_budgets); $i++) {
                $amount += $total_budgets[$i]->amount;
            }
        } else {
        }
            
             
            $feedbacks = Feedback::where('isApprove', '0')->get();
            $counter_feedback = count($feedbacks);

        return view('backend.dashboard')->with([
            'total_ministry' => $total_ministry,
            'total_company' => $total_company,
            'total_budgets' => $total_budgets,
            'year_budget' => $amount,
            'recent_expenses' => $recent_expenses,
            'count' => 0,
            'feedbacks'=> $feedbacks,
            'counter_feedback'=> $counter_feedback
        ]);
    }

    public function createExpense(Request $request)
    {
        $this->validate($request, [
            'amount_spent' => 'required',
            'year' => 'required',
            'month' => 'required',
            'project' => 'required',
        ]);

        $input = $request->all();
        Expense::create($input);
        Session::flash('flash_message', 'New Expense successfully added!');
        return redirect()->back();
    }

    public function createCompany(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'shortname' => 'required',
            'industry' => 'required',
            'ceo' => 'required',
            'twitter' => '',
        ]);

        $input = $request->all();
        Company::create($input);
        Session::flash('flash_message', 'New Company successfully added!');
        return redirect()->back();
    }
}
