<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UndoExecutedEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $game_id;
    public $scores;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($game_id, $scores)
    {
        $this->game_id = $game_id;
        $this->scores = $scores;
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
            'scores' => $this->scores,
        ];
    }
}
