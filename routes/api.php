<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/expense/health', 'BudgetController@health');

/***
 * Comment Instantiation
 */
Route::post('/comments/user', 'CommentController@onboardUser');
Route::get('/comments/user', 'CommentController@fetchUser');
Route::get('/comments/user/avatar', 'CommentController@avatar');

/***
 * Comments
 */
Route::get('/comments', 'CommentController@show');
Route::post('/comments', 'CommentController@store');

/**
 * Replies
 */
Route::get('/comments/{commentId}/replies', 'CommentController@replies');
Route::post('/comments/{commentId}/replies', 'CommentController@reply');

/**
 * Reactions
 */
Route::patch('/comments/{commentId}/votes/upvote', 'CommentController@upvote');
Route::patch('/comments/{commentId}/votes/downvote', 'CommentController@downvote');