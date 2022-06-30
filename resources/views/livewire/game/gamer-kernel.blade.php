<div class="content flex-row-fluid" id="kt_content">
    <!--begin::Navbar-->
    <div class="d-flex justify-content-around mb-4">
        <h2 class="text-gray-400">{{$player1_name}}</h2>
        <h2 class="text-gray-400">{{$player2_name}}</h2>
    </div>
    <div class="card mb-6 ">
        <div class="card-body pt-9 reload overflow-hidden">
            <!--begin::Details-->

            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                        <tr class="fw-bolder fs-6 text-gray-800">
                            <th>Scored</th>
                            <th>To GO</th>
                            <th> {{$sum_wins_1}} - {{$sum_wins_2}} </th>
                            <th>Scored</th>
                            <th>To GO</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($scores as $row)
                            @if (!$loop->last)
                                <tr>
                                    <td><input value="{{$row[0]}}" type="number" class="form-control form-control-solid text-center scored" disabled/></td>
                                    <td><input value="{{$row[1]}}" type="number" class="form-control form-control-solid text-center togo togo_{{$loop->iteration}}_1" disabled/></td>

                                    <td><input type="number" class="form-control form-control-solid text-center togo" value="{{3 * $loop->index}}" disabled /></td>
                            
                                    <td><input value="{{$row[2]}}" type="number" class="form-control form-control-solid text-center scored"disabled/></td>
                                    <td><input value="{{$row[3]}}" type="number" class="form-control form-control-solid text-center togo togo_{{$loop->iteration}}_2" disabled /></td>
                                </tr>
                            @else
                                <tr>
                                    <td><input value="{{$row[0]}}" type="number" class="form-control form-control-solid text-center scored" @if ($auth_player_num == 1)  onchange="scored($(this), 1)" @else disabled @endif/></td>
                                    <td><input value="{{$row[1]}}" type="number" class="form-control form-control-solid text-center togo togo_{{$loop->iteration}}_1" disabled/></td>

                                    <td><input type="number" class="form-control form-control-solid text-center togo" value="{{3 * $loop->index}}" disabled /></td>
                                    
                                    <td><input value="{{$row[2]}}" type="number" class="form-control form-control-solid text-center scored" @if ($auth_player_num == 2)  onchange="scored($(this), 2)" @else disabled @endif /></td>
                                    <td><input value="{{$row[3]}}" type="number" class="form-control form-control-solid text-center togo togo_{{$loop->iteration}}_2" disabled /></td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!--end::Details-->
        </div>
    </div>
    <div class="d-flex justify-content-around mt-4">
        <a href="game-genration" class="btn btn-flex btn-dark px-6">
            <span class="svg-icon svg-icon-2x">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path opacity="0.3" d="M22 5V19C22 19.6 21.6 20 21 20H19.5L11.9 12.4C11.5 12 10.9 12 10.5 12.4L3 20C2.5 20 2 19.5 2 19V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5ZM7.5 7C6.7 7 6 7.7 6 8.5C6 9.3 6.7 10 7.5 10C8.3 10 9 9.3 9 8.5C9 7.7 8.3 7 7.5 7Z" fill="currentColor"></path>
                    <path d="M19.1 10C18.7 9.60001 18.1 9.60001 17.7 10L10.7 17H2V19C2 19.6 2.4 20 3 20H21C21.6 20 22 19.6 22 19V12.9L19.1 10Z" fill="currentColor"></path>
                </svg>
            </span>
            <span class="d-flex flex-column align-items-start ms-2">
                <span class="fs-3 fw-bolder">New</span>
                <span class="fs-7">Some description</span>
            </span>
        </a>
        <a href="{{url('game/stats', $game_id)}}" class="btn btn-flex btn-dark px-6">
            <span class="svg-icon svg-icon-2x">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path opacity="0.3" d="M22 5V19C22 19.6 21.6 20 21 20H19.5L11.9 12.4C11.5 12 10.9 12 10.5 12.4L3 20C2.5 20 2 19.5 2 19V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5ZM7.5 7C6.7 7 6 7.7 6 8.5C6 9.3 6.7 10 7.5 10C8.3 10 9 9.3 9 8.5C9 7.7 8.3 7 7.5 7Z" fill="currentColor"></path>
                    <path d="M19.1 10C18.7 9.60001 18.1 9.60001 17.7 10L10.7 17H2V19C2 19.6 2.4 20 3 20H21C21.6 20 22 19.6 22 19V12.9L19.1 10Z" fill="currentColor"></path>
                </svg>
            </span>
            <span class="d-flex flex-column align-items-start ms-2">
                <span class="fs-3 fw-bolder">State</span>
                <span class="fs-7">Some description</span>
            </span>
        </a>
        <a href="../games" class="btn btn-flex btn-dark px-6">
            <span class="svg-icon svg-icon-2x">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path opacity="0.3" d="M22 5V19C22 19.6 21.6 20 21 20H19.5L11.9 12.4C11.5 12 10.9 12 10.5 12.4L3 20C2.5 20 2 19.5 2 19V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5ZM7.5 7C6.7 7 6 7.7 6 8.5C6 9.3 6.7 10 7.5 10C8.3 10 9 9.3 9 8.5C9 7.7 8.3 7 7.5 7Z" fill="currentColor"></path>
                    <path d="M19.1 10C18.7 9.60001 18.1 9.60001 17.7 10L10.7 17H2V19C2 19.6 2.4 20 3 20H21C21.6 20 22 19.6 22 19V12.9L19.1 10Z" fill="currentColor"></path>
                </svg>
            </span>
            <span class="d-flex flex-column align-items-start ms-2">
                <span class="fs-3 fw-bolder">Exit</span>
                <span class="fs-7">Some description</span>
            </span>
        </a>
        <button class="btn btn-flex btn-dark px-6" wire:click="close_game()">
            <span class="svg-icon svg-icon-2x">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path opacity="0.3" d="M22 5V19C22 19.6 21.6 20 21 20H19.5L11.9 12.4C11.5 12 10.9 12 10.5 12.4L3 20C2.5 20 2 19.5 2 19V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5ZM7.5 7C6.7 7 6 7.7 6 8.5C6 9.3 6.7 10 7.5 10C8.3 10 9 9.3 9 8.5C9 7.7 8.3 7 7.5 7Z" fill="currentColor"></path>
                    <path d="M19.1 10C18.7 9.60001 18.1 9.60001 17.7 10L10.7 17H2V19C2 19.6 2.4 20 3 20H21C21.6 20 22 19.6 22 19V12.9L19.1 10Z" fill="currentColor"></path>
                </svg>
            </span>
            <span class="d-flex flex-column align-items-start ms-2">
                <span class="fs-3 fw-bolder">Finish</span>
                <span class="fs-7">Some description</span>
            </span>
        </button>
    </div>
    <!--end::Navbar-->
    <input type="hidden" id="double_in" value="{{$double_in}}">
    <input type="hidden" id="double_out" value="{{$double_out}}">
    <input type="hidden" id="player_2" value="{{$player2}}">
    <input type="hidden" id="scores_count" value="{{count($scores)}}">
</div>

@push('modals')
    <div class="modal fade joining_request_modal" tabindex="-1" id="kt_modal_1">
        <div class="modal-dialog">
            <div class="modal-content">
                <!--begin::Alert-->
                <div class="alert alert-dismissible bg-light-info d-flex flex-center flex-column py-10 px-10 px-lg-20 mb-0">
                    <!--begin::Close-->
                    <button type="button" class="position-absolute top-0 end-0 m-2 btn btn-icon btn-icon-info" data-bs-dismiss="alert">
                        <span class="svg-icon svg-icon-1">...</span>
                    </button>
                    <!--end::Close-->

                    <!--begin::Icon-->
                    <span class="svg-icon svg-icon-5tx svg-icon-info mb-5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path opacity="0.3" d="M12 22C13.6569 22 15 20.6569 15 19C15 17.3431 13.6569 16 12 16C10.3431 16 9 17.3431 9 19C9 20.6569 10.3431 22 12 22Z" fill="currentColor"></path>
                            <path d="M19 15V18C19 18.6 18.6 19 18 19H6C5.4 19 5 18.6 5 18V15C6.1 15 7 14.1 7 13V10C7 7.6 8.7 5.6 11 5.1V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V5.1C15.3 5.6 17 7.6 17 10V13C17 14.1 17.9 15 19 15ZM11 10C11 9.4 11.4 9 12 9C12.6 9 13 8.6 13 8C13 7.4 12.6 7 12 7C10.3 7 9 8.3 9 10C9 10.6 9.4 11 10 11C10.6 11 11 10.6 11 10Z" fill="currentColor"></path>
                        </svg>
                    </span>
                    <!--end::Icon-->

                    <!--begin::Wrapper-->
                    <div class="text-center">
                        <!--begin::Title-->
                        <h1 class="fw-bolder mb-5">ِAhmed Said Ask For join </h1>
                        <!--end::Title-->

                        <!--begin::Separator-->
                        <div class="separator separator-dashed border-info opacity-25 mb-5"></div>
                        <!--end::Separator-->

                        <!--begin::Content-->
                        <div class="mb-9 text-dark">
                            {{-- <strong>ِAhmed Said</strong> Ask For join  --}}
                        </div>
                        <!--end::Content-->

                        <!--begin::Buttons-->
                        <div class="d-flex flex-center flex-wrap">
                            <a href="#" class="btn btn-outline btn-outline-info btn-active-info m-2">Cancel</a>
                            <a href="#" class="btn btn-info m-2">Ok, I got it</a>
                        </div>
                        <!--end::Buttons-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Alert-->   
            </div>
        </div>
    </div>
    {{--  --}}
    <div class="modal fade" tabindex="-1" id="double_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Winner Winner Chicken Dinner ✔✔</h5>
    
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                    </div>
                    <!--end::Close-->
                </div>
                <div class="modal-body">
                    <a href="#" class="btn btn-dark w-100 mb-3">First</a>
                    <a href="#" class="btn btn-dark w-100 mb-3">Seconde</a>
                    <a href="#" class="btn btn-dark w-100 mb-3">Therd</a>
                </div>
            </div>
        </div>
    </div>
@endpush
@push('js')
    <script>

        const scored = (obj, player_num) => {

            let row = +$('#scores_count').val();
            let double_in = +$('#double_in').val();
            let double_out = +$('#double_out').val();
            let scored = +$(obj).val();
            let togo = +$(`.togo_${row - 1}_${player_num}`).val() - scored

            if (scored > 179 || (double_out && togo == 1) 
                                || (double_in && scored % 2 != 0)) {

                alert (" What are you doing 👀👀 ")
            }
            else if (togo == 0) {

                if (double_out) {

                    $('#double_modal').modal('show')

                    // Don't Complete Game until ans question
                    @this.call('legFinished', (player_num == 1))

                } else {

                    @this.call('legFinished', scored, togo, (player_num == 1))

                    alert(" Winner Winner Chicken Dinner ✔✔ ")
                }


            }
            else {
                if (togo < 0) {
                    togo = togo + scored;
                    scored = 0;
                    $(obj).val(scored)
                }
                @this.call('roundFinished', scored, togo, (player_num == 1))
                // $(obj).val(null)
                blockThis($('.reload'))
            }
        }

        window.Echo.join('game.{{$game_id}}')
        .joining((user) => {
            if (+'{{$player1}}' != user.id && +$('#player_2').val() != user.id)  {
                // $('.joining_request_modal').modal('show')
                if (confirm(`${user.name} want to join`)) {

                    @this.call('playerJoining', user.id)
                } else {

                    @this.call('cancelJoiningRequest')
                }
            }
        }).listen('CancelJoiningEvent', (e) => {
            alert('Your Request Has Been Rejected 👋🏻👋🏻')
            window.location.href = '/games';
        });     
    </script>
@endpush
