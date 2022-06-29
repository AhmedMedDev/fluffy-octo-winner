@extends('layouts.master')

@push('css')
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        .modal#double_modal{
            top: 35%;
        }
    </style>
@endpush
@section('content')
    <livewire:game.game-archive :game_id="$game_id" />
@endsection