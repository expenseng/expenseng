<?php

namespace App\Console\Commands;

use App\ParsingSheet;
use Carbon\Carbon;
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
            $this->parseDaily();
        } elseif ($type == 'monthly') {
            $this->parseMonthly();
        } elseif ($type == 'quarterly') {
            $this->parseQuarterly();
        } else {
            $day = (int) Carbon::now()->format('d');
            $month = (int) Carbon::now()->format('m');
            $end = (int) Carbon::now()->endOfMonth()->format('d');
            $this->parseDaily();
            if ($day == $end) {
                $this->parseMonthly();
            }
            if ((($month  % 4) == 0)  && ($day == $end)) {
                $this->parseQuarterly();
            }
            $this->info('done');
        }
        return 0;
    }
    public function parseDaily()
    {
        $this->info('Parsing daily Sheets ');
        $parse = new ParsingSheet();
        $parse->dailyReport();
        $this->info('Parsing done');
    }

    public function parseMonthly()
    {
        $this->info('Parsing monthly Sheets ');
        $parse = new ParsingSheet();
        $parse->monthlyBudget();
        $this->info('Parsing done');
    }

    public function parseQuarterly()
    {
        $this->info('Parsing monthly Sheets ');
        $parse = new ParsingSheet();
        $parse->quarterlyBudget();
        $this->info('Parsing done');
    }
}
