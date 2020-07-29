<?php

namespace App\Http\Controllers;

use App\Budget;
use App\Expense;
use App\Ministry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection['health'] = Budget::where('project_name', 'Health')->get();
        $collection['education'] = Budget::where('project_name', 'Education')->get();
        $collection['defence'] = Budget::where('project_name', 'Defence')->get();
        $collection['housing'] = Budget::where('project_name', 'Housing and Community Amenities')->get();
        $expenses = DB::select('select * from expenses');
        $companies = DB::select('select * from companies limit 3');
        $ministries = Ministry::select('*')
                    ->orderby('shortname', 'asc')
                    ->get();
        return view('pages.home')->with([
            'charts'=> $collection,
            'ministries' => $ministries,
            'expenses' => $expenses,
            'companies' => $companies
            ]);
    }

    public function fiveYearTrend($code="0234")
    {
        
        $payments = DB::table('payments')
            ->where('payment_code', 'LIKE', "$code%")
            ->orderby('payment_date', 'desc')
            ->get();
        $currentYr = date('Y');
        $years = [
            $currentYr - 4,
            $currentYr - 3,
            $currentYr - 2,
            $currentYr - 1,
            $currentYr,
        ];
        $yearByYear = [];
        for ($x = 0; $x < count($years); $x++) {
            $filtered = $payments->filter(function (
                $value,
                $key
            ) use (
                &$years,
                $x
            ) {
                return date('Y', strtotime($value->payment_date)) == $years[$x];
            });
           
            $sum = $filtered->sum('amount');
            $yearByYear[$years[$x]] = $sum;
        }
        $aggregate = array_sum($yearByYear);
        $average = $aggregate/count($yearByYear);
        return ['yearbyyear' => $yearByYear, 'aggregate' => $aggregate, 'average' => $average];
    }

    public function MinistryCharts(Ministry $ministry){
        $code = $ministry->code;
        $response['byMonths'] = $this->ministryByMonthsChart($code);
        $response['byYears'] = $this->ministryByYearsChart($code);
        $response['byCompanies'] = $this->getTopBeneficiaries($code);
        return $response;
    }

    public function ministryByMonthsChart($code="0215")
    {
        $amounts = array();
        $months = array();
        $payments = $this->getMonthlyTotal($code);
       
        foreach($payments['chartData'] as $data){
            array_push($amounts, $data->amount);
            array_push($months, $data->month);
        }

        $chartOne['ministry'] = $payments['ministry'][0]->shortname;
        $chartOne['months'] = $months;
        $chartOne['amounts'] = $amounts;
        $chartOne['sum'] = $payments['sum'];
        $chartOne['year'] = date('Y');
        
        return $chartOne;
    }

    public function ministryByYearsChart($code="0215")
    {
        
        $amounts = array();
        $years = array();
        $payments = $this->fiveYearTrend($code);
       
        foreach($payments['yearbyyear'] as $data => $value){
            array_push($amounts, $value);
            array_push($years, $data);
        }

        $chartTwo['years'] = $years;
        $chartTwo['amounts'] = $amounts;
        $chartTwo['sum'] = $payments['aggregate'];
        $chartTwo['average'] = $payments['average'];
        $chartTwo['year'] = date('Y');
        
        return $chartTwo;
    }

    public function getMonthlyTotal($code="0215")
    {
        $ministry = Ministry::where('code', $code)->get();
        $currentYr = date("Y");
        $chartData = DB::table('payments')
                    ->select(DB::raw('SUM(amount) as amount, Month(payment_date) as month'))
                    ->where('payment_code', 'LIKE', "$code%")
                    ->whereYear('payment_date', '=', "$currentYr")
                    ->groupBy(DB::raw('Month(payment_date) ASC'))
                    ->get();
        $annualSum = $chartData->sum('amount');
        foreach($chartData as $data){
            $data->amount = intval($data->amount);
            $data->month = date('M', mktime(0, 0, 0,  $data->month, 10));
        }
        
        $payments['chartData'] = $chartData;
        $payments['ministry'] = $ministry;
        $payments['sum'] = $annualSum;
        return $payments;
    }
    
    public function getTopBeneficiaries($code="0215")
    {
        $currentYr = date("Y");
        $beneficiaries = DB::table('payments')
        ->select(
            DB::raw(
                'beneficiary, SUM(amount) as amount, YEAR(payment_date) as year'
            )
        )
        ->where('payment_code', 'LIKE', "$code%")
        ->whereYear('payment_date', '=', "$currentYr")
        ->groupBy(DB::raw('(amount) DESC, (beneficiary) DESC, YEAR(payment_date) DESC'))
        ->limit(10)
        ->get();

        $amounts = array();
        $companies = array();
       
        foreach($beneficiaries as $beneficiary){
            array_push($amounts, $beneficiary->amount);
            array_push($companies, $beneficiary->beneficiary);
        }

        $chartThree['amounts'] = $amounts;
        $chartThree['companies'] = $companies;
        $chartThree['topCompany'] = $companies[0];
        $chartThree['topAmount'] = $amounts[0];
        $chartThree['year'] = $currentYr;
        return $chartThree;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
