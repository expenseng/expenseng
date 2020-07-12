<?php

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
Route::post('/ministries', 'MinistryController@store')->name('ministry_store');
Route::patch('/ministries/{ministry}', 'MinistryController@update')->name('ministry_update');
Route::delete('/ministries/{ministry}', 'MinistryController@destroy')->name('ministry_destroy');
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


/*
|--------------------------------------------------------------------------
| ADMIN Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "auth" middleware group. Now create something great!
|
 */

 Route::group(['prefix' => 'admin', 'middleware' => [] ], function() {          
    Route::get('/dashboard', 'Admin\DashboardController@index')->name('dashboard'); // Matches The "/admin/dashboard" URL

    // Expense CRUD
    Route::get('/expenses', 'Admin\ExpenseController@index')->name('expenses.view');
    Route::get('/expenses/create', 'Admin\ExpenseController@createExpense')->name('expenses.create');
    Route::post('/expenses/create', 'Admin\ExpenseController@storeExpense')->name('expenses.store');
    Route::get('/expenses/edit/{expense_id}', 'Admin\ExpenseController@editExpense')->name('expenses.edit');
    Route::put('/expenses/edit/{expense_id}', 'Admin\ExpenseController@updateExpense')->name('expenses.update');
    Route::delete('/expenses/delete/{expense_id}', 'Admin\ExpenseController@deleteExpense')->name('expenses.delete');
   

    // Company CRUD
    Route::get('/company/create', 'Admin\CompanyController@create')->name('company.create');
    Route::post('/company/create', 'Admin\CompanyController@createCompany')->name('create.company');
    Route::get('/company/view', 'Admin\CompanyController@viewCompanies')->name('company.view');
    Route::get('/company/edit/{company_id}', 'Admin\CompanyController@showEditForm')->name('company.view.edit');
    Route::put('/company/edit/{company_id}', 'Admin\CompanyController@editCompany')->name('company.edit');
    Route::delete('/company/delete/{company_id}', 'Admin\CompanyController@deleteCompany')->name('company.delete');



    // MiNISTY CRUD
    Route::get('/ministry/create', 'Admin\MinistryController@viewCreateMinistry')->name('ministry.create');
    Route::post('/ministry/create', 'Admin\MinistryController@createMinistry')->name('create.ministry');
    Route::get('/ministry/view', 'Admin\MinistryController@viewMinistries')->name('ministry.view');
    Route::get('/ministry/edit/{ministry_id}', 'Admin\MinistryController@showEditForm')->name('ministry.view.edit');
    Route::put('/ministry/edit/{ministry_id}', 'Admin\MinistryController@editMinistry')->name('ministry.edit');
    Route::delete('/ministry/delete/{ministry_id}', 'Admin\MinistryController@deleteMinistry')->name('ministry.delete');

    //People CRUD
    Route::get('/admin/{company}/{people}', 'Admin\CompanyController@showPeople');

 });