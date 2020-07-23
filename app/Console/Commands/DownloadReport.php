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
    protected $signature = 'ReportLogging';

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
            $payment = $scrapping->openTreasury('2020')->latest()->logToDatabase();
            $budget_funcCat = $scrapping->openTreasury('2020', Scrapping::monthlyBudgetPattern)->filterClassification()->latestAll()->logToDatabase();
            $budget_qfuncCat = $scrapping->openTreasury('2020', Scrapping::quarterlyBudgetPattern)->filterClassification()->latestALL()->logToDatabase();
            echo "loggedTodatabase \n";
        } catch (\Exception $e) {
            $this->error('error occurred');
        }

        return 0;
    }
}
