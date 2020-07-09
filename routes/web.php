<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('home');
Route::get('/about', 'PageController@about')->name('about');
Route::get('/contact', 'PageController@contactUs')->name('contact');

/**
 * Reports Endpoints
 */
Route::get('/expense/report', 'ExpenseController@report')->name('expense.reports');
Route::get('/expense/ministry', 'ExpenseController@ministry')->name('expense.ministry');

/***
 * Ministry Endpoints
 */
Route::get('/ministries', 'MinistryController@profile')->name('ministries');
Route::get('/ministries/{ministry}', 'MinistryController@show')->name('ministries.single');
Route::get('ministries/hall', 'MinistryController@index')->name('ministry_hall');
Route::post('/ministries', 'MinistryController@store')->name('ministry_store');
Route::patch('/ministries/{ministry}', 'MinistryController@update')->name('ministry_update');
Route::delete('/ministries/{ministry}', 'MinistryController@destroy')->name('ministry_destroy');
Route::get('/ministries/display', 'MinistryController@showMatch')->name('ministry_get_clicked');
Route::post('/ministries/autocomplete', 'MinistryController@autocomplete')->name('ministry_autocomplete');

/**
 * Contractor Endpoints
 */
Route::get('/contractors', 'CompanyController@index')->name('contractors');
Route::get('/contractors/{company}', 'CompanyController@show')->name('contractors.single');


Route::get('/ministry-graph', 'PageController@ministryGraph')->name('ministry-graph');
Route::get('/expense-graph', 'PageController@expenseGraph')->name('expense-graph');
Route::get('/project-modal', 'PageController@projectModal')->name('project-modal');


Route::get('/ministry/details', 'MinistrySearchController@show')->name('get_ministry_details');
Route::get('/ministry/all', 'MinistrySearchController@index')->name('ministry_all');
Route::get('/ministry/getUrl', 'PageController@ministryGetUrl')->name('ministry_get_url');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');