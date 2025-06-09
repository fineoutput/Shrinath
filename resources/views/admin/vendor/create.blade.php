@extends('admin.base_template')
@section('main')
<!-- Start content -->
<style>
  
    form {
      margin-top: 20px;
    }
    
    select {
      width: 400px;
    }
    </style>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">Add Vendor</h4>
                    <ol class="breadcrumb" style="display:none">
                        <!-- <li class="breadcrumb-item"><a href="javascript:void(0);">CMS</a></li> -->
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Vendor</a></li>
                        <li class="breadcrumb-item active">Add Vendor</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- end row -->
        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-12">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <!-- show success and error messages -->
                            @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                            </div>
                            @endif
                            @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                            </div>
                            @endif
                            <!-- End show success and error messages -->
                            <h4 class="mt-0 header-title">Add Vendor Form</h4>
                            <hr style="margin-bottom: 50px;background-color: darkgrey;">

                            <form action="{{ route('vendors.store') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control" value="{{ old('name', $vendor->name ?? '') }}" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Business Name</label>
                                        <input type="text" name="business_name" class="form-control" value="{{ old('business_name', $vendor->business_name ?? '') }}" required>
                                    </div>
                                </div>
                            
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label>Phone Number</label>
                                        <input type="text" name="phone_no" class="form-control" value="{{ old('phone_no', $vendor->phone_no ?? '') }}" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" value="{{ old('email', $vendor->email ?? '') }}" required>
                                    </div>
                                </div>
                            
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <label>Depots <span style="color:red;">*</span></label>
                                        <select class="form-control" name="depot_id" id="stateDropdown">
                                            <option selected disabled value="">Select Depots</option>
                                            @foreach ($depots as $value)
                                                <option value="{{ $value->id }}" {{ old('depot_id', $vendor->depot_id ?? '') == $value->id ? 'selected' : '' }}>
                                                    {{ $value->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('state_id')
                                            <div style="color:red">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="col-sm-4">
                                        <label>State <span style="color:red;">*</span></label>
                                        <select class="form-control" name="state_id" id="stateDropdown">
                                            <option selected disabled value="">Select State</option>
                                            @foreach ($state as $value)
                                                <option value="{{ $value->id }}" {{ old('state_id', $vendor->state_id ?? '') == $value->id ? 'selected' : '' }}>
                                                    {{ $value->state_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('state_id')
                                            <div style="color:red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="col-sm-4">
                                        <label>City <span style="color:red;">*</span></label>
                                        <select name="city_id" id="cityDropdown" class="form-control" required>
                                            <option selected disabled value="">Select City</option>
                                            {{-- Cities will be loaded dynamically --}}
                                        </select>
                                        @error('city_id')
                                            <div style="color:red">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                            
                                <div class="form-group row">
                                    <div class="w-100 text-center">
                                        <button type="submit" style="margin-top: 10px;" class="btn btn-danger"><i class="fa fa-user"></i> Submit</button>
                                    </div>
                                </div>
                            </form>
                            
                            
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div>
        <!-- end page content-->
    </div> <!-- container-fluid -->
</div> <!-- content -->


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#stateDropdown').on('change', function () {
            var stateID = $(this).val();
            if (stateID) {
                $.ajax({
                    url: '/public/get-cities/' + stateID,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('#cityDropdown').empty().append('<option selected disabled>Select City</option>');
                        $.each(data, function (key, value) {
                            $('#cityDropdown').append('<option value="' + value.id + '">' + value.city_name + '</option>');
                        });
                    }
                });
            } else {
                $('#cityDropdown').empty().append('<option selected disabled>Select City</option>');
            }
        });

        // Preload cities if vendor exists (edit page)
        @if(old('state_id', $vendor->state_id ?? false))
            $.ajax({
                url: '/get-cities/{{ old("state_id", $vendor->state_id ?? 0) }}',
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $('#cityDropdown').empty().append('<option selected disabled>Select City</option>');
                    $.each(data, function (key, value) {
                        var selected = value.id == '{{ old("city_id", $vendor->city_id ?? '') }}' ? 'selected' : '';
                        $('#cityDropdown').append('<option ' + selected + ' value="' + value.id + '">' + value.city_name + '</option>');
                    });
                }
            });
        @endif
    });
</script>




@endsection
<!-- /booking_portal/public/ -->