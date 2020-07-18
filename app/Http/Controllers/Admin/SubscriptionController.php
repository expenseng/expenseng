<?php

namespace App\Http\Controllers\Admin;

use App\Expense;
use App\Subscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class ExpenseController extends Controller
{
    // display all expenses
    public function index(Request $request)
    {

        if (Gate::denies('active', 'manage')) {
            return redirect(route('profile'));
        }

        $subscribe = Subscription::all();
        return view('backend.subscription.index')->with(['subscribe' => $subscribe]);
    }


}
