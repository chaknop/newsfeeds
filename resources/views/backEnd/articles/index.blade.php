@extends('master')
@section('title')

<title>List Article</title>
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
        <li><a href="{{route('article.index')}}">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>
        <!-- Main content -->
    <section class="content">
       <div class="box">
            <div class="box-header">
            @can('posts.create',Auth::user())
              <a href="{{route('article.create')}}" class="btn btn-success">Add New Article</a>
            @endcan
              <p class="text-center">{!! session('message') !!}</p>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                      <th>ID</th>
                      <th>Category</th>
                      <th>Title</th>
                      <th>Image</th>
                      <th>Status</th>
                      <th>Create By</th>
                       <th class="col-xs-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($article as $value)
                    <tr>
                      <td>{{ $value->id }}</td>
                      <td>{{ $value->SubCategory->sub_name}}</td>
                       <td>{{ $value->title}}</td>
                      
                      <td><img style="width: 120px;height:130px;" src="{{ asset('images/thumbnail/'.$value->image) }}" alt="{{ $value->title}}"></td>
                       <td>@if($value->is_publish==1)
                      <i class="fa fa-circle text-success"> Active</i>
                         
                          @else 
                          <p style="color:red;">Deactive</p>
                        @endif
                      </td>
                      <td>{{ $value->User->name }}</td>
                      
                      <td>
                      <a href="{{route('article.show',$value->id)}}" class="btn btn-success btn-ms " ><i class="glyphicon glyphicon-eye-open"></i> View</a>&nbsp;

                      @can('posts.update',Auth::user())
                      <a href="{{route('article.edit',$value->id)}}" class="btn btn-primary btn-ms"> <i class="fa fa-edit"></i> Edit</a>&nbsp;
                      @endcan

                      @can('posts.delete',Auth::user())
                        <a onclick="return confirm('Are you sure want to delete this article?')" href="{{ route('article.delete',$value->id)}}" class="btn btn-danger btn-ms"><i class="glyphicon glyphicon-trash"></i> Delete</a>
                      @endcan
                      </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                  <tr>
                      <th>ID</th>
                      <th>Category</th>
                      <th>Title</th>
                      <th>Image</th>
                      <th>Create By</th>
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