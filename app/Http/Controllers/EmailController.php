<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use function GuzzleHttp\json_decode;
        
class EmailController extends Controller
{
    const API_URL = "https://email.microapi.dev/v1";

    public function __construct()
    {
       $this->client = new Client(); 
    }

    public function sendMail(request $request)
    {
        try
        {
            $name = $request->name;
            $email = $request->email;
            $message = $request->message;
            $phone = $request->phone;

            $final_message = Concat($name, $email, $phone, $message);

            $url = self::API_URL ."/awsmail/";
            $body = [
                "recipient" => "expenseng@gmail.com",
                "sender" => "expenseng@gmail.com",
                "subject" => "FG Expense",
                "body" => $final_message,
                "cc" => " ",
                "bcc" => " "
            ];
            $response = $this->client->post($url, ['form_params' => $body]);
            $result = json_decode($response->getBody()->getContents());
            Session::flash('flash_message', 'Thanks for contacting us!');
            return redirect()->back();
        }
        catch (RequestException $e)
        {
            Session::flash('error_message', 'Unable to send, please try again!');
            return redirect()->back();
        }
    }
}

function Concat($string1, $string2, $string3, $string4){
    $string1 = "Fullname: ".$string1."\n";
    $string1 .= "Email: ".$string2."\n";
    $string1 .= "Phone number: ".$string3."\n";
    $string1 .= "Message: ".$string4."\n";

    return $string1;
}
