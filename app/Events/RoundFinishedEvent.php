<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class RoundFinishedEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $game_id;
    public $open_for;
    public $scored;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($game_id, $open_for)
    {
        $this->game_id = $game_id;
        $this->open_for = $open_for;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PresenceChannel('game.' . $this->game_id);
    }

    public function broadcastWith()
    {
        return [
            'open_for' => $this->open_for,
        ];
    }
}
