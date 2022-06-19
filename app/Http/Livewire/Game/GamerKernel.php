<?php

namespace App\Http\Livewire\Game;

use App\Events\LegFinishedEvent;
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
    public $scores;
    public $auth_id;
    public $current_leg;
    public $player1_name;
    public $player2_name;
    public $sum_wins_1;
    public $sum_wins_2;
    public $limit_rounds;
    public $winners;

    public function mount () 
    {
        $this->auth_id = auth()->user()->id;

        $game_info = DB::table('games')->find($this->game_id);

        $this->player1 = $game_info->player1;

        $this->player2 = $game_info->player2;
        
        $this->open_for = $game_info->open_for;

        $legs = json_decode($game_info->legs);

        $this->current_leg = $legs->current_leg;
        $current_leg = $legs->current_leg;

        $this->details = $game_info->details;

        $details = json_decode($game_info->details);
        $this->scores = $details->$current_leg;

        $this->sum_wins_1 = $legs->sum_wins_1;
        $this->sum_wins_2 = $legs->sum_wins_2;
        $this->winners = $legs->winners;

        $setting = json_decode($game_info->setting);

        $this->player1_name = $setting->player1;
        $this->player2_name = $setting->player2;
        
        $this->limit_rounds = $setting->limit_rounds;
    }

    public function getListeners()
    {
        return [
            "echo-presence:game.{$this->game_id},RoundFinishedEvent" => 'notifyNewRound',
            "echo-presence:game.{$this->game_id},LegFinishedEvent" => 'notifyNewLeg',
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

    public function legFinished ($is_win_1)
    {
        //->>> I don't store final round

        $this->open_for == $this->auth_id;

        // Details Updating
        $this->details = json_decode($this->details);
        $this->scores = [
            [null, 501, null, 501]
        ];
        $new_leg = ++$this->current_leg;
        $this->details->$new_leg =  $this->scores;

        // Sum wins Updating
        ($is_win_1) // player 1 who played
        ? $this->sum_wins_1++
        : $this->sum_wins_2++;

        // Winners Updating
        array_push($this->winners, [$this->current_leg - 1, $this->auth_id]);

        $this->details = json_encode($this->details);

        DB::table('games')
        ->where('id', $this->game_id)
        ->update([
            'legs' => json_encode([
                'current_leg'   => $this->current_leg,
                'sum_wins_1'    => $this->sum_wins_1,
                'sum_wins_2'    => $this->sum_wins_2,
                'winners'       => $this->winners 
            ]),
            'details' => $this->details,
            'open_for' => $this->open_for
        ]);

        Broadcast(new LegFinishedEvent($this->game_id))->toOthers();
    }

    public function roundFinished ($scored, $togo, $is_newRow)
    {
        if ($is_newRow) {

            $this->open_for =  $this->player2;
            $rowScore = [$scored, $togo, 0, 0];
            array_push($this->scores, $rowScore);

        } else {
            $this->open_for =  $this->player1;
            $rowScore = $this->scores[count($this->scores) - 1];
            $rowScore[2] = $scored;
            $rowScore[3] = $togo;
            $this->scores[count($this->scores) - 1] = $rowScore;
        }

        DB::table('games')
            ->where('id', $this->game_id)
            ->update([
                'details' => json_encode([
                    $this->current_leg => $this->scores
                ]),
                'open_for' => $this->open_for
            ]);

        Broadcast(new RoundFinishedEvent($this->game_id, $this->open_for, $this->scores))->toOthers();
    }
    
    public function notifyNewRound($data) 
    {
        $this->open_for = $data['open_for'];
        $this->scores = $data['scores'];
    }

    public function notifyNewLeg() 
    {
        return redirect(request()->header('Referer'));
    }

    public function render()
    {
        if (($this->open_for != $this->auth_id ||  is_null($this->player2))){

            $this->emit('lockBoard');
        }

        return view('livewire.game.gamer-kernel');
    }
}
