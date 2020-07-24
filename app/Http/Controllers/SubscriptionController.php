<?php

namespace App\Http\Controllers;

use App\Subscription;
use App\Activites;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    //

    

    public function store(Request $request)
    {
        $data = $request->all();

        $user = Subscription::create($data);
        if($user){
            Activites::create([
            'description' => $request->name.' subscribed to recieve latest updates',
            'username' => $request->name,
            'privilage' => 'subscriber',
            'status' => 'pending'
            ]);
            
            toastr()->success('You have successfully subscribed for this Report!');
            return  back();
        } else {
            toastr()->error('An error has occurred please try again later.');
            return back();
        }
    }
}
