<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expense;
use App\Company;
use App\Ministry;
use Illuminate\Support\Facades\Session;

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
        $total_ministry = count(Ministry::all());
        $total_company = count(Company::all());

        return view('backend.dashboard')
        ->with(['total_ministry' => $total_ministry,
        'total_company' => $total_company]);
    }

    public function createExpense(Request $request)
    {
        $this->validate($request, [
           'amount_spent' => 'required',
           'year' => 'required',
           'month' => 'required',
           'project' => 'required'
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
           'twitter' => ''
        ]);
        
        $input = $request->all();
        Company::create($input);
        Session::flash('flash_message', 'New Company successfully added!');
        return redirect()->back();
    }
}
