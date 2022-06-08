<div class="content flex-row-fluid" id="kt_content">
    <!--begin::Navbar-->
    <div class="d-flex justify-content-around mb-4">
        <h2 class="text-gray-400">Player 1</h2>
        <h2 class="text-gray-400">Player 2</h2>
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
                            <th>. . . </th>
                            <th>Scored</th>
                            <th>To GO</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="number" class="form-control form-control-solid  border-success text-center scored" id="scored_0_1" data-player="1" data-row="0"/></td>
                            <td><input type="number" class="form-control form-control-solid text-center togo" value="501" disabled /></td>
                            <td>. .</td>
                            <td><input type="number" class="form-control form-control-solid text-center scored" id="scored_0_2" data-player="2" data-row="0"/></td> 
                            <td><input type="number" class="form-control form-control-solid text-center togo" value="501" disabled /></td>
                        </tr>
                        @for ($i = 1; $i < 10; $i++)
                            <tr>
                                <td><input type="number" class="form-control form-control-solid text-center scored" id="scored_{{$i}}_1" data-player="1" data-row="{{$i}}" disabled/></td>
                                <td><input type="number" class="form-control form-control-solid text-center togo togo_{{$i}}_1" disabled/></td>

                                <td><input type="number" class="form-control form-control-solid text-center togo" value="{{3 * $i}}" disabled /></td>

                                <td><input type="number" class="form-control form-control-solid text-center scored" id="scored_{{$i}}_2" data-player="2" data-row="{{$i}}" disabled/></td>
                                <td><input type="number" class="form-control form-control-solid text-center togo togo_{{$i}}_2" disabled /></td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>

            <!--end::Details-->
        </div>
    </div>
    <div class="d-flex justify-content-around mt-4">
        <a href="game.settings" class="btn btn-flex btn-dark px-6">
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
</div>

@push('js')
    <script>
        $('.scored').on('change', function() {
            let togo = +$(this).parent().next().find('.togo').val() - +$(this).val()
            let row = +$(this).attr('data-row');
            let player = +$(this).attr('data-player');

            if (togo == 0) alert(" Winner Winner Chicken Dinner ✔✔")
            else if (togo < 0 || +$(this).val() > 179) alert (" What are you doing 👀👀 ")

            else {
                // Compute new togo
                $(`.togo_${row + 1}_${player}`).val(togo)

                // Computing Observing
                $(this).prop('disabled', true);
                $(this).removeClass('border-success')

                // if row has been completed , create new
                if (player == 2) {
                    $(`#scored_${row + 1}_1`).addClass('border-success')
                    $(`#scored_${row + 1}_1`).prop('disabled', false);
                    $(`#scored_${row + 1}_2`).prop('disabled', false);
                } else {
                    $(`#scored_${row}_2`).addClass('border-success')
                }
                blockThis($('.reload'))
                // Broadcast to other players
            }
        })

        let playerNum = 0;

        blockThis($('.reload'))

        if (+'{{$open_for}}' == '{{auth()->user()->id}}')  {

            unblockThis($('.reload'))
        }

        window.Echo.join('game.{{$game_id}}')
        .here((users) => {

            // playerNum = users.length ;
        })
        .joining((user) => {

            if (+'{{$player1}}' != user.id)  {
                if (+$('#player_2').val() != user.id) {
                    if (confirm(`${user.name} want to join`)) {

                        @this.call('playerJoining', user.id)
                        // playerNum++;
                    } 
                }
            }

            if (+'{{$open_for}}' == '{{auth()->user()->id}}')  {

                unblockThis($('.reload'))
            }
        })
        .leaving((user) => {

            blockThis($('.reload'))
        });
    </script>
@endpush
