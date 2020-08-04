<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Deploy extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'deploy';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deploy this app with one single command';

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
        $this->info("Seat tight while the robots work 🛠⚙🔧🔨");
        /**
         * Run a fresh migration plus seeding
         * */
        $this->call('migrate:fresh', ['--seed' => true]);

        /**
         * Crawl https://opentreasury.com.ng and retrieve needed CSV links
         * */
        if (app()->environment(['development', 'local', 'testing'])) {
            /**Minizing database usage on test server */
            $this->call('ReportLogging', ['year' => '2020']);
        } else {
            $this->call('ReportLogging', ['year' => '2018']);
            $this->call('ReportLogging', ['year' => '2019']);
            $this->call('ReportLogging', ['year' => '2020']);
        }

        /**
         * Parse  and persist sheets for the budgets table
         */
        $this->call('persist:budget', ['year' => '2018']);
        $this->call('persist:budget', ['year' => '2019']);
        $this->call('persist:budget', ['year' => '2020']);

        $this->info("All done! This app has been returned to a clean slate 🔰🧰");

        return 0;
    }
}
