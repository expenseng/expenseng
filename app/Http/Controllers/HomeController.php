<?php

namespace App\Http\Controllers;

use App\Budget;
use App\Payment;
use App\Ministry;
use App\Company;
use App\Utils\Utils;
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
        // $collection['health'] = Budget::where('org_name', 'Health')->get();
        // $collection['education'] = Budget::where('org_name', 'Education')->get();
        // $collection['defence'] = Budget::where('org_name', 'Defence')->get();
        // $collection['housing'] = Budget::where('org_name', 'Housing and Community Amenities')->get();
        // $expenses = $this->latestExpenditure();
        $lastMonthExpenses = $this->lastMonthExpenses();
        $expenses = $lastMonthExpenses[0];

        $startingdate = $lastMonthExpenses[2];
        $finaldate = $lastMonthExpenses[1];

        $day[0] = date('d', strtotime($startingdate));
        $day[1] = date('d', strtotime($finaldate));

        $month[0] = date('m', strtotime($startingdate));
        $month[1] = date('m', strtotime($finaldate));

        $year[0] = date('Y', strtotime($startingdate));
        $year[1] = date('Y', strtotime($finaldate));

        $period = $day[0] . '.' . $month[0];

        if ($year[0] != $year[1]) $period .= '.' . $year[0];

        $period .= '-' . $day[1] . '.' . $month[1] . '.' . $year[1];

        $companies = $lastMonthExpenses[3];
        // dd($companies);
        // $ministries = Ministry::select('*')
        //     ->orderby('shortname', 'asc')
        //     ->get();
        return view('pages.home')->with([
            // 'charts' => $collection,
            // 'ministries' => $ministries,
            'expenses' => $expenses,
            'companies' => $companies,
            'period' => $period
        ]);
    }

    public function companyRecipients()
    {
        $companies = Company::with('payments')
            ->inRandomOrder()
            ->limit(3)
            ->get();

        foreach ($companies as $company) {
            $this->calcAmountReceived($company);
        }
        return $companies;
    }

    public function calcAmountReceived($company)
    {
        $currentYr = date("Y");
        $name = $company->name;
        $beneficiary = Payment::select(
            DB::raw(
                'beneficiary, SUM(amount) as amount, YEAR(payment_date) as year'
            )
        )
            ->where('beneficiary', $name)
            ->whereYear('payment_date', '=', "$currentYr")
            ->groupBy('beneficiary')
            ->first();

        if ($beneficiary) {
            $company->amount = $beneficiary->amount;
            $company->year = $beneficiary->year;
        }

        return $company;
    }

    public function fiveYearTrend($code = "0215")
    {
        // TODO change logic to months
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
        $average = $aggregate / count($yearByYear);
        return ['yearbyyear' => $yearByYear, 'aggregate' => $aggregate, 'average' => $average];
    }

    public function monthlyTrends($code = "0215")
    {
        $lastMonth = (string)(date('m') - 1);
        $withinMonth = [
            date('Y') . '-' . str_pad($lastMonth, 2, "0", STR_PAD_LEFT) . '-' . '01',
            date('Y') . '-' . str_pad($lastMonth, 2, "0", STR_PAD_LEFT) . '-' . '07',
            date('Y') . '-' . str_pad($lastMonth, 2, "0", STR_PAD_LEFT) . '-' . '14',
            date('Y') . '-' . str_pad($lastMonth, 2, "0", STR_PAD_LEFT) . '-' . '29',
            date('Y') . '-' . str_pad($lastMonth, 2, "0", STR_PAD_LEFT) . '-' . '30',
        ];
        $monthly = [];
        for ($x = 0; $x < count($withinMonth) - 1; $x++) {
            $quarter = Payment::where('payment_date', '>=', $withinMonth[$x])
                ->where('payment_date', '<=', $withinMonth[$x + 1])
                ->where('payment_code', 'LIKE', "$code%")
                ->sum('amount');
            $monthly[$withinMonth[$x]] = $quarter;
        }
        $aggregate = array_sum($monthly);
        $average = $aggregate / count($monthly);
        return ['monthly' => $monthly, 'aggregate' => $aggregate, 'average' => $average];
    }


    public function MinistryCharts(Ministry $ministry)
    {
        $code = $ministry->code;
        $response['byMonths'] = $this->ministryByMonthsChart($code);
        $response['byYears'] = $this->ministryByYearsChart($code);
        $response['byCompanies'] = $this->getTopBeneficiaries($code);
        return $response;
    }

    public function ministryByMonthsChart($code = "0215")
    {
        $amounts = array();
        $months = array();
        $payments = $this->getMonthlyTotal($code);

        foreach ($payments['chartData'] as $data) {
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

    public function ministryByYearsChart($code = "0215")
    {

        $amounts = array();
        $years = array();
        $payments = $this->fiveYearTrend($code);

        foreach ($payments['yearbyyear'] as $data => $value) {
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

    public function getMonthlyTotal($code = "0215")
    {
        $ministry = Ministry::where('code', $code)->get();
        $currentYr = date("Y");
        $chartData = DB::table('payments')
            ->select(DB::raw('SUM(amount) as amount, Month(payment_date) as month'))
            ->where('payment_code', 'LIKE', "$code%")
            ->whereYear('payment_date', '=', "$currentYr")
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->get();
        $annualSum = $chartData->sum('amount');
        foreach ($chartData as $data) {
            $data->amount = intval($data->amount);
            $data->month = date('M', mktime(0, 0, 0, $data->month, 10));
        }

        $payments['chartData'] = $chartData;
        $payments['ministry'] = $ministry;
        $payments['sum'] = $annualSum;
        return $payments;
    }

    public function getTopBeneficiaries($code = "0215")
    {
        $currentYr = date("Y");
        $beneficiaries = Payment::select(
            DB::raw(
                'beneficiary, SUM(amount) as amount, YEAR(payment_date) as year'
            )
        )
            ->where('payment_code', 'LIKE', "$code%")
            ->whereYear('payment_date', '=', "$currentYr")
            ->groupBy(DB::raw('beneficiary'))
            ->orderBy('amount', 'desc')
            ->limit(10)
            ->get();

        $amounts = array();
        $companies = array();

        $index = 0;
        foreach ($beneficiaries as $beneficiary) {
            if ($index == 0) {
                $topCompany = $beneficiary->company() ?? 'N/A';
            }
            array_push($amounts, round($beneficiary->amount, 2));
            array_push($companies, $beneficiary->beneficiary);
            $index++;
        }

        $chartThree['amounts'] = $amounts;
        $chartThree['companies'] = $companies;
        $chartThree['topCompany'] = $companies[0] ?? 'N/A';
        $chartThree['topAmount'] = $amounts[0] ?? 'N/A';
        $chartThree['year'] = $currentYr;
        return $chartThree;
    }

    public function lastMonthExpenses()
    {
        $lastdate = Payment::orderBy('payment_date', 'desc')->take(1)->get()[0]->payment_date;

        $date = Utils::GetDate('30', $lastdate);

        // $latestexpenses = Payment::where('payment_date', '>=', $date)->orderBy('payment_date', 'desc')->take(8)->get();
        $latestexpenses = Payment::where('payment_date', '>=', $date)->whereNotNull('ministry_code')->get()->groupBy('ministry_code');

        $sums = $latestexpenses->mapWithKeys(function ($group, $key) {
            return [$key => $group->sum('amount')];
        });

        $companies = $this->topCompaniesPaidInTheLastMonth($latestexpenses);

        $new_array = array();
        foreach ($sums as $key => $value) {
            $ministry = Ministry::where('code', $key)->first();
            if ($ministry) {
                $ministry['total_spent'] = $value;
                array_push($new_array, $ministry);
            }
        }

        usort($new_array, function ($item1, $item2) {
            return $item2['total_spent'] <=> $item1['total_spent'];
        });

        $expense_array = array();
        $companies_array = array();
        for ($i = 0; $i < 8; $i++) {
            $expense = $new_array[$i];
            $company = $companies[$i];
            array_push($expense_array, $expense);
            array_push($companies_array, $company);
        }

        // dd($expense_array, $companies_array);
        return [$expense_array, $lastdate, $date, $companies_array];
    }


    public function topCompaniesPaidInTheLastMonth($latestexpenses){
        $companies = array();
        foreach ($latestexpenses as $payments) {
            foreach ($payments as $payment) {
                $companyData = $payment->company();
                if ($companyData) {
                    $name = $payment->company()[0]->name;
                    $found = current(array_filter($companies, function ($item) use ($name, $payment) {
                        $isTrue = isset($item['name']) && $name == $item['name'];

                        if ($isTrue) {
                            $item['amount'] += $payment->amount;
                        }
                        return $isTrue;
                    }));
                    if (!$found) {
                        $company['name'] = $payment->company()[0]->name;
                        $company['amount'] = $payment->amount;
                        $company['slug'] = $payment->company()[0]->shortname;
                        // dd($companies);
                        array_push($companies, $company);
                    }
                }
            }
        }

        usort($companies, function ($item1, $item2) {
            return $item2['amount'] <=> $item1['amount'];
        });
        // dd($companies);
        return $companies;
    }

    public function latestExpenditure()
    {
        $latestExpenses = Payment::select('*')
            ->orderby('payment_date', 'desc')
            ->take(3)
            ->get();
        return $latestExpenses;
    }

    /**
     * Method to fetch the five year trend
     * for each ministry in the database
     *
     * @return Array
     */
    public function ministriesTrend()
    {
        //get all ministries
        $ministries = Ministry::all();

        $records = [];

        //get their payment records
        foreach ($ministries as $ministry) {
            $records[$ministry->name] = $this->monthlyTrends($ministry->code);
        }

        return $records;
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
