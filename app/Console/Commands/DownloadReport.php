<?php

namespace App\Console\Commands;

use App\Scrapping;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DownloadReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'PastReportLogging';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Download excel files from scrapping through website';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            $scrapping = new Scrapping();
            $payment = $scrapping->openTreasury('2019')->latest()->initialLogToDatabase();
            $payment = $scrapping->openTreasury('2018')->latest()->initialLogToDatabase();
            $budget_funcCat = $scrapping->openTreasury('2019', Scrapping::monthlyBudgetPattern)->initialLogToDatabase();
            $budget_funcCat = $scrapping->openTreasury('2018', Scrapping::monthlyBudgetPattern)->initialLogToDatabase();
            $budget_qfuncCat = $scrapping->openTreasury('2018', Scrapping::quarterlyBudgetPattern)->initialLogToDatabase();
            $budget_qfuncCat = $scrapping->openTreasury('2019', Scrapping::quarterlyBudgetPattern)->initialLogToDatabase();
            echo "loggedTodatabase \n";
        } catch (\Exception $e) {
            $this->error('error occurred'.$e->getMessage() );
        }

        return 0;
    }
}
