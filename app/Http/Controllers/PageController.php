<?php

namespace App\Http\Controllers;

use App\Budget;
use App\Ministry;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function contactUs()
    {
        return view('pages.contactUs');
    }

    public function ministryGraph()
    {
        return view('pages.ministry-report-graph');
    }

    public function projectModal()
    {
        return view('pages.project_details-filter_modal ');
    }

    public function expenseGraph()
    {
        return view('pages.expense-graph');
    }

    public function about()
    {
        return view('pages.aboutus');
    }

    public function error404()
    {
        return view('pages.errors.404_error');
    }

    public function expenditure()
    {
        return view('pages.ExpenditureReport');
    }

    public function ministryReport()
    {
        return view('pages.ministry_report');
    }

    public function ministryGetUrl(Request $request)
    {
        $id = $request->get('id');
        return response()->json(['url' => url('ministries/' . $id)]);
    }

    public function ministryProfileSearch($id)
    {
        if ($id) {
            $ministry = Ministry::where('id', $id)->first();
            return view('pages.ministry.ministry_list_tables')->with(['ministry'=> $ministry]);
        }
    }

    public function quickContact()
    {
        return view('pages.quick_contacts');
    }

    public function companyProfile()
    {
        return view('pages.contract.contracts_awarded');
    }

    public function companyReport()
    {
        return view('pages.companyReports');
    }

    public function companySearch()
    {
        return view('pages.companysearch');
    }

    public function companySearchShow()
    {
        request()->validate([
            'company' => 'required',

        ]);


        $search = '%' . request('company') . '%';
        $company  = \App\Company::where('company_name', 'LIKE', $search)->get();

        return $company;
    }

    public function contract()
    {
        return view('pages.contract.contracts_awarded');
    }

    public function ministryList()
    {
        $ministries = Ministry::all();
        return view('pages.ministry.ministry-list-profile')->with(['ministries' => $ministries]);
    }

    public function ministrySpending()
    {

        $expenses = \App\Expense::latest()->get();

        // return $expenses;
        return view('pages.ministry_report_table', compact('expenses'));
    }

    public function showProfile()
    {
        return view('pages.ministry_profile');
    }
}
