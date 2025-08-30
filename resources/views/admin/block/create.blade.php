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
                    <h4 class="page-title">Add Blog</h4>
                    <ol class="breadcrumb" style="display:none">
                        <!-- <li class="breadcrumb-item"><a href="javascript:void(0);">CMS</a></li> -->
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Blog</a></li>
                        <li class="breadcrumb-item active">Add Blog</li>
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
                            <h4 class="mt-0 header-title">Add Blog Form</h4>
                            <hr style="margin-bottom: 50px;background-color: darkgrey;">

                            <form action="{{ route('block.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label>Title <span style="color:red;">*</span></label>
                                        <input type="text" name="title" class="form-control" required>
                                        @error('title') <div style="color:red">{{ $message }}</div> @enderror
                                    </div>

                                    <div class="col-sm-6">
                                        <label>Images <span style="color:red;">*</span></label>
                                        <input type="file" name="image[]" class="form-control" multiple required>
                                        @error('images') <div style="color:red">{{ $message }}</div> @enderror
                                        @error('images.*') <div style="color:red">{{ $message }}</div> @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label>Video</label>
                                        <input type="file" name="video" class="form-control" multiple accept="video/*">
                                        @error('video') <div style="color:red">{{ $message }}</div> @enderror
                                        @error('video.*') <div style="color:red">{{ $message }}</div> @enderror
                                    </div>

                                    <div class="col-sm-6">
                                        <label>Profile Image</label>
                                        <input type="file" name="profile_image" class="form-control" accept="image/*">
                                        @error('profile_image') <div style="color:red">{{ $message }}</div> @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control ckeditor"></textarea>
                                    @error('description') <div style="color:red">{{ $message }}</div> @enderror
                                </div>

                                <div class="form-group row">
                                    <div class="w-100 text-center">
                                        <button type="submit" class="btn btn-danger" style="margin-top: 10px;">
                                            <i class="fa fa-save"></i> Submit
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

<!-- Include CKEditor -->
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description');
</script>

@endsection
<!-- /booking_portal/public/ -->