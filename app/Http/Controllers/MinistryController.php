<?php

namespace App\Http\Controllers;

use App\Ministry;
use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class MinistryController extends Controller
{
    public function getMinistries($ministries)
    {
        $currentYr = date("Y");
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
        $currentYr = date("Y");
        $years = [$currentYr, $currentYr - 1, $currentYr - 2, $currentYr - 3, $currentYr - 4];
        $yearByYear = [];
        for ($x = 0; $x < count($years); $x++) {
            $filtered = $payments->filter(function ($value, $key) use (&$years, $x) {
                return date('Y', strtotime($value->payment_date)) == $years[$x];
            });
            if($x == 0){
                $count = count($filtered);
            }
            $sum = $filtered->sum('amount'); 
            $yearByYear[$years[$x]] = $sum;
        }
       
        return [$count, $yearByYear];
    }
    
    /**
     * List ministries on page load
     */
    public function profile()
    {
        
        $data = Ministry::all();
        $ministries = $this->getMinistries($data);
        foreach ($ministries as $ministry){
            $chartData = array();
            $totals = $this->fiveYearTrend($ministry->code)[1];
            $reversed = array_reverse($totals, true);
            foreach($reversed as $key => $value){
                $item = new \stdClass;
                $item->year = $key;
                $item->amount = $value;
                array_push($chartData, $item);
            }
            $ministry->chartData = $chartData;
        }

        return view('pages.ministry.index')->with('ministries', $ministries);
                                                    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.ministry.createForm');
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
            'sector_id' => 'required'
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
        $cabinets = $ministry->cabinet;
        $date = date("Y-m-d");
    
        $payments = DB::table('payments')
                    ->where('payment_code', 'LIKE', "$code%")
                    ->whereDate('payment_date', '=', "$date")
                    ->orderby('payment_date', 'desc')
                    ->paginate(2);
    
        $data = $this->fiveYearTrend($code);
        return view('pages.ministry.single')
        ->with(['ministry'=> $ministry,
                'cabinets' => $cabinets,
                'payments' => $payments,
                'trend' => $data[1],
                'count' => $data[0]
                ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
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
            'sector_id' => 'required'
        ]);

        Ministry::where('id', $ministry)->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy($ministry)
    {
        Ministry::where('id', $ministry)->delete();
    }


     /**
     * Suggests words to user while typing
     */
    public function autocomplete(Request $request)
    {
        // echo $request->get('query');
        if ($request->get('query')) {
            $query = $request->get('query');
            $data = DB::table('ministries')->where('name', 'LIKE', "%$query%")->get();
            $ministries = $this->getMinistries($data);
            echo $ministries;
        }
    }

     /**
     * Display a form for creating ministries.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewCreateMinistry()
    {
        return view('backend.ministry.create');
    }

    /**
     * Display a listing of the ministries.
     *
     * @return view
     */
    public function viewMinistries()
    {
        $ministries = Ministry::all();

        return view('backend.ministry.view')->with(['ministries' => $ministries]);
    }

    public function createMinistry(Request $request)
    {
        validator(
            [
                'ministry_name' => 'required',
                'code' => 'required | number',
                'ministry_shortname' => 'required',
                'ministry_twitter' => 'required',
                'ministry_head' => 'required',
                'website' => 'required',
                'sector_id' => 'required|number'
            ]
        );

        $new_ministry = new Ministry();
        $new_ministry->name = $request->ministry_name;
        $new_ministry->shortname = $request->ministry_shortname;
        $new_ministry->twitter = $request->ministry_twitter;
        $new_ministry->head = $request->ministry_head;
        $new_ministry->website = $request->website;
        $new_ministry->code = $request->code;
        $new_ministry->sector_id = $request->sector_id;
        $save_new_ministry = $new_ministry->save();

        if ($save_new_ministry) {
            echo ("<script>alert('New ministry created successfully');
             window.location.replace('/admin/ministry/view');</script>");
        } else {
            Session::flash('flash_message', 'Cannot create new Ministry!');
            return redirect()->back();
        }
    }

    public function showEditForm($id)
    {
        $details = Ministry::findOrFail($id);
        return view('backend.ministry.edit')->with(['details' => $details]);
    }

    public function editMinistry(Request $request, $id)
    {
        validator(
            [
                'ministry_name' => 'required',
                'code' => 'required | number',
                'ministry_shortname' => 'required',
                'ministry_twitter' => 'required',
                'ministry_head' => 'required',
                'website' => 'required',
                'sector_id' => 'required|number'
            ]
        );
        $update = Ministry::where('id', $id)
        ->update(
            [
                'name' => $request->ministry_name,
                'code' => $request->code,
                'shortname' => $request->ministry_shortname,
                'twitter' => $request->ministry_twitter,
                'head' => $request->ministry_head,
                'website' => $request->website,
                'sector_id' => $request->sector_id
            ]
        );
        if ($update) {
            echo ("<script>alert(' Ministry details edited successfully');
             window.location.replace('/admin/ministry/view');</script>");
        } else {
            Session::flash('flash_message', ' Ministry was not edited!');
            return redirect()->back();
        }
    }

    public function deleteMinistry($id)
    {
        $delete = Ministry::where('id', $id)->delete();
        if ($delete) {
            echo ("<script>alert(' Ministry details deleted successfully');
             window.location.replace('/admin/ministry/view');</script>");
        } else {
            Session::flash('flash_message', ' Ministry was not deleted!');
            return redirect()->back();
        }
    }
}
