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

/**
 * Admin Routes
 */
// Route::prefix('admin')->group(function () {
//     Route::get('/dashboard', 'DashboardController@index')->name('dashboard');  // Matches The "/admin/dashboard" URL
//     Route::post('/create_expense', 'DashboardController@createExpense');
     Route::post('/create_company', 'DashboardController@createCompany');
// });

Route::group(['middleware' => ['auth']], function (){
    Route::get('/admin/company/create', 'CompanyController@create')->name('company.create');
    Route::post('/admin/company/create', 'CompanyController@createCompany')->name('create.company');
    Route::get('/admin/company/view', 'CompanyController@viewCompanies')->name('company.view');
    Route::get('/admin/company/edit/{company_id}', 'CompanyController@showEditForm')->name('company.view.edit');
    Route::put('/admin/company/edit/{company_id}', 'CompanyController@editCompany')->name('company.edit');

    Route::get('/admin/ministry/create', 'MinistryController@viewCreateMinistry')->name('ministry.create');
    Route::post('/admin/ministry/create', 'MinistryController@createMinistry')->name('create.ministry');
    Route::get('/admin/ministry/view', 'MinistryController@viewMinistries')->name('ministry.view');
});

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');  // Matches The "/admin/dashboard" URL
    Route::post('/expense', 'DashboardController@createExpense');
    Route::post('/company', 'DashboardController@createCompany');

    Route::get('/company/create', 'CompanyController@create')->name('company.create'); // Matches The "/admin/company/create" URL
    Route::post('/company/create', 'CompanyController@createCompany')->name('create.company');
    Route::get('/company/view', 'CompanyController@viewCompanies')->name('company.view');
  
    Route::get('/companies/{company}', 'CompanyController@adminShow'); // Matches The "/admin/companies/{company}" URL
    Route::get('/companies',  'CompanyController@adminIndex');
    
});