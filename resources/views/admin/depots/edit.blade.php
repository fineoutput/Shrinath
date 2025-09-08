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

                            <form action="{{ route('depots.update', $depots->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control" value="{{ $depots->name }}" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Latitude</label>
                                        <input type="text" name="latitude" class="form-control" value="{{ $depots->latitude }}" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label>Longitude</label>
                                        <input type="text" name="longitude" class="form-control" value="{{ $depots->longitude }}" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Location</label>
                                        <input type="text" name="location" class="form-control" value="{{ $depots->location }}" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label>Contact Person Name</label>
                                        <input type="text" name="contact_person_name" class="form-control" value="{{ $depots->contact_person_name }}" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Manager</label>
                                        <input type="text" name="manager" class="form-control" value="{{ $depots->manager }}" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" value="{{ $depots->email }}" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Working Hours</label>
                                        <input type="text" name="working_hours" class="form-control" value="{{ $depots->working_hours }}" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label>Office Type</label>
                                        <input type="text" name="officetype" class="form-control" value="{{ $depots->officetype }}">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Contact</label>
                                        <input type="text" name="contact" class="form-control" value="{{ $depots->contact }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label>Pincode</label>
                                        <input type="text" name="pincode" class="form-control" value="{{ $depots->pincode }}">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Image</label>
                                        <input type="file" name="img" class="form-control">
                                        @if($depots->img)
                                            <img src="{{ asset($depots->img) }}" alt="Current Image" width="100" class="mt-2">
                                        @endif
                                    </div>
                                </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label>State</label>
                                <select name="state" id="state" class="form-control" required>
                                    <option value="">Select State</option>
                                    @foreach($states as $state)
                                        <option value="{{ $state->id }}" {{ $state->id == $depots->state_id ? 'selected' : '' }}>
                                            {{ $state->state_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-6">
                                <label>City</label>
                                <select name="city" id="city" class="form-control" required>
                                    <option value="">Select City</option>
                                </select>
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


<script>
    $(document).ready(function () {
        let selectedCityId = '{{ old("city", $depots->city_id ?? '') }}';

        $('#state').on('change', function () {
            var stateID = $(this).val();
            if (stateID) {
                $.ajax({
                    url: '{{ url("get-cities") }}/' + stateID,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('#city').empty().append('<option value="">Select City</option>');
                        $.each(data, function (key, value) {
                            let selected = (value.id == selectedCityId) ? 'selected' : '';
                            $('#city').append('<option value="' + value.id + '" ' + selected + '>' + value.city_name + '</option>');
                        });
                    }
                });
            } else {
                $('#city').empty().append('<option value="">Select City</option>');
            }
        });

        // Trigger change on page load to populate cities for selected state
        if ($('#state').val()) {
            $('#state').trigger('change');
        }
    });
</script>

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