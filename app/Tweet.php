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
            return $tweet;
        }
        $tweet = Twitter::postTweet(['status' => $this->status , 'format' => 'json']);
        return $tweet;
    }
}
