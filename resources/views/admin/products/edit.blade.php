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

                            <form action="{{ route('products.update', $products->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                            
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label>Products Name</label>
                                        <input type="text" name="name" class="form-control" value="{{ old('name', $products->name) }}" required>
                                    </div>
                                    
                                    <div class="col-sm-4">
                                        <label>Category <span style="color:red;">*</span></label>
                                        <select class="form-control" name="category_id" id="stateDropdown">
                                            <option selected disabled value="">Select Category</option>
                                            @foreach ($category as $value)
                                                <option value="{{ $value->id }}" {{ $products->category_id == $value->id ? 'selected' : '' }}>
                                                    {{ $value->category_name ?? '' }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <div style="color:red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            
                                <div class="form-group row">

                                  <div class="col-sm-6">
                                        <label>Price</label>
                                        <input type="number" name="price" value="{{ old('price', $products->price) }}" class="form-control"  required>
                                    </div>

                                    <div class="col-sm-6">
                                        <label>MRP</label>
                                        <input type="number" name="mrp" value="{{ old('mrp', $products->mrp) }}" class="form-control"  required>
                                    </div>

                                </div>

                                <div class="form-group row">

                                  <div class="col-sm-6">
                                        <label>Weight</label>
                                        <input type="number" name="weight" value="{{ old('weight', $products->weight) }}" class="form-control"  required>
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label>Image 1</label>
                                        <input type="file" name="image_1" class="form-control">
                                        @if($products->image_1)
                                            <div class="mt-2">
                                                <img src="{{ asset($products->image_1) }}" alt="Image 1" width="100">
                                            </div>
                                        @endif
                                    </div>
                            
                                    <div class="col-sm-6">
                                        <label>Image 2</label>
                                        <input type="file" name="image_2" class="form-control">
                                        @if($products->image_2)
                                            <div class="mt-2">
                                                <img src="{{ asset($products->image_2) }}" alt="Image 2" width="100">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label>Image 3</label>
                                        <input type="file" name="image_3" class="form-control">
                                        @if($products->image_3)
                                            <div class="mt-2">
                                                <img src="{{ asset($products->image_3) }}" alt="Image 3" width="100">
                                            </div>
                                        @endif
                                    </div>
                            
                                    <div class="col-sm-6">
                                        <label>Image 4</label>
                                        <input type="file" name="image_4" class="form-control">
                                        @if($products->image_4)
                                            <div class="mt-2">
                                                <img src="{{ asset($products->image_4) }}" alt="Image 4" width="100">
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-sm-6">
                                        <label>Video</label>
                                        <input type="file" name="video" class="form-control" accept="video/*">

                                        @if($products->video)
                                            <div class="mt-2">
                                                <video width="300" controls>
                                                    <source src="{{ asset($products->video) }}" type="video/mp4">
                                                    Your browser does not support the video tag.
                                                </video>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            
                                <div class="form-group row">
                                    <div class="col-sm-12 mt-3">
                                        <label class="form-label" for="description">Description <span style="color:red;">*</span></label>
                                        <textarea class="form-control" name="description" id="description" required>{{ old('description', $products->description) }}</textarea>
                                        @error('description')
                                            <div style="color:red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            
                                <div class="form-group row">
                                    <div class="w-100 text-center">
                                        <button type="submit" style="margin-top: 10px;" class="btn btn-primary"><i class="fa fa-edit"></i> Update</button>
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