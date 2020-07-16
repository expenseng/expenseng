<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    //


    public function subscribe(Request $request){

        $request->validate([
            'email','subscription_type'
        ]);
    }
}
