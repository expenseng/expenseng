<?php

namespace App\Http\Controllers;

use App\BackgroundProcess;
use App\Console\Commands\ConnectToStreamingAPI;
use App\ProcessId;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class TwitterBot extends Controller
{
    private $process = null;
    //
    public function startLiveRetweet()
    {
        $path = realpath('./../artisan');
        $this->process = new BackgroundProcess('php '.$path.' connect_to_streaming_api');
        $this->SetProccessID($this->process->getProcessId());
        return 'retweet started';
    }

    public function stopLiveRetweet()
    {
        $process_id = $this->getProcessId();
        if ($process_id != 0) {
            exec('kill '.$process_id);
            putenv('BG_TWT_PROCESS_ID');
            return  ' retweet stopped';
        } else {
            return ' retweet  is not on ';
        }
    }

    /**
     * @param $id
     */
    private function SetProccessID($id)
    {
        $get = ProcessId::whereId(1)->first();
        if ($get) {
            ProcessId::whereId(1)->update(['process_id' => $id]);
        } else {
            ProcessId::Create(['id'=>1,'process_id'=>$id]);
        }
    }
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
}
