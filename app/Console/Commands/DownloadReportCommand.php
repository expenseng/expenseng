<?php

namespace App\Console\Commands;
use App\DownloadReport;
use Illuminate\Console\Command;

class DownloadReportCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'download:reports';

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
        $reports = new DownloadReport;
        $reports->download();
        $this->info('done');
        return 0;
    }
}
