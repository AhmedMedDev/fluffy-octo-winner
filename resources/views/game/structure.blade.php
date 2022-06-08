@extends('layouts.master')

@push('css')
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

    </style>
@endpush
@section('content')
    <livewire:game.gamer-kernel :game_id="$game_info->id" :player1="$game_info->player1" :player2="$game_info->player2" :open_for="$game_info->open_for"/>
@endsection