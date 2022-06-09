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
    public $details;

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

    public function roundFinished ($scored, $togo)
    {
        if ($this->open_for == $this->player1) {
            $this->open_for =  $this->player2;
            $rowScore = [$scored, $togo, 0, 0];

            array_push($this->details, $rowScore);

        } else {
            $this->open_for =  $this->player1;
            $rowScore = $this->details[count($this->details) - 1];
            $rowScore[2] = $scored;
            $rowScore[3] = $togo;
            $this->details[count($this->details) - 1] = $rowScore;
        }


        DB::table('games')
            ->where('id', $this->game_id)
            ->update([
                'details' => json_encode($this->details),
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
        $game_info = DB::table('games')->find($this->game_id);

        $this->details = json_decode($game_info->details);

        return view('livewire.game.gamer-kernel');
    }
}
