<?php

namespace App\Jobs;

use App\Tweet;
use App\Tweets;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Twitter;

class ProcessTweet implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $tweet;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($tweet)
    {
        $this->tweet = $tweet;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $tweet = json_decode($this->tweet, true);
        $tweet_text = isset($tweet['text']) ? $tweet['text'] : null;
        $user_screen_name = isset($tweet['user']['screen_name']) ? $tweet['user']['screen_name'] : null;
        $status = "https://twitter.com/".$user_screen_name."/status/".$tweet['id_str'];
        try {
            Twitter::postRt($tweet['id_str']);
        } catch (\Exception $exception) {
            return;
        }
    }
    public function details()
    {
        $details =  Twitter::getCredentials();
    }
}
