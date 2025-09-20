@extends('admin.base_template')
@section('main')
<!-- Start content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="page-title-box">
          <h4 class="page-title">View Stock Col List</h4>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Stock Col List</a></li>
            <li class="breadcrumb-item active">View Stock Col List</li>
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
                  <h4 class="mt-0 header-title">View Stock Col List</h4>
                </div>
                <div class="col-md-2">
                  <form method="POST" action="{{ route('stockcol.deleteLimit') }}" onsubmit="return confirm('Are you sure you want to delete the specified number of entries?');">
                    @csrf
                    <div class="input-group">
                      <input type="number" name="limit" class="form-control" min="1" placeholder="Limit" required>
                      <div class="input-group-append">
                        <button class="btn btn-danger" type="submit">Delete</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <hr style="margin-bottom: 50px;background-color: darkgrey;">
              <div class="table-rep-plugin">
                <div class="table-responsive b-0" data-pattern="priority-columns">
                  <table id="userTable" class="table  table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th data-priority="1">Name</th>
                        <th data-priority="1">Ticker</th>
                        <th data-priority="1">Exchange</th>
                        <th data-priority="1">Interval</th>
                        <th data-priority="1">Time</th>
                        <th data-priority="1">Date</th>
                        <th data-priority="1">Open</th>
                        <th data-priority="1">Close</th>
                        <th data-priority="1">High</th>
                        <th data-priority="1">Low</th>
                        <th data-priority="1">Volume</th>
                        <th data-priority="1">Quote</th>
                        <th data-priority="1">Base</th>
                      </tr>
                    </thead>
                   <tbody>
                    @foreach ($category as $key => $value)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$value->name ?? ''}}</td>
                        <td>{{$value->ticker ?? ''}}</td>
                        <td>{{$value->exchange ?? ''}}</td>
                        <td>{{$value->interval_at ?? ''}}</td>
                        <td>{{$value->time ?? ''}}</td>
                        <td>{{$value->time_2 ?? ''}}</td>
                        <td>{{$value->open ?? ''}}</td>
                        <td>{{$value->close ?? ''}}</td>
                        <td>{{$value->high ?? ''}}</td>
                        <td>{{$value->low ?? ''}}</td>
                        <td>{{$value->volume ?? ''}}</td>
                        <td>{{$value->quote ?? ''}}</td>
                        <td>{{$value->base ?? ''}}</td>

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