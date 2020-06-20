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
}
