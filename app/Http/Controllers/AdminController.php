<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function __construct()
    {
       // $this->middleware('auth');
    }
    /**
     * Display a form for creating companies.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewCreateCompany()
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
