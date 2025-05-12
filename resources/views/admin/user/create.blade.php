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
                    <h4 class="page-title">Add user</h4>
                    <ol class="breadcrumb" style="display:none">
                        <!-- <li class="breadcrumb-item"><a href="javascript:void(0);">CMS</a></li> -->
                        <li class="breadcrumb-item"><a href="javascript:void(0);">user</a></li>
                        <li class="breadcrumb-item active">Add user</li>
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
                            <h4 class="mt-0 header-title">Add user Form</h4>
                            <hr style="margin-bottom: 50px;background-color: darkgrey;">

                            <form action="{{ route('user.store') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control" value="{{ old('name', $user->name ?? '') }}" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Business Name</label>
                                        <input type="text" name="business_name" class="form-control" value="{{ old('business_name', $user->business_name ?? '') }}" required>
                                    </div>
                                </div>
                            
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label>Phone Number</label>
                                        <input type="text" name="phone" class="form-control" value="{{ old('phone', $user->phone ?? '') }}" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" value="{{ old('email', $user->email ?? '') }}" required>
                                    </div>
                                </div>
                            
                                <div class="form-group row">

                                    <div class="col-sm-6">
                                        <label>address <span style="color:red;">*</span></label>
                                        <input type="address" name="address" class="form-control" value="{{ old('address', $user->address ?? '') }}" required>
                                        @error('address')
                                            <div style="color:red">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-sm-6">
                                        <label>City <span style="color:red;">*</span></label>
                                        <input type="city" name="city" class="form-control" value="{{ old('city', $user->city ?? '') }}" required>
                                        @error('city')
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

@endsection
<!-- /booking_portal/public/ -->