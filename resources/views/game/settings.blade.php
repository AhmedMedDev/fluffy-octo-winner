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
    <div class="content flex-row-fluid" id="kt_content">
        <livewire:game.game-generation />
    </div>
@endsection
