<?php

namespace App\Http\Controllers;

use App\BackgroundProcess;
use App\Console\Commands\ConnectToStreamingAPI;
use App\Payment;
use App\ProcessId;
use App\Tweet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class TwitterBot extends Controller
{
    private $tweets  = array();

    /**
     * @return string
     */
    public function startLiveRetweet() //use to start the live retweet
    {
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
        $payments = Payment::where('payment_date', '>=', Carbon::now()->subDay())->get();
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
        $ministry = $payment->ministry->name;
        $ministry_handle = $payment->ministry->twitter;
        $minister = $payment->ministry->cabinet->where('role', '=', 'Minister')->first()->name;
        $minister_handle = @$payment->ministry->cabinet->where('role', '=', 'Minister')->first()->twitter_handle;
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
}
