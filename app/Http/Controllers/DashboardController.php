<?php

namespace App\Http\Controllers;

use App\Budget;
use Illuminate\Http\Request;
use App\Expense;
use App\Company;
use App\Ministry;
use App\Payment;
use App\Feedback;
use App\Activites;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
     
        $this->token = \env("COMMENTS_TOKEN");
        $this->baseUri = "https://comment.microapi.dev/v1/";

        if (!$this->token) {
            $this->token = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJhcHBsaWNhdGlvbklkIjoiNWYxMmI4NDI2MzVmM2UwMDE0MmJjOWE2IiwiYWRtaW5JZCI6IjVmMTJiN2UyNjM1ZjNlMDAxNDJiYzlhNSIsImlhdCI6MTU5NTA2MjMzOSwiZXhwIjoxNTk3NjU0MzM5fQ.B6o9MmBZ8GMUFsSnrlrOlq4NlDu7gTrtT17MXGKXS7c";
        }

        $this->http = new Client([
            'base_uri' => $this->baseUri,
            'headers' => [
                'Authorization' => 'Bearer ' .$this->token,
                'debug' => true,
                'Content-Type' => 'application/json',
            ]
        ]);      

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Gate::denies('active', 'manage')) {
            return redirect(route('profile'));
        }

        $comments = 0;

        $year = date('Y'); // get current year
        $recent_activites = Activites::where('status', 'pending')
            ->orderBY('id', 'DESC')
            ->limit(7)
            ->get();

            $response = $this->http->get('comments', [
                'query' => [
                    // 'limit'  => 2,
                    // 'page' => 2
                    //'sort' => 'ascending',
                ]
            ]);
    
            $data = json_decode($response->getBody(), true);
    
            if($data['status'] == "success"){
                $comments = isset($data['data']['records']) ?
                count($data['data']['records']) : 0;
            } else {

                Log::error("Error from fetching details from comments" . $data);

            }
    

        $recent_activities = Activites::orderBY('id', 'DESC')->get();
        $total_ministry = count(Ministry::all());
        $total_company = count(Company::all());
        $total_budgets = Budget::where('year', $year)->get('amount');

        $amount = 0; // initialize total budget amount
        $recent_expenses = Payment::orderBY('id', 'DESC')
            ->limit(7)
            ->get();

        if (count($total_budgets) > 0) {
            for ($i = 0; $i < count($total_budgets); $i++) {
                $amount += $total_budgets[$i]->amount;
            }
        } else {
        }
        $user = Auth::user();
        $feedbacks = Feedback::where('isApprove', '0')->get();
        $counter_feedback = count($feedbacks);
        $total_activity = count(Activites::all()->where('status', 'pending'));

        return view('backend.dashboard')->with([
            'total_ministry' => $total_ministry,
            'total_company' => $total_company,
            'total_budgets' => $total_budgets,
            'year_budget' => $amount,
            'recent_expenses' => $recent_expenses,
            'recent_activites' => $recent_activites,
            'recent_activities' => $recent_activities,
            'total_activity' => $total_activity,
            'count' => 0,
            'counter' => 0,
            'feedbacks' => $feedbacks,
            'counter_feedback' => $counter_feedback,
            'comments' => $comments,
        ]);
    }

    public function createExpense(Request $request)
    {
        DB::table('activites')->insert([
            [
                'description' => 'Added new Expense' . $request->name,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ]);
        $data = $request->all();
        Activites::create($data);

        $this->validate($request, [
            'amount_spent' => 'required',
            'year' => 'required',
            'month' => 'required',
            'project' => 'required',
        ]);

        $input = $request->all();
        Expense::create($input);
        Session::flash('flash_message', 'New Expense successfully added!');
        return redirect()->back();
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


    public function seenActivity($id)
    {
        if (Gate::denies('delete')) {
            return redirect(route('dashboard'));
        }

         Activites::where('id', $id)->update([
            'status' => 'seen',
        ]);

        return redirect(route('dashboard'));

    }

    public function deleteActivity($id)
    {
        if (Gate::denies('delete')) {
            return redirect(route('dashboard'));
        }

        $delete = Activites::where('id', $id)->delete();
        if ($delete) {
            Session::flash('flash_message', 'Activity deleted successfully!');
            return redirect(route('dashboard'));
        } else {
            Session::flash('flash_message', ' Activity was not deleted!');
            return redirect()->back();
        }
    }

    public function seenAllNotifications()
    {
        if (Gate::denies('delete')) {
            return redirect(route('dashboard'));
        }

        $update = Activites::where('status', 'pending')->update([
            'status' => 'seen',
        ]);

        if ($update) {
            Session::flash(
                'flash_message',
                'Marked all notifications as read!'
            );
            return redirect(route('dashboard'));
        } else {
            Session::flash('error_message', 'An error occured!');
            return redirect()->back();
        }
    }
}
