<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Expense;
use App\Payment;
use App\Tweet;
use App\Budget;
use App\Sector;
use App\Ministry;
use Carbon\Carbon;
use Twitter;

class TweetsController extends Controller
{

/**
 * Show the form for creating a new resource.
 *
 * @return Response
 */


    public function __invoke()
    {
        return $this->create();
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $tweets = DB::table('tweets');
        return view('pages.tweets.index')->with(['tweets' => $tweets]);
    }

    public function create()
    {
        return View('pages.tweets.create');
    }

/**
 * Store a newly created resource in storage.
 *
 * @return Response
 */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'status' => 'required',
            'company_twitter' => 'required',
            'ministry_twitter' => 'required',
            'twitter_handle' => 'required',
        ]);
        if ($validator->validate()) {
            $tweeter = new Tweet();
            $tweet = array($request->all());
            //Twitter::postTweet(array('status' => $tweet, 'format' => 'json'));
            return view('pages.tweets.create')->with(['tweets' => $tweet]);
        }
        return view('pages.errors.404_error')
        ->withInput()
        ->withErrors($validation)
        ->with('message', 'There were validation errors.');
    }

    public function autoTweetStatus()
    {
        $budget = Budget::inRandomOrder()->first();
        $tweet = $budget;
        /* Twitter::postTweet(array('status' => $budget, 'format' => 'json'));
        $tweet->save(); */
  
        return response()->json(['success'=>' Auto tweet enabled successfully.']);
    }

/**
 * Update the specified resource in storage.
 *
 * @param  int  $id
 * @return Response
 */
    public function update($id)
    {
        $input = array_except(Input::all(), array('_method', 'expenses'));
        $validation = Validator::make($input, Tweet::status());

        if ($validation->passes()) {
            $tweet = $this->tweet->find($id);

            $tweet->update($input);
            $tags = Input::get('expenses');

            $tweet->expenses()->sync($tags);

            return Redirect::route('pages.tweets.index', $id);
        }

        return Redirect::route('pages.tweets.create', $id)
        ->withInput()
        ->withErrors($validation)
        ->with('message', 'There were validation errors.');
    }
}
