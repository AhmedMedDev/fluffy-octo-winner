<?php

namespace App\Http\Livewire\Game;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class GameArchive extends Component
{
    public $game_id;
    public $details;
    public $current_leg;
    public $current_set;
    public $scores;

    public function mount () 
    {
        $game_info = DB::table('games')->find($this->game_id);

        $legs = json_decode($game_info->legs);

        $this->details = (is_array($legs->details)) ? $legs->details : json_decode($legs->details);

        $this->max_leg = $legs->current_leg;
        $this->max_set = $legs->current_set;

        $this->scores = $this->details;
        $this->max_wins_1 = $legs->sum_wins_1;
        $this->max_wins_2 = $legs->sum_wins_2;

        $setting = json_decode($game_info->setting);
        $this->player1_name = $setting->player1;
        $this->player2_name = $setting->player2;

        $this->current_leg = 0;
        $this->current_set = 0;
    }

    public function render()
    {
        $this->scores = $this->details[$this->current_leg][$this->current_set];
        $this->sum_wins_1 = $this->max_wins_1[$this->current_set];
        $this->sum_wins_2 = $this->max_wins_2[$this->current_set];

        return view('livewire.game.game-archive');
    }
}
