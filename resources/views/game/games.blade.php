@extends('layouts.master')

@push('css')

@endpush
@section('content')
    <div class="content flex-row-fluid" id="kt_content">

        {{--  --}}
           <div class="row">
            <div class="col-10">
                <!--begin::Input Form-->
                <form class="w-100 position-relative mb-5" autocomplete="off">

                    <!--begin::Icon-->
                    <span class="svg-icon svg-icon-2 svg-icon-lg-1 svg-icon-gray-500 position-absolute top-50 ms-5 translate-middle-y">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor"></rect>
                            <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor"></path>
                        </svg>
                    </span>
                    <!--end::Icon-->

                    <!--begin::Input-->
                    <input type="text" class="form-control form-control-lg form-control-solid px-15 bg-white"
                        name="search"
                        value=""
                        placeholder="Search by username, full name or email..."/>
                    <!--end::Input-->
                </form>
                <!--end::Form-->
            </div>
            <div class="col-2">
                <a href="{{url('game-genration')}}" class="btn btn-light-primary">Generate New Game</a>
            </div>
           </div>
        {{--  --}}

        @foreach (DB::table('games')->select('id', 'setting', 'date')->orderBy('date', 'desc')->get() as $game)
            <div class="card card-flush shadow-sm mb-4">
                <div class="card-header">
                    <h3 class="card-title">
                    {{ json_decode($game->setting)->game_title  }}
                    </h3>
                    <div class="card-toolbar">
                        <a href="{{url('games', $game->id)}}" class="btn btn-info">Ask To Join</a>
                    </div>
                </div>
                <div class="card-body py-5">
                    Created at : <strong>{{$game->date }}</strong> <br>
                    Lorem Ipsum is simply dummy text...
                </div>
                <div class="card-footer">
                    <span class="badge badge-primary badge-lg">Simple Game</span>
                    <span class="badge badge-primary badge-lg">Entry Level</span>
                    <span class="badge badge-primary badge-lg">For beginner</span>
                </div>
            </div>
        @endforeach
    </div>
@endsection
