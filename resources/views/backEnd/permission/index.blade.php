@extends('master')
@section('title')

<title>Permission</title>
@stop
@section('styles')
<link rel="stylesheet" href="{{ asset('AdminLTE-2.3.5/plugins/datatables/dataTables.bootstrap.css') }}">
@stop

@section('contain')
 <div class="content-wrapper">
   <section class="content-header">
      <h1>
        Data Tables
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>
        <!-- Main content -->
    <section class="content">
       <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <div class="form-group">
            <a href="{{route('permission.create')}}" class="btn btn-success">Add New Role</a>
          </div>
                <p class="text-center">{!! session('message') !!}</p>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                 <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>For</th>
                      <th>Created</th>
                      <th>Updated</th>

                      <th class="col-xs-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                 @foreach($permissions as $permission)
                    <tr>
                      <td>{{ $permission->id }}</td>
                      <td>{{ $permission->name }}</td>
                      <td>{{ $permission->for }}</td>
                      <td>{{ $permission->created_at }}</td>
                      <td>{{ $permission->updated_at }}</td>
                      <td>
                      <a href="#" class="btn btn-success btn-ms " >View</a>&nbsp;
                      <a href="{{route('permission.edit',$permission->id)}}" class="btn btn-primary btn-ms">Edit</a>&nbsp;

                        <a onclick="return confirm('Are your sure?')" href="{{ route('permission.delete',$permission->id)}}" class="btn btn-danger btn-ms">Delete</a>
            
                      </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                 <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>For</th>
                      <th>Created</th>
                      <th>Updated</th>

                      <th class="col-xs-3">Action</th>
                    </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection

@section('scripts')
<script src="{{ asset('AdminLTE-2.3.5/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('AdminLTE-2.3.5/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<script>
  $(function () {
    $("#example1").DataTable();
  });
</script>
@endsection