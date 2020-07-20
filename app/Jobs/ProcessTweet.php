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
            $tweet = Twitter::postRt($tweet['id_str']);
            $user_screen_name = isset($tweet['user']['screen_name']) ? $tweet['user']['screen_name'] : null;
            $tweet_array = json_decode($tweet);
            $tweet_text = isset($tweet_array['text']) ? $tweet_array['text'] : null;
            $tweet_id  = $tweet_array['id_str'];
            $tweet_url = "https://twitter.com/".$user_screen_name."/status/".$tweet_array['id_str'];
            $Rtweet_id = isset($tweet_array['retweeted_status'])? $tweet_array['retweeted_status']['id_str'] : null;
            $Rtweet_text =  isset($tweet_array['retweeted_status'])? $tweet_array['retweeted_status']['text'] : null;
            Tweets::create([
                'status_id' => $tweet_id,
                'statusText' => $tweet_text,
                'statusUrl' => $tweet_url,
                'statusRt_id' => $Rtweet_id,
               'statusRtText' => $Rtweet_text
            ]);


        } catch (\Exception $exception) {
            return;
        }
    }
    public function details()
    {
        $details =  Twitter::getCredentials();
    }
}
