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

Route::get('/', 'PageController@index')->name('home');
Route::get('/contact', 'PageController@contactUs')->name('contact');
Route::get('/ministry-graph', 'PageController@ministryGraph')->name('ministry-graph');
Route::get('/expense-graph', 'PageController@expenseGraph')->name('expense-graph');
Route::get('/project-modal', 'PageController@projectModal')->name('project-modal');
Route::get('/director-board', 'PageController@directorBoard')->name('director-board');
Route::get('/blog', 'PageController@blog')->name('blog');
Route::get('/about', 'PageController@about')->name('about');
Route::get('/404', 'PageController@error404')->name('404');



Route::get('/reports/expenditure', 'ExpendituresController@getExpenditures')->name('expenditure_report');
Route::get('/ministry/reports', 'PageController@ministryReport')->name('ministry_report');
Route::get('/ministry/profile/{id?}', 'PageController@ministryProfileSearch')->name('ministry_profile_search');
Route::get('/company/profile', 'PageController@companyProfile')->name('company_profile');

Route::get('/company/reports', 'CompanyReportController@getReport')->name('company_report');
Route::get('/company/search','PageController@companySearch')->name('company_search');
Route::get('/company/search', 'PageController@companySearch')->name('company_search');
Route::post('/company/show', 'PageController@companySearchShow');
Route::get('/quick-contacts', 'PageController@quickContact')->name('quick_contacts');
Route::get('contract', 'PageController@contract')->name('contract');
Route::get('/ministry', 'PageController@ministryList')->name('ministry');
Route::get('/spending', 'PageController@ministrySpending')->name('spending');

Route::get('/ministry/details', 'MinistrySearchController@show')->name('get_ministry_details');
Route::post('/ministry/autocomplete', 'MinistrySearchController@autocomplete')->name('ministry_autocomplete');
Route::get('/ministry/all', 'MinistrySearchController@index')->name('ministry_all');
Route::get('/ministry/getUrl', 'PageController@ministryGetUrl')->name('ministry_get_url');


Route::get('/ministry/show/profile', 'PageController@showProfile')->name('ministry_profile_show');