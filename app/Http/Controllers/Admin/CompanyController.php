<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Company;
use Illuminate\Support\Facades\Session;

class CompanyController extends Controller
{
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

    public function showEditForm($id)
    {
        $details = Company::findOrFail($id);
        return view('backend.company.edit')->with(['details' => $details]);
    }

    public function editCompany(Request $request, $id)
    {
        validator(
            [
                'company_name' => 'required',
                'company_shortname' => 'required',
                'company_twitter' => 'required',
                'company_ceo' => 'required',
                'ceo_handle' => 'required',
            ]
        );
        $update = Company::where('id', $id)
            ->update(
                [
                    'name' => $request->company_name,
                    'shortname' => $request->company_shortname,
                    'industry' => $request->company_twitter,
                    'ceo' => $request->company_ceo,
                    'twitter' => $request->ceo_handle,
                ]
            );
        if ($update) {
            echo ("<script>alert(' Company details edited successfully');
             window.location.replace('/admin/company/view');</script>");
        } else {
            echo ("<script>alert('Cannot edit Company detail');
            window.location.replace('/admin/company/edit/$id');</script>");
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

        $delete = Company::where('id', $id)->delete();
        if ($delete) {
            echo ("<script>alert(' Company  deleted successfully');
             window.location.replace('/admin/company/view');</script>");
        } else {
            echo ("<script>alert('Cannot Delete Company');
            window.location.replace('/admin/company/view');</script>");
        }
    }
}
