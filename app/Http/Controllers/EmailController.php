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
            $subject = $request->subject;
            $phone = $request->phone;

            $url = self::API_URL ."/sendmailwithtemplate/";
            $body = [
                "recipient" => "expenseng@gmail.com",
                "sender" => "phemmylintry@gmail.com",
                "subject" => "MESSAGE FROM EXPENSENG",
                "cc" => " ",
                "bcc" => " ",
                "htmlBody" => "

                <center style='background-color: #F1F1F1; max-width: 100%; width: 100%;'>
                <table align='center' style=' padding: 0;
                                margin: 0;
                                font-weight: normal;
                                background-color: #F1F1F1;
                                             height: 100%;'>
                   <tr>
                        <table style='background-color: #00945E; height: 279px; width:930px' align='center'>
                        <table border='0' cellpadding='0' cellspacing='0' style='max-width: 616px; width: 100%; margin-top: 30px; position: relative; top: -280px;' align='center' >
                    <tr style='background-color: #fff;'>
                        <td>
                            <table border='0' cellpadding='0' style='width: 100%; padding:  0px 40px '>
                            <tr>
                        <td style='background-color: #fff; background-color: #FFF; height: 100px; margin-top: 30px; padding-top: 0px; z-index: 999' align='center'>
                            <h1 style='color: #00945E; background-color: #fff; position: relative; top: -18px;'><b>ExpenseNG.com</b></h1>
                        </td>
                    </tr>
                            <tr>
                        <td style='color:#000000; background-color: #00945E; position: relative; height: 200px; width: 110%;' align='center'>
                            <h1 style='font-size: 30px;line-height: 124.8%; font-weight: bold; position: relative; right: 2.5%; font-family: Lato;'>New Message</h1>
                            <h2 style='font-size: 22px;line-height: 124.8%; position: relative; right: 2.5%; font-family: Lato;'>You have a new inquiry from ExpenseNG</h2>
                        </td>
                    </tr>
                                <tr>
                                    <td style='background-color: #fff;'>
                                        <h3 style='background-color: #fff;   font-family: Lato;
                                            font-style: normal;
                                            font-weight: bold;
                                            font-size: 21px;
                                            line-height: 152%;
                                            color: #353A45;'>Full Name</h3>
                                        <p style='background-color: #fff; font-family: Lato;
                                            font-style: normal;
                                            font-weight: normal;
                                            font-size: 20px;
                                            line-height: 152%;
                                            color: #353A45;'>$name</p>
                                        <hr>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr style='background-color: #fff'>
                        <td>
                            <table border='0' cellpadding='0' style='width: 100%; padding:  0px 40px'>
                                <tr>
                                    <td style='background-color: #fff; max-width: 2px; width: 50%;'>
                                        <h3 style='background-color: #fff;   font-family: Lato;
                                            font-style: normal;
                                            font-weight: bold;
                                            font-size: 21px;
                                            line-height: 152%;
                                            color: #353A45;'>Email</h3>
                                        <p style='background-color: #fff; font-family: Lato;
                                            font-style: normal;
                                            font-weight: normal;
                                            font-size: 20px;
                                            line-height: 152%;
                                            color: #00945E;'>$email</p>
                                        <hr style='margin-right: 30px'>
                                    </td>
                                    <td style='background-color: #fff; max-width: 270px; width: 50%;'>
                                        <h3 style='background-color: #fff;   font-family: Lato;
                                            font-style: normal;
                                            font-weight: bold;
                                            font-size: 21px;
                                            line-height: 152%;
                                            color: #353A45;'>Phone Number</h3>
                                        <p style='background-color: #fff; font-family: Lato;
                                            font-style: normal;
                                            font-weight: normal;
                                            font-size: 20px;
                                            line-height: 152%;
                                            color: #00945E;'>$phone</p>
                                        <hr style=''>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr style='background-color: #fff'>
                        <td>
                            <table border='0' cellpadding='0' style='width: 100%; padding:  0px 40px'>
                                <tr>
                                    <td style='background-color: #fff;'>
                                        <h3 style='background-color: #fff;   font-family: Lato;
                                            font-style: normal;
                                            font-weight: bold;
                                            font-size: 21px;
                                            line-height: 152%;
                                            color: #353A45;'>Subject</h3>
                                        <p style='background-color: #fff; font-family: Lato;
                                            font-style: normal;
                                            font-weight: normal;
                                            font-size: 20px;
                                            line-height: 152%;
                                            color: #353A45;'>$subject</p>
                                        <hr>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr style='background-color: #fff'>
                        <td>
                            <table border='0' cellpadding='0' style='width: 100%; padding:  0px 40px'>
                                <tr>
                                    <td style='background-color: #fff;'>
                                        <h3 style='background-color: #fff;   font-family: Lato;
                                            font-style: normal;
                                            font-weight: bold;
                                            font-size: 21px;
                                            line-height: 152%;
                                            color: #353A45;'>Message</h3>
                                        <p style='background-color: #fff; font-family: Lato;
                                            font-style: normal;
                                            font-weight: normal;
                                            font-size: 20px;
                                            line-height: 152%;
                                            color: #353A45; margin-bottom: 132px;'>$message</p>

                                    </td>
                                </tr>
                        <td align='center'><a href='https://expenseng.com/login'>
                            <button style='background-color: #fff; padding: 20px 40px;
                                width:  15rem;
                                height: 4.4rem;
                                background-color: #00945E !important;
                                border: 1px solid #FFFFFF;
                                box-sizing: border-box;
                                box-shadow: 0px 0px 1px rgba(0, 0, 0, 0.04), 0px 0px 2px rgba(0, 0, 0, 0.06), 0px 4px 8px rgba(0, 0, 0, 0.04);
                                border-radius: 8px;
                                margin-bottom: 10px;
                                font-family: Lato !important;
                                font-style: normal !important;
                                font-weight: bold !important;
                                font-size: 1rem;
                                line-height: 152%;
                                padding: 20px 40px
                                color: #FFFFFF !important;' onMouseOver='this.style.color='#b2beb5''
                   onMouseOut='this.style.color='#FFF''>Go to admin site</button></a>
                        </td>
                            </table>
                        </td>
                    </tr>
                    <tr>
                    </tr>
                </table>
                </table>
                            <tr>
                                <td>
                            <h></h>
                                </td>
                            </tr>
                        </table>
                    </tr>

                <tr>
                    <div background-color: #1F2430;'>
                        <p style='color: #000000'>Copyright 2020 ExpenseNG.com All rights reserved</p>
                    </div>
                </center>
                </body>"
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
