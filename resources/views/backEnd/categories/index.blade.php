@extends('master')
@section('title')

<title>List Categories</title>
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
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body">
            <div class="form-group">
            <a href="{{route('category.create')}}" class="btn btn-success">Add New Category</a>
          </div>
                <p class="text-center">{!! session('message') !!}</p>
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Body</th>
                      <th>Status</th>
                      <th>Create By</th>
                      <th>Created</th>
                      <th>Updated</th>

                      <th class="col-xs-2">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($category as $cate)
                    <tr>
                      <td>{{ $cate->id }}</td>
                      <td>{{ $cate->cate_name }}</td>
                      <td> {{ $cate->cate_body }}</td>
                      <td>@if($cate->status==1)
                      <i class="fa fa-circle text-success"> Active</i>
                         
                          @else 
                          Deactive
                        @endif
                      </td>

                      <td>{{ $cate->user->name }}</td>
                      
                      <td>{{ $cate->created_at }}</td>
                      <td>{{ $cate->updated_at }}</td>
                      <td>
                      <a href="#" class="btn btn-success btn-ms " >View</a>&nbsp;
                      <a href="{{route('category.edit',$cate->id)}}" class="btn btn-primary btn-ms">Edit</a>&nbsp;

                        <a onclick="return confirm('Are your sure?')" href="{{ route('category.delete',$cate->id)}}" class="btn btn-danger btn-ms">Delete</a>
                      </td>
                    </tr>
                    @endforeach
                  </table>
                </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
@endsection