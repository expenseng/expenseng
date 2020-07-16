<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Expense;
use App\Payment;
use App\Tweet;
use App\Tag;


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
        $tweets = Tweet::with(['expenses'])->get();
        return view('pages.tweet.index')->with(['tweets' => $tweets]);
    }

    public function create()
    {   
        $expenses = Expense::all();
        return View('pages.tweets.create', compact('expenses'));
    }

/**
 * Store a newly created resource in storage.
 *
 * @return Response
 */
    public function store()
    {   
        $expenses = Expense::all();
        $input = array_except(Input::all(), $expenses);
        $validation = Validator::make($input, Tweet::$rules);
        if ($validation->passes()) {
            $tweet = $this->tweet->create($input);
            $expenses = Input::get('expenses');
            $tweet->expenses()->sync($expenses);
            return Redirect::route('pages.tweets.index');
        }
        return Redirect::route('pages.tweets.create')
        ->withInput()
        ->withErrors($validation)
        ->with('message', 'There were validation errors.');
    }
/**
 * Show the form for editing the specified resource.
 *
 * @param  int  $id
 * @return Response
 */
    public function edit($id)
    {
        $tweet = $this->tweet->find($id);
        $tags = Expense::lists('expense', 'id');
        $tweetTags = $tweet->expenses()->get();

        $selectedTags = array();
        foreach ($tweetTags as $tag) {
            $selectedTags[] = $tag->id;
        }

        if (is_null($tweet)) {
            return Redirect::route('pages.tweets.index');
        }

        return View::make('pages.tweets.edit', compact('tweet', 'tags', 'selectedTags'));
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
        $validation = Validator::make($input, Tweet::$rules);

        if ($validation->passes()) {
            $tweet = $this->tweet->find($id);

            $tweet->update($input);
            $tags = Input::get('expenses');

            $tweet->expenses()->sync($tags);

            return Redirect::route('pages.tweets.show', $id);
        }

        return Redirect::route('pages.tweets.edit', $id)
        ->withInput()
        ->withErrors($validation)
        ->with('message', 'There were validation errors.');
    }
}

?>
