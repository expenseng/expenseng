<?php

namespace App\Console\Commands;

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
    protected $signature = "persist:budget {year=date('Y') : The year to parse the sheet for. Defaults to current year}";

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

        $this->year = $this->arguments('year');

        $reports = Reports::whereType('MONTHLYBUDPERF')
                    ->where('year', $this->year)->first();

        $this->info("Parsing budget sheets for $this->year");
        $this->info("Report link found for year $this->year is " . $reports->link);
        return 0;
    }
}
