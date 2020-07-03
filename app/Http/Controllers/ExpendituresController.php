<?php

namespace App\Http\Controllers;

use App\Expense;
use Illuminate\Http\Request;

class ExpendituresController extends Controller
{
    //
    public function getExpenditures()
    {
        $expenditures = Expense::all();

        return view('pages.expense_report')->with(['expenditures'=> $expenditures]);
    }
}
