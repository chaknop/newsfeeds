@extends('master')
@section('title')

<title>Add Post</title>
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
      <div class="box-body" style="padding: 20px">
    <p class="text-center">{!! session('message') !!}</p>
      {!! Form::open(['method' => 'POST', 'route' => 'post.store', 'class' => 'form-horizontal']) !!}
      
         <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
             {!! Form::label('title', 'Post Title') !!}
             {!! Form::text('title', null, ['class' => 'form-control', 'required' => 'required']) !!}
             <small class="text-danger">{{ $errors->first('title') }}</small>
         </div>
      	
      	<div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
      	    {!! Form::label('slug', 'Slug') !!}
      	    {!! Form::text('slug', null, ['class' => 'form-control', 'required' => 'required']) !!}
      	    <small class="text-danger">{{ $errors->first('slug') }}</small>
      	</div>

      	<div class="form-group{{ $errors->has('redirect') ? ' has-error' : '' }}">
      	    {!! Form::label('redirect', 'Redirect') !!}
      	    {!! Form::text('redirect', null, ['class' => 'form-control']) !!}
      	    <small class="text-danger"></small>
      	</div>

      	<div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
      	    {!! Form::label('body', 'Body') !!}
      	    {!! Form::textarea('body', null, ['class' => 'form-control', 'required' => 'required']) !!}
      	    <small class="text-danger">{{ $errors->first('body') }}</small>
      	</div>

      	<div class="form-group">
      	    <div class="checkbox{{ $errors->has('status') ? ' has-error' : '' }}">
      	        <label for="status">
      	            {!! Form::checkbox('status', '1', null, ['id' => 'status']) !!} Status
      	        </label>
      	    </div>
      	    <small class="text-danger">{{ $errors->first('status') }}</small>
      	</div>
          <div class="btn-group pull-right">
             
              {!! Form::submit("Create", ['class' => 'btn btn-success']) !!}
          </div>
           <div class="btn-group pull-left">
              <a href="{{route('post.index')}}" class="btn btn-warning btn-ms">Back</a>
          </div>
      {!! Form::close() !!}
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
  <section/>
  <section/>
 
@stop
