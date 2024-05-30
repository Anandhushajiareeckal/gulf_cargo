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
                            <h4 class="page-title">{{page_title()}}</h4>
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

  
                            <table id="bookingdatatableAdmin"
                                   class="table table-striped table-bordered dt-responsive nowrap"
                                   style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>

                                <tr>
                                    <th>Booking No</th>
                                    <th>Sender Name</th>
                                    <th>Sender Phone</th>
                                    <th>Receiver Name</th>
                                    <th>Shipping Status</th>
                                    <th>Payment Method</th>
                                    <th>Courier Company</th>
                                    <th>Driver</th>
                                    <th>Date</th> 
                                    <th style="text-align: center">Action</th>
                                   
                                </tr>

                                </thead>

                                <tbody>
                                @foreach($shipments as $key=> $shipment)
                                <?php 
                                        if($shipment->statusVal->name == "Enquiry collected") {
                                            $showAddItems = true;
                                            $style ="style=background-color:yellow;padding:5px;";
                                        } else {
                                            $style ="style=background-color:none";
                                            $showAddItems = false;

                                        }
                                ?>
                                    <tr>
                                        <td>{{ $shipment->booking_number }}</td>
                                        <td>{{ $shipment->sender->name }}</td>
                                        <td>{{ $shipment->sender->phone??'-' }}</td>
                                        <td>{{ $shipment->receiver->name??""}}</td>
                                        <td><span {{ $style}}>{{ $shipment->statusVal->name }}</span></td>
                                        <td>{{ $shipment->payment_method }}</td>
                                        <td>{{ $shipment->courier_company }}</td>
                                        <td>{{ $shipment->driver?$shipment->driver->name:'-'}}</td> 
                                        <td>{{ !empty($shipment->created_date)? date('Y-m-d', strtotime($shipment->created_date)):''  }}</td>
                                        <td>  
                                        
                                            <a href="{{show_url($shipment->id)}}"
                                                class="btn btn-icon waves-effect waves-light btn-success">
                                                <i class="fas fa-eye"></i>
                                            </a> 
                                        </td>
                                         
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
    $('#bookingdatatableAdmin').DataTable({
        "aaSorting": [ [0,'desc'] ]
    }); 


}); 

    </script>
@endsection
