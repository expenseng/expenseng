<?php

namespace App\Http\Controllers\Admin;

use App\Report;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MonthlyBudget;
use App\Payment;
use App\QuarterlyBudget;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;

class SheetController extends Controller
{
    /**
     * Declaring http.
     *
     * @var string
     */
    private $http;

    /**
     * Uri for sending parse api.
     *
     * @var string
     */
    private $baseUri = "https://excel.microapi.dev/";

    public function __construct()
    {
        $this->baseUri = "https://excel.microapi.dev/";

        $this->http = new Client([
            'base_uri' => $this->baseUri,
            'headers' => [
                'debug' => true,
                'Content-Type' => 'application/json',
            ]
        ]);
    }


    /**
     * Show sheets
     * @ return view
     */
    public function viewSheets()
    {
        $sheets = Report::all();

        return view('backend.sheet.sheets')
        ->with(['sheets'=> $sheets, 'count' => 0]);
    }


    /**
     * Parse Sheet from Admin dashboard
     * @return back()
     */
    public function parseSheet($id)
    {
        $sheet = Report::find($id);

        //if sheet does not exist in database return error
        if (empty($sheet)) {
            Session::flash('error_message', ' Sheet cannot be found in database');
            return redirect()->back();
        } else {
            //call api
            if ($sheet->parsed === !true) {
                if ($sheet->type === 'DAILYPAYMENT') {
                    $basename = basename($sheet->link, '.xlsx');
                        $array = explode('-', $basename);
                        $date_pattern = 'd-m-Y';
                        if (strlen(end($array)) < 4) {
                            $date_pattern = 'd-m-y';
                        } elseif (strlen(end($array)) > 4) {
                            $basename = substr($basename, 0, strlen($basename) - (strlen(end($array))-4));
                        }
                        $date = Carbon::createFromFormat($date_pattern, $basename)
                        ->format('Y-m-d');

                    $response = $this->http->post('api/', [

                        "body" => json_encode([
                            "file_path" =>
                            trim($sheet->link),
                            "row_from"=> 15,
                            "row_to" => 150,
                            "API_KEY" => "random25stringsisneeded"
                        ])
                    ]);
                    $status = $response->getStatusCode();
                    $responses = json_decode($response->getBody(), true);
                    
                    if($status == 200) {
                        if (empty($responses)) {
                            Session::flash('flash_message', 'No data found on sheet!!!');
                            return redirect()->back();
                        }
                        $test = array_change_key_case($responses[0], CASE_LOWER);
                        $keys = array_keys($test);
                        $check1 = preg_match('/\d+-\d+\w*/i', $keys[0]);
                        $check2 = preg_match('/\d+/i', $keys[1]);
                        $check5 = preg_match('/\d+/i', $keys[2]);
                        $check3 = preg_match('/\d+/i', $keys[4]);
                        $check4 = isset($keys[5]) ? preg_match('/\d+/i', $keys[5]) : false;

                        //if succesfully parsed insert to payment db
                        if (($check1 && $check2 && $check3 )) {
                            $check = Payment::where('payment_no', '=', $keys[0])->first();

                            if (empty($check)) {
                                Payment::create([
                                'payment_no' =>  $keys[0],
                                'payment_code' => $keys[1],
                                'organization' => $keys[2],
                                'beneficiary' => $keys[3],
                                'amount' =>$keys[4],
                                'payment_date'=> $date,
                                'description' => substr(isset($keys[5]) ? $keys[5] : "null", 0, 225)
                                ]);
                            }
                        }
                        if (($check1 && $check4 && $check5)) {
                            $check = Payment::where('payment_no', '=', $keys[0])->first();
                            if (empty($check)) {
                                Payment::create([
                                    'payment_no' =>  $keys[0],
                                    'payment_code' => $keys[2],
                                    'organization' => $keys[3],
                                    'beneficiary' => $keys[4],
                                    'amount' =>$keys[5],
                                    'payment_date'=> $date,
                                    'description' => isset($keys[6]) ? $keys[6] : "null"
                                ]);
                            }
                        }
                        if (array_key_exists('payment no', $test) || array_key_exists('payment no', $test)
                            || array_key_exists('payer code', $test)|| array_key_exists('code', $test)
                            || ($check1 && $check2 && $check3) || ($check1 && $check4 && $check5)) {
                            foreach ($responses as $data) {
                                try {
                                    if ($check1 && $check4 && $check5) {
                                        $this->savePayment2($data, $date);
                                    } else {
                                        $this->savePayment($data, $date);
                                    }
                                } catch (\Exception $e) {
                                    echo "database logging error \n";
                                }
                            }
                            Report::whereId($sheet->id)->update(['parsed' => true]);
                            Session::flash('flash_message', $sheet->link. ' details added to database successfully');
                            return redirect()->back();
                        } else {
                            Session::flash('flash_message', 'Could not add '.$sheet->link. ' details to database');
                        };

                    } else if ($status = 404) {
                        Session::flash('error_message', 'Sheet not parsed!!!');
                        return redirect()->back();
                    } else {
                        Session::flash('error_message', 'Error occurred, Sheet was not persisted!');
                    }
                } else if ($sheet->type == "MONTHLYBUDPERF") {


                    //do monthly
                    switch ($sheet->link) {
                        case (preg_match('/ADMIN/i', $sheet->link) != false):
                            $cat = "ADMIN";
                            break;
                        case (preg_match('/ECONOMIC/i', $sheet->link) != false):
                            $cat = "ECONOMIC";
                            break;
                        case (preg_match('/FUNCTION/i', $sheet->link) != false):
                            $cat = "FUNCTION";
                            break;
                        default:
                            $cat = " ";
                    }
                    try {
                        $month = basename($sheet->link, '.xlsx');
                        $response = $this->http->post('api/', [
    
                            "body" => json_encode([
                                "file_path" =>
                                    trim($sheet->link),
                                "API_KEY" => "random25stringsisneeded"
                            ])
                        ]);
                        $status = $response->getStatusCode(); // c
                        if ($status == 200) {
                            // get the body
                            $data = json_decode($response->getBody(), true);
                            if (empty($data)) {
                                Session::flash('flash_message', 'No data found for sheet');
                                return redirect()->back();
                            }
                                $data2 = array_values($data);
                               //save to database
                                $create = MonthlyBudget::create([
                                   "Name" => $data2[1],
                                    "code"=>$data2[0],
                                    "year_payments_till_date"=>$data2[4],
                                    "month"=>$month,
                                    "month_budget"=>$data2[3],
                                    "budget_amount"=>$data2[2],
                                    "budget_balance"=>$data2[5],
                                    "percentage"=>$data2[6],
                                    "categories"=>$cat
    
                                ]);
                            
                            //update report to parsed
                            Report::whereId($sheet->id)->update(['parsed' => true]);
                            Session::flash( "parsed and logged ".$sheet->link). "to database successfully!";
                            return redirect()->back();
                            
                        } else {
                            Session::error( 'error 505');
                            return redirect()->back();
                        }
                    } catch (\Exception $e) {
                         Session::flash('eror_message','server error, '.$sheet->link. ' was not parsed' );
                         return redirect()->back();
                    }


                } else {


                    //do quarterly
                    switch ($sheet->link) {
                        case (preg_match('/ADMIN/i', $sheet->link) != false):
                            $cat = "ADMIN";
                            break;
                        case (preg_match('/ECONOMIC/i', $sheet->link) != false):
                            $cat = "ECONOMIC";
                            break;
                        case (preg_match('/FUNCTION/i', $sheet->link) != false):
                            $cat = "FUNCTION";
                            break;
                        default:
                            $cat = " ";
                    }
                    try {
                        $quarter = basename($sheet->link, '.xlsx');
                        $response = $this->http->post('api/', [
    
                            "body" => json_encode([
                                "file_path" =>
                                    trim($sheet->link),
                                "API_KEY" => "random25stringsisneeded"
                            ])
                        ]);
                        $status = $response->getStatusCode(); // c
                        if ($status == 200) {
                            // get the body
                            $data = json_decode($response->getBody(), true);
                            if (empty($data)) {
                                Session::flash('flash_message', 'No data found for sheet');
                                return redirect()->back();
                            }
                                $data2 = array_values($data);
                               //save to database
                                $create = QuarterlyBudget::create([
                                   "Name" => $data2[1],
                                    "code"=>$data2[0],
                                    "year_payments_till_date"=>$data2[4],
                                    "quarter"=>$quarter,
                                    "quarter_budget"=>$data2[3],
                                    "budget_amount"=>$data2[2],
                                    "budget_balance"=>$data2[5],
                                    "percentage"=>$data2[6],
                                    "categories"=>$cat
    
                                ]);
                            
                            //update report to parsed
                            Report::whereId($sheet->id)->update(['parsed' => true]);
                            Session::flash( "parsed and logged ".$sheet->link). "to database successfully!";
                            return redirect()->back();
                            
                        } else {
                            Session::error( 'error 505');
                            return redirect()->back();
                        }
                    } catch (\Exception $e) {
                         Session::flash('eror_message','server error, '.$sheet->link. ' was not parsed' );
                         return redirect()->back();
                    }




                }
            } else {

                Session::flash('error_message', 'Sheet has been previously persisted!');
                return redirect()->back();
            }
        }

    }

}
