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
                  <table id="stockTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Ticker</th>
                            <th>Exchange</th>
                            <th>Interval</th>
                            <th>Time</th>
                            <th>Date</th>
                            <th>Open</th>
                            <th>Close</th>
                            <th>High</th>
                            <th>Low</th>
                            <th>Volume</th>
                            <th>Quote</th>
                            <th>Base</th>
                        </tr>
                    </thead>
                   {{-- <tbody>
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


                   </tbody> --}}
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

<link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">

<!-- jQuery + DataTables JS -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {
    $('#stockTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route("stockcol.data") }}',
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'name', name: 'name' },
            { data: 'ticker', name: 'ticker' },
            { data: 'exchange', name: 'exchange' },
            { data: 'interval_at', name: 'interval_at' },
            { data: 'time', name: 'time' },
            { data: 'time_2', name: 'time_2' },
            { data: 'open', name: 'open' },
            { data: 'close', name: 'close' },
            { data: 'high', name: 'high' },
            { data: 'low', name: 'low' },
            { data: 'volume', name: 'volume' },
            { data: 'quote', name: 'quote' },
            { data: 'base', name: 'base' },
        ],
        pageLength: 15
    });
});
</script>


@endsection