@extends('layouts.master')

@section('content')
    <div class="content flex-row-fluid" id="kt_content">
        <!--begin::Navbar-->
        <div class="d-flex justify-content-around mb-4">
            <h2 class="text-gray-400">Player 1</h2>
            <h2 class="text-gray-400">Player 2</h2>
        </div>
        <div class="card mb-6 ">
            <div class="card-body pt-9 reload overflow-hidden">
                <!--begin::Totals-->
                <h2 class="text-dark d-flex justify-content-around mb-4">
                    Totals
                </h2>
                <hr>

                <div class="table-responsive text-center">
                    <table class="table gs-7 gy-7 gx-7">

                        <tbody class="fw-bold fs-6 text-gray-800 border-gray-200">
                            <tr>
                                <td>2</td>
                                <td>Legs</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>100+</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>140+</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>180's</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>High Finish</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Best Leg</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Worst Leg</td>
                                <td>1</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!--end::Totals-->
            </div>
        </div>
        <div class="card mb-6 ">
            <div class="card-body pt-9 reload overflow-hidden">
                <!--begin::Averagrs-->
                <h2 class="text-dark d-flex justify-content-around mb-4">
                    Averagrs
                </h2>
                <hr>

                <div class="table-responsive text-center">
                    <table class="table gs-7 gy-7 gx-7">

                        <tbody class="fw-bold fs-6 text-gray-800 border-gray-200">
                            <tr>
                                <td>125.03</td>
                                <td>Score</td>
                                <td>111.62</td>
                            </tr>
                            <tr>
                                <td>132.78</td>
                                <td>First 9</td>
                                <td>107.56</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!--end::Averagrs-->
            </div>
        </div>
    </div>
@endsection
