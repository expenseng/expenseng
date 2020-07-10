<?php

namespace App\Http\Controllers;

use App\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    
    public function report()
    {
        return view('pages.expense.index');
    }

    public function ministry()
    {
        return view('pages.expense.ministry');
    }
}
