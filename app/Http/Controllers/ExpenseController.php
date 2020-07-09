<?php

namespace App\Http\Controllers;

use App\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
<<<<<<< HEAD
    //
    public function report()
    {
=======
    
    public function report(){
>>>>>>> upstream/develop
        return view('pages.expense.index');
    }

    public function ministry()
    {
        return view('pages.expense.ministry');
    }
}
