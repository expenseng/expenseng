<?php

namespace App\Console\Commands;


use App\ParsingSheet;
use Illuminate\Console\Command;


class ParseSheet extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parse:sheet {type?}';

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
        $type = $this->argument('type');
        if ($type == 'daily') {
            $this->info('Parsing daily Sheets ');
            $daily = new ParsingSheet();
            $daily->dailyReport();
            $this->info('Parsing done');
        } elseif ($type == 'monthly') {
            $this->info('Parsing monthly Sheets ');
            $daily = new ParsingSheet();
            $daily->monthlyBudget();
            $this->info('Parsing done');
            return 0;
        } elseif ($type == 'quarterly') {
            $this->info('Parsing quarterly Sheets ');
            $daily = new ParsingSheet();
            $daily->quarterlyBudget();
            $this->info('Parsing done');
        }
        return 0;
    }
}
