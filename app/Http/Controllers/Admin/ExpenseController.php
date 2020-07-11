<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Expense;
use Illuminate\Support\Facades\Session;


class ExpenseController extends Controller
{
	// display all expenses
	public function index(Request $request)
    {
        $expenses = Expense::all();
        return view('backend.expense.view')->with(['expenses' => $expenses]);
    }

    // display new expense form
    public function createExpense(Request $request)
    {
         return view('backend.expense.create');
    }

	// store expenses
    public function storeExpense(Request $request)
    {
        $this->validate($request, [
          'amount_spent' => 'integer | required',
           'year' => 'required',
           'month' => 'required',
           'project' => 'required'
        ]);
        
        $input = $request->all();
        Expense::create($input);
        Session::flash('flash_message', 'New Expense successfully added!');
        return redirect()->back();
    }

    // edit Expense
    public function editExpense($id)
    {
        $details = Expense::findOrFail($id);
        return view('backend.expense.edit')->with(['details' => $details]);
    }

    public function updateExpense(Request $request, $id)
    {

        $this->validate($request, [
           'amount_spent' => 'integer | required',
           'year' => 'required',
           'month' => 'required',
           'project' => 'required'
        ]);

        $update = Expense::where('id', $id)
            ->update(
                [
                    'amount_spent' => $request->amount_spent,
                    'year' => $request->year,
                    'month' => $request->month,
                    'project' => $request->project,
                ]
            );
        if ($update) {
            Session::flash('flash_message', 'Expense  updated successfully!');
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }


    public function deleteExpense($id){
        $delete = Expense::where('id', $id)->delete();
        if ($delete) {
            Session::flash('flash_message', 'Expense  deleted successfully!');
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

}
