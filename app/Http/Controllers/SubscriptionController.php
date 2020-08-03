<?php

namespace App\Http\Controllers;

use App\Subscription;
use App\Activites;
use App\Mail\SendSubNotification;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SubscriptionController extends Controller
{
    /**
     * Takes Subscription request
     * @return back()
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $user = Subscription::create($data);
        if ($user) {
            Activites::create(
                [
                    'description' => $request->name.' subscribed to recieve latest updates',
                    'username' => $request->name,
                    'privilage' => 'subscriber',
                    'status' => 'pending'
                ]
            );

            $details = "Your subscription to" ;
            $subscription = "recieve latest updates";
            $last = " has been confirmed";
            //check if detail exist before
            $check = Subscription::where('email', $request->email)->orWhere('subscription_type', $request->sub_type)->get();

            if (count($check) > 1) {
                try{
                    //send email
                    $sendEmail = Mail::to($request->email)
                    ->send(new SendSubNotification($request->name, $details, $subscription, $last));
                    if ($sendEmail) {

                        toastr()
                        ->success('You have successfully subscribed for regular updates!');
                        return  back();
                    }
                    
                }catch(Exception $e){

                    toastr()->error($e . ' An error has occurred please try again later.');
                    return back();
                }

                    
                    
            }  else {
                toastr()->error('An error has occurred please try again later.');
                return back();
            }

        } else {
            toastr()->error('An error has occurred please try again later.');
            return back();
        }
    }
}
