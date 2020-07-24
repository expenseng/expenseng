<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class ParseSheet extends Command
{
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
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        Log::info('Cron is working fine');
        try{
            Excel::import ('../../../public/file/01-04-20.xlsx', function ($reader) {
                foreach ($reader->toArray() as $row) {
                    echo $row;
                }
            }
            );
            $this->info('Sheet parsed successfully');
        }catch (Exception $e) {
            $this->info($e->getMessage() .' Sheet cannot be run');
        }

        //return 0;
    }
}
