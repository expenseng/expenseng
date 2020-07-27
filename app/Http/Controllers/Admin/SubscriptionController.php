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
        $recent_activites = Activites::where('status', 'pending')->orderBY('id', 'DESC')
            ->limit(7)
            ->get();
        $total_activity = count(Activites::all()->where('status', 'pending'));
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
                'description' =>$request->name . ' subscribed to recieve latest updates',
                'username' => $request->name,
                'privilage' => 'subscriber',
                'status' => 'pending'
                ]);
                $response = $this->http->post('sendmailwithtemplate/', [

                    "body" => json_encode([
                        "recipient" => $request->email, //reciever
                        "sender" => "subscribexpenseng@gmail.com", //sender
                        "subject" => "EXPENSENG SUBSCRIPTION",
                        "cc" => "",
                        "bcc" => "",
                        "htmlBody" => "
                        <head>
                        <meta charset='UTF-8'>
                        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                        <title>Email Confirmation</title>
                        <link href='https://fonts.googleapis.com/css2?family=Lato&display=swap' rel='stylesheet' />
                        <link href='/css/email.css' rel='stylesheet' />
                        </head>

                        <body>
                            <div class='div1'>
                                <div class='div2'>
                                    <div class='div3'><img src='/img/logo.png' alt=''></div>
                                    <div class='div4'><img src='{{ asset('/img/Emoji.png') }}'
                                    alt=''></div>
                                    <h1 class='hh1 text'>Congratulations!</h1>
                                    <p class='hh2 text'>Dear $request->name, Your subscription to <span class='hh3 text'>$request->sub_type</span>
                                        has been confirmed. You will hereby be receiving emails from us 
                                        anytime there’s an update on the report.
                                    </p>
                                    <p class='hh4 text'>
                                        If you didn’t request for this subscription or you want to opt-out, 
                                        you can <a href='#' class='link1'>Unsubscribe here</a>
                                    </p>
                                    <div class='div5'>
                                        <div class='div7'>
                                            <a href='twitter.com/expenseng'><button class='div6'><img src='/img/twitter.png' 
                                            alt=''>&nbsp; @expenseng</button></a>
                                        </div> 
                                        <h2 class='hh5 text'><a href='twitter.com/expenseng' class='link2'>Join the conversation on Twitter</a></h2>
                                    </div>
                                </div>
                            </div>
                        </body>
                        </html>

                    ",
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
                        "htmlBody" => 
                        "
                        <head>
                        <meta charset='UTF-8'>
                        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                        <title>Email Confirmation</title>
                        <link href='https://fonts.googleapis.com/css2?family=Lato&display=swap' rel='stylesheet' />
                        <link href='/css/email.css' rel='stylesheet' />
                        </head>

                        <body>
                            <div class='div1'>
                                <div class='div2'>
                                    <div class='div3'><img src='/img/logo.png' alt=''></div>
                                    <div class='div4'><img src='{{ asset('/img/Emoji.png') }}'
                                    alt=''></div>
                                    <h1 class='hh1 text'>Congratulations!</h1>
                                    <p class='hh2 text'>Dear $request->name, Your subscription has been changed to <span class='hh3 text'>$request->sub_type</span>
                                    You will hereby be receiving emails from us anytime there’s an update on the report.
                                    </p>
                                    <p class='hh4 text'>
                                        If you didn’t request for this subscription or you want to opt-out, 
                                        you can <a href='#' class='link1'>Unsubscribe here</a>
                                    </p>
                                    <div class='div5'>
                                        <div class='div7'>
                                            <a href='twitter.com/expenseng'><button class='div6'><img src='/img/twitter.png' 
                                            alt=''>&nbsp; @expenseng</button></a>
                                        </div> 
                                        <h2 class='hh5 text'><a href='twitter.com/expenseng' class='link2'>Join the conversation on Twitter</a></h2>
                                    </div>
                                </div>
                            </div>
                        </body>
                        </html>
                        ",
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
                        "htmlBody" => "
                        <head>
                        <meta charset='UTF-8'>
                        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                        <title>Email Confirmation</title>
                        <link href='https://fonts.googleapis.com/css2?family=Lato&display=swap' rel='stylesheet' />
                        <link href='/css/email.css' rel='stylesheet' />
                        </head>

                        <body>
                            <div class='div1'>
                                <div class='div2'>
                                    <div class='div3'><img src='/img/logo.png' alt=''></div>
                                    <div class='div4'><img src='{{ asset('/img/Emoji.png') }}'
                                    alt=''></div>
                                    <h1 class='hh1 text'>Unsubscribed!</h1>
                                    <p class='hh2 text'>Dear $request->name, Your email has been changed for  <span class='hh3 text'>$request->sub_type</span> subscription.
                                        Your subscription has been deleted. You will no longer be receiving emails from us 
                                        regarding updates on the report.
                                    <
                                    <div class='div5'>
                                        <div class='div7'>
                                            <a href='twitter.com/expenseng'><button class='div6'><img src='/img/twitter.png' 
                                            alt=''>&nbsp; @expenseng</button></a>
                                        </div> 
                                        <h2 class='hh5 text'><a href='twitter.com/expenseng' class='link2'>Join the conversation on Twitter</a></h2>
                                    </div>
                                </div>
                            </div>
                        </body>
                        </html>

                        ",
                    ])
                ]
            );
                //send email to new email
                $response = $this->http->post('sendmailwithtemplate/', [

                    "body" => json_encode([
                        "recipient" => $request->email, //reciever
                        "sender" => "subscribexpenseng@gmail.com", //sender
                        "subject" => "EXPENSENG SUBSCRIPTION",
                        "cc" => "",
                        "bcc" => "",
                        "htmlBody" => "
                        <head>
                        <meta charset='UTF-8'>
                        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                        <title>Email Confirmation</title>
                        <link href='https://fonts.googleapis.com/css2?family=Lato&display=swap' rel='stylesheet' />
                        <link href='/css/email.css' rel='stylesheet' />
                        </head>

                        <body>
                            <div class='div1'>
                                <div class='div2'>
                                    <div class='div3'><img src='/img/logo.png' alt=''></div>
                                    <div class='div4'><img src='{{ asset('/img/Emoji.png') }}'
                                    alt=''></div>
                                    <h1 class='hh1 text'>Congratulations!</h1>
                                    <p class='hh2 text'>Dear $request->name, Your  email subscription to <span class='hh3 text'>$request->sub_type</span>
                                        has been changed. You will hereby be receiving emails from us 
                                        anytime there’s an update on the report.
                                    </p>
                                    <p class='hh4 text'>
                                        If you didn’t request for this subscription or you want to opt-out, 
                                        you can <a href='#' class='link1'>Unsubscribe here</a>
                                    </p>
                                    <div class='div5'>
                                        <div class='div7'>
                                            <a href='twitter.com/expenseng'><button class='div6'><img src='/img/twitter.png' 
                                            alt=''>&nbsp; @expenseng</button></a>
                                        </div> 
                                        <h2 class='hh5 text'><a href='twitter.com/expenseng' class='link2'>Join the conversation on Twitter</a></h2>
                                    </div>
                                </div>
                            </div>
                        </body>
                        </html>

                        ",
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
        $name = $subscriber->name;
        $sub_type = $subscriber->subscription_type;
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
                    "htmlBody" =>
                    "
                    <head>
                    <meta charset='UTF-8'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <title>Email Confirmation</title>
                    <link href='https://fonts.googleapis.com/css2?family=Lato&display=swap' rel='stylesheet' />
                    <link href='/css/email.css' rel='stylesheet' />
                    </head>

                    <body>
                        <div class='div1'>
                            <div class='div2'>
                                <div class='div3'><img src='/img/logo.png' alt=''></div>
                                <div class='div4'><img src='{{ asset('/img/Emoji.png') }}'
                                alt=''></div>
                                <h1 class='hh1 text'>Unsubscribed!</h1>
                                <p class='hh2 text'>Dear $name, Your email has been removed from  <span class='hh3 text'>$sub_type</span> subscription.
                                    Your subscription has been deleted. You will no longer be receiving emails from us 
                                    regarding updates on the report.

                                <div class='div5'>
                                    <div class='div7'>
                                        <a href='twitter.com/expenseng'><button class='div6'><img src='/img/twitter.png' 
                                        alt=''>&nbsp; @expenseng</button></a>
                                    </div> 
                                    <h2 class='hh5 text'><a href='twitter.com/expenseng' class='link2'>Join the conversation on Twitter</a></h2>
                                </div>
                            </div>
                        </div>
                    </body>
                    </html>

                    ",
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
