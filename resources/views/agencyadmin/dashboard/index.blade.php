@extends('layouts.appagency')


@section('content')
    <div class="content-page" id="content-page" id="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                {!! breadcrumbs() !!}
                            </div>
                            <h4 class="page-title">Dashboard</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

{{--                <div class="row">--}}
{{--                    <div class="col-lg-6 col-xl-3">--}}
{{--                        <div class="card widget-box-three">--}}
{{--                            <div class="card-body">--}}
{{--                                <div class="float-right mt-2">--}}
{{--                                    <i class="mdi mdi-chart-areaspline display-3 m-0"></i>--}}
{{--                                </div>--}}
{{--                                <div class="overflow-hidden">--}}
{{--                                    <p class="text-uppercase font-weight-medium text-truncate mb-2">Statistics</p>--}}
{{--                                    <h2 class="mb-0"><span data-plugin="counterup">34578</span> <i--}}
{{--                                            class="mdi mdi-arrow-up text-success font-24"></i></h2>--}}
{{--                                    <p class="text-muted mt-2 m-0"><span class="font-weight-medium">Last:</span> 30.4k--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- end col -->--}}

{{--                    <div class="col-lg-6 col-xl-3">--}}
{{--                        <div class="card widget-box-three">--}}
{{--                            <div class="card-body">--}}
{{--                                <div class="float-right mt-2">--}}
{{--                                    <i class="mdi mdi-account-convert display-3 m-0"></i>--}}
{{--                                </div>--}}
{{--                                <div class="overflow-hidden">--}}
{{--                                    <p class="text-uppercase font-weight-medium text-truncate mb-2">User Today</p>--}}
{{--                                    <h2 class="mb-0"><span data-plugin="counterup">895</span> <i--}}
{{--                                            class="mdi mdi-arrow-down text-danger font-24"></i></h2>--}}
{{--                                    <p class="text-muted mt-2 m-0"><span class="font-weight-medium">Last:</span> 1250--}}
{{--                                    </p>--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- end col -->--}}

{{--                    <div class="col-lg-6 col-xl-3">--}}
{{--                        <div class="card widget-box-three">--}}
{{--                            <div class="card-body">--}}
{{--                                <div class="float-right mt-2">--}}
{{--                                    <i class="mdi mdi-layers display-3 m-0"></i>--}}
{{--                                </div>--}}
{{--                                <div class="overflow-hidden">--}}
{{--                                    <p class="text-uppercase font-weight-medium text-truncate mb-2">User This Month</p>--}}
{{--                                    <h2 class="mb-0"><span data-plugin="counterup">52410</span><i--}}
{{--                                            class="mdi mdi-arrow-up text-success font-24"></i></h2>--}}
{{--                                    <p class="text-muted mt-2 m-0"><span class="font-weight-medium">Last:</span> 40.33k--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- end col -->--}}

{{--                    <div class="col-lg-6 col-xl-3">--}}
{{--                        <div class="card widget-box-three">--}}
{{--                            <div class="card-body">--}}
{{--                                <div class="float-right mt-2">--}}
{{--                                    <i class="mdi mdi-av-timer display-3 m-0"></i>--}}
{{--                                </div>--}}
{{--                                <div class="overflow-hidden">--}}
{{--                                    <p class="text-uppercase font-weight-medium text-truncate mb-2">Request Per--}}
{{--                                        Minute</p>--}}
{{--                                    <h2 class="mb-0"><span data-plugin="counterup">652</span> <i--}}
{{--                                            class="mdi mdi-arrow-down text-danger font-24"></i></h2>--}}
{{--                                    <p class="text-muted mt-2 m-0"><span class="font-weight-medium">Last:</span> 956</p>--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- end col -->--}}
{{--                </div>--}}
                <!-- end row -->


            </div>
            <!-- end container-fluid -->

        </div>
        <!-- end content -->



@endsection
