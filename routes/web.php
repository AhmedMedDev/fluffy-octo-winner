<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('games/{id}', function ($id) {

    return view('game.structure')
        ->with('game_id', $id);
})->middleware('auth', 'can_join');

Route::get('game/archive/{id}', function ($id) {

    return view('game.archive')
        ->with('game_id', $id);
})->middleware('auth', 'can_join');

Route::view('/game-genration', 'game.settings')->middleware('auth');
Route::view('game/stats/{id}', 'game.stats')->middleware('auth');
Route::view('/games', 'game.games')->middleware('auth');
Route::get('/games', function () {

    $gmaes = DB::table('games')
        ->where('open_for', '!=', 0)
        ->where('player2', null)
        ->select('id', 'setting', 'date')
        ->orderBy('date', 'desc')
        ->get();

    return view('game.games',[
        'games' => $gmaes
    ]);
})->middleware('auth');

Route::get('/archives', function () {

    $gmaes = DB::table('games')
        ->where('player1', auth()->user()->id)
        ->orWhere('player2', auth()->user()->id)
        ->select('id', 'setting', 'date', 'open_for')
        ->orderBy('date', 'desc')
        ->get();

    return view('game.archives',[
        'games' => $gmaes
    ]);
})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/{page}', 'ViewkernelController');
