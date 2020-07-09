<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{

    public function index()
    {
        $companies = Company::paginate(20);
        return view('pages.contract.index')->with('companies', $companies);
    }

    public function show(Company $company)
    {
        return view('pages.contract.single')->with('company', $company);
    }

    public function getReport()
    {
        $yearlyTotals = $this->getYearlyTotal();
        $monthlyTotals = $this->getMonthlyTotal();
        return [
            'status' => 'success',
            'message' => 'Total amounts received by various Contractors and Organsations',
            'data' => $yearlyTotals,
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


    //Admin Companies specific controllers

    public function adminIndex()
    {

        return \App\Company::latest()->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminCreate()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function adminStore(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function adminShow(Company $company)
    {
        if (request('people') === 'true') {
            return $company->people;
        }
        return $company;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function adminEdit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function adimUpdate(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function adminDestroy($id)
    {
     
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a form for creating companies.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.company.create');
    }

    /**
     * Display a listing of the companies.
     *
     * @return view
     */
    public function viewCompanies()
    {
        $companies = Company::all();

        return view('backend.company.view')->with(['companies' => $companies]);
    }

    public function createCompany(Request $request)
    {
        validator(
            [
                'company_name' => 'required',
                'company_shortname' => 'required',
                'company_twitter' => 'required',
                'company_ceo' => 'required',
                'ceo_handle' => 'required'
            ]
        );

        $new_company = new Company();
        $new_company->name = $request->company_name;
        $new_company->shortname = $request->company_shortname;
        $new_company->industry = $request->company_twitter;
        $new_company->ceo = $request->company_ceo;
        $new_company->twitter = $request->ceo_handle;
        $save_new_company = $new_company->save();

        if ($save_new_company) {
            echo ("<script>alert('New Company created successfully');
             window.location.replace('/admin/company/view');</script>");
        } else {
            echo ("<script>alert('Cannot create New Company'); 
            window.location.replace('/admin/company/create');</script>");
        }
    }
}
