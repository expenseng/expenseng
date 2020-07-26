<?php

namespace App\Console\Commands;

use App\ParsingSheet;
use Illuminate\Console\Command;

class ParseDailySheet extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parse:daily';

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
        $this->info('Parsing Sheets ');
        $daily = new ParsingSheet();
        $daily->dailyReport();
        $this->info('Parsing done');
        return 0;
    }
}
