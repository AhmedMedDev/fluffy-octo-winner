<?php

namespace App\Http\Livewire\Game;

use App\Events\CancelJoiningEvent;
use App\Events\EnemyJoiningEvent;
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
    public $auth_player_num;
    public $current_leg;
    public $player1_name;
    public $player2_name;
    public $sum_wins_1;
    public $sum_wins_2;
    public $limit_rounds;
    public $winners;
    public $double_in;
    public $double_out;

    public function mount () 
    {
        $this->auth_id = auth()->user()->id;

        $game_info = DB::table('games')->find($this->game_id);

        $this->player1 = $game_info->player1;

        $this->player2 = $game_info->player2;

        $this->auth_player_num = ($this->auth_id == $this->player1) ? 1 : 2;
        
        $this->open_for = $game_info->open_for;

        $legs = json_decode($game_info->legs);

        $this->details = $legs->details;
        $this->current_leg = $legs->current_leg;

        $this->scores = json_decode($game_info->curr_leg);

        $this->sum_wins_1 = $legs->sum_wins_1;
        $this->sum_wins_2 = $legs->sum_wins_2;
        $this->winners = $legs->winners;

        $setting = json_decode($game_info->setting);

        $this->player1_name = $setting->player1;
        $this->player2_name = $setting->player2;
        
        $this->limit_rounds = $setting->limit_rounds;

        $this->double_in = $setting->double_in;
        $this->double_out = $setting->double_out;
    }

    public function getListeners()
    {
        return [
            "echo-presence:game.{$this->game_id},RoundFinishedEvent" => 'notifyNewRound',
            "echo-presence:game.{$this->game_id},LegFinishedEvent" => 'notifyNewLeg',
            "echo-presence:game.{$this->game_id},EnemyJoiningEvent" => 'notifyEnemyJoining',
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

        Broadcast(new EnemyJoiningEvent($this->game_id, $player_id))->toOthers();
    }

    public function cancelJoiningRequest ()
    {
        Broadcast(new CancelJoiningEvent($this->game_id))->toOthers();
    }

    public function legFinished ($is_winner1)
    {
        $this->close_leg($is_winner1);
    }

    /**
     * Details Updating
     * 
     * Open for Winner
     * Sum wins Updating
     * 
     * Winners Updating
     * 
     * Increase Curr_leg
     * Reset Curr leg
     * 
     * @param $who did won ? 
     *  is player 1 !
     */
    public function close_leg ($is_winner1 = true)
    {
        $this->details = (is_array($this->details)) ? $this->details : json_decode($this->details);
        $this->details[$this->current_leg] = $this->scores;

        if ($is_winner1) {

            $this->open_for = $this->player1;
            $this->sum_wins_1++;
        } else {

            $this->open_for = $this->player2;
            $this->sum_wins_2++;
        }

        array_push($this->winners, [$this->current_leg , $this->open_for]);

        $this->current_leg++;

        $this->scores = [
            [null, 501, null, 501],
            [null, null, null, null]
        ];

        DB::table('games')
        ->where('id', $this->game_id)
        ->update([
            'legs' => json_encode([
                'current_leg'   => $this->current_leg,
                'sum_wins_1'    => $this->sum_wins_1,
                'sum_wins_2'    => $this->sum_wins_2,
                'winners'       => $this->winners,
                'details'       => json_encode($this->details)
            ]),
            'curr_leg' => json_encode($this->scores),
            'open_for' => $this->open_for
        ]);

        Broadcast(new LegFinishedEvent($this->game_id))->toOthers();
    }

    public function close_game()
    {
        DB::table('games')
            ->where('id', $this->game_id)
            ->update([
                'open_for' => 0
            ]);

        return redirect('games');
    }

    public function roundFinished ($scored, $togo, $is_player1)
    {
        $curr_round = $this->scores[count($this->scores) - 1];

        if ($is_player1) {
            $this->open_for =  $this->player2;
            $curr_round[0] = $scored;
            $curr_round[1] = $togo;

        } else {
            $this->open_for =  $this->player1;
            $curr_round[2] = $scored;
            $curr_round[3] = $togo;
        }

        $this->scores[count($this->scores) - 1] = $curr_round;

        // Cond Explaination : limit is active , This final round, Final Round is Completed
        if (!is_null($this->limit_rounds) && 
            ($this->limit_rounds == count($this->scores) - 1) && 
            !is_null($curr_round[1]) && !is_null($curr_round[3])) {

                $is_winner1 = ($curr_round[1] <= $curr_round[3]);
          
                $this->close_leg($is_winner1);

        } else {

            // Insert New Row If both players played
            if (!is_null($curr_round[1]) && !is_null($curr_round[3])) {
                array_push($this->scores, [null, null, null, null,]);
            }

            DB::table('games')
                ->where('id', $this->game_id)
                ->update([
                    'curr_leg' => json_encode($this->scores),
                    'open_for' => $this->open_for
                ]);
    
            Broadcast(new RoundFinishedEvent($this->game_id, $this->open_for, $this->scores))->toOthers();
        }
    }
    
    public function notifyNewRound($data) 
    {
        $this->open_for = $data['open_for'];
        $this->scores = $data['scores'];
    }

    public function notifyNewLeg() 
    {
        $this->mount();
    }

    public function notifyEnemyJoining($data) 
    {
        $this->player2 = $data['player2'];
    }

    public function render()
    {
        if (($this->open_for != $this->auth_id ||  is_null($this->player2))){

            $this->emit('lockBoard');
        }

        return view('livewire.game.gamer-kernel');
    }
}
