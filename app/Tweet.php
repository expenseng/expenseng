<?php


namespace App;

use File;
use Twitter;

class Tweet
{
    private $status;
    private $media;

    /**
     * Tweet constructor.
     * @param $media
     * @param string $status
     */
    public function __construct($status = ' ', $media = null)
    {
        $this->status = $status;
        $this->media = $media;
        return $this;
    }

    /**
     * @param $media
     * @return $this
     */
    public function attach($media)
    {
        $this->media = $media;
        return $this;
    }

    /**
     * @param $string
     * @return $this
     */
    public function HashTag(...$string)
    {
        foreach ($string as $tag) {
            $this->status = $this->status . " #".$tag;
        }
        return $this;
    }

    /**
     * @param $sting
     * @return $this
     */
    public function status($sting)
    {
        $this->status = $this->status . " ".$sting;
        return $this;
    }

    /**
     * @param $string
     * @return $this
     */
    public function tag(...$string)
    {
        foreach ($string as $tag) {
            $this->status = $this->status . " @".$tag;
        }
        return $this;
    }

    public function send()
    {
        if ($this->media !== null) {
            $uploaded_media = Twitter::uploadMedia(['media' => File::get($this->media)]);
            $tweet =  Twitter::postTweet(['status' => $this->status, 'media_ids' => $uploaded_media->media_id_string, 'format' => 'json']);
            $this->logToDatabase($tweet);
            return $tweet;
        }
        $tweet = Twitter::postTweet(['status' => $this->status , 'format' => 'json']);
        $this->logToDatabase($tweet);
        return $tweet;
    }
    public function logToDatabase($tweet)
    {
        $tweet_array = json_decode($tweet, true);
        $user_screen_name = isset($tweet_array['user']['screen_name']) ? $tweet_array['user']['screen_name'] : null;
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
    }
}
