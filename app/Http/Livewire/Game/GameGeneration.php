<?php

namespace App\Http\Livewire\Game;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class GameGeneration extends Component
{
    public function generate()
    {
        $game_id = DB::table('games')
        ->insertGetId([
            'player1' => auth()->user()->id
        ]);

        return redirect("games/$game_id");
    }


    public function render()
    {
        return view('livewire.game.game-generation');
    }
}
