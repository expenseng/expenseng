<?php

namespace App\Http\Controllers;

use App\Ministry;
use App\Payment;
use App\Sector;
use App\Activites;
use App\Cabinet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class MinistryController extends Controller
{
    public function getMinistries($ministries)
    {
        $currentYr = date('Y');
        foreach ($ministries as $ministry) {
            $code = $ministry->code;
            $payments = DB::table('payments')
                ->where('payment_code', 'LIKE', "$code%")
                ->whereYear('payment_date', '=', "$currentYr")
                ->get();
            $total = $payments->sum('amount');
            $ministry->total = $total;
        }
        return $ministries;
    }

    /**
     * Gets the total expenditure for each of last 5 years
     */
    public function fiveYearTrend($code)
    {
        $payments = DB::table('payments')
            ->where('payment_code', 'LIKE', "$code%")
            ->orderby('payment_date', 'desc')
            ->get();
        $currentYr = date('Y');
        $years = [
            $currentYr,
            $currentYr - 1,
            $currentYr - 2,
            $currentYr - 3,
            $currentYr - 4,
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
            if ($x == 0) {
                $count = count($filtered);
            }
            $sum = $filtered->sum('amount');
            $yearByYear[$years[$x]] = $sum;
        }

        return [$count, $yearByYear];
    }

    /**
     * Get Data for Charts
     */
    public function getChartData($ministries)
    {
        foreach ($ministries as $ministry) {
            $chartData = [];
            $totals = $this->fiveYearTrend($ministry->code)[1];
            $reversed = array_reverse($totals, true);
            foreach ($reversed as $key => $value) {
                $item = new \stdClass();
                $item->year = $key;
                $item->amount = $value;
                array_push($chartData, $item);
            }
            $ministry->chartData = $chartData;
        }
        return $ministries;
    }
    /**
     * List ministries on page load
     */
    public function profile(Request $request)
    {

        if ($request->has('ministry')) {
            $ministry_name = $request->get('ministry');
            $result = DB::table('ministries')
                ->where('name', '=', "$ministry_name")
                ->get();
            $ministries = $this->getMinistries($result);
            $ministries = $this->getChartData($ministries);
        } else {
            $data = Ministry::all();
            $ministries = $this->getMinistries($data);
            $ministries = $this->getChartData($ministries);
        }


        if ($request->ajax()) {
            return view('pages.ministry.cards', compact('ministries'));
        }
        return view('pages.ministry.index', compact('ministries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'code' => 'required',
            'name' => 'required',
            'shortname' => 'required',
            'twitter' => 'required',
            'website' => 'required',
            'sector_id' => 'required',
        ]);

        Ministry::create($data);

        return back();
    }

    /**
     * Display the specified resource.
     * Called when user clicks on a ministry card in index.blade.php
     */
    public function show(Ministry $ministry)
    {
    
        $code = $ministry->code;

        $latestExpenses = Payment::select('*')
                        ->where('payment_code', 'LIKE', "$code%")
                        ->orderby('payment_date', 'desc')
                        ->first();
        $latestDate = $latestExpenses->payment_date;
        $cabinets = $ministry->cabinet;
        $payments = DB::table('payments')
            ->where('payment_code', 'LIKE', "$code%")
            ->whereDate('payment_date', '=', "$latestDate")
            ->orderby('payment_date', 'desc')
            ->paginate(10);

        $data = $this->fiveYearTrend($code);
        return view('pages.ministry.single')->with([
            'ministry' => $ministry,
            'cabinets' => $cabinets,
            'payments' => $payments,
            'trend' => $data[1],
            'count' => $data[0],
            'latestDate' => $latestDate
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $ministry)
    {
        $data = request()->validate([
            'code' => 'required',
            'name' => 'required',
            'shortname' => 'required',
            'twitter' => 'required',
            'website' => 'required',
            'sector_id' => 'required',
        ]);

        Ministry::where('id', $ministry)->update($data);
    }

    /**
     * Suggests words to user while typing
     */
    public function autocomplete(Request $request)
    {
        // echo $request->get('query');
        if ($request->get('query')) {
            $query = $request->get('query');
            $lists = DB::table('ministries')
                ->where('name', 'LIKE', "%$query%")
                ->get();
            $data = DB::table('ministries')
                ->where('name', 'LIKE', "%$query%")
                ->get();
            $ministries = $this->getMinistries($data);
            $ministries = $this->getChartData($ministries);
            echo $lists . '?';
            return view('pages.ministry.cards', compact('ministries'));
        }
    }

    /**
     * Display a form for creating ministries.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewCreateMinistry()
    {
        if (Gate::denies('add')) {
            return redirect(route('ministry.view'));
        }
        $ministry_codes = Ministry::all('code');
        $sectors = Sector::all();
        return view('backend.ministry.create')->with([
            'ministry_codes' => $ministry_codes,
            'sectors' => $sectors,
        ]);
    }

    /**
     * Display a listing of the ministries.
     *
     * @return view
     */
    public function viewMinistries()
    {
        if (Gate::denies('manage')) {
            return redirect(route('home'));
        }

        
        $recent_activites = Activites::where('status', 'pending')->orderBY('id', 'DESC')
            ->limit(7)
            ->get();
        $total_activity = count(Activites::all()->where('status', 'pending'));
        $ministries = collect([]); //initialize array

        //query
        $getMinistries = Ministry::all();
        //get head
        if (count($getMinistries) > 0) {
            foreach ($getMinistries as $ministry) {
                $head = Cabinet::where('ministry_code', $ministry->code)
                ->where('role', 'Minister')->get();
                if ($head) {
                    $headArray = array("head" => count($head) > 0 ? $head[0]->name : 'Minister\'s Detail not Available yet');
                    $newData = array_merge($headArray, array("ministry" => $ministry));
                    
                    $ministries->push($newData);
                }
            }
        }
        
        
        return view('backend.ministry.view')->with([
            'ministries' => $ministries,
            'recent_activites' => $recent_activites,
            'total_activity' => $total_activity,
            'count' => 0,
        ]);
    }

    public function createMinistry(Request $request)
    {
        validator([
            'ministry_name' => 'required',
            'code' => 'required | number',
            'ministry_shortname' => 'required',
            'ministry_twitter' => 'required',
            'head' => 'required',
            'website' => 'required',
            'sector_id' => 'required|number',
        ]);
        //replace spaces with dash in shortname
        $ministry_shortname = preg_replace('/[[:space:]]+/', '-', $request->ministry_shortname);

        //save new ministry
        $new_ministry = new Ministry();
        $new_ministry->name = $request->ministry_name;
        $new_ministry->shortname = $ministry_shortname;
        $new_ministry->twitter = $request->ministry_twitter;
        $new_ministry->head = $request->head;
        $new_ministry->website = $request->website;
        $new_ministry->code = $request->code;
        $new_ministry->sector_id = $request->sector_id;
        $save_new_ministry = $new_ministry->save();
        $auth = Auth::user();
        if ($save_new_ministry) {

            Activites::create([
                'description' => $auth->name . ' Added ' . $request->ministry_name . ' to the ministry table',
                'username' => $auth->name,
                'privilage' => implode(' ', $auth->roles->pluck('name')->toArray()),
                'status' => 'pending'
            ]);


            Session::flash('flash_message', 'New ministry created successfully!');
            return redirect('/admin/ministry/view');
        } else {
            Session::flash('error_message', 'Cannot create new Ministry!');
            return redirect()->back();
        }
    } 

    public function showEditForm($id)
    {
        if (Gate::denies('edit')) {
            return redirect(route('ministry.view'));
        }

        $details = Ministry::findOrFail($id);
        $ministry_codes = Ministry::orderBY('code', 'ASC')->where('code', '!=', $details->code)->get();
        $sectors = Sector::all()->where('id', '!=', $details->sector_id);
        $sector_id_name = Sector::findOrFail($details->sector_id)->name;
        return view('backend.ministry.edit')
            ->with([
                'details' => $details, 'ministry_codes' => $ministry_codes,
                'sectors' => $sectors, 'sector_id_name' => $sector_id_name
            ]);
    }

    public function editMinistry(Request $request, $id)
    {
        validator([
            'ministry_name' => 'required',
            'code' => 'required | number',
            'ministry_shortname' => 'required',
            'ministry_twitter' => 'required',
            'head' => 'required',
            'website' => 'required',
            'sector_id' => 'required|number',
        ]);
        $update = Ministry::where('id', $id)->update([
            'name' => $request->ministry_name,
            'code' => $request->code,
            'shortname' => $request->ministry_shortname,
            'twitter' => $request->ministry_twitter,
            'head' => $request->head,
            'website' => $request->website,
            'sector_id' => $request->sector_id,
        ]);
        $auth = Auth::user();
        if ($update) {
            Activites::create([
                'description' => $auth->name . 'updated ' . $request->ministry_name . ' details',
                'username' => $auth->name,
                'privilage' => implode(' ', $auth->roles->pluck('name')->toArray()),
                'status' => 'pending'
            ]);
            Session::flash('flash_message', 'Ministry details edited successfully!');
            return redirect('/admin/ministry/view');
        } else {
            Session::flash('error_message', ' Ministry was not edited!');
            return redirect()->back();
        }
    }

    public function deleteMinistry($id)
    {
        if (Gate::denies('delete')) {
            return redirect(route('ministry.view'));
        }
        $auth =  Auth::user();
        $username = DB::table('ministries')
            ->where('id', $id)
            ->pluck('name')
            ->toArray();

        $name = implode(' ', $username);
        $delete = Ministry::where('id', $id)->delete();
        if ($delete) {
            Activites::create([
                'description' => $auth->name . ' deleted ' . $name . ' from the minstries table',
                'username' => $auth->name,
                'privilage' => implode(' ', $auth->roles->pluck('name')->toArray()),
                'status' => 'pending'

            ]);
            Session::flash('error_message', 'Ministry deleted successfully!');
            return redirect('/admin/ministry/view');
        } else {
            Session::flash('error_message', ' Ministry was not deleted!');
            return redirect()->back();
        }
    }
}
