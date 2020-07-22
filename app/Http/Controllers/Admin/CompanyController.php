<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Company;
use Illuminate\Support\Facades\Session;
use Illuminate\Routing\Redirector;

class CompanyController extends Controller
{
    /**
     * Display a form for creating companies.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('add-company')) {
            return redirect(route('company.view'));
        }

        return view('backend.company.create');
    }

    /**
     * Display a listing of the companies.
     *
     * @return view
     */
    public function viewCompanies()
    {
        if (Gate::denies('manage', auth()->user())) {
            return redirect()->back();
        }

        $companies = Company::all();

        return view('backend.company.view')->with(['companies' => $companies]);
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

    public function showEditForm($id)
    {
        //role check
        if (Gate::denies('edit')) {
            return redirect(route('company.view'));
        }

        $details = Company::findOrFail($id);
        return view('backend.company.edit')->with(['details' => $details]);
    }

    public function editCompany(Request $request, $id)
    {
        validator([
            'company_name' => 'required',
            'company_shortname' => 'required',
            'company_twitter' => 'required',
            'company_ceo' => 'required',
            'ceo_handle' => 'required',
        ]);
        $update = Company::where('id', $id)->update([
            'name' => $request->company_name,
            'shortname' => $request->company_shortname,
            'industry' => $request->company_twitter,
            'ceo' => $request->company_ceo,
            'twitter' => $request->ceo_handle,
        ]);
        if ($update) {
        } else {
        }
    }

    //View people
    public function showPeople(Company $company)
    {
        $people = $company->people;
        return view('backend.people.show', [
            'people' => $people,
            'company' => $company,
        ]);
        //return $company->people;
    }

    public function deleteCompany($id)
    {
        //role check
        if (Gate::denies('delete')) {
            return redirect(route('company.view'));
        }

        $delete = Company::where('id', $id)->delete();
        if ($delete) {
        } else {
        }
    }
}
