<?php

namespace App\Http\Controllers;

use App\BackgroundProcess;
use App\Budget;
use App\Ministry;
use App\Payment;
use App\ProcessId;
use App\Sector;
use App\Tweet;
use App\Activites;
use Carbon\Carbon;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Twitter;
use function GuzzleHttp\Psr7\str;

class TwitterBot extends Controller
{
    private $tweets  = array();

    /**
     * @return string
     */
    public function startLiveRetweet() //use to start the live retweet
    {
        $process_id = $this->getProcessId();
        if ($process_id != 0) {
            return 'retweet is already running';
        }
        $path = realpath('./../artisan');
        $process = new BackgroundProcess('php '.$path.' connect_to_streaming_api');
        $this->setProcessID($process->getProcessId());
        return 'retweet started';
    }

    /**
     * @return string
     */
    public function stopLiveRetweet()
    {
        $process_id = $this->getProcessId(); //get the id of the background process handling the live retweet
        if ($process_id != 0) {
            exec('kill '.$process_id);
            return  ' retweet stopped';
        } else {
            return ' retweet  is not on ';
        }
    }

    /**
     * @param $id
     */
    private function setProcessID($id)
    {
        $get = ProcessId::whereId(1)->first();
        if ($get) {
            ProcessId::whereId(1)->update(['process_id' => $id]);
        } else {
            ProcessId::Create(['id'=>1,'process_id'=>$id]);
        }
    }

    /**
     * @return bool
     */
    private function getProcessId()
    {
        $get = ProcessId::whereId(1)->first();
        if ($get) {
            ProcessId::whereId(1)->update(['process_id' => 0]);
            return $get->process_id;
        } else {
            return false;
        }
    }

    /**
     * @return array
     */
    public function pastTweets()
    {
        $payments = Payment::where('payment_date', '<=', Carbon::now()->subDays(1))
            ->whereTweeted(false)
            ->orderBy('payment_date', "DESC")
            ->take(1)->get();
        return $this->paymentTweets($payments);
    }
    public function dailyTweets()
    {
        $payments = Payment::whereTweeted(false)
            ->orderBy('payment_date', "DESC")
            ->take(1)->get();
        return $this->paymentTweets($payments);
    }
    public function paymentTweets($payments)
    {
        foreach ($payments as $payment) {
            $date = Carbon::createFromFormat('Y-m-d', $payment->payment_date)
                ->format('l \\T\\h\\e jS \\of F Y');
            $ministry = Ministry::whereCode(substr($payment->payment_code, 0, 4))->first();
            if (empty($ministry)) {
                $this->tweets[$payment->id] = $this->style1($payment, $date);
            } else {
                $this->tweets[$payment->id] = $this->style2($payment, $date, $ministry);
            }
        }
        return $this->tweets;
    }

    /**
     * @param $payment
     * @return string
     */
    public function tweetPayment(Request $request)
    {
        if ($request->ajax()) {
            try {
                $payment = Payment::whereId($request->id)->first();
                if (isset($payment->tweet_id)) {
                    $id = $payment->tweet_id;
                    if (isset($id)) {
                        $tweets =  Twitter::postRt(''.$id);
                        return  Response('retweeted');
                    } else {
                        return Response::json(array('msg'=> 'not tweeted'), 422);
                    }
                } else {
                    $date = Carbon::createFromFormat('Y-m-d', $payment->payment_date)
                        ->format('l \\T\\h\\e jS \\of F Y');
                    $ministry = Ministry::whereCode(substr($payment->payment_code, 0, 4))->first();
                    if (empty($ministry)) {
                        $tweet = $this->style1($payment, $date);
                    } else {
                        $tweet = $this->style2($payment, $date, $ministry);
                    }
                    $twitter = new Tweet(trim($tweet));
                    $tweet = $twitter->HashTag('expenseng')->send();
                    Payment::whereId($request->id)->update(['tweeted' => true ,'tweet_id'=>
                        json_decode($tweet)->id]);
                    return Response("tweet sent ");
                }
            } catch (\Exception $e) {
                return Response($e->getMessage(), 422);
            }
        }
    }
    private function style1($payment, $date)
    {
        if (strlen($payment->organization) > 20) {
            $organization = substr($payment->organization, 0, 20)."...";
        } else {
            $organization = $payment->organization;
        }
        if (strlen($payment->description) > 4) {
            $last = " for  ". substr($payment->description, 0, 20)."..";
        } else {
            $last = " ";
        }
        return "On ".$date.", ".$organization." paid the sum of ₦".number_format($payment->amount, 2)
            ." to ".$payment->beneficiary.$last;
    }
    private function style2($payment, $date, $ministry)
    {
        if (strlen($payment->description) > 4) {
            $last = " for  ". substr($payment->description, 0, 20)."..";
        } else {
            $last = " ";
        }
        if (strlen($payment->organization) > 20) {
            $organization = substr($payment->organization, 0, 20)."...";
        } else {
            $organization = $payment->organization;
        }
        $part = isset($ministry->twitter) ? $ministry->twitter : "";
        return "On ".$date.", From the Ministry of ".$ministry->name." "
            .$part.", "
            .$organization." paid the sum of ₦".number_format($payment->amount, 2)
            ." to ".$payment->beneficiary.$last;
    }
    public function budgetTweet()
    {
        $budget = Budget::inRandomOrder()->first();
        $tweet = $this->budgetTweetFilter($budget);
        return $tweet;
    }
    public function budgetTweetFilter($budget)
    {
        $code = explode('-', $budget->code);
        if (count($code) > 1) {
            $ministry_code = $code[1];
            $sector_code = $code[0];
            $ministry = Ministry::where('shortname', 'LIKE', "{$ministry_code}%")->first();
            $sector = Sector::whereId($sector_code)->first();
            if (is_null($sector)) {
                return 'The amount of ₦'.$budget->amount." was allocated for ".
                    $budget->project_name." in the ".$budget->year ." budget";
            } else {
                if (is_null($ministry)) {
                    return 'The amount of ₦'.$budget->amount." was allocated for ".
                        $budget->project_name." in the ".$budget->year ." budget";
                }
                return "From the " . $sector->name . " sector, The " . $ministry->name .
                    " was allocated ₦" . $budget->amount . " in the " . $budget->year .
                    " budget,for " . $budget->project_name;
            }
        } else {
            return 'The amount of ₦'.$budget->amount." was allocated for ".
                $budget->project_name." in the ".$budget->year ." budget";
        }
    }

    public function sendTweet(Request $request)
    {
        if ($request->ajax()) {
            try {
                $tweet = new Tweet($request->tweet);
                $tweet_details = $tweet->send();
                $response = 'tweet sent';
                Activites::create([
                    'description' => 'New tweet Made',
                    'username' => 'AdminUser',
                    'privilage' =>'admin',
                    'status' =>'pending',
                ]);
                return Response($response);
            } catch (\Exception $exception) {
                return Response::json(array("errors" => 'error occured'), 422);
            }
        }
    }

    public function delete(Request $request)
    {
        if ($request->ajax()) {
            try {
                $destroy = Twitter::destroyTweet(''.($request->id));
                return  Response('tweet destroy');
            } catch (\Exception $exception) {
                return Response::json(array("errors" => 'error occured'), 422);
            }
        }
    }

    public function getTweet(Request $request)
    {
        if ($request ->ajax()) {
            try {
                $tweets=  Twitter::getUserTimeline(['count'=> 30]);
                return view('backend.tweets', compact('tweets'));
            } catch (\Exception $exception) {
                return Response::json(array("errors" => 'error occured'), 422);
            }
        }
    }
    public function retweet(Request $request)
    {
        if ($request ->ajax()) {
            try {
                $tweets=  Twitter::postRt(''.($request->id));
                return  Response('retweeted');
            } catch (\Exception $exception) {
                return Response::json(array("errors" => 'error occured'), 422);
            }
        }
    }
}
