<?php

namespace App\Http\Livewire\Game;

use App\Events\CancelJoiningEvent;
use App\Events\EnemyJoiningEvent;
use App\Events\GameClosedEvent;
use App\Events\LegFinishedEvent;
use App\Events\RoundFinishedEvent;
use App\Events\SetFinishedEvent;
use App\Events\UndoExecutedEvent;
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
    public $unsaved;
    public $leg_limit;
    public $sets_limit;
    public $current_set;

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
        $this->current_set = $legs->current_set;

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
        $this->unsaved = $setting->unsaved;
        $this->leg_limit = $setting->first_of;
        $this->sets_limit = $setting->sets_limit;
    }

    public function getListeners()
    {
        return [
            "echo-presence:game.{$this->game_id},RoundFinishedEvent" => 'notifyNewRound',
            "echo-presence:game.{$this->game_id},LegFinishedEvent" => 'notifyNewLeg',
            "echo-presence:game.{$this->game_id},EnemyJoiningEvent" => 'notifyEnemyJoining',
            "echo-presence:game.{$this->game_id},GameClosedEvent" => 'gameClosed',
            "echo-presence:game.{$this->game_id},UndoExecutedEvent" => 'undoExecuted',
            "echo-presence:game.{$this->game_id},SetFinishedEvent" => 'SetFinished',
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
    
    public function legFinished ($scored, $togo, $is_winner1)
    {
        // save final round firstly 
        if ($is_winner1) {

            $this->scores[count($this->scores) - 1][0] = $scored;

            $this->scores[count($this->scores) - 1][1] = $togo;
        } else {

            $this->scores[count($this->scores) - 1][2] = $scored;

            $this->scores[count($this->scores) - 1][3] = $togo;
        }
        
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
    public function close_leg ($is_winner1)
    {
        if ($is_winner1) {

            $this->open_for = $this->player1;
            $this->sum_wins_1[$this->current_set - 1] = end($this->sum_wins_1) + 1;
        } else {

            $this->open_for = $this->player2;
            $this->sum_wins_2[$this->current_set - 1] = end($this->sum_wins_2) + 1;
        }

        if (end($this->sum_wins_1) == end($this->sum_wins_2) && end($this->sum_wins_1) == $this->leg_limit) {

            $this->leg_limit++;
        } elseif (end($this->sum_wins_1) == $this->leg_limit || end($this->sum_wins_2) == $this->leg_limit) {

            $this->details = (is_array($this->details)) 
            ? $this->details 
            : json_decode($this->details);
    
            // @ => sets 
            array_push($this->details[$this->current_set - 1], $this->scores);

            array_push($this->winners[$this->current_set - 1], [$this->current_leg , $this->open_for]);

            $this->scores = [
                [null, 501, null, 501],
                [null, null, null, null]
            ];

            return $this->close_game();
        }

        $this->details = (is_array($this->details)) ? $this->details : json_decode($this->details);

        // @ => sets 
        array_push($this->details[$this->current_set - 1], $this->scores);

        array_push($this->winners[$this->current_set - 1], [$this->current_leg , $this->open_for]);

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
                'current_set'   => $this->current_set,
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

    public function close_game($forced = false)
    {
        if ($this->current_set == (int) $this->sets_limit || $forced) { // Game Fully Completed

            ($this->unsaved) 
            ? DB::table('games')
                ->where('id', $this->game_id)
                ->delete()
    
            : DB::table('games')
                ->where('id', $this->game_id)
                ->update([
                    'open_for' => 0,
                    'legs' => json_encode([
                        'current_leg'   => $this->current_leg + 1,
                        'current_set'   => $this->current_set,
                        'sum_wins_1'    => $this->sum_wins_1,
                        'sum_wins_2'    => $this->sum_wins_2,
                        'winners'       => $this->winners,
                        'details'       => json_encode($this->details)
                    ]),
                    'curr_leg' => json_encode($this->scores)
                ]);
    
            Broadcast(new GameClosedEvent($this->game_id))->toOthers();
            
            return redirect('games');

        } else { // Set Finished

            // get winner and open for him
            $this->open_for = (end($this->sum_wins_1) > end($this->sum_wins_2))
            ? $this->player1
            : $this->player2;
            
            array_push($this->sum_wins_1, 0);
            array_push($this->sum_wins_2, 0);
            $this->current_set++;
            $this->winners[$this->current_set - 1] = [];
            $this->details[$this->current_set - 1] = [];
            $this->current_leg = 1;// reset curr_leg

            DB::table('games')
            ->where('id', $this->game_id)
            ->update([
                'open_for' => $this->open_for,
                'legs' => json_encode([
                    'current_leg'   => $this->current_leg, 
                    'current_set'   => $this->current_set,
                    'sum_wins_1'    => $this->sum_wins_1,
                    'sum_wins_2'    => $this->sum_wins_2,
                    'winners'       => $this->winners,
                    'details'       => json_encode($this->details)
                ]),
                'curr_leg' => json_encode($this->scores)
            ]);

            // Broadcast SetFinished
            Broadcast(new SetFinishedEvent($this->game_id))->toOthers();
        }
    }

    public function notifyNewRound($data) 
    {
        $this->open_for = $data['open_for'];
        $this->scores = $data['scores'];
    }

    public function undoExecuted($data)
    {
        $this->scores = $data['scores'];
        $this->emit('closeSwal');
    }

    public function notifyNewLeg() 
    {
        $this->mount();
    }

    public function gameClosed()
    {
        return redirect('games');
    }

    public function notifyEnemyJoining($data) 
    {
        $this->player2 = $data['player2'];
    }

    public function undo($rounds_num)
    {
        // unset last 1/2 rounds
        $last_round = end($this->scores);
        $lastNotEmpty = (!is_null($last_round[1]) || !is_null($last_round[3]));

        // delete selected rounds 
        $rounds_num = ($lastNotEmpty) ? $rounds_num : $rounds_num + 1;
        for ($i = 0; $i < $rounds_num; $i++) {

            if (count($this->scores) == 1) break;

            array_pop($this->scores);
        }
        
        // Push new
        array_push($this->scores, [null, null, null, null,]);

        // DB Updating
        DB::table('games')
        ->where('id', $this->game_id)
        ->update([
            'curr_leg' => json_encode($this->scores),
        ]);

        // Broadcast for other
        Broadcast(new UndoExecutedEvent($this->game_id, $this->scores))->toOthers();
    }

    public function SetFinished()
    {
        $this->mount();
    }

    public function render()
    {
        if (($this->open_for != $this->auth_id ||  is_null($this->player2))){

            $this->emit('lockBoard');
        }

        return view('livewire.game.gamer-kernel');
    }
}
