@extends('admin.base_template')
@section('main')
<!-- Start content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="page-title-box">
          <h4 class="page-title">View Products List</h4>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Products List</a></li>
            <li class="breadcrumb-item active">View Products List</li>
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
                  <h4 class="mt-0 header-title">View Products List</h4>
                </div>
                <div class="col-md-2"> <a class="btn btn-info cticket" href="{{ route('products.create')}}" role="button" style="margin-left: 20px;"> Add Products</a></div>
              </div>
              <hr style="margin-bottom: 50px;background-color: darkgrey;">
              <div class="table-rep-plugin">
                <div class="table-responsive b-0" data-pattern="priority-columns">
                  <table id="userTable" class="table  table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th data-priority="1">Products Name</th>
                        <th data-priority="1">Category Name</th>
                        <th data-priority="1">Price</th>
                        <th data-priority="1">MRP</th>
                        <th data-priority="1">Weight</th>
                        <th data-priority="1">Description</th>
                        <th data-priority="1">Image 1</th>
                        <th data-priority="1">Image 2</th>
                        <th data-priority="1">Image 3</th>
                        <th data-priority="1">Image 4</th>
                        <th data-priority="1">Status</th>
                        <th data-priority="1">Action</th>
                      </tr>
                    </thead>
                   <tbody>
                    @foreach ($products as $key => $value)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$value->name ?? ''}}</td>
                        <td>{{$value->Category->category_name ?? ''}}</td>
                        <td>{{$value->price ?? ''}}</td>
                        <td>{{$value->mrp ?? ''}}</td>
                        <td>{{$value->weight ?? ''}}</td>
                        <td>{!!$value->description !!}</td>
                        <td>
                            <img width="100" src="{{asset($value->image_1)}}" alt="">
                        </td>
                        <td>
                            <img width="100" src="{{asset($value->image_2)}}" alt="">
                        </td>
                        <td>
                            <img width="100" src="{{asset($value->image_3)}}" alt="">
                        </td>
                        <td>
                            <img width="100" src="{{asset($value->image_4)}}" alt="">
                        </td>

                        <td>
                          
                            @if ($value->status == 1)
                               <p class="text-success">Activate</p>
                            @else
                                <p class="text-danger">Deactivate</p>
                            @endif
                        </td>

                        <td width="100px">
                            <a href="{{ route('products.edit', ['id' => $value->id]) }}" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit products">
                                <i class="fas fa-edit"></i>
                            </a>
                        
                            <form action="{{ route('products.destroy', $value->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE') 
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this products?');" data-toggle="tooltip" data-placement="top" title="Delete products">
                                    <i class="fas fa-trash"></i> 
                                </button>
                            </form>

                            <form action="{{ route('products.updateStatus', $value->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PATCH') 
                                @if ($value->status == 1) 
                                    <button type="submit" class="btn btn-warning mt-2" onclick="return confirm('Are you sure you want to deactivate this products?');" data-toggle="tooltip" data-placement="top" title="Deactivate products">
                                        <i class="fas fa-times"></i>
                                    </button>
                                @else 
                                    <button type="submit" class="btn btn-success mt-2" onclick="return confirm('Are you sure you want to activate this products?');" data-toggle="tooltip" data-placement="top" title="Activate products">
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