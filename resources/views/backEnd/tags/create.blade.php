@extends('master')
@section('title')

<title>Add Tag</title>
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
      {!! Form::open(['method' => 'POST', 'route' => 'tag.store', 'class' => 'form-horizontal']) !!}
      
        	<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        	    {!! Form::label('name', 'Name') !!}
        	    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
        	    <small class="text-danger">{{ $errors->first('name') }}</small>
        	</div>

          <div class="btn-group pull-right">
             
              {!! Form::submit("Create", ['class' => 'btn btn-success']) !!}
          </div>
           <div class="btn-group pull-left">
              <a href="{{route('tag.index')}}" class="btn btn-warning btn-ms">Back</a>
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
