<?php

namespace App\Http\Controllers\Admin;

use App\Report;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SheetController extends Controller
{
    //
    /**
     * Show sheets
     * @ return view
     */
    public function viewSheets()
    {
        $sheets = Report::all();

        return view('backend.sheet.sheets')
        ->with(['sheets'=> $sheets, 'count' => 0]);
    }

}
