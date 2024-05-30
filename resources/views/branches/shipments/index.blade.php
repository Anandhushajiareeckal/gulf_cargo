@extends('layouts.app')

@section('content')

    <div class="content-page" id="content-page">
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
                            <h4 class="page-title">Invoices</h4>
                            @can(permission_create())
                                <div class="fa-pull-right pb-3"><a href="{{create_url()}}"
                                                                   class="btn btn-success">Add New</a></div>
                            @endcan
                        </div>
                    </div>

                </div>


                <div class="row">
                    <div class="col-sm-12">

                        <div class="card-box table-responsive">
{{--                            <form action="" method="get">--}}
{{--                                <div class="row justify-content-center">--}}

{{--                                    <div class="form-group">--}}
{{--                                        <input type="date" value="{{date('Y-m-d')}}" max="{{date('Y-m-d')}}"--}}
{{--                                               class="form-control" id="propertyname" name="date"--}}
{{--                                               placeholder="Enter title">--}}
{{--                                    </div>--}}
{{--                                    <div class="pl-1">--}}
{{--                                        <button type="submit" class="btn btn-success waves-effect waves-light">Submit--}}
{{--                                        </button>--}}
{{--                                    </div>--}}

{{--                                </div>--}}
{{--                            </form>--}}


                            <table id="bookingdatatable"
                                   class="table table-striped table-bordered dt-responsive nowrap"
                                   style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>

                                <tr>
                                    @canany([permission_edit(),permission_view(),'shipment-show'])
                                        <th style="text-align: center">Action</th>
                                    @endcanany
                                    <th>Book<br>No</th>
                                    <th>No<br>Pcs</th>
                                    <th>Tot<br>Wgt</th>
                                    <th>Sender<br>Name</th>
                                    <th>Sender<br>Phone</th>
                                    <th>Receiver<br>Name</th>
                                    <th>Receiver<br>Country</th>
                                    <th>Receiver<br>State</th>
                                    <th>Shipping<br>Status</th>
                                    <th>Payment<br>Method</th>
                                    <th>Courier<br>Company</th>
                                    <th>Driver/<br>Staff</th>
                                    <th>Date</th>

                                </tr>

                                </thead>

                                <tbody>
                                    <?php  $lastStatus = '';
                                        $statusList = [];
                                    ?>
                                @foreach($shipments as $key=> $shipment)

                                <?php
                                    // if(!empty($shipment->statusVal->name)){
                                        // if($shipment->statusVal->name == "Enquiry collected") {
                                        //     $showAddItems = true;
                                        //     $style ="style=background-color:yellow;padding:5px;";
                                        // } else {
                                        //     $style ="style=background-color:none";
                                        //     $showAddItems = false;
                                        // }
                                    // }
                                    $status = '';
                                    $lastStatus = '';
                                    $status = $shipment->statusVal->name;

                                    foreach($shipment->boxes as $box) {
                                        if(($box->boxStatuses != null)) {
                                            $statusList = $shipment->last_status;
                                        }
                                    }


                                    $lastStatus = (!empty($statusList) ) ? $statusList : $status ;
                                    if($lastStatus == 'Enquiry collected') {
                                            $showAddItems = true;
                                            $style ="style=background-color:yellow;padding:5px;";
                                    } else {
                                        $style ="style=background-color:none";
                                        $showAddItems = false;
                                    }
                                ?>
                                    <tr>
                                        <td>
                                            @can(permission_edit())
                                            @if(branch()->id == $shipment->branch_id)
                                                <a href="{{edit_url($shipment->id)}}"
                                                    class="btn btn-xs btn-icon waves-effect waves-light btn-warning">
                                                    <i class="fas  fa-lg fa-pencil-alt"></i>
                                                </a>
                                            @endif
                                            @endcan
                                            @can(permission_view())
                                                <a href="{{show_url($shipment->id)}}"
                                                    class="btn btn-xs btn-icon waves-effect waves-light btn-success">
                                                    <i class="fas  fa-lg fa-eye"></i>
                                                </a>
                                            @endcan
                                            @can('shipment-print')
                                                <a href="{{route('branch.shipment.print',$shipment->id)}}" target="_blank"
                                                    class="btn btn-xs btn-icon waves-effect waves-light btn-dark">
                                                    <i class="fas  fa-lg fa-print"   title="Customs copy"></i>
                                                </a>

                                                <a href="{{route('branch.shipment.print_customer',$shipment->id)}}" target="_blank"
                                                    class="btn btn-xs btn-icon waves-effect waves-light btn-dark">
                                                    <i class="fas  fa-lg fa-print"   title="Customer copy"></i>
                                                </a>

                                            @endcan
                                            @if($showAddItems)
                                            @if(branch()->id == $shipment->branch_id)
                                                <a href="{{edit_url($shipment->id)}}"
                                                    class="btn btn-xs btn-icon waves-effect waves-light btn-warning">
                                                    <i class="fas  fa-lg fa-plus"></i>
                                                </a>
                                            @endif
                                            @endif
                                        </td>
                                        <td>{{ $shipment->booking_number }}</td>
                                        <td>{{ $shipment->number_of_pcs }}</td>
                                        <td>{{ $shipment->grand_total_weight }}</td>
                                        <td>{{ $shipment->sender->name }}</td>
                                        <td>{{ $shipment->sender->phone??'-' }}</td>
                                        <td>{{ $shipment->receiver->name??""}}</td>
                                        <td>{{ $shipment->receiver->address->country->name??""}}</td>
                                        <td>{{ $shipment->receiver->address->state->name??""}}</td>
                                        <td><span {{  (!empty($lastStatus))?$style:''}}>{{  $lastStatus??'' }}</span></td>
                                        <td>{{ $shipment->payment_method }}</td>
                                        <td>{{ $shipment->agency?$shipment->agency->name:'-' }}</td>
                                        <td>    @if($shipment->collected_by == 'driver')
                                                    {{ $shipment->driver?$shipment->driver->name:'-'}}
                                                @else
                                                    {{$shipment->staff?$shipment->staff->full_name:'-'}}
                                                @endif
                                        </td>
                                        <td>{{ !empty($shipment->created_date)? date('d-m-Y', strtotime($shipment->created_date)):''  }}</td>

                                        <!-- @canany([permission_edit(),permission_view(),'shipment-show'])
                                            <form method="post" action="{{delete_url($shipment->id)}}"> -->
                                                <!-- <td>
                                                    @can(permission_edit())
                                                        <a href="{{edit_url($shipment->id)}}"
                                                           class="btn btn-icon waves-effect waves-light btn-warning">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                    @endcan
                                                    @can(permission_view())
                                                        <a href="{{show_url($shipment->id)}}"
                                                           class="btn btn-icon waves-effect waves-light btn-success">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                    @endcan
                                                    @can('shipment-print')
                                                        <a href="{{route('branch.shipment.print',$shipment->id)}}"
                                                           class="btn btn-icon waves-effect waves-light btn-dark">
                                                            <i class="fas fa-print"></i>
                                                        </a>
                                                    @endcan
                                                    @if($showAddItems)
                                                        <a href="{{route('branch.shipment.item',$shipment->id)}}"
                                                           class="btn btn-icon waves-effect waves-light btn-warning">
                                                            <i class="fas fa-plus"></i>
                                                        </a>
                                                    @endif
                                                </td> -->
                                            <!-- </form> -->
                                        <!-- @endcanany -->
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>

            </div>
            <!-- end container-fluid -->

        </div>
        <!-- end content -->

@endsection
@section('styles')
    @include('layouts.datatables_style')
@endsection

@section('scripts')
    @include('layouts.datatables_js')
    <script>

$(document).ready(function () {
    $('#bookingdatatable').DataTable({
        "autoWidth": false,
        "aaSorting": [ [0,'desc'] ],
        "scrollX": true,
        "responsive": false
    });

});

    </script>
@endsection
