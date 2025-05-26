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
                    <h4 class="page-title">Edit Slider</h4>
                    <ol class="breadcrumb" style="display:none">
                        <!-- <li class="breadcrumb-item"><a href="javascript:void(0);">CMS</a></li> -->
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Slider</a></li>
                        <li class="breadcrumb-item active">Edit Slider</li>
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
                            <h4 class="mt-0 header-title">Edit Slider Form</h4>
                            <hr style="margin-bottom: 50px;background-color: darkgrey;">

                            <form action="{{ route('depots.update', $depots->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                            
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control" value="{{ old('name', $depots->name) }}" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Latitude</label>
                                        <input type="text" name="latitude" class="form-control" value="{{ old('latitude', $depots->latitude) }}" required>
                                    </div>
                                </div>
                            
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label>Longitude</label>
                                        <input type="text" name="longitude" class="form-control" value="{{ old('longitude', $depots->longitude) }}" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Location</label>
                                        <input type="text" name="location" class="form-control" value="{{ old('location', $depots->location) }}" required>
                                    </div>
                                </div>
                            
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label>Contact Person Name</label>
                                        <input type="text" name="contact_person_name" class="form-control" value="{{ old('contact_person_name', $depots->contact_person_name) }}" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Manager</label>
                                        <input type="text" name="manager" class="form-control" value="{{ old('manager', $depots->manager) }}" required>
                                    </div>
                                </div>
                            
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" value="{{ old('email', $depots->email) }}" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Working Hours</label>
                                        <input type="text" name="working_hours" class="form-control" value="{{ old('working_hours', $depots->working_hours) }}" required>
                                    </div>
                                </div>
                            
                                <div class="form-group row">
                                    <div class="w-100 text-center">
                                        <button type="submit" class="btn btn-primary mt-3">
                                            <i class="fa fa-save"></i> Update
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


<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>

<script>
     CKEDITOR.replace('description', {
        toolbar: [
            { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike', 'RemoveFormat'] },
            { name: 'paragraph', items: ['NumberedList', 'BulletedList'] },
            { name: 'insert', items: ['Link', 'Unlink'] },
            { name: 'styles', items: ['Format', 'FontSize'] },
            { name: 'colors', items: ['TextColor', 'BGColor'] },
            { name: 'tools', items: ['Maximize'] }
        ],
        height: 200
    });
</script>

@endsection
<!-- /booking_portal/public/ -->