<?php

namespace App\Console\Commands;

use App\Tweet;
use Illuminate\Console\Command;

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
        $int = random_int(2,1000);
        $tweet = new Tweet('sample testing tweet bot'.$int. " ");
        $tweet->HashTag('Laravel')->tag('expenseng')->send();

    }
}
