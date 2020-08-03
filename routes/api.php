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

Route::get('/expense/budget', 'BudgetController@yearlyBudgets');

/***
 * Comment Instantiation
 */
Route::post('/comments/user/avatar', 'CommentController@avatar');
Route::post('/comments/user', 'CommentController@onboardUser');

/***
 * Comments
 */
Route::post('/comments/resource', 'CommentController@show');
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

/**
 * Citizens
 */
Route::post('/citizens', 'CitizenController@userApi');


/**
 * Delete & Flag Endpoints
 */
Route::post('/comments/{commentId}/delete', 'CommentController@deleteComment');
Route::post('/comments/{commentId}/replies/{replyId}/delete', 'CommentController@deleteReply');
Route::patch('/comments/{commentId}/replies/{replyId}/flag', 'CommentController@flagReply');
Route::patch('/comments/{commentId}/flag', 'CommentController@flagComment');

/*
 * Email sending API
 */
Route::post('/sendmail', 'EmailController@sendMail')->name('sendmail');

// ADMIN - Comments API Calls
 Route::group(['prefix' => '', 'middleware' => ['api'] ], function() {
    Route::get('/comments', 'Admin\CommentController@getAllComments'); //gets all application comments

    Route::post('/comments/{commentId}', 'Admin\CommentController@DeleteComment'); //delete a comment

     Route::post('/comments/{commentId}/replies/{replyId}', 'Admin\CommentController@DeleteReply'); //delete a reply

    Route::patch('/comments/{commentId}/flag', 'Admin\CommentController@FlagComment'); //flag a comment

    Route::patch('/comments/{commentId}', 'Admin\CommentController@updateComment'); //update a comment

    Route::patch('/comments/{commentId}/replies/{replyId}/flag', 'Admin\CommentController@FlagReply'); //flag a reply


 });
