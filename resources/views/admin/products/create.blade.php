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
                    <h4 class="page-title">Add Products</h4>
                    <ol class="breadcrumb" style="display:none">
                        <!-- <li class="breadcrumb-item"><a href="javascript:void(0);">CMS</a></li> -->
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Products</a></li>
                        <li class="breadcrumb-item active">Add Products</li>
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
                            <h4 class="mt-0 header-title">Add Products Form</h4>
                            <hr style="margin-bottom: 50px;background-color: darkgrey;">

                            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label>Products Name</label>
                                        <input type="text" name="name" class="form-control"  required>
                                    </div>
                                    
                                    {{-- <div class="col-sm-4">
                                        <label>Category <span style="color:red;">*</span></label>
                                        <select class="form-control" name="category_id" id="stateDropdown">
                                            <option selected disabled value="">Select Category</option>
                                            @foreach ($category as $value)
                                                <option value="{{ $value->id ?? ''}}">{{ $value->category_name ?? ''}}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <div style="color:red">{{ $message }}</div>
                                        @enderror
                                    </div> --}}

                                         <div class="col-sm-4"><br>
                                            <label class="form-label" style="margin-left: 10px" for="power">Select Meal Multipal</label>
                                            <div id="output"></div>
                                            <select data-placeholder="" name="category_id[]" multiple class="chosen-select">
                                                 
                                            @foreach ($category as $value)
                                                <option value="{{ $value->id ?? ''}}">{{ $value->category_name ?? ''}}</option>
                                            @endforeach
                                            </select>
                                            @error('meal_plan')
                                                <div style="color:red;">{{ $message }}</div>
                                            @enderror
                                        </div>

                                </div>
                            
                                <div class="form-group row">

                                  <div class="col-sm-6">
                                        <label>Price</label>
                                        <input type="number" name="price" class="form-control"  required>
                                    </div>

                                    <div class="col-sm-6">
                                        <label>MRP</label>
                                        <input type="number" name="mrp" class="form-control"  required>
                                    </div>

                                </div>

                                <div class="form-group row">

                                  <div class="col-sm-6">
                                        <label>Weight</label>
                                        <input type="text" name="weight" class="form-control"  required>
                                    </div>

                                </div>

                                <div class="form-group row">

                                    <div class="col-sm-6">
                                        <label>Image 1</label>
                                        <input type="file" name="image_1" class="form-control"  required>
                                    </div>

                                    <div class="col-sm-6">
                                        <label>Image 2</label>
                                        <input type="file" name="image_2" class="form-control"  required>
                                    </div>

                                </div>
                                
                                <div class="form-group row">

                                    <div class="col-sm-6">
                                        <label>Image 3</label>
                                        <input type="file" name="image_3" class="form-control"  required>
                                    </div>

                                    <div class="col-sm-6">
                                        <label>Image 4</label>
                                        <input type="file" name="image_4" class="form-control"  required>
                                    </div>

                                    <div class="col-sm-6 mt-2">
                                        <label>Video</label>
                                        <input type="file" name="video" class="form-control"  required>
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-12 mt-3">
                                        <label class="form-label" for="power">Description &nbsp;<span style="color:red;">*</span></label>
                                        <textarea class="form-control" name="description" id="editor1" required>{{ old('description') }}</textarea>
                                        @error('description')
                                            <div style="color:red">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-12 mt-3">
                                        <label class="form-label" for="power">Short Description &nbsp;<span style="color:red;">*</span></label>
                                        <textarea class="form-control" name="short_description" id="editor2" required>{{ old('short_description') }}</textarea>
                                        @error('short_description')
                                            <div style="color:red">{{$message}}</div>
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

<link rel="stylesheet" href="https://harvesthq.github.io/chosen/chosen.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="https://harvesthq.github.io/chosen/chosen.jquery.js"></script>
<script>
    document.getElementById('output').innerHTML = location.search;
    $(".chosen-select").chosen();
</script>

<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
  CKEDITOR.replace('editor1');
</script>
<script>
  CKEDITOR.replace('editor2');
</script>
{{-- 
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>

<script>
    CKEDITOR.replace('description', {
        toolbar: [
            { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike', 'RemoveFormat'] },
            { name: 'paragraph', items: ['NumberedList', 'BulletedList'] },
            { name: 'insert', items: ['Table', 'Link', 'Unlink'] },  // ✅ Table added here
            { name: 'styles', items: ['Format', 'FontSize'] },
            { name: 'colors', items: ['TextColor', 'BGColor'] },
            { name: 'tools', items: ['Maximize'] }
        ],
        height: 200
    });

    CKEDITOR.replace('short_description', {
        toolbar: [
            { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike', 'RemoveFormat'] },
            { name: 'paragraph', items: ['NumberedList', 'BulletedList'] },
            { name: 'insert', items: ['Table', 'Link', 'Unlink'] },  // ✅ Table added here too
            { name: 'styles', items: ['Format', 'FontSize'] },
            { name: 'colors', items: ['TextColor', 'BGColor'] },
            { name: 'tools', items: ['Maximize'] }
        ],
        height: 200
    });
</script> --}}



@endsection
<!-- /booking_portal/public/ -->