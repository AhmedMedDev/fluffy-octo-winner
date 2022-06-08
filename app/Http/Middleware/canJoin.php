<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class canJoin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $game = DB::table('games')
            ->select('player1','player2')
            ->find($request->id);

        $auth_id = auth()->user()->id;

        $canJoin = (is_null($game->player2) 
                    || $auth_id == $game->player1 
                    || $auth_id == $game->player2);

        return ($canJoin) 
            ? $next($request)
            : redirect('/game-seens');
    }
}
