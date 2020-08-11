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
        //check if detail exist before
        $check = Subscription::where('email', $request->email)->orWhere('subscription_type', $request->subscription_type)->get();

        if (count($check) > 0) {
            toastr()->error( ' Subscription Already exist.');
                    return back();
        } else {
            $newSub = new Subscription();
            $newSub->name = $request->name;
            
            $newSub->email = $request->email;

            $newSub->subscription_type = $request->subscription_type;

            $user = $newSub->save();

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
                $last = " has been confirmed.";
                
                
                try{
                    //send email
                    Mail::to($request->email)
                    ->send(new SendSubNotification($request->name, $details, $subscription, $last, false));
                    

                        toastr()
                        ->success('You have successfully subscribed for regular updates!');
                        return  back();
                    
                    
                }catch(Exception $e){

                    toastr()->error($e . ' An error has occurred please try again later.');
                    return back();
                }

                        
                        
                

            } else {
                toastr()->error('An error has occurred please try again later.');
                return back();
            }
        }
        
    }
}
