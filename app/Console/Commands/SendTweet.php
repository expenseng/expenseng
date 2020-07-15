<?php

namespace App\Console\Commands;

use App\Http\Controllers\TwitterBot;
use App\Payment;
use App\Tweet;
use Carbon\Carbon;
use Illuminate\Console\Command;
use mysql_xdevapi\Exception;

class SendTweet extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'SendTweet';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Resent update to tweet';

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
        $tweets = $bot->paymentTweets();
//        dd($tweets);
        foreach ($tweets as $tweet) {
            try {
                $tweet = new Tweet($tweet);
                $tweet->HashTag('expenseng')->send();
            } catch (\Exception $e) {
                continue;
            }
        }
    }
}
