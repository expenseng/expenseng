<?php
use App\Tweet;
use Illuminate\Database\Seeder;

class TweetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tweetsQuantity = 40;
        factory(Tweet::class, $tweetsQuantity);
    }
}
