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

Route::get('/', 'PageController@index')->name('home');
Route::get('/reports/expenditure', 'ExpendituresController@getExpenditures')->name('expenditure_report');
Route::get('/ministry/reports', 'PageController@ministryReport')->name('ministry_report');
Route::get('/ministry/profile', 'PageController@ministryProfileSearch')->name('ministry_profile_search');
Route::get('/company/profile', 'PageController@companyProfile')->name('company_profile');
Route::get('/company/reports', 'PageController@companyReport')->name('company_report');
Route::get('/company/search','PageController@companySearch')->name('company_search');
Route::get('/quick-contacts', 'PageController@quickContact')->name('quick_contacts');
Route::get('/contact', 'PageController@contactUs')->name('contact');
Route::get('/about-us', 'PageController@aboutUs')->name('about_us');
