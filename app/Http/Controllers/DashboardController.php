<?php

namespace App\Http\Controllers;

use App\Budget;
use Illuminate\Http\Request;
use App\Expense;
use App\Company;
use App\Ministry;
use App\Payment;
use App\Feedback;
use App\Activites;
use Illuminate\Support\Facades\DB;
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
        $recent_activites = Activites::orderBY('id', 'DESC')
            ->limit(7)
            ->get();
        $total_ministry = count(Ministry::all());
        $total_company = count(Company::all());
        $total_budgets = Budget::where('year', $year)->get('amount');
        $amount = 0; // initialize total budget amount
        $recent_expenses = Payment::orderBY('id', 'DESC')
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
        $total_activity = count(Activites::all());

        return view('backend.dashboard')->with([
            'total_ministry' => $total_ministry,
            'total_company' => $total_company,
            'total_budgets' => $total_budgets,
            'year_budget' => $amount,
            'recent_expenses' => $recent_expenses,
            'recent_activites' => $recent_activites,
            'total_activity' => $total_activity,
            'count' => 0,
            'counter' => 0,
            'feedbacks' => $feedbacks,
            'counter_feedback' => $counter_feedback,
        ]);
    }

    public function createExpense(Request $request)
    {
        DB::table('activites')->insert([
            [
                'description' => 'Added new Expense' . $request->name,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ]);
        $data = $request->all();
        Activites::create($data);

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
        DB::table('activites')->insert([
            [
                'description' => 'Added new company' . $request->name,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ]);

        $input = $request->all();
        Company::create($input);
        Session::flash('flash_message', 'New Company successfully added!');
        return redirect()->back();
    }

    public function deleteActivity($id)
    {
        if (Gate::denies('delete')) {
            return redirect(route('dashboard'));
        }

        $delete = Activites::where('id', $id)->delete();
        if ($delete) {
            Session::flash('flash_message', 'Activity deleted successfully!');
            return redirect(route('dashboard'));
        } else {
            Session::flash('flash_message', ' Activity was not deleted!');
            return redirect()->back();
        }
    }
    public function deleteAllActivity()
    {
        if (Gate::denies('delete')) {
            return redirect(route('dashboard'));
        }

        $delete = DB::delete('delete from activites');
        if ($delete) {
            Session::flash('flash_message', 'Activity deleted successfully!');
            return redirect(route('dashboard'));
        } else {
            Session::flash('flash_message', ' Activity was not deleted!');
            return redirect()->back();
        }
    }
}
