<?php

namespace App\Http\Livewire\Game;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class GameArchive extends Component
{
    public $game_id;
    public $details;
    public $current_leg;
    public $scores;

    public function mount () 
    {
        $game_info = DB::table('games')->find($this->game_id);

        $legs = json_decode($game_info->legs);

        $this->details = (is_array($legs->details)) ? $legs->details : json_decode($legs->details);

        $this->current_leg = $legs->current_leg;

        $this->scores = $this->details[0];

        $this->sum_wins_1 = $legs->sum_wins_1;
        $this->sum_wins_2 = $legs->sum_wins_2;
        $this->winners = $legs->winners;

        $setting = json_decode($game_info->setting);

        $this->player1_name = $setting->player1;
        $this->player2_name = $setting->player2;
    }

    public function changeLeg ($leg_num)
    {
        $this->scores = $this->details[$leg_num - 1];
    }

    public function render()
    {
        return view('livewire.game.game-archive');
    }
}
