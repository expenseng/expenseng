<?php

namespace App\Http\Controllers;

use App\BackgroundProcess;
use App\Budget;
use App\Console\Commands\ConnectToStreamingAPI;
use App\Ministry;
use App\Payment;
use App\ProcessId;
use App\Sector;
use App\Tweet;
use App\Activites;
use App\Tweets;
use Carbon\Carbon;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Twitter;

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
    public function paymentTweets()
    {
        $payments = Payment::where('payment_date', '>=', Carbon::now()->subMonth())->get();
        foreach ($payments as $payment) {
            array_push($this->tweets, $this->filterPaymentTweet($payment));
        }
        return $this->tweets;
    }

    /**
     * @param $payment
     * @return string
     */
    private function filterPaymentTweet($payment)
    {
        $amount = $payment->amount;
        $ministry = $payment->ministry()['name'];
        $ministry_handle = $payment->ministry()['twitter'];
        $minister = $payment->ministry()['cabinet']->where('role', '=', 'Minister')->first()->name;
        $minister_handle = $payment->ministry()['cabinet']->where('role', '=', 'Minister')->first()->twitter_handle;
        $description  = $payment->description;
//        l jS \\of F Y
        $date = Carbon::createFromFormat('Y-m-d', $payment->payment_date)->format('l \\T\\h\\e jS \\of F Y');
        $company = DB::table('companies')->where('name', '=', $payment->beneficiary)->first();
        $company_handle = $company ? $company->twitter : null;
        $benefactor = $company ? $company->shortname  : $payment->beneficiary;
        $tweet = 'On '.$date.', The '.$ministry.' '.$ministry_handle.' led by '.
            $minister.' '.$minister_handle.
            ', Payed The Sum of ₦'.$amount." to ".$benefactor.' '.$company_handle.' for the '.$description;
        return $tweet;
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
                return 'The amount of ₦'.$budget->amount." was allocated for ".$budget->project_name." in the ".$budget->year ." budget";
            } else {
                if (is_null($ministry)) {
                    return 'The amount of ₦'.$budget->amount." was allocated for ".$budget->project_name." in the ".$budget->year ." budget";
                }
                return "From the " . $sector->name . " sector, The " . $ministry->name . " was allocated ₦" . $budget->amount . " in the " . $budget->year . " budget,for " . $budget->project_name;
            }
        } else {
            return 'The amount of ₦'.$budget->amount." was allocated for ".$budget->project_name." in the ".$budget->year ." budget";
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
                $tweets=  Twitter::getUserTimeline();
                return view('backend.tweets', compact('tweets'));
            } catch (\Exception $exception) {
                return Response::json(array("errors" => 'error occured'), 422);
            }
        }
    }
}
