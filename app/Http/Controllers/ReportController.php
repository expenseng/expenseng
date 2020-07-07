<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function expense()
    {
        return view('pages.expense.report');
    }

    public function ministry()
    {
        return view('pages.ministry.ministry_report_comments');
    }
}
