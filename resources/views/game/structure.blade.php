@extends('layouts.master')

@push('css')
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        .blockui-message{
            display:flex;
            align-items:center;
            border-radius:.475rem;
            box-shadow:0 0 50px 0 rgba(82,63,105,.15);
            background-color:#fff;
            color:#7e8299;
            font-weight:500;
            margin:auto;
            width:fit-content;
            padding:.85rem 1.75rem!important
        }
        .blockui-message .spinner-border{
            margin-right:.65rem
        }
    </style>
@endpush
@section('content')
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
                                <td><input type="number" class="form-control form-control-solid text-center scored" data-player="1" data-row="0"/></td>
                                <td><input type="number" class="form-control form-control-solid text-center togo" value="501" disabled /></td>
                                <td>. .</td>
                                <td><input type="number" class="form-control form-control-solid text-center scored" data-player="2" data-row="0"/></td>
                                <td><input type="number" class="form-control form-control-solid text-center togo" value="501" disabled /></td>
                            </tr>
                            @for ($i = 1; $i < 10; $i++)
                                <tr>
                                    <td><input type="number" class="form-control form-control-solid text-center scored" data-player="1" data-row="{{$i}}"/></td>
                                    <td><input type="number" class="form-control form-control-solid text-center togo togo_{{$i}}_1" disabled/></td>

                                    <td><input type="number" class="form-control form-control-solid text-center togo" value="{{3 * $i}}" disabled /></td>

                                    <td><input type="number" class="form-control form-control-solid text-center scored" data-player="2" data-row="{{$i}}"/></td>
                                    <td><input type="number" class="form-control form-control-solid text-center togo togo_{{$i}}_2" disabled /></td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>



                <!--end::Details-->
            </div>
        </div>
        <!--end::Navbar-->
    </div>
@endsection

@push('js')
    <script>
        $('.scored').on('change', function() {
            let togo = +$(this).parent().next().find('.togo').val() - +$(this).val()
            let row = +$(this).attr('data-row') + 1;
            let player = +$(this).attr('data-player');

            if (togo == 0) alert(" Winner Winner Chicken Dinner ✔✔")
            else if (togo < 0 || +$(this).val() > 179) alert (" What are you doing 👀👀 ")

            else {
                $(`.togo_${row}_${player}`).val(togo)
                $(this).prop('disabled', true);

                var block = $('.reload')

                $(block).block({
                    message: '<div class="blockui-message"><span class="spinner-border text-primary"></span> Loading...</div>',
                    timeout: 2000, 
                    overlayCSS: {
                        backgroundColor: 'rgba(0,0,0,.05)',
                        opacity: 0.8,
                        cursor: 'wait'
                    },
                    css: {
                        border: 0,
                        padding: 0,
                        backgroundColor: 'transparent'
                    }
                });
            }
        })
    </script>
@endpush
