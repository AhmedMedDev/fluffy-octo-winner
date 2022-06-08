<?php

namespace App\Http\Livewire\Game;

use App\Events\RoundFinishedEvent;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class GamerKernel extends Component
{
    public $game_id;
    public $player1;
    public $player2;
    public $open_for;

    public function getListeners()
    {
        return [
            "echo-presence:game.{$this->game_id},RoundFinishedEvent" => 'notifyNewRound',
        ];
    }

    public function playerJoining ($player_id)
    {
        DB::table('games')
            ->where('id', $this->game_id)
            ->update([
                'player2' => $player_id
            ]);

        $this->player2 = $player_id;
    }

    public function roundFinished ()
    {
        $this->open_for = ($this->open_for == $this->player1) 
        ? $this->player2 : $this->player1;

        DB::table('games')
            ->where('id', $this->game_id)
            ->update([
                'open_for' => $this->open_for
            ]);

        Broadcast(new RoundFinishedEvent($this->game_id, $this->open_for))->toOthers();
        $this->emit('triggerLoader');
    }
    
    public function notifyNewRound($e) 
    {
        $this->open_for = $e['open_for'];
    }

    public function render()
    {
        return view('livewire.game.gamer-kernel');
    }
}
