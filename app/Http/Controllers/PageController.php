<?php

namespace App\Http\Controllers;

use App\Budget;
use App\Ministry;
use App\Teams;
use App\Cabinet;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::denies('manage-user')) {
            return redirect(route('ministry.view'));
        }
       

        $cabinet = Cabinet::paginate(20);
        dump($cabinet);
        //return view('backend.cabinet.view')->with([
            //'cabinet' => $cabinet,
        
    }
    public function contactUs()
    {
        return view('pages.contactUs');
    }

    public function search()
    {
        return view('pages.search');
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

    public function ourteam()
    {
        $team = Teams::all();
        return view('pages.ourteams',compact('team'));
    }

    public function FOIA() {
        return view('pages.freedomofact');
    }

    public function error404()
    {
        return view('pages.errors.404_error');
    }

    public function expenditure()
    {
        return view('pages.ExpenditureReport');
    }

    public function faq()
    {
        return view('pages.faq');
    }

    public function privacy()
    {
        return view('pages.privacy');
    }

    public function ministryReport()
    {
        return view('pages.ministry.ministry_report_table');
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

    public function handles()
    {   $ministries = Ministry::all();
        $cabinet = Cabinet::all();
        return view('pages.handles',compact('ministries','cabinet'));
    }

    public function contactEmail()
    {
        return view('pages.contactEmail');
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

    public function accessibility()
    {
        return view('pages.terms.accessibility');
    }

    public function SearchHandles( Request $request){
       
        $handles = Cabinet::where('name', 'LIKE', '%' . $request -> get('searchQuest'). '%')->get();
      
        return json_encode( $handles);
    }
    public function SearchHandle( Request $request){
        
         
        $handle = Ministry::where('name', 'LIKE', '%' . $request -> get('searchQuests'). '%')->get();
        return json_encode( $handle);
    }
}
