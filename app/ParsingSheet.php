<?php


namespace App;

use App\Jobs\SaveCompanyName;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Console\Concerns\InteractsWithIO;
use function GuzzleHttp\Psr7\str;

class ParsingSheet
{
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
                'Connection' => 'keep-alive'
            ],
        ]);
    }

    /**
     * @param $url
     * @return bool
     */
    private function urlExists($url): bool
    {
        try {
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_TIMEOUT, 15);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_exec($ch);
            $returnedStatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if ($returnedStatusCode == 404) {
                curl_close($ch);
                Reports::whereLink($url)->delete();
                return false;
            } else {
                curl_close($ch);
                return true;
            }
        } catch (\Exception $exception) {
            return false;
        }
    }

    public function dailyReport()
    {
        $reports = Report::where('parsed', '=', false)->where('type', "LIKE", "daily%")->orderBy('id', 'DESC')->get();
        if (!empty($reports)) {
            foreach ($reports as $report) {
                if (!$this->urlExists($report->link)) {
                    echo "file not found ".$report->link."\n";
                    continue;
                }
                try {
                    $basename = basename($report->link, '.xlsx');
                    $array = explode('-', $basename);
                    $date_pattern = 'd-m-Y';
                    if (strlen(end($array)) < 4) {
                        $date_pattern = 'd-m-y';
                    } elseif (strlen(end($array)) > 4) {
                        $basename = substr($basename, 0, strlen($basename) - (strlen(end($array))-4));
                    }
                    $date = Carbon::createFromFormat($date_pattern, $basename)->format('Y-m-d');
                    $response = $this->http->post('api/', [

                        "body" => json_encode([
                            "file_path" =>
                                trim($report->link),
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
                        $keys = array_keys($test);
                        $check1 = preg_match('/\d+-\d+\w*/i', $keys[0]);
                        $check2 = preg_match('/\d+/i', $keys[1]);
                        $check5 = preg_match('/\d+/i', $keys[2]);
                        $check3 = preg_match('/\d+/i', $keys[4]);
                        $check4 = isset($keys[5]) ? preg_match('/\d+/i', $keys[5]) : false;
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
                            Report::whereId($report->id)->update(['parsed' => true]);
                            echo "parsed and logged ".$report->link."\n";
                            sleep(7);
                        } else {
                            echo 'not logged in '.$report->link."\n";
                        };
                    }
                    if ($status == 500) {
                        echo "internal server error \n";
                    }
                } catch (\Exception $exception) {
                    echo "server error ".$report->link ." \n";
                    sleep(5);
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
        $check_company = Payment::whereBeneficiary(isset($response2["beneficiary name"])? $response2["beneficiary name"]
            :$response3[3])->first();
        $create = Payment::create(array(
            'payment_no' => isset($response2["payment no"])?$response2["payment no"] : $response3[0],
            'payment_code' => isset($response2["payer code"])?$response2["payer code"] :$response3[1],
            'organization' => isset($response2["organisation name"])? $response2["organisation name"] : $response3[2],
            'beneficiary' => isset($response2["beneficiary name"])? $response2["beneficiary name"] :$response3[3],
            'amount' => isset($response2["amount"])? $response2["amount"] :$response3[4],
            'payment_date'=> $date,
            'description' => isset($response2["description"])? $response2["description"]
                : (isset($response3[5]) ? $response3[5]   : "not stated")
        ));
        if (empty($check_company)) {
            SaveCompanyName::dispatch($create->id);
        }
        if ($create) {
            return true;
        } else {
            return false;
        }
    }
    private function savePayment2($response, $date)
    {

        $response2 = array_change_key_case($response, CASE_LOWER);
        $response3 = array_values($response2);
        $check = Payment::where('payment_no', '=', $response3[0])->first();
        if (!empty($check)) {
            return false;
        }
        $check_company = Payment::whereBeneficiary(isset($response2["beneficiary name"])? $response2["beneficiary name"]
            :$response3[4])->first();
        $create = Payment::create([
            'payment_no' => isset($response2["payment no"])?$response2["payment no"] : $response3[0],
            'payment_code' => isset($response2["payer code"])?$response2["payer code"] :$response3[2],
            'organization' => isset($response2["organisation name"])? $response2["organisation name"] : $response3[3],
            'beneficiary' => isset($response2["beneficiary name"])? $response2["beneficiary name"] :$response3[4],
            'amount' => isset($response2["amount"])? $response2["amount"] :$response3[5],
            'payment_date'=> $date,
            'description' => isset($response2["description"])?$response2["description"]
                :(isset($response3[6]) ? $response3[6]   : "not stated")
        ]);
        if (empty($check_company)) {
            SaveCompanyName::dispatch($create->id);
        }
        if ($create) {
            return true;
        } else {
            return false;
        }
    }
}
