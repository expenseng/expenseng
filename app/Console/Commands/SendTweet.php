<?php

namespace App\Console\Commands;

use App\Http\Controllers\TwitterBot;
use App\Payment;
use App\Tweet;
use Illuminate\Console\Command;

class SendTweet extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'SendTweet {type?}';

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
     * @return void
     */
    public function handle()
    {
        $type = $this->argument('type');
        if ($type == 'daily') {
            $bot = new TwitterBot();
            $tweets = $bot->dailyTweets();
            foreach ($tweets as $key => $tweet) {
                try {
                    $tweet = new Tweet($tweet);
                    $tweet = $tweet->HashTag('expenseng')
                        ->status(' https://expenseng.com/')->send();
                    if ($tweet) {
                        Payment::whereId($key)->update(['tweeted' => true,'tweet_id'=> json_decode($tweet)->id]);
                    }
                    $this->info('done');
                } catch (\Exception $e) {
                    if ($e->getMessage() == '[187] Status is a duplicate.') {
                        Payment::whereId($key)->update(['tweeted' => true]);
                        $this->info('done');
                    }
                    continue;
                }
            }
        } elseif ($type == 'past') {
            $bot = new TwitterBot();
            $tweets = $bot->pastTweets();
            foreach ($tweets as $key => $tweet) {
                try {
                    $tweet = new Tweet($tweet);
                    $tweet = $tweet->HashTag('expenseng')->status(' https://expenseng.com/')->send();
                    if ($tweet) {
                        Payment::whereId($key)->update(['tweeted' => true,'tweet_id'=> json_decode($tweet)->id]);
                    }
                    $this->info('done');
                } catch (\Exception $e) {
                    if ($e->getMessage() == '[187] Status is a duplicate.') {
                        Payment::whereId($key)->update(['tweeted' => true]);
                        $this->info('done');
                    }
                    continue;
                }
            }
        } else {
            $bot = new TwitterBot();
            $tweets = $bot->dailyTweets();
            foreach ($tweets as $key => $tweet) {
                try {
                    $tweet = new Tweet($tweet);
                    $tweet = $tweet->HashTag('expenseng')->status(' https://expenseng.com/')->send();
                    if ($tweet) {
                        Payment::whereId($key)->update(['tweeted' => true,'tweet_id'=> json_decode($tweet)->id]);
                    }
                    $this->info('done');
                } catch (\Exception $e) {
                    if ($e->getMessage() == '[187] Status is a duplicate.') {
                        Payment::whereId($key)->update(['tweeted' => true]);
                        $this->info('done');
                    }
                    continue;
                }
            }
        }
    }
}
