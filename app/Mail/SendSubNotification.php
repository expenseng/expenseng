<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendSubNotification extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    public $report;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        //
        $this->name = $name;
        $this->report = $report;
    }*/

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email');
    }
}
