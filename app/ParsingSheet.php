<?php


namespace App;

use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Console\Concerns\InteractsWithIO;

class ParsingSheet
{
    use InteractsWithIO;
    /**
     * declaring http.
     *
     * @var string
     */
    private $http;
    /**
     * uri for sending parse api.
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
            ],
            'timeout' => 15
        ]);
    }

    public function dailyReport()
    {
        $reports = Report::where('parsed', '=', false)->where('type', "LIKE", "%daily%")->get();
        if (!empty($reports)) {
            foreach ($reports as $report) {
                try {
                    $basename = basename($report->link, '.xlsx');
                    $array = explode('-', $basename);
                    $date_pattern = 'd-m-Y';
                    if (strlen(end($array)) < 4) {
                        $date_pattern = 'd-m-y';
                    }
                    $date = Carbon::createFromFormat($date_pattern, $basename)->format('Y-m-d');
                    $response = $this->http->post('api/', [

                        "body" => json_encode([
                            "file_path" =>
                                $report->link,
                            "row_from"=> 15,
                            "row_to" => 150,
                            "API_KEY" => "random25stringsisneeded"
                        ])

                    ]);
                    $status = $response->getStatusCode();
                    if ($status == 200) {
                        $responses = json_decode($response->getBody(), true);
                        if (empty($responses)) {
                            continue;
                        }
                        $test = array_change_key_case($responses[0], CASE_LOWER);
                        var_dump($test);
                        $keys = array_keys($test);
                        $check1 = preg_match('/\d+-\d+\w*/i', $keys[0]);
                        $check2 = preg_match('/\d+/i', $keys[1]);
                        $check3 = preg_match('/\d+/i', $keys[4]);
                        if (($check1 && $check2 && $check3)) {
                            $check = Payment::where('payment_no', '=', $keys[0])->first();
                            if (empty($check)) {
                                Payment::create([
                                'payment_no' =>  $keys[0],
                                'payment_code' => $keys[1],
                                'organization' => $keys[2],
                                'beneficiary' => $keys[3],
                                'amount' =>$keys[4],
                                'payment_date'=> $date,
                                'description' => substr($keys[5], 0, 225)
                                ]);
                            }
                        }
                        if (array_key_exists('payment no', $test) || ($check1 && $check2 && $check3)) {
                            foreach ($responses as $data) {
                                try {
                                    $this->savePayment($data, $date);
                                } catch (\Exception $e) {
                                    echo $e->getMessage();
                                }
                            }
                            Report::whereId($report->id)->update(['parsed' => true]);
                            echo "parsed and logged ".$report->link."\n";
                        } else {
                            echo 'not logged in '.$report->link."\n";
                        };
                    }
                } catch (\Exception $exception) {
                    echo "server timeout ".$report->link ." \n";
                    continue;
                }
            }
        }
        return $this;
    }
    private function savePayment($response, $date)
    {

        $response2 = array_change_key_case($response, CASE_LOWER);
        $response3 = array_values($response2);
        $check = Payment::where('payment_no', '=', $response3[0])->first();
        if (!empty($check)) {
            return false;
        }
        $create = Payment::create([
            'payment_no' => isset($response2["payment no"])?$response2["payment no"] : $response3[0],
            'payment_code' => isset($response2["payer code"])?$response2["payer code"] :$response3[1],
            'organization' => isset($response2["organisation name"])? $response2["organisation name"] : $response3[2],
            'beneficiary' => isset($response2["beneficiary name"])? $response2["beneficiary name"] :$response3[3],
            'amount' => isset($response2["amount"])? $response2["amount"] :$response3[4],
            'payment_date'=> $date,
            'description' => substr(isset($response2["description"])?$response2["description"] :$response3[5], 0, 225)
        ]);
        if ($create) {
            return true;
        } else {
            return false;
        }
    }
}
