<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

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
}
