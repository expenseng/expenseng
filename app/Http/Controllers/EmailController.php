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
                        <table style='background-color: #237D77; height: 279px; width:909px' align='center'>
                            <tr>
                                <td>
                            <h></h>
                                </td>
                            </tr>
                        </table>
                    </tr>

                <tr>
                    <table border='0' cellpadding='0' cellspacing='0' style='max-width: 616px; width: 100%; margin-top: 30px; position: relative; top: -280px;' align='center' >
                    <tr>
                        <td style='background-color: #fff; background-color: #FFF; height: 100px; margin-top: 30px; padding-top: 0px; z-index: 999' align='center'>
                            <img src='image/logo1.svg' style='background-color: #fff; position: relative; top: -18px;'>
                        </td>
                    </tr>
                    <tr>
                        <td style='background-color: #; position: relative; height: 258px; background-color: #F9F9F9; width: 110%; margin-left: -15px;' align='center'>
                            <img src='image/emojione_open-mailbox-with-raised-flag.png' style='margin-top: -45px; position: relative; right: 2.5%;'>
                            <h1 style=' font-weight: bold; position: relative; right: 2.5%; font-family: Lato;'>New Message</h1>
                            <h2 style='font-size: 1.3rem; position: relative; right: 2.5%; font-family: Lato;'>You have a new inquiry from ExpenseNG</h2>
                        </td>
                    </tr>
                    <tr style='background-color: #fff;'>
                        <td>
                            <table border='0' cellpadding='0' style='width: 100%; padding:  0px 40px '>
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
                                            color: #353A45;'>John Doe</p>
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
                                            color: #00945E;'>johndoe@gmail.com</p>
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
                                            color: #00945E;'>+2347035276354</p>
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
                                            color: #353A45;'>Hello</p>
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
                                            color: #353A45; margin-bottom: 132px;'>Ullamcorper velit, eleifend at neque dictumst massa arcu lectus mi. Porttitor id morbi fusce augue. In in erat pharetra, lorem vitae. Id eget adipiscing phasellus elementum eu.</p>

                                    </td>
                                </tr>
                        <td align='center'>
                            <button style='background-color: #fff; padding: 20px 40px;
                                width:  15rem;
                                height: 4.4rem;
                                background-color: #00945E !important;
                                border: 1px solid #FFFFFF;
                                box-sizing: border-box;
                                box-shadow: 0px 0px 1px rgba(0, 0, 0, 0.04), 0px 0px 2px rgba(0, 0, 0, 0.06), 0px 4px 8px rgba(0, 0, 0, 0.04);
                                border-radius: 8px;
                                margin-bottom: 20px;
                                font-family: Lato !important;
                                font-style: normal !important;
                                font-weight: bold !important;
                                font-size: 1rem;
                                line-height: 152%;
                                color: #FFFFFF !important;' onMouseOver='this.style.color='#b2beb5''
                   onMouseOut='this.style.color='#FFF''>Go to admin site</button>
                        </td>
                            </table>
                        </td>
                    </tr>
                    <tr>
                    </tr>
                </table>
                </table>
                    <div align='center' style='margin-top: -230px'>
                                <img src='footer.png'>
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
