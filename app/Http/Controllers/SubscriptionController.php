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
            //send email
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
                                <p class='hh2 text'>Dear $request->name, Your subscription to <span class='hh3 text'>recieve latest updates</span>
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

            toastr()->success('You have successfully subscribed for this Report!');
            return  back();
        } else {
            toastr()->error('An error has occurred please try again later.');
            return back();
        }
    } else {
        toastr()->error('An error has occurred please try again later.');
        return back();
    }
}
}
