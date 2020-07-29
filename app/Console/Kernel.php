<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
        Commands\ConnectToStreamingAPI::class,
        Commands\ParseSheet::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
         $schedule->command('SendTweet')->monthly();
         $schedule->command('budgetTweet')->weekly()->mondays()->at('13:00');
         $schedule->command('ReportLogging')->daily();
         $schedule->command('parse:daily')->everyMinute();
         $schedule->command('parse:sheet')->everyMinute();
         $schedule->command('queue:work --once')->hourly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
