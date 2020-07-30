<?php

namespace App\Console\Commands;

use App\ParsingSheet;
use Illuminate\Console\Command;

class ParseMonthlyReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parse:monthly';

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
        $this->info('Parsing monthly Sheets ');
        $daily = new ParsingSheet();
        $daily->monthlyBudget();
        $this->info('Parsing done');
        return 0;

    }
}
