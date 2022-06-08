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
            ->select('player2')
            ->find($request->id);

        return (is_null($game->player2)) 
            ? $next($request)
            : redirect('/game-seens');
    }
}
