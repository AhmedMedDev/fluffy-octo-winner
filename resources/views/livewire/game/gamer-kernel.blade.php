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
                                @if ($open_for == $player1)
                                    <tr>
                                        <td><input value="{{$row[0]}}" type="number" class="form-control form-control-solid text-center scored"  disabled/></td>
                                        <td><input value="{{$row[1]}}" type="number" class="form-control form-control-solid text-center togo togo_{{$loop->iteration}}_1" disabled/></td>

                                        <td><input type="number" class="form-control form-control-solid text-center togo" value="{{3 * $loop->index}}" disabled /></td>
                                        
                                        <td><input value="{{$row[2]}}" type="number" class="form-control form-control-solid text-center scored" disabled/></td>
                                        <td><input value="{{$row[3]}}" type="number" class="form-control form-control-solid text-center togo togo_{{$loop->iteration}}_2" disabled /></td>
                                    </tr>
                                    <tr>
                                        <td><input type="number" class="form-control form-control-solid text-center scored"   onchange="scored($(this), 1)"/></td>
                                        <td><input type="number" class="form-control form-control-solid text-center togo togo_{{$loop->iteration}}_1" disabled/></td>

                                        <td><input type="number" class="form-control form-control-solid text-center togo" value="{{6 * $loop->index}}" disabled /></td>
                                        
                                        <td><input type="number" class="form-control form-control-solid text-center scored" disabled/></td>
                                        <td><input type="number" class="form-control form-control-solid text-center togo togo_{{$loop->iteration}}_2" disabled /></td>
                                    </tr>
                                @else
                                    <tr>
                                        <td><input value="{{$row[0]}}" type="number" class="form-control form-control-solid text-center scored" disabled /></td>
                                        <td><input value="{{$row[1]}}" type="number" class="form-control form-control-solid text-center togo togo_{{$loop->iteration}}_1" disabled/></td>

                                        <td><input type="number" class="form-control form-control-solid text-center togo" value="{{3 * $loop->index}}" disabled /></td>
                                        
                                        <td><input value="{{$row[2]}}" type="number" class="form-control form-control-solid text-center scored"  onchange="scored($(this), 2)"/></td>
                                        <td><input value="{{$row[3]}}" type="number" class="form-control form-control-solid text-center togo togo_{{$loop->iteration}}_2" disabled /></td>
                                    </tr>
                                @endif
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
        <a href="#" class="btn btn-flex btn-dark px-6">
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
        <a href="#" class="btn btn-flex btn-dark px-6">
            <span class="svg-icon svg-icon-2x">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path opacity="0.3" d="M22 5V19C22 19.6 21.6 20 21 20H19.5L11.9 12.4C11.5 12 10.9 12 10.5 12.4L3 20C2.5 20 2 19.5 2 19V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5ZM7.5 7C6.7 7 6 7.7 6 8.5C6 9.3 6.7 10 7.5 10C8.3 10 9 9.3 9 8.5C9 7.7 8.3 7 7.5 7Z" fill="currentColor"></path>
                    <path d="M19.1 10C18.7 9.60001 18.1 9.60001 17.7 10L10.7 17H2V19C2 19.6 2.4 20 3 20H21C21.6 20 22 19.6 22 19V12.9L19.1 10Z" fill="currentColor"></path>
                </svg>
            </span>
            <span class="d-flex flex-column align-items-start ms-2">
                <span class="fs-3 fw-bolder">Final</span>
                <span class="fs-7">Some description</span>
            </span>
        </a>
    </div>
    <!--end::Navbar-->
    <input type="hidden" id="player_2" value="{{$player2}}">
    <input type="hidden" id="scores_count" value="{{count($scores)}}">
</div>

@push('js')
    <script>

        const scored = (obj, player_num) => {

            if (confirm('Are You Sure ?')) {

                    let row = +$('#scores_count').val();

                    if (player_num == 2) row--;

                    let scored = +$(obj).val();

                    let togo = +$(`.togo_${row}_${player_num}`).val() - scored

                    @this.call('roundFinished', scored, togo, (player_num == 1))
                    blockThis($('.reload'))

                    // if (togo == 0) alert(" Winner Winner Chicken Dinner ✔✔")
                    // else if (+$(obj).val() > 179) alert (" What are you doing 👀👀 ")
                    // else if (togo < 0) {
                    //     togo += scored;
                    //     scored = 0;
                    // }
                    // else {

                    //     @this.call('roundFinished', scored, togo, (player_num == 1))
                    //     blockThis($('.reload'))
                    // }
                }
        }

        window.Echo.join('game.{{$game_id}}')
        .joining((user) => {
            if (+'{{$player1}}' != user.id && +$('#player_2').val() != user.id)  {
                if (confirm(`${user.name} want to join`)) {

                    @this.call('playerJoining', user.id)
                } 
                // else you should redirect to game seen
            }
        });
    </script>
@endpush
