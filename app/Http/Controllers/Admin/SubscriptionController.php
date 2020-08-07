<?php

namespace App\Http\Controllers\Admin;


use App\Mail\SendSubNotification;
use App\Subscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use App\Activites;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


class SubscriptionController extends Controller
{

    /**
     * Display all expenses
     */
    
    public function index(Request $request)
    {
        if (Gate::denies('active', 'manage')) {
            return redirect(route('profile'));
        }
        $recent_activites = Activites::where('status', 'pending')
            ->orderBY('id', 'DESC')
            ->limit(7)
            ->get();
        $total_activity = count(Activites::all()->where('status', 'pending'));
        $count = 0;
        $subscribe = Subscription::paginate(10);
        return view('backend.subscription.index')->with(
            [
            'subscribe' => $subscribe,
            'count' => $count,
            'recent_activites' => $recent_activites,
            'total_activity' => $total_activity,
            ]
        );
    }

    /**
     * Create a new cabinet view.
     *
     * @return view
     */
    public function create()
    {
        if (Gate::denies('add')) {
            return redirect(route('subscribe.view'));
        }

        return view('backend.subscription.create');
    }

    /**
     * Create  cabinets funtion.
     * @param request
     * @return view
     */
    public function createSub(Request $request)
    {
        validator(
            [
                'name' => 'required',
                'email' => 'required',
                'sub_type' => 'required',
            ]
        );
        //check if detail exist before
        $check = Subscription::where('email', $request->email)
        ->where('subscription_type', $request->sub_type)->get();

        if (count($check) > 0 ) {
            Session::flash(
                'error_message', 'A subscription with '.
                $request->email.' has been created initially!!'
            );
            return redirect()->back();
        }

            $new_subscription = new Subscription();
            $new_subscription->name = $request->name;
            $new_subscription->email = $request->email;
            $new_subscription->subscription_type = $request->sub_type;

            $save_new_subscription = $new_subscription->save();

        if ($save_new_subscription) {
            $details = "Your subscription to" ;
            $subscription = $request->sub_type;
            $last = " has been confirmed.";
            //send email
            Activites::create(
                [
                'description' =>$request->name . 
                ' subscribed to recieve latest updates',
                'username' => $request->name,
                'privilage' => 'subscriber',
                'status' => 'pending'
                ]
            );
         try {
            Mail::to($request->email)
                ->send(new SendSubNotification($request->name, $details, $subscription, $last, false));
            

            


                Session::flash('flash_message', $request->name. ' added to Subscription Successfully!');
                return redirect(route('subscribe.view'));
            
             } catch (\Exception $e) {
             Session::flash('error_message', 'Email was not sent ' . $e);
             }
        } else {
            Session::flash('error_message', "Subscription Not Created");
            return redirect()->back();
        }
        

    }

    /**
     * Shows edit form
     * @return void
     */
    public function showEditForm($id)
    {
        if (Gate::denies('edit')) {
            return redirect(route('subscribe.view'));
        }

        $details = Subscription::findOrFail($id);
        return view('backend.subscription.edit')->with(['details' => $details]);
    }

    /**
     * Edits Subscription
     * @param $request, $id
     * @return view
     */
    public function editSub(Request $request, $id)
    {
        validator(
            [
            'name' => 'required',
            'email' => 'required',
            'sub_type' => 'required',
            ]
        );

        $oldEmail = Subscription::findOrFail($id)->email;

        $update = Subscription::where('id', $id)
            ->update(
                [
                'name' => $request->name,
                'email' => $request->email,
                'subscription_type' => $request->sub_type,
                ]
            );


        if ($update) {
            Activites::create(
                [
                'description' =>
                'Subscriber '.$request->name . ' details was edited ',
                ]
            );
            if ($oldEmail === $request->email) {

                $details = "Your subscription has been changed to" ;
                $subscription = $request->sub_type;
                $last = ".";

                $sendEmail = Mail::to($request->email)
                ->send(new SendSubNotification($request->name, $details, $subscription, $last, false));
            
                
                if ($sendEmail) {
                    
                    Session::flash('flash_message', 'Subscription details edited successfully!');
                    return redirect(route('subscribe.view'));
                } else {
                    Session::flash('error_message', ' Subscription was not edited!');
                    return redirect()->back();
                }
            } else {

                $details = "Your email has been changed for" ;
                $subscription = $request->sub_type;
                $last = " Your subscription has been deleted.";

                $sendOldEmail = Mail::to($oldEmail)
                ->send(new SendSubNotification($request->name, $details, $subscription, $last, true));

                if ($sendOldEmail) {
                    $details = "Your  email subscription to" ;
                    $subscription = $request->sub_type;
                    $last = " has been changed.";

                    //send email to new email
                    $sendEmail = Mail::to($request->email)
                    ->send(new SendSubNotification($request->name, $details, $subscription, $last, false));

                    
                    if ($sendEmail) {
                        
                        Session::flash('flash_message', ' Subscription details edited successfully!');
                        return redirect(route('subscribe.view'));
                    } else {
                        Session::flash('error_message', ' Subscription was not edited!');
                        return redirect()->back();
                    }

                }
                
                
                
            }
        } else {
            Session::flash('error_message', ' Subscription was not edited!');
            return redirect()->back();
        }
    }

    /**
     * Deletes a member from Subscription
     *
     * @param  id
     * @return flash_message
     */
    public function deleteSub($id)
    {
        if (Gate::denies('delete')) {
            return redirect(route('subscribe.view'));
        }
        $subscriber = Subscription::findOrFail($id);
        $name = $subscriber->name;
        $sub_type = $subscriber->subscription_type;
        $delete = Subscription::where('id', $id)->delete();

        if ($delete) {
            Activites::create(
                [
                'description' => 'Admin deleted a subscriber',
                ]
            );
            //send unsubscribed email

            $details = "Your email has been removed from" ;
                $subscription = $sub_type;
                $last = " Your subscription has been deleted.";

                $sendEmail = Mail::to($subscriber->email)
                ->send(new SendSubNotification($name, $details, $subscription, $last, true));

            
        
            if ($sendEmail) {
                Session::flash(
                    'flash_message',
                    ' Subscription deleted successfully!'
                );
                return redirect(route('subscribe.view'));
            } else {
                Session::flash('error_message', ' Subscription was not deleted!');
                return redirect()->back(); 
            }
        } else {
            Session::flash('error_message', ' Subscription was not deleted!');
            return redirect()->back();
        }
    }
}
