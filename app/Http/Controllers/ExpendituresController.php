<?php

namespace App\Http\Controllers;

use App\Expenditure;
use Illuminate\Http\Request;

class ExpendituresController extends Controller
{
    //
    public function getExpenditures()
    {
        $expenditures = Expenditure::all();

        return view('pages.ExpenditureReport')->with(['expenditures'=> $expenditures]);
    }
}
