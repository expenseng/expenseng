<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        return view('pages.home');
    }

    public function expenditure(){
        return view('pages.ExpenditureReport');
    }

    public function ministryReport(){
        return view('pages.ministry_report');
    }

    public function ministryProfileSearch(){
        return view('pages.ministry_profile');
    }

    public function contactUs(){
        return view('pages.contact');
    }

    public function quickContact(){
        return view('pages.quick_contacts');
    }

    public function companyProfile(){
        return view('pages.companyprofile');
    }

    public function companyReport(){
        return view('pages.companyprojects');
    }

    public function companySearch()
    {
        return view('pages.companysearch');
    }

    public function aboutUs(){
        return view('pages.about');
    }
}
