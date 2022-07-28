<?php

namespace App\Http\Livewire\Game;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class OfflineKernel extends Component
{
    public $game_id;

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

    public function render()
    {
        return view('livewire.game.offline-kernel');
    }
}
