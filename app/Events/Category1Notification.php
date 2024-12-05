<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Category1Notification implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
     public $name_major;

    /**
     * Create a new event instance.
     *
     * @return void
     */

    public function __construct($name_major)
    {
        $this->name_major = $name_major;
    }


    
    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */

public function broadcastOn()
 {
     return ['status-liked'];
 }

 public function broadcastAs()
{
    return 'noyify';
}
}
