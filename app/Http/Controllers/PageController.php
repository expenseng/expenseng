<?php

namespace App\Http\Controllers;

use App\Ministry;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('pages.home');
    }

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

    public function directorBoard()
    {
        return view('pages.director_board');
    }

    public function blog()
    {
        return view('pages.blog');
    }

    public function about()
    {
        return view('pages.aboutus');
    }

    public function error404()
    {
        return view('pages.404_error');
    }



    public function expenditure()
    {
        return view('pages.ExpenditureReport');
    }

    public function ministryReport()
    {
        return view('pages.ministry_report');
    }

    public function ministryProfileSearch()
    {
        return view('pages.ministry_profile');
    }



    public function quickContact()
    {
        return view('pages.quick_contacts');
    }

    public function companyProfile()
    {
        return view('pages.companyprofile');
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
        return view('pages.contracts_awarded');
    }

    public function ministryList()
    {
        $ministries = Ministry::all();
        return view('pages.ministry_list_federal_ministries')->with(['ministries'=> $ministries]);
    }

    public function ministrySpending()
    {

        $expenses = \App\Expense::latest()->get();

        // return $expenses;
        return view('pages.ministry_report_table', compact('expenses'));
    }

}
