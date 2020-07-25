<?php

namespace App\Console\Commands;


use App\MonthlyBudget;
use App\Payment;
use App\QuarterlyBudget;
use App\Report;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;


class ParseSheet extends Command
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



    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parse:sheet';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'The cron job that parses downloaded sheets hourly';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
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
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        Log::info('Sheet parsing Cron is running');
        $this->info('Parsing Sheets ');
        try{
            $reports = Report::where('parsed', '!=', true)
                ->get();

            if (count ($reports ) > 0  ) {
                //consume api
                foreach ($reports as $report) {
                    try{
                        if ($report->type == 'DAILYPAYMENT' ) {
                            $this->info('Parsing:   ' . $report->link);

                            $date = basename($report->link, '.xlsx');

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
                            $responses = json_decode($response->getBody(), true);


                            if ($status == 200) {
                                foreach ($responses as $response) {


                                    $payment = new Payment();

                                    $payment->payment_no = $response["Payment No"];
                                    $payment->payment_code = $response["Payer Code"];
                                    $payment->organization = $response["ORGANIZATION NAME"];
                                    $payment->beneficiary = $response["Beneficiary Name"];
                                    $payment->amount = $response["Amount"];
                                    $payment->payment_date = $date;
                                    $payment->description = $response["Description"];

                                    $persist = $payment->save();
                                    if ($persist) {
                                        Report::where('id', $report->id)
                                        ->update(['parsed' => true]);
                                        $this->info($report->link .' Sheet parsed successfully');
                                    } else {
                                        $this->info('Persist Error:   '. $report->link . ' was not persisted');
                                    }
                                }

                            } else {
                                $this->info($report->link .' status not successful');
                            }
                        } else if ($report->type == 'MONTHLYBUDPERF') {
                            $this->info('Parsing:   ' . $report->link);
                            //do monthly parsing
                            $month = basename($report->link, 'xlsx');
                            $response = $this->http->post('api/', [

                                "body" => json_encode ([
                                    "file_path" =>
                                    $report->link,
                                    "API_KEY" => "random25stringsisneeded"
                                ])
                            ]);
                            $status = $response->getStatusCode();
                            $responses = json_decode($response->getBody(), true);


                            if ($status == 200) {
                                foreach ($responses as $response) {
                                    return print_r ($response);
                                    $monthly = new MonthlyBudget();
                                    $monthly->Name = $response["Name"];
                                    $monthly->code = $response["Code"];
                                    $monthly->year_payments_till_date = $response["PAYMENTS YTD"];
                                    $monthly->month = $month;
                                    $monthly->month_budget = $response["JAN" || "FEB" || "MAY"|| "APR" || "JUN" || "JUL" || "AUG" || "SEPT" || "OCT" || "NOV" || "DEC"];
                                    $monthly->budget_amount = $response["BUDGET AMOUNT"];
                                    $monthly->budget_balance = $response["BUDGET BALANCE"];
                                    $monthly->percentage = $response["PERCENTAGE"];

                                    $persist = $monthly->save();
                                    if ($persist) {
                                        Report::where('id', $report->id)
                                        ->update(['parsed' => true]);
                                        $this->info($report->link.' Monthly Sheet parsed successfully');
                                    } else {
                                        $this->info('Persist Error:   '. $report->link . ' was not persisted');
                                    }
                                }


                            } else {
                                $this->info($report->link .' status not successful');
                            }
                        } else {
                            //do quarterly parsing

                            $this->info('Parsing:   ' . $report->link);

                            $quarter = basename($report->link, 'xslx');

                            $response = $this->http->post('api/', [

                                "body" => json_encode([
                                    "file_path" =>
                                    $report->link,
                                    "API_KEY" => "random25stringsisneeded"
                                ])
                            ]);
                            $status = $response->getStatusCode();
                            $responses = json_decode($response->getBody(), true);





                            if ($status == 200) {
                                foreach ($responses as $response) {
                                    return print_r ($response);
                                    $quarterly = new QuarterlyBudget();
                                    $quarterly->Name = $response["Name"];
                                    $quarterly->code = $response["Code"];
                                    $quarterly->year_payments_till_date = $response["PAYMENTS YTD"];
                                    $quarterly->quarter = $quarter;
                                    $quarterly->quarter_budget = $response["1ST QUARTER" || "2ND QUARTER" || "3RD QUARTER" || "4TH QUARTER"];
                                    $quarterly->budget_amount = $response["BUDGET AMOUNT"];
                                    $quarterly->budget_balance = $response["BUDGET BALANCE"];
                                    $quarterly->percentage = $response["PERCENTAGE"];

                                    $persist = $quarterly->save();
                                    if ($persist) {
                                        Report::where('id', $report->id)
                                        ->update(['parsed' => true]);
                                        $this->info($report->link.' Quarterly Sheet parsed successfully');
                                    } else {
                                        $this->info('Persist Error:   '. $report->link . ' was not persisted');
                                    }
                                }

                            } else {
                                $this->info($report->link .' status not successful');
                            }
                        }
                    } catch (Exception $e) {
                        $this->error($e->getMessage());
                        $this->info($report->link .' Sheet not parsed');
                    }
                }
            }

            $this->info('Sheet parsed successfully');
        }catch (Exception $e) {
            $this->info($e->getMessage() .' Sheet cannot be run');
        }

        //return 0;
    }
}
