<?php

namespace App\Http\Livewire\Game;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class OfflineKernel extends Component
{
    public $game_id;
    public $scores;

    public function mount ()
    {
        $game_info = DB::table('games')->find($this->game_id);

        $legs = json_decode($game_info->legs);
        $this->current_leg = $legs->current_leg;
        $this->current_set = $legs->current_set;

        $this->details = $legs->details;
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

    public function roundFinished ($scored, $togo, $is_player1)
    {
        $curr_round = $this->scores[count($this->scores) - 1];

        if ($is_player1) {
            $curr_round[0] = $scored;
            $curr_round[1] = $togo;

        } else {
            $curr_round[2] = $scored;
            $curr_round[3] = $togo;
        }

        $this->scores[count($this->scores) - 1] = $curr_round;

        if ($this->RDLI_Checker()) {
            
            return $this->closeLeg($this->getRWinner());
        }

        // Insert New Row If both players played
        if (!is_null($curr_round[1]) && !is_null($curr_round[3])) {

            array_push($this->scores, [null, null, null, null,]);
        }

        DB::table('games')
            ->where('id', $this->game_id)
            ->update([
                'curr_leg' => json_encode($this->scores),
            ]);
    }

    public function closeLeg ($is_winner1)
    {
        if ($is_winner1) {

            $this->sum_wins_1[$this->current_set - 1] = end($this->sum_wins_1) + 1;
        } else {

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

            return $this->closeGame();
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
        ]);
    }

    public function closeGame($forced = false)
    {
        if ($this->current_set == (int) $this->sets_limit || $forced) { // Game Fully Completed

            if ($forced) {

                array_push($this->details[0], $this->scores);
                $this->scores = [
                    [null, 501, null, 501],
                    [null, null, null, null]
                ];
            }

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
        }
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
    }

    /**
     * ============================= 
     * ================= Herlpers
     * =============================
     * 
     */

    private function RDLI_Checker()
    {
        // Cond Explaination : limit is active , 
        //      This final round, 
        //      Final Round is Completed

        $curr_round = $this->scores[count($this->scores) - 1];
        $RDLI_isActive = !is_null($this->limit_rounds);
        $RDLI_isCompleted = ($this->limit_rounds == count($this->scores) - 1);
        $roundCompleted = !is_null($curr_round[1]) && !is_null($curr_round[3]);

        return $RDLI_isActive && $RDLI_isCompleted && $roundCompleted;
    }

    public function render()
    {
        return view('livewire.game.offline-kernel');
    }
}
