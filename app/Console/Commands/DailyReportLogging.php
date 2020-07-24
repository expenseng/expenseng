<?php

namespace App\Console\Commands;

use App\Scrapping;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DailyReportLogging extends Command
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
    protected $description = 'Command description';

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
            $year = ''.Carbon::now()->year;
            $payment = $scrapping->openTreasury($year)->latest()->initialLogToDatabase();
            $budget_funcCat = $scrapping->openTreasury($year, Scrapping::monthlyBudgetPattern)->initialLogToDatabase();
            $budget_qfuncCat = $scrapping->openTreasury($year, Scrapping::quarterlyBudgetPattern)->initialLogToDatabase();
            echo "loggedTodatabase \n";
        } catch (\Exception $e) {
            $this->error('error occurred'.$e->getMessage());
        }
        return 0;
    }
}
