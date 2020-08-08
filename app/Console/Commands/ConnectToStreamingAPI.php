<?php

namespace App\Console\Commands;

use App\Ministry;
use App\TwitterStream;
use Illuminate\Console\Command;

class ConnectToStreamingAPI extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'connect_to_streaming_api';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Connect to the Twitter Streaming API';

    protected $twitterStream;

    /**
     * Create a new command instance.
     *
     * @param TwitterStream $twitterStream
     */
    public function __construct(TwitterStream $twitterStream)
    {
        $this->twitterStream = $twitterStream;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $twitter_consumer_key = env('TWITTER_CONSUMER_KEY', '');
        $twitter_consumer_secret = env('TWITTER_CONSUMER_SECRET', '');

        $this->twitterStream->consumerKey = $twitter_consumer_key;
        $this->twitterStream->consumerSecret = $twitter_consumer_secret;
        $ministries = Ministry::all();
        $array = array('expenseng ', '@expenseng','#expenseng');
        $this->twitterStream->setTrack($array);
        $this->twitterStream->consume();
    }
}
