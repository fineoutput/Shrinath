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

                            <form action="{{ route('sni_price.store') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label>Name <span style="color:red;">*</span></label>
                                        <input type="text" name="name" class="form-control" value="{{ old('name', $price->name ?? '') }}" required>
                                        @error('name') <div style="color:red">{{ $message }}</div> @enderror
                                    </div>
                            
                                    <div class="col-sm-6">
                                        <label>Current Price <span style="color:red;">*</span></label>
                                        <input type="number" step="0.01" name="current_price" class="form-control" value="{{ old('current_price', $price->current_price ?? '') }}" required>
                                        @error('current_price') <div style="color:red">{{ $message }}</div> @enderror
                                    </div>

                                    <div class="col-sm-6">
                                        <label>Previous Price <span style="color:red;">*</span></label>
                                        <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', $price->price ?? '') }}" required>
                                        @error('price') <div style="color:red">{{ $message }}</div> @enderror
                                    </div>
                                    
                                </div>
                            
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label>Change Type <span style="color:red;">*</span></label>
                                        <select name="change_type" class="form-control" required>
                                            <option value="">Select Type</option>
                                            <option value="fixed" {{ old('change_type', $price->change_type ?? '') == 'fixed' ? 'selected' : '' }}>Fixed</option>
                                            <option value="percentage" {{ old('change_type', $price->change_type ?? '') == 'percentage' ? 'selected' : '' }}>Percentage</option>
                                        </select>
                                        @error('change_type') <div style="color:red">{{ $message }}</div> @enderror
                                    </div>
{{--                             
                                    <div class="col-sm-6">
                                        <label>Change Value <span style="color:red;">*</span></label>
                                        <input type="number" step="0.01" name="change_value" class="form-control" value="{{ old('change_value', $price->change_value ?? '') }}" required>
                                        @error('change_value') <div style="color:red">{{ $message }}</div> @enderror
                                    </div> --}}
                                </div>
                            
                                <div class="form-group row">
                                    <div class="w-100 text-center">
                                        <button type="submit" class="btn btn-danger" style="margin-top: 10px;">
                                            <i class="fa fa-save"></i> {{ isset($price) ? 'Update' : 'Submit' }}
                                        </button>
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