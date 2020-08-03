<?php

namespace App\Console\Commands;

use App\Http\Controllers\TwitterBot;
use App\Tweet;
use Illuminate\Console\Command;

class budgetTweet extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'BudgetTweet';

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
        $bot = new TwitterBot();
        $tweet = $bot->budgetTweet();
        $tweet = $bot->budgetTweet();
        $tweet = new Tweet($tweet);
        $tweet->HashTag('expenseng')->send();

    }
}
