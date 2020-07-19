<?php

namespace App\Http\Controllers;

use App\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    //

    

    public function store(Request $request){
        $data = $request->all();

        $user = Subscription::create($data);
        if($user){
            toastr()->success('You have successfully subscribed for this Report!');
          return  back();
        }else{
            toastr()->error('An error has occurred please try again later.');
            return back();
        }
    }
}
