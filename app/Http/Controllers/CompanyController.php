<?php

namespace App\Http\Controllers;

use App\Activites;
use Illuminate\Support\Facades\Gate;
use App\Company;
use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{

    public function index()
    {
        $contractors = $this->getYearlyTotal();
        return view('pages.contract.index')->with(['contractors' => $contractors]);

    }


    public function show($com)
    {  
        $beneficiary =   ucwords(str_replace('-', ' ', $com)); 
        $company = Company::where('shortname', $beneficiary)->orWhere('name', 'LIKE', "$beneficiary%")->first();
        if(isset($company)){
                return view('pages.contract.single')->with('company', $company);
            }elseif(count($this->getContractorTotal($beneficiary)) > 0 ){
                $contracts = $this->getContractorTotal($beneficiary);
                $company = $contracts[0];

                $total_amount = 0;
                foreach($contracts as $contract){
                     $total_amount = $total_amount + $contract->amount;
                } 
                return view('pages.contract.notfound')->with(['company' => $company, 'contracts' => $contracts,  'total_amount' => $total_amount ]);

        }else{
            return redirect('errors.404_error');
        }
    }



    // public function show(Company $company)
    // {   
    //     $company = Company::where('shortname', $company->shortname)
    //                         ->orWhere('name', 'LIKE', "$company->shortname%")->first();
        
    //     return view('pages.contract.single')->with('company', $company);

    // }



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
        $yearlyTotals = DB::table('payments')
            ->select(
                DB::raw(
                    'beneficiary, SUM(amount) as total_amount, YEAR(payment_date) as year'
                )
            )
            ->groupBy(DB::raw('(beneficiary) ASC, YEAR(payment_date) ASC'))
            ->paginate(12);
            
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


    public function getContractorTotal($beneficiary){
        //  $contractorTotal = DB::table('payments')
        //             ->select(DB::raw('beneficiary as name, id,  SUM(amount) as total_amount,
        //             (payment_date) as year,
        //          Month(payment_date) as month, description, payment_date, organization')
        //         )
        //         ->where('beneficiary', 'like', '%' . ( strtolower($beneficiary) ) . '%')
        //         ->groupBy(DB::raw(
        //             '(beneficiary) ASC, YEAR(payment_date) ASC, Month(payment_date) ASC, description ASC, id ASC, payment_date ASC, organization ASC'
        //         )
        //     )
        //     ->get();
        // return $contractorTotal;

        $cont = Payment::where('beneficiary', 'like', '%' . ( strtolower($beneficiary) ) . '%')->get(['id','beneficiary as name', 'amount', 'payment_date', 'description', 'organization']);
        return $cont;
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

       $recent_activites = Activites::where('status', 'pending')->orderBY('id', 'DESC')
            ->limit(7)
            ->get();
        $total_activity = count(Activites::all()->where('status', 'pending'));

        $companies = Company::all();

        return view('backend.company.view')->with([
            'companies' => $companies,
            'recent_activites' => $recent_activites,
            'total_activity' => $total_activity,
            'count' => 0,
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
        $auth = Auth::user();
        if ($save_new_company) {
            Activites::create([
                'description' =>$auth->name.' Added '.$request->company_name.' to companies table',
                'username' => $auth->name,
                'privilage' => implode(' ', $auth->roles->pluck('name')->toArray()),
                'status' => 'pending'
            ]);

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
        $auth = Auth::user();
        if ($update) {
            Activites::create([
            'description' =>$auth->name.' Updated '.$request->company_name.' company details',
                'username' => $auth->name,
                'privilage' => implode(' ', $auth->roles->pluck('name')->toArray()),
                'status' => 'pending'
        ]);
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
        $username = DB::table('companies')
            ->where('id', $id)
            ->pluck('name')
            ->toArray();
        $name = implode(' ', $username);
        $auth = Auth::user();
        $delete = Company::where('id', $id)->delete();

        if ($delete) {

            Activites::create([
            'description' => $auth->name.' deleted '.$name.' from the companies table',
            'username' => $auth->name,
            'privilage' => implode(' ', $auth->roles->pluck('name')->toArray()),
            'status' => 'pending'
        ]);
             Session::flash('flash_message', 'Company  deleted successfully!');
             return redirect('/admin/company/view');
        } else {
            Session::flash('error_message', ' Company was not deleted!');
            return redirect()->back();
        }
    }
}
