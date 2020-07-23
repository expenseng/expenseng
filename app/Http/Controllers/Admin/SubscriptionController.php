<?php

namespace App\Http\Controllers\Admin;

use GuzzleHttp\Client;
use App\Mail\SendSubNotification;
use App\Subscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use App\Activites;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use function GuzzleHttp\json_decode;

class SubscriptionController extends Controller
{
    private $http;
    private $baseUri = "https://email.microapi.dev/v1/";
    
    public function __construct()
    {

        $this->baseUri = "https://email.microapi.dev/v1/";
        
        $this->http = new Client([
            'base_uri' => $this->baseUri,
            'headers' => [
                'debug' => true,
                'Content-Type' => 'application/json',
            ]
        ]);
    }

    // display all expenses
    public function index(Request $request)
    {
        if (Gate::denies('active', 'manage')) {
            return redirect(route('profile'));
        }
        $recent_activites = Activites::orderBY('id', 'DESC')
            ->limit(5)
            ->get();
        $total_activity = count(Activites::all());
        $count = 0;
        $subscribe = Subscription::paginate(10);
        return view('backend.subscription.index')->with([
            'subscribe' => $subscribe,
            'count' => $count,
            'recent_activites' => $recent_activites,
            'total_activity' => $total_activity,
        ]);
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
     * @params $request
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
            $check = Subscription::where('email', $request->email)->orWhere('subscription_type', $request->sub_type)->get();

        if (count($check) > 1) {
            Session::flash('error_message', 'A subscription with '. $request->email.
            ' has been created initially!!');
            return redirect()->back();
        }

            $new_subscription = new Subscription();
            $new_subscription->name = $request->name;
            $new_subscription->email = $request->email;
            $new_subscription->subscription_type = $request->sub_type;

            $save_new_subscription = $new_subscription->save();

        if ($save_new_subscription) {
            //send email
                Activites::create([
                'description' =>
                    $request->name . ' subscribed to recieve latest updates',
                ]);
                $response = $this->http->post('sendmailwithtemplate/', [

                    "body" => json_encode([
                        "recipient" => $request->email, //reciever
                        "sender" => "subscribexpenseng@gmail.com", //sender
                        "subject" => "EXPENSENG SUBSCRIPTION",
                        "cc" => "",
                        "bcc" => "",
                        "htmlBody" => "<div class='container'>
                        <div>
                            Hi <b> $request->name </b>, You have successfully subscribed for 
                            <b>$request->sub_type </b> on ExpenseNG.<br />
                            Regards.<br>
                        </div>
                        </div>",
                    ])
                ]
            );

                $response = json_decode($response->getBody(), true);

        
                if($response['status'] == 'success'){

            Session::flash('flash_message', $request->name. ' added to Subscription Successfully!');
            return redirect(route('subscribe.view'));
        } else {
            Session::flash('error_message', 'Cannot send  Subscription email!!');
            return redirect()->back();
        }
                
            } else {
                Session::flash('error_message', $response);
                return redirect()->back();
            }
        


        
    }

    public function showEditForm($id)
    {
        if (Gate::denies('edit')) {
            return redirect(route('subscribe.view'));
        }

        $details = Subscription::findOrFail($id);
        return view('backend.subscription.edit')->with(['details' => $details]);
    }

    public function editSub(Request $request, $id)
    {
        validator([
            'name' => 'required',
            'email' => 'required',
            'sub_type' => 'required',
        ]);
        $oldEmail = Subscription::findOrFail($id)->email;

        $update = Subscription::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'subscription_type' => $request->sub_type,
        ]);


        if ($update) {
             Activites::create([
                'description' =>
                    'Subscriber '.$request->name . ' details was edited ',
            ]);
            if ($oldEmail === $request->email) {
                $response = $this->http->post('sendmailwithtemplate/', [

                    "body" => json_encode([
                        "recipient" => $request->email, //reciever
                        "sender" => "subscribexpenseng@gmail.com", //sender
                        "subject" => "EXPENSENG SUBSCRIPTION",
                        "cc" => "",
                        "bcc" => "",
                        "htmlBody" => "<div class='container'>
                        <div>
                            Hi <b> $request->name </b>, You have successfully 
                            changed your subscription to <b>$request->sub_type </b> 
                            on ExpenseNG.<br />
                            Regards.<br>
                        </div>
                        </div>",
                    ])
                ]
            );

                $response = json_decode($response->getBody(), true);

        
                if ($response['status'] == 'success') {
                    
                    Session::flash ('flash_message', 
                    'Subscription details edited successfully!');
                    return redirect(route('subscribe.view'));
                } else {
                    Session::flash('error_message', ' Subscription was not edited!');
                    return redirect()->back();
                }
            }else {
                $responseOld = $this->http->post('sendmailwithtemplate/', [

                    "body" => json_encode([
                        "recipient" => $oldEmail, //reciever
                        "sender" => "subscribexpenseng@gmail.com", //sender
                        "subject" => "EXPENSENG SUBSCRIPTION",
                        "cc" => "",
                        "bcc" => "",
                        "htmlBody" => "<div class='container'>
                        <div>
                            Hi , You have been unsubscribed from recieving
                            updates on ExpenseNG.<br />
                            Regards.<br>
                        </div>
                        </div>",
                    ])
                ]
            );
                //send email to both email
                $response = $this->http->post('sendmailwithtemplate/', [

                    "body" => json_encode([
                        "recipient" => $request->email, //reciever
                        "sender" => "subscribexpenseng@gmail.com", //sender
                        "subject" => "EXPENSENG SUBSCRIPTION",
                        "cc" => "",
                        "bcc" => "",
                        "htmlBody" => "<div class='container'>
                        <div>
                            Hi <b> $request->name </b>, You have successfully changed 
                            your email for <b>$request->sub_type </b> 
                            subscription on ExpenseNG.<br />
                            Regards.<br>
                        </div>
                        </div>",
                    ])
                ]
            );

                $response = json_decode($response->getBody(), true);

        
                if ($response['status'] == 'success') {
                    
                    Session::flash('flash_message', ' Subscription details edited successfully!');
                    return redirect(route('subscribe.view'));
                }else{
                    Session::flash('error_message', ' Subscription was not edited!');
                    return redirect()->back();
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
     * @params $id
     * @return  message
     */
    public function deleteSub($id)
    {
        if (Gate::denies('delete')) {
            return redirect(route('subscribe.view'));
        }
        $subscriber = Subscription::findOrFail($id);
        $delete = Subscription::where('id', $id)->delete();

        if ($delete) {
            Activites::create([
                'description' => 'Admin deleted a subscriber',
            ]);
            //send unsubscribed email

            $response = $this->http->post('sendmailwithtemplate/', [

                "body" => json_encode([
                    "recipient" => $subscriber->email, //reciever
                    "sender" => "subscribexpenseng@gmail.com", //sender
                    "subject" => "EXPENSENG SUBSCRIPTION",
                    "cc" => "",
                    "bcc" => "",
                    "htmlBody" => "<div class='container'>
                    <div>
                        Hi $subscriber->name, You have been unsubscribed from recieving
                        updates on ExpenseNG.<br />
                        Regards.<br>
                    </div>
                    </div>",
                ])
            ]
        );
        
        
        $response = json_decode($response->getBody(), true);

        
        if ($response['status'] == 'success') {
            Session::flash(
                'flash_message',
                ' Subscription deleted successfully!'
            );
            return redirect(route('subscribe.view'));
        }else{
            Session::flash('error_message', ' Subscription was not deleted!');
            return redirect()->back(); 
        }
        } else {
            Session::flash('error_message', ' Subscription was not deleted!');
            return redirect()->back();
        }
    }
}
