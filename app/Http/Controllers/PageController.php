<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('pages.home');
    }

    public function contactUs()
    {
        return view('pages.contactUs');
    }

    public function ministryGraph()
    {
        return view('pages.ministry-report-graph');
    }

    public function projectModal()
    {
        return view('pages.project_details-filter_modal ');
    }

    public function expenseGraph()
    {
        return view('pages.expense-graph');
    }

    public function directorBoard()
    {
        return view('pages.director_board');
    }

    public function blog()
    {
        return view('pages.blog');
    }

    public function about()
    {
        return view('pages.aboutUs');
    }

    public function error404()
    {
        return view('pages.404_error');
    }



    public function expenditure()
    {
        return view('pages.ExpenditureReport');
    }

    public function ministryReport()
    {
        return view('pages.ministry_report');
    }

    public function ministryProfileSearch()
    {
        return view('pages.ministry_profile');
    }



    public function quickContact()
    {
        return view('pages.quick_contacts');
    }

    public function companyProfile()
    {
        return view('pages.companyprofile');
    }

    public function companyReport()
    {
        return view('pages.companyprojects');
    }

    public function companySearch()
    {

        return view('pages.companysearch');
    }

    public function companySearchShow()
    {
        request()->validate([
            'company' => 'required',

        ]);
        return 'Working on this, talk to @yanmifeakeju';
    }

    public function aboutUs()
    {
        return view('pages.about');
    }
}
