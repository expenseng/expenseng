<?php

namespace App\Http\Controllers;

use App\Expense;
use App\Payment;
use App\Subscription;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{

    public function report()
    {

        return view('pages.expense.index');
    }

    public function ministry()
    {
        $collection['nondescriptive'] = Payment::where('description', '')->paginate(20);
        $collection['summary'] = Payment::where('description', '!=', '')->paginate(20);
        return view('pages.expense.ministry')->with('collection', $collection);
    }



    public function store(Request $request){
        $data = $request->all();

        $user = Subscription::create($data);
        if($user){
            toastr()->success('You have successfully subscribed  for this news!');
          return  back();
        }else{
            toastr()->error('An error has occurred please try again later.');
            return back();
        }
    }
}
