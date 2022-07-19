<div class="content flex-row-fluid" id="kt_content">
    <!--begin::Navbar-->
    <div class="d-flex justify-content-around mb-4">
        <h2 class="text-gray-400">{{$player1_name}}</h2>
        <div class="d-flex" wire:ignore.self>
            <select class="form-select" aria-label="Select example" onchange="change_set($(this).val())">
                @for ($i = 1; $i <= $max_set; $i++)
                    <option value="{{$i}}"> Set Number : {{$i}}</option>
                @endfor
            </select>
            <select class="form-select" aria-label="Select example" onchange="change_leg($(this).val())">
                @for ($i = 1; $i < $max_leg; $i++)
                    <option value="{{$i}}"> Leg Number : {{$i}}</option>
                @endfor
            </select>
        </div>
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
                            <tr>
                                <td><input value="{{$row[0]}}" type="number" class="form-control form-control-solid text-center scored" disabled/></td>
                                <td><input value="{{$row[1]}}" type="number" class="form-control form-control-solid text-center togo togo_{{$loop->iteration}}_1" disabled/></td>

                                <td><input type="number" class="form-control form-control-solid text-center togo" value="{{3 * $loop->index}}" disabled /></td>
                        
                                <td><input value="{{$row[2]}}" type="number" class="form-control form-control-solid text-center scored"disabled/></td>
                                <td><input value="{{$row[3]}}" type="number" class="form-control form-control-solid text-center togo togo_{{$loop->iteration}}_2" disabled /></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!--end::Details-->
        </div>
    </div>
    <div class="d-flex justify-content-around mt-4">
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
    </div>
    <!--end::Navbar-->
</div>
@push('js')
    <script>
        const change_leg = (leg_num) => {

            blockThis($('.reload'))
            @this.set('current_leg', leg_num - 1)
        }

        const change_set = (set_num) => {

            blockThis($('.reload'))
            @this.set('current_set', set_num - 1)
        }
    </script>
@endpush