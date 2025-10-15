@extends('admin.base_template')
@section('main')
<!-- Start content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="page-title-box">
          <h4 class="page-title">View Popup List</h4>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Popup List</a></li>
            <li class="breadcrumb-item active">View Popup List</li>
          </ol>
        </div>
      </div>
    </div>
    <div class="page-content-wrapper">
      <div class="row">
        <div class="col-12">
          <div class="card m-b-20">
            <div class="card-body">
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
              <div class="row">
                <div class="col-md-10">
                  <h4 class="mt-0 header-title">View Popup List</h4>
                </div>
                <div class="col-md-2"> <a class="btn btn-info cticket" href="{{ route('popup.create')}}" role="button" style="margin-left: 20px;"> Add Popup</a></div>
              </div>
              <hr style="margin-bottom: 50px;background-color: darkgrey;">
              <div class="table-rep-plugin">
                <div class="table-responsive b-0" data-pattern="priority-columns">
                  <table id="userTable" class="table  table-striped">
                    <thead class="">
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th width="180px">Action</th>
                        </tr>
                    </thead>
                   <tbody>
                    @foreach ($block as $key => $value)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>
                            <img width="100" height="100" src="{{ $value->image }}" alt="">
                        </td>
                        <td>
                            @if($value->status == 1)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-danger">Inactive</span>
                                @endif
                        </td>

                        <td width="100px">
                            <a href="{{ route('popup.edit', ['id' => $value->id]) }}" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit popup">
                                <i class="fas fa-edit"></i>
                            </a>
                        
                            <form action="{{ route('popup.destroy', $value->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE') 
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this popup?');" data-toggle="tooltip" data-placement="top" title="Delete popup">
                                    <i class="fas fa-trash"></i> 
                                </button>
                            </form>

                            <form action="{{ route('popup.updateStatus', $value->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PATCH') 
                                @if ($value->status == 1) 
                                    <button type="submit" class="btn btn-warning mt-2" onclick="return confirm('Are you sure you want to deactivate this popup?');" data-toggle="tooltip" data-placement="top" title="Deactivate popup">
                                        <i class="fas fa-times"></i>
                                    </button>
                                @else 
                                    <button type="submit" class="btn btn-success mt-2" onclick="return confirm('Are you sure you want to activate this popup?');" data-toggle="tooltip" data-placement="top" title="Activate popup">
                                        <i class="fas fa-check"></i>
                                    </button>
                                @endif
                            </form>
                        </td>
                        

                        </tr>
                    @endforeach


                   </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div> <!-- end col -->
      </div> <!-- end row -->
    </div>
    <!-- end page content-->
  </div> <!-- container-fluid -->
</div> <!-- content -->

@endsection