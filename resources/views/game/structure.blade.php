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
    <livewire:game.gamer-kernel :game_id="$game_id" />
@endsection