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
                    <h4 class="page-title">Edit Blog</h4>
                    <ol class="breadcrumb" style="display:none">
                        <!-- <li class="breadcrumb-item"><a href="javascript:void(0);">CMS</a></li> -->
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Blog</a></li>
                        <li class="breadcrumb-item active">Edit Blog</li>
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
                            <h4 class="mt-0 header-title">Edit Blog Form</h4>
                            <hr style="margin-bottom: 50px;background-color: darkgrey;">

                          <form action="{{ route('block.update', $block->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label>Title <span style="color:red;">*</span></label>
                                    <input type="text" name="title" class="form-control" value="{{ old('title', $block->title) }}" required>
                                    @error('title') <div style="color:red">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-sm-6">
                                    <label>Upload New Images</label>
                                    <input type="file" name="image[]" class="form-control" multiple>
                                    @error('image') <div style="color:red">{{ $message }}</div> @enderror
                                    @error('image.*') <div style="color:red">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            @if($block->image)
                                <div class="form-group row">
                                    <div class="col-12">
                                        <label>Existing Images:</label>
                                        <div class="d-flex flex-wrap gap-2">
                                            @foreach(json_decode($block->image, true) as $img)
                                                <div style="position: relative; margin: 5px; text-align: center;">
                                                    <img src="{{ asset($img) }}" alt="Block Image"
                                                        style="height: 80px; width: auto; border:1px solid #ddd; display: block; margin-bottom: 5px;">

                                                    <!-- Remove Checkbox -->
                                                    <label style="font-size: 12px;">
                                                        <input type="checkbox" name="remove_images[]" value="{{ $img }}"> Remove
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label>Upload New Profile Image</label>
                                    <input type="file" name="profile_image" class="form-control" accept="image/*">
                                    @error('profile_image') <div style="color:red">{{ $message }}</div> @enderror

                                    @if($block->profile_image)
                                        <div style="margin-top: 10px;">
                                            <label>Existing Profile Image:</label><br>
                                            <img src="{{ asset($block->profile_image) }}" alt="Profile Image" style="height: 100px; width: auto; border:1px solid #ddd;">
                                            <br>
                                            <label style="font-size: 12px;">
                                                <input type="checkbox" name="remove_profile_image" value="1"> Remove Profile Image
                                            </label>
                                        </div>
                                    @endif
                                </div>

                              <div class="col-sm-6">
                                    <label>Upload New Video</label>
                                    <input type="file" name="video" class="form-control" accept="video/*">
                                    @error('video') <div style="color:red">{{ $message }}</div> @enderror

                                    @if($block->video)
                                        <div style="margin-top: 10px;">
                                            <label>Existing Video:</label><br>
                                            <video width="200" controls>
                                                <source src="{{ asset($block->video) }}" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                            <br>
                                            <label style="font-size: 12px;">
                                                <input type="checkbox" name="remove_video" value="1"> Remove Video
                                            </label>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control ckeditor">{{ old('description', $block->description) }}</textarea>
                                @error('description') <div style="color:red">{{ $message }}</div> @enderror
                            </div>

                            <div class="form-group row">
                                <div class="w-100 text-center">
                                    <button type="submit" class="btn btn-primary" style="margin-top: 10px;">
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
    CKEDITOR.replace('description');
</script>

@endsection
<!-- /booking_portal/public/ -->