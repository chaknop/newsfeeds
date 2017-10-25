
@extends('master')
@section('title')

<title>Users</title>
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
            <a href="{{route('user.create')}}" class="btn btn-success">Add New User</a>
          </div>
                <p class="text-center">{!! session('message') !!}</p>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                 <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Profile</th>
                      <th>Phone</th>
                      <th>Asigned Role</th>
                      <th class="col-xs-2">Status</th>
                     

                      <th class="col-xs-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                      <td>{{ $user->id }}</td>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->email }}</td>
                      <td><img src="{{ asset('images/user/'.$user->image) }}" alt="User Image"></td>
                      <td>{{ $user->phone }}</td>
                      <td>
                      @foreach($user->roles as $role)
                          {{$role->name}},
                      @endforeach
                      </td>
                      <td>@if($user->status==1)
                      <i class="fa fa-circle text-success"> Active</i>
                         
                          @else 
                          <p style="color:red;">Deactive</p>
                        @endif
                      </td>
                      
                      <td>
                      <a href="#" class="btn btn-success btn-ms " >View</a>&nbsp;
                      <a href="{{route('user.edit',$user->id)}}" class="btn btn-primary btn-ms">Edit</a>&nbsp;

                        <a onclick="return confirm('Are your sure?')" href="{{ route('user.delete',$user->id)}}" class="btn btn-danger btn-ms">Delete</a>
            
                      </td>
                    </tr>
                    @endforeach
                    </tbody>
                <tfoot>
                 <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Profile</th>
                      <th>Phone</th>
                      <th>Asigned Role</th>
                      <th class="col-xs-2">Status</th>
                     

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

