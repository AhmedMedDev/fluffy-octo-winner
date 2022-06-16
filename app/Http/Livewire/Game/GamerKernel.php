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
    public $auth_id;
    public $current_leg;
    public $player1_name;
    public $player2_name;
    public $sum_wins_1;
    public $sum_wins_2;

    public function mount () 
    {
        $this->auth_id = auth()->user()->id;

        $game_info = DB::table('games')->find($this->game_id);

        $this->player1 = $game_info->player1;

        $this->player2 = $game_info->player2;
        
        $this->open_for = $game_info->open_for;

        $this->details = json_decode($game_info->details);

        $legs = json_decode($game_info->legs);

        $current_leg = $legs->current_leg;

        $this->details = $this->details->$current_leg;

        $this->sum_wins_1 = $legs->sum_wins_1;
        $this->sum_wins_2 = $legs->sum_wins_2;

        $setting = json_decode($game_info->setting);

        $this->player1_name = $setting->player1;
        $this->player2_name = $setting->player2;

        // 
    }

    public function getListeners()
    {
        return [
            "echo-presence:game.{$this->game_id},RoundFinishedEvent" => 'notifyNewRound',
            "echo-presence:game.{$this->game_id},here" => 'here',
            "echo-presence:game.{$this->game_id},joining" => 'joining',
            "echo-presence:game.{$this->game_id},leaving" => 'leaving',
        ];
    }

    public function here ($players) 
    {
        if (count($players) == 1) {

            $this->emit('lockBoard');
        } 
    }

    public function joining ($player) 
    {
        // Nothing to do
    }

    public function leaving () 
    {
        $this->emit('lockBoard');
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

    public function roundFinished ($scored, $togo, $is_newRow)
    {
        if ($is_newRow) {

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

        Broadcast(new RoundFinishedEvent($this->game_id, $this->open_for, $this->details))->toOthers();
    }
    
    public function notifyNewRound($data) 
    {
        $this->open_for = $data['open_for'];
        $this->details = $data['details'];
    }

    public function render()
    {
        if (($this->open_for != $this->auth_id ||  is_null($this->player2))){

            $this->emit('lockBoard');
        }

        return view('livewire.game.gamer-kernel');
    }
}
