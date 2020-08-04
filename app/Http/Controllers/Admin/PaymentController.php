<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Activites;
use App\Payment;
use App\Ministry;
use App\Company;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }


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


        $payments = Payment::paginate(20);
        return view('backend.payments.index')->with([
            'payments' => $payments,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('add')) {
            return redirect(route('payments.view'));
        }

        // Get MDAs as Orgnaizations
        $organizations = Ministry::select('name', 'code')->get()->toArray();
        $other_organization = array('name'=>'Others', 'code' => 'specify');
        array_push($organizations, $other_organization);

        // Get Companies as beneficairies
        $beneficiaries = Company::select('name')->get()->toArray();
        $other_beneficiaries = array('name'=>'Others');
        array_push($beneficiaries, $other_beneficiaries);


        //dump($organizations);

        return view('backend.payments.create')->with([
            'organizations' => $organizations,
            'beneficiaries' => $beneficiaries,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'amount' => 'integer | required',
            'payment_date' => 'required',
            'payment_code' => 'required',
            'payment_no' => 'required',
            'organization' => 'required',
            'other_organization' => '',
            'beneficiary' => 'required',
            'description' => 'required',
        ]);

        $validator->validate();

        if($request->other_organization != ''){
            $request->organization = $request->other_organization;
        }

        if($request->other_beneficiary != ''){
            $request->beneficiary = $request->other_beneficiary;
        }

        $payment = Payment::create([
            'amount' => $request->amount,
            'payment_date' => $request->payment_date,
            'payment_code' => $request->payment_code,
            'payment_no' => $request->payment_no,
            'organization' => $request->organization,
            'beneficiary' => $request->beneficiary,
            'description' => $request->description,
        ]);

        $auth = Auth::user();
        Activites::create([
            'description' =>$auth->name.' Added ' . $request->payment_no . ' to the payments table',
                'username' => $auth->name,
                'privilage' => implode(' ', $auth->roles->pluck('name')->toArray()),
                'status' => 'pending'

        ]);

        Session::flash('flash_message', 'New Payment successfully added!');
        //return redirect()->back();
        return redirect(route('payments.view'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        if (Gate::denies('edit')) {
            return redirect(route('payments.view'));
        }

        $payment = Payment::findOrFail($id);
        return view('backend.payments.edit')->with(['payment' => $payment]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'amount' => 'integer | required',
            'payment_date' => 'required',
            'payment_code' => 'required',
            'payment_no' => 'required',
            'organization' => 'required',
            'beneficiary' => 'required',
            'description' => 'required',
        ]);

        $update = Payment::where('id', $id)->update([
            'amount' => $request->amount,
            'payment_date' => $request->payment_date,
            'payment_code' => $request->payment_code,
            'payment_no' => $request->payment_no,
            'organization' => $request->organization,
            'beneficiary' => $request->beneficiary,
            'description' => $request->description,
        ]);

        $auth = Auth::user();

        if ($update) {

            Activites::create([
            'description' =>$auth->name.' Updated payment' . $request->payment_no . 'on payments table',
                'username' => $auth->name,
                'privilage' => implode(' ', $auth->roles->pluck('name')->toArray()),
                'status' => 'pending'

            ]);

            Session::flash('flash_message', 'Payment  updated successfully!');
            // return redirect()->back();
             return redirect(route('payments.view'));
        } else {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //checkcsd
        if (Gate::denies('delete')) {
            return redirect(route('payments.view'));
        }

        $payment = Payment::findOrFail($id);
        $payment->delete();

        $auth = Auth::user();
        Activites::create([
            'description' =>$auth->name.' Deleted ' . $payment->payment_no . ' from the payments table',
                'username' => $auth->name,
                'privilage' => implode(' ', $auth->roles->pluck('name')->toArray()),
                'status' => 'pending'

            ]);

        Session::flash('flash_message', 'Payment Deleted successfully');
        return redirect()->back();
    }

}
