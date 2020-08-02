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
         $schedule->command('parse:daily')->everyMinute()->sendOutputTo(asset('/public/file/daily.txt'))
             ->withoutOverlapping();
         $schedule->command('parse:monthly')->monthly()->lastDayOfMonth()
             ->sendOutputTo(asset('/public/file/monthlytxt'))
             ->withoutOverlapping();
         $schedule->command('parse:quarterly')->everyMinute()
             ->sendOutputTo(asset('/public/file/quarter.txt'))
             ->withoutOverlapping();
         $schedule->command('queue:work --once --queue=ceSearch')->hourly();
         $schedule->command('queue:work  --queue=default --stop-when-empty')->everyMinute()->withoutOverlapping();
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
