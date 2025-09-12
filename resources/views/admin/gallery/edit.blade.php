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
                    <h4 class="page-title">Edit Gallery</h4>
                    <ol class="breadcrumb" style="display:none">
                        <!-- <li class="breadcrumb-item"><a href="javascript:void(0);">CMS</a></li> -->
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Gallery</a></li>
                        <li class="breadcrumb-item active">Edit Gallery</li>
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
                            <h4 class="mt-0 header-title">Edit Gallery Form</h4>
                            <hr style="margin-bottom: 50px;background-color: darkgrey;">
                            <form action="{{ route('gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                            
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label>Title</label>
                                        <input type="text" name="title" class="form-control" value="{{ old('title', $gallery->title) }}" required>
                                    </div>

                                    <div class="col-sm-6">
                                        <label>Select Category</label>
                                        <select class="form-control" name="category_id" id="">
                                            <option selected disabled>Select</option>
                                            @foreach ($category as $value)
                                                <option value="{{ $value->id }}" 
                                                    @if (old('category_id', $gallery->category_id) == $value->id) selected @endif>
                                                    {{ $value->title ?? '' }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-sm-6">
                                        <label>Image</label>
                                        <input type="file" name="image" class="form-control">
                                        @if ($gallery->image)
                                            <div style="margin-top: 10px;">
                                                <img src="{{ asset($gallery->image) }}" alt="Current Image" width="120">
                                            </div>
                                        @endif
                                    </div>
                            
                                </div>
                            
                                <div class="form-group row">

                                </div>
                            
                                <div class="form-group row">
                                    <div class="w-100 text-center">
                                        <button type="submit" style="margin-top: 10px;" class="btn btn-danger">
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

@endsection
<!-- /booking_portal/public/ -->