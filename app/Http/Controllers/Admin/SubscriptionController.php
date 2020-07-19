<?php

namespace App\Http\Controllers\Admin;

use App\Subscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class SubscriptionController extends Controller
{
    // display all expenses
    public function index(Request $request)
    {

        if (Gate::denies('active', 'manage')) {
            return redirect(route('profile'));
        }

        $subscribe = Subscription::paginate(10);
        return view('backend.subscription.index', compact('subscribe'));
    }


}
