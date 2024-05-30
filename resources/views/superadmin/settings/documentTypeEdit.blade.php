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
                            <h4 class="page-title">Document Type Edit </h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
                         
                            <form action="{{route('super-admin.documentType.update')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="hidId" value="{{$type->id}}">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="propertyname">Name</label>
                                            <input type="text" name="name" value="{{$type->name}}" class="form-control" id="length" required
                                                   placeholder="Document Type name">
                                        </div>  
                                    </div>
                                   

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="propertyname">Status</label>
                                            <select name="status" class="form-control" id="status">
                                                <option value="1" @if($type->status == '1') selected @endif>Active</option>
                                                <option value="0" @if($type->status == '0') selected @endif>Inative</option>
                                            </select>
                                        </div>  
                                    </div>

                                </div> 
                                 

                                <div class="text-center"> 
                          
                                    <button type="submit" class="btn btn-success waves-effect waves-light">Submit
                                    </button>
                                    <a href="{{url('super-admin/documentType')}}" type="button"
                                       class="btn btn-danger waves-effect waves-light">Cancel
                                    </a>
                                </div>
                            </form>
                            <!-- end form -->

                        </div>
                        <!-- end card-box -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->

            </div>
            <!-- end container-fluid -->

        </div>
        <!-- end content -->

    </div>
@endsection
@section('styles')
    @include('layouts.datatables_style')
@endsection

@section('scripts')
    @include('layouts.datatables_js')
<script>
$(document).ready(function(){
    $('input.timepicker').timepicker({});
});
</script>
@endsection
