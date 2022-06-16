<?php

namespace App\Http\Livewire\Game;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Support\Str;

class GameGeneration extends Component
{
    public $player1         = "Player 1";
    public $player2         = "Player 2";
    public $start_score     = 501;
    public $limit_rounds    = null;
    public $remaining_score = 0;
    public $com_score       = 0;
    public $handicap_1      = 0;
    public $handicap_2      = 0;

    public function generate()
    {
        $auth_id = auth()->user()->id;
        $game_id = Str::uuid();
        $start_score_1 = $this->start_score - $this->handicap_1;
        $start_score_2 = $this->start_score - $this->handicap_2;

        DB::table('games')
        ->insert([
            'id' => $game_id,
            'player1' => $auth_id,
            'open_for' => $auth_id,
            'legs' => json_encode([
                'current_leg'   => 1,
                'sum_wins_1'    => 0,
                'sum_wins_2'    => 0,
                'winners'       => [] 
            ]),
            'details' => json_encode([
                1 => [
                    [null, $start_score_1, null, $start_score_2]
                ]
            ]),
            'setting' => json_encode([
                'player1'           => $this->player1,
                'player2'           => $this->player2,
                'start_score'       => $this->start_score,
                'limit_rounds'      => $this->limit_rounds,
                'remaining_score'   => $this->remaining_score,
                'com_score'         => $this->com_score,
                'handicap_1'        => $this->handicap_1,
                'handicap_2'        => $this->handicap_2,
            ])
        ]);

        return redirect("games/$game_id");
    }


    public function render()
    {
        return view('livewire.game.game-generation');
    }
}
