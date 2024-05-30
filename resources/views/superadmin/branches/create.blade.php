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
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">


    

@if($errors->any())
    {!! implode('', $errors->all('<div>:message</div>')) !!}
@endif
                         
                            <form action="{{store_url()}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="propertyname">Branch Name</label>
                                            <input type="text" name="name" value="{{old('name')}}" class="form-control"
                                                   id="propertyname" required
                                                   placeholder="Enter title">
                                        </div>
                                        <div class="form-group">
                                            <label for="propertyname">Branch code</label>
                                            <input type="text" name="branch_code" value="{{old('branch_code')}}" class="form-control"
                                                   id="propertyname" required
                                                   placeholder="Enter branch code">
                                        </div>
                                        <div class="form-group">
                                            <label for="propertyname">Admin Email</label>
                                            <input type="email" name="email" value="{{old('email')}}" class="form-control"
                                                   id="propertyname" required
                                                   placeholder="Enter Email">
                                            @error('email')
                                            <ul class="parsley-errors-list filled" id="parsley-id-45">
                                                <li class="parsley-required">{{ $message }}</li>
                                            </ul>
                                            @enderror
                                        </div>

                                    </div>
                                    <!-- end col -->
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="property-location">Location</label>
                                            <input type="text" value="{{old('location')}}" name="location"
                                                   class="form-control" required
                                                   id="property-location" maxlength="50"
                                                   placeholder="Enter location">
                                        </div>
                                        <div class="form-group">
                                            <label for="property-location">Admin Password</label>
                                            <input type="password" value="{{old('password')}}" name="password"
                                                   class="form-control" required
                                                   id="property-location"
                                                   placeholder="Enter Password">
                                        </div>
                                    </div>


                                </div>
                                <!-- end row -->

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success waves-effect waves-light">Submit
                                    </button>
                                    <a href="{{index_url()}}" type="button"
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


        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        2018 - 2020 &copy; Zircos theme by <a href="#">Coderthemes</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->

    </div>
@endsection
@section('styles')
    @include('layouts.datatables_style')
@endsection

@section('scripts')
    @include('layouts.datatables_js')
@endsection
