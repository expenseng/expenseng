<?php

namespace App\Console\Commands;

use App\Budget;
use App\Reports;
use GuzzleHttp\Client;
use Illuminate\Console\Command;

class BudgetCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = "persist:budget {year? : The year to parse the sheet for. Defaults to current year}";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->http = new Client([
            'base_uri' => "https://excel.microapi.dev/",
            'headers' => [
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

        $this->year = $this->argument('year') ?? date("Y");

        $reports = Reports::where('type', 'LIKE', '%MONTHLY%')
                    ->where('year', $this->year)->first();

        if($reports != null){
            $this->info("Report link found for year $this->year is " . $reports->link);

            //progress bar
            $this->bar = $this->output->createProgressBar(100);

            $this->bar->start();
    
            $budgets = $this->parse($reports->link);

            $this->bar->finish();

            $this->info(" \n All done ✨✨✨");

        }else{
            $this->info("Sorry, report for year $this->year could not be found");
        }        
    }

    public function parse($url){

        $request = $this->http->post('api/', [
            "body" => json_encode([
                "file_path" => $url,
                "row_from"=> 6,
                "row_to" => 52,
                "col_from" => 0,
                "col_to" => 3,
            ])
        ]);

        if($request->getStatusCode() == 200){
            $responses = json_decode($request->getBody(), true);

            try {
                foreach($responses as $response){

                    $budget = Budget::create([
                        'amount' => $response["BUDGET AMOUNT"] ?? 0.00,
                        'org_name' => $response["Name"],
                        'code' => $response["Code"],
                        'year' => $this->year,
                        'classification' => '',
                    ]);

                    if($budget instanceof Budget){
                        //show progress on progress bar
                        $this->bar->advance();
                    }else{
                        $this->info("Failed to parse or save budget for ". $response["Name"] . " in the database");
                    }
                }
            } catch (\Throwable $th) {
                $this->error('An unexpected error occured. For debugging see ' . $th->getMessage());
            }
        }
    }
}
