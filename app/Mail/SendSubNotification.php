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
    public $subscription;
    public $last;
    public $details;
    public $delete;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $details, $subscription, $last, $delete)
    {
        //
        $this->name = $name;
        $this->details = $details;
        $this->subscription = $subscription;
        $this->last = $last;
        $this->delete = $delete;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        return $this->subject('EXPENSENG SUBSCRIPTION')
            ->markdown('mails.email2')
            ->with(
                [
                'name' => $this->name,
                'details' => $this->details,
                'subscription' => $this->subscription,
                'last' => $this->last,
                'delete' => $this->delete,
                ]
            );
    }
}
