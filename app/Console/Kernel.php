<?php

namespace App\Console;

use App\Jobs\UpdateContractorType;
use App\Report;
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
        Commands\JoinMinistryToPayment::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
         $schedule->command('SendTweet daily')
             ->hourly()
             ->between('08:01', '11:30');
         $schedule->command('SendTweet past')
             ->hourly()
             ->weekends()
             ->between('14:00', '18:00');
//         $schedule->command('budgetTweet')->weekly()->mondays()->at('13:00');
         $schedule->command('ReportLogging')->daily()->at('02:00');
         $schedule->command('parse:sheet')
             ->daily();
         $schedule->command('download:reports')->everyTwoMinutes();
         $schedule->command('queue:work --once --queue=ceoSearch')->everyFourHours();
         $schedule->command('queue:work  --queue=default --stop-when-empty')->daily();
         $schedule->command('make:slugs')->daily();
         $schedule->command('ministry:payment')->daily()->at('04:00');
         $schedule->command('update:contractors')->daily()->at('04:00');
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
