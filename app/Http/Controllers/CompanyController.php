<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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
            'message' =>
                'Total amounts received by various Contractors and Organsations',
            'data' => $yearlyTotals,
        ];
    }

    public function getYearlyTotal()
    {
        $yearlyTotals = DB::table('expenses')
            ->select(
                DB::raw(
                    'company, SUM(amount) as total_amount, YEAR(payment_date) as year'
                )
            )
            ->groupBy(DB::raw('(company) ASC, YEAR(payment_date) ASC'))
            ->get();
        return $yearlyTotals;
    }

    public function getMonthlyTotal()
    {
        $monthlyTotals = DB::table('expenses')
            ->select(
                DB::raw('company, SUM(amount) as total_amount,
                YEAR(payment_date) as year,
                Month(payment_date) as month')
            )
            ->groupBy(
                DB::raw(
                    '(company) ASC, YEAR(payment_date) ASC, Month(payment_date) ASC'
                )
            )
            ->get();
        return $monthlyTotals;
    }

    /**
     * Display a form for creating companies.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('add')) {
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
        if (Gate::denies('active', 'manage')) {
            return redirect(route('profile'));
        }
        
        $companies = Company::all();

        return view('backend.company.view')
        ->with([
            'companies' => $companies,
            'count' => 0
            ]);
    }

    public function createCompany(Request $request)
    {
        validator([
            'company_name' => 'required',
            'company_shortname' => 'required',
            'company_twitter' => 'required',
            'company_ceo' => 'required',
            'ceo_handle' => 'required',
        ]);

        $new_company = new Company();
        $new_company->name = $request->company_name;
        $new_company->shortname = $request->company_shortname;
        $new_company->industry = $request->company_twitter;
        $new_company->ceo = $request->company_ceo;
        $new_company->twitter = $request->ceo_handle;
        $save_new_company = $new_company->save();

        if ($save_new_company) {
             Session::flash('flash_message', 'New company created successfully!');
             return redirect('/admin/company/view');
        } else {
            Session::flash('error_message', ' Cabinet was not deleted!');
            return redirect()->back();
        }
    }

    public function showEditForm($id)
    {
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
            Session::flash('flash_message', 'Company details edited successfully!');
            return redirect('/admin/company/view');
        } else {
            Session::flash('error_message', ' Company was not edited!');
            return redirect()->back();
        }
    }

    public function deleteCompany($id)
    {
        if (Gate::denies('delete')) {
            return redirect(route('company.view'));
        }
        $delete = Company::where('id', $id)->delete();
        if ($delete) {
             Session::flash('error_message', 'Company  deleted successfully!');
             return redirect('/admin/company/view');
        } else {
            Session::flash('error_message', ' Company was not deleted!');
            return redirect()->back();
        }
    }
}
