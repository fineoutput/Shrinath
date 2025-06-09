@extends('admin.base_template')
@section('main')
<!-- Start content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="page-title-box">
          <h4 class="page-title">View User List</h4>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">User List</a></li>
            <li class="breadcrumb-item active">View User List</li>
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
                  <h4 class="mt-0 header-title">View User List</h4>
                </div>
                <div class="col-md-2"> <a class="btn btn-info cticket" href="{{ route('user.create')}}" role="button" style="margin-left: 20px;"> Add User</a></div>
              </div>
              <hr style="margin-bottom: 50px;background-color: darkgrey;">
              <div class="table-rep-plugin">
                <div class="table-responsive b-0" data-pattern="priority-columns">
                  <table id="userTable" class="table  table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th data-priority="1">Name</th>
                        <th data-priority="1">Business Name</th>
                        <th data-priority="1">Email</th>
                        <th data-priority="1">Phone No</th>
                        {{-- <th data-priority="1">Depot</th> --}}
                        {{-- <th data-priority="1">State</th> --}}
                        <th data-priority="1">City</th>
                        <th data-priority="1">Address</th>
                        <th data-priority="1">Type</th>
                        <th data-priority="1">Status</th>
                        <th data-priority="1">Action</th>
                      </tr>
                    </thead>
                   <tbody>
                    @foreach ($user as $key => $value)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$value->name ?? ''}}</td>
                        <td>{{$value->business_name ?? ''}}</td>
                        <td>{{$value->email ?? ''}}</td>
                        <td>{{$value->phone ?? ''}}</td>
                        <td>{{$value->city ?? ''}}</td>
                        <td>{{$value->address ?? ''}}</td>
                        <td>
                          @if ($value->type == '1')
                              Normal User
                          @else
                            Retailer
                          @endif
                        </td>

                        <td>
                          
                            @if ($value->status == 1)
                               <p class="text-success">Activate</p>
                            @else
                                <p class="text-danger">Deactivate</p>
                            @endif
                        </td>

                        <td width="100px">
                            <a href="{{ route('user.edit', ['id' => $value->id]) }}" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit User">
                                <i class="fas fa-edit"></i>
                            </a>
                        
                            <form action="{{ route('user.destroy', $value->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE') 
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this User?');" data-toggle="tooltip" data-placement="top" title="Delete User">
                                    <i class="fas fa-trash"></i> 
                                </button>
                            </form>

                            <form action="{{ route('user.updateStatus', $value->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PATCH') 
                                @if ($value->status == 1) 
                                    <button type="submit" class="btn btn-warning mt-2" onclick="return confirm('Are you sure you want to deactivate this User?');" data-toggle="tooltip" data-placement="top" title="Deactivate User">
                                        <i class="fas fa-times"></i>
                                    </button>
                                @else 
                                    <button type="submit" class="btn btn-success mt-2" onclick="return confirm('Are you sure you want to activate this User?');" data-toggle="tooltip" data-placement="top" title="Activate User">
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