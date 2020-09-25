<?php

namespace App\Http\Controllers;

use App\Activites;
use Illuminate\Support\Facades\Gate;
use App\Company;
use App\CompanyType;
use Illuminate\Support\Carbon;
use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{

    public function index()
    {

        $latestDate = $this->getLatestPaymentDate();

        $carbon = new Carbon($latestDate);

        $monthStart = $carbon->startOfMonth()->format("Y-m-d");
        $monthEnd = $carbon->endOfMonth()->format("Y-m-d");

        /**
         * Sort by the highest paid contractor in the last month
         */
        $contractors = Company::addSelect(['total' => Payment::selectRaw('SUM(amount)')
            ->whereColumn('beneficiary', 'contractors.name')
            ->whereBetween('payment_date', [$monthStart, $monthEnd])
        ])->orderBy('total', 'desc')->paginate(20);

        $payments = Company::with(['payments' => function ($query) {
            $query->whereBetween('payment_date', [$monthStart, $monthEnd]);
        }])->get();

        return view('pages.contract.index')->with(['contractors' => $contractors, 'payments' => $payments]);
    }

    /**
     * Returns the last payment date 
     */
    public function getLatestPaymentDate()
    {
        return Payment::latest()->limit(1)->get()[0]->payment_date;
    }

    public function searchContractors(Request $request){
        $query = $request->q;
        $contractors = $this->getAllPayouts($query);

        //$contractor = Payment::where('beneficiary','LIKE','%'.$request->q.'%')->get();
        if(count($contractors) > 0)
            //dump($contractor);
           return view('pages.contract.search')->with(['contractors' => $contractors, 'query' => $query]);
        else{
            return view('pages.contract.search')->with(['contractors' => $contractors, 'query' => $query]);
        }
         //dump($request->q);
    }


    // show a detials of a given contractor, beneficiary or organization
    public function show(Company $company)
    {

        return view('pages.contract.single')->with(['company' => $company]);

        $contractor =   str_replace('-', ' ', $com);
        $total_amount = 0;
        $company = Company::Where('name', 'LIKE', '%'.$contractor.'%')->orwhere('shortname', $contractor)->first();
        if(isset($company)){
                $contracts = $this->getContractorContracts($contractor);
                $yearlyTotals = $this->getContractorYearlyTotal($contractor);
                 foreach($contracts as $contract){
                     $total_amount = $total_amount + $contract->amount;
                }
                return view('pages.contract.single')->with(['company' => $company, 'contracts' => $contracts, 'total_amount' => $total_amount, 'yearlyTotals' => $yearlyTotals]);

        }elseif(count($this->getContractorContracts($contractor)) > 0 ){

                $contracts = $this->getContractorContracts($contractor);
                $company = $contracts[0];
                foreach($contracts as $contract){
                     $total_amount = $total_amount + $contract->amount;
                }
                return view('pages.contract.notfound')->with(['company' => $company, 'contracts' => $contracts,  'total_amount' => $total_amount ]);

        }else{
            return redirect('errors.404_error');
        }
    }


    // get contractor total payouts  and details
    public function getAllPayouts($query)
    {
        if(isset($query)){
            $totalPayouts = Payment::select(
                DB::raw(
                    'beneficiary, SUM(amount) as total_amount'
                )
            )->where('beneficiary','LIKE','%'.$query.'%')
            ->groupBy(DB::raw('(beneficiary) ASC'))
            ->orderBy('total_amount', 'DESC')
            ->paginate(12);

            foreach($totalPayouts as $totalPayout){
            $totalPayout['year'] = Payment::select(DB::raw(
                        'YEAR(payment_date) as year'
                        )
                    )
                    ->where('beneficiary','LIKE','%'.$totalPayout->beneficiary.'%')
                    ->orderBy('year', 'DESC')
                ->distinct('year')->limit(4)->pluck('year');
            }

        return $totalPayouts;
        }
        $totalPayouts = Payment::select(
                DB::raw(
                    'beneficiary, SUM(amount) as total_amount'
                )
            )
            ->groupBy(DB::raw('beneficiary'))
            ->orderBy('total_amount', 'DESC')
            ->paginate(12);


        foreach($totalPayouts as $totalPayout){
            $totalPayout['year'] = Payment::select(DB::raw(
                        'YEAR(payment_date) as year'
                        )
                    )
                    ->where('beneficiary','LIKE','%'.$totalPayout->beneficiary.'%')
                    ->orderBy('year', 'DESC')
                ->distinct('year')->limit(4)->pluck('year');
        }

        return $totalPayouts;
    }


    // get all contracts sum and details grouped by year
    public function getAllYearlyTotal($query)
    {
        if(isset($query)){
            $yearlyTotals = Payment::select(
                DB::raw(
                    'beneficiary, SUM(amount) as total_amount, YEAR(payment_date) as year'
                )
            )->where('beneficiary','LIKE','%'.$query.'%')
            ->groupBy(DB::raw('(beneficiary) ASC, YEAR(payment_date) ASC'))
            ->paginate(12);

        return $yearlyTotals;
        }
        $yearlyTotals = Payment::select(
                DB::raw(
                    'beneficiary, SUM(amount) as total_amount, YEAR(payment_date) as year'
                )
            )
            ->groupBy(DB::raw('(beneficiary) ASC, YEAR(payment_date) ASC'))
            ->paginate(12);

        return $yearlyTotals;
    }

        // get all contract sum and details grouped by month
     public function getAllMonthlyTotal()
    {
        $monthlyTotals = Payment::select(
                DB::raw('beneficiary, SUM(amount) as total_amount,
                YEAR(payment_date) as year,
                Month(payment_date) as month')
            )
            ->groupBy(
                DB::raw(
                    '(beneficiary) ASC, YEAR(payment_date) ASC, Month(payment_date) ASC'
                )
            )
            ->get();
        return $monthlyTotals;
    }


    //  get yearly contract sum
    public function getContractorYearlyTotal($contractor)
    {
        $yearlyTotals = Payment::where('beneficiary', 'like', '%' . ( strtolower($contractor) ) . '%')
        ->selectRaw('sum(amount) as total_amount, YEAR(payment_date) as year')
        ->groupBy(DB::raw(
                    'YEAR(payment_date) ASC'
                ))
        ->get();

        return $yearlyTotals;
    }


   // Get all contracts  awarded to a given contractor
    public function getContractorContracts($contractor){
        $contracts = Payment::where('beneficiary', 'like', '%' . ( strtolower($contractor) ) . '%')->select(['id','beneficiary as name', 'amount', 'payment_date', 'description', 'organization', 'payment_code', 'payment_no'])
        ->orderby('payment_date', 'desc')
        ->paginate(20)->onEachSide(1);
        return $contracts;
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
        $sidebar = DB::table('sidebar_arrangement')->get();
        $total_activity = count(Activites::all()->where('status', 'pending'));

        $companies = Company::all();

        return view('backend.company.view')->with([
            'companies' => $companies,
            'recent_activites' => $recent_activites,
            'total_activity' => $total_activity,
            'count' => 0,
            'sidebar' => $sidebar,
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

            Activites::create(
                [
                    'description' => $auth->name.' deleted '.$name.' from the companies table',
                    'username' => $auth->name,
                    'privilage' => implode(' ', $auth->roles->pluck('name')->toArray()),
                    'status' => 'pending'
                ]
            );
             Session::flash('flash_message', 'Company  deleted successfully!');
             return redirect('/admin/company/view');
        } else {
            Session::flash('error_message', ' Company was not deleted!');
            return redirect()->back();
        }
    }

    /**
     * Store a suggested member of a company
     */
    public function suggest(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|unique:people,name',
                'email' => 'required|unique:people,email',
                'position' => 'required',
                'avatar' => 'required',
            ]
        );
        
        //store the image with a unique name in the public folder
        $path = $request->avatar->store('images', 'public'); 

        $people = \App\People::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'position' => $request->position,
                'avatar' => $path,
                'facebook' => $request->facebook,
                'linkedin' => $request->linkedin,
                'twitter' => $request->twitter,
                'website' => $request->website,
                'approved' => '0',
                'company_id' => $request->company_id
            ]
        );

        return $people;
    }
}
