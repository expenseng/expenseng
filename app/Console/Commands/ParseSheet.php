<?php

namespace App\Console\Commands;

use App\DailyPayment;
use App\Report;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use function GuzzleHttp\json_decode;

class ParseSheet extends Command
{
    /**
     * http.
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
        $this->info('Parsing Sheet');
        try{
            $links = Report::where('type', '=', 'DAILYPAYMENT')->where('parsed', '!=', true)
                ->get();

            if ( count($links ) > 0 ) {
                //consume api
                foreach ($links as $link){
                    try{
                        $response = $this->http->post('api/', [

                            "body" => json_encode([
                                "file_path" => 
                                $link->link,
                                "row_from"=> 15,
                                "row_to" => 150,
                                "col_from" => 0,
                                "col_to"=> 6,
                                "API_KEY" => "random25stringsisneeded"
                            ])
                        ]);
                        $status = $response->getStatusCode();
                        $response = json_decode($response->getBody(), true);
        
                
                        if ($status == 200) {
    
                            $persist = DailyPayment::insert($response);
                            if ($persist) {
                                Report::where('id', $link->id)
                                ->update(['parsed' => true]);
                            }
                            $this->info($link->link .' Sheet parsed successfully');

                        } else {
                            $this->info($link->link .' status not successful'); 
                        }
        
                    } catch (Exception $e) {
                        $this->error($e->getMessage());
                        $this->info($link->link .' Sheet not parsed');
                    }
                }
                
            } else {
                $this->info('Nothing to parse At the moment');
            }
            
        }catch (Exception $e) {
            $this->error($e->getMessage());
            $this->info(' Sheet cannot be run');
        }

        //return 0;
    }
}
