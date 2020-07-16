<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewReactionOnComment implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $votes;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($votes)
    {
        $this->votes = $votes;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('expense-reaction');
    }

    public function broadCastWith(){
        return $this->votes;
    }
}
