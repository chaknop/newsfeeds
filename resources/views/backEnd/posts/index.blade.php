@extends('master')
@section('title')

<title>List Post</title>
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
            <a href="{{route('post.create')}}" class="btn btn-success">Add New Post</a>
          </div>
                <p class="text-center">{!! session('message') !!}</p>
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Title</th>
                      <th>Redirect</th>
                      <th>Slug</th>
                      <th>Body</th>
                      <th>Status</th>
                      <th>Created</th>
                      <th>Updated</th>
                      <th class="col-xs-2">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                    <tr>
                      <td>{{ $post->id }}</td>
                      <td>{{ $post->title }}</td>
                      <td> {{ $post->redirect }}</td>
                      <td> {{ $post->slug }}</td>
                      <td> {!! $post->body !!}</td>
                      <td>{{ $post->status }}</td>
                      
                      <td>{{ $post->created_at }}</td>
                      <td>{{ $post->updated_at }}</td>
                      <td>
                      <a href="{{route('post.show',$post->slug)}}" class="btn btn-success btn-ms " >View</a>&nbsp;
                      <a href="{{route('post.edit',$post->id)}}" class="btn btn-primary btn-ms">Edit</a>&nbsp;

                       <a onclick="return confirm('Are your sure?')" href="{{ route('post.delete',$post->id)}}" class="btn btn-danger btn-ms">Delete</a>
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