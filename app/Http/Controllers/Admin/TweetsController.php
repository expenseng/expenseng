<?php

namespace App\Http\Controllers;

use App\Expense;
use App\Payment;
use Illuminate\Http\Request;

class TweetsController extends Controller
{
/**
 * Show the form for creating a new resource.
 *
 * @return Response
 */
    public function create()
    {
        $expenses = Expense::all();
        $tags = Tag::lists('tag', 'id');

        return View::make('tweets.create', compact('tags'))->with(['expenses' => $expenses]);
    }

/**
 * Store a newly created resource in storage.
 *
 * @return Response
 */
    public function store()
    {
        $input = array_except(Input::all(), array('tags'));
        $validation = Validator::make($input, Tweet::$rules);
        if ($validation->passes()) {
            $tweet = $this->tweet->create($input);
            $tags = Input::get('tags');
            $tweet->tags()->sync($tags);
            return Redirect::route('tweets.index');
        }
        return Redirect::route('tweets.create')
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
        $tags = Tag::lists('tag', 'id');
        $tweetTags = $tweet->tags()->get();

        $selectedTags = array();
        foreach ($tweetTags as $tag) {
            $selectedTags[] = $tag->id;
        }

        if (is_null($tweet)) {
            return Redirect::route('tweets.index');
        }

        return View::make('tweets.edit', compact('tweet', 'tags', 'selectedTags'));
    }

/**
 * Update the specified resource in storage.
 *
 * @param  int  $id
 * @return Response
 */
    public function update($id)
    {
        $input = array_except(Input::all(), array('_method', 'tags'));
        $validation = Validator::make($input, Tweet::$rules);

        if ($validation->passes()) {
            $tweet = $this->tweet->find($id);

            $tweet->update($input);
            $tags = Input::get('tags');

            $tweet->tags()->sync($tags);

            return Redirect::route('tweets.show', $id);
        }

        return Redirect::route('tweets.edit', $id)
        ->withInput()
        ->withErrors($validation)
        ->with('message', 'There were validation errors.');
    }
}
