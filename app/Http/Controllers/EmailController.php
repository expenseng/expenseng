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
            $email = $request->email;
            $message = $request->message;

            $url = self::API_URL ."/awsmail/";
            $body = [
                "recipient" => "expenseng@gmail.com",
                "sender" => "expenseng@gmail.com",
                "subject" => $email,
                "body" => $message,
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
