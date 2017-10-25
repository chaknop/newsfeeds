@extends('master')
@section('title')

<title>Add User</title>
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
      {!! Form::open(['method' => 'POST', 'route' => 'user.store', 'class' => 'form-horizontal','enctype'=>'multipart/form-data']) !!}
      
        	<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        	    {!! Form::label('name', 'Name') !!}
        	    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required','placeholder'=>'Name','value'=>old('name')]) !!}
        	    <small class="text-danger">{{ $errors->first('name') }}</small>
        	</div>

          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              {!! Form::label('email', 'Email') !!}
              {!! Form::text('email', null, ['class' => 'form-control', 'required' => 'required','placeholder'=>'Email','value'=>old('email')]) !!}
              <small class="text-danger">{{ $errors->first('email') }}</small>
          </div>

          <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
              {!! Form::label('phone', 'Phone') !!}
              {!! Form::text('phone', null, ['class' => 'form-control', 'required' => 'required','placeholder'=>'phone','value'=>old('phone')]) !!}
              <small class="text-danger">{{ $errors->first('phone') }}</small>
          </div>
          
           <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                  {!! Form::label('image', 'Article Thumbnail') !!}
                  {!! Form::file('image', ['required' => 'required']) !!}
                  <p class="help-block">Choose an image for thumbnail </p>
                  <small class="text-danger">{{ $errors->first('image') }}</small>
          </div>

          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              {!! Form::label('password', 'Password') !!}
              {!! Form::password('password', ['class' => 'form-control', 'required' => 'required','placeholder'=>'Password','value'=>old('password')]) !!}
              <small class="text-danger">{{ $errors->first('password') }}</small>
          </div>

          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              {!! Form::label('password_confirmation', 'Comfirm Password') !!}
              {!! Form::password('password_confirmation', ['class' => 'form-control', 'required' => 'required','placeholder'=>'Comfirm Password']) !!}
              <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
          </div>

         
            <div class="form-group">
              <div class="checkbox{{ $errors->has('status') ? ' has-error' : '' }}">
                  <label for="status">
                      {!! Form::checkbox('status', '1', null, ['id' => 'status']) !!} Status
                  </label>
              </div>


              <small class="text-danger">{{ $errors->first('status') }}</small>
          </div>

          <div class="form-group">
           <label>Assign Role</label>
              <div class="checkbox{{ $errors->has('role') ? ' has-error' : '' }}">
              @foreach($roles as $role)
                  <label for="role">
                    
                      {!! Form::checkbox('role', $role->id, null, ['id' => 
                      $role->id,'name'=>'role[]']) !!}
                      
                       {{$role->name}}
                  </label>
                  @endforeach
              </div>
              <small class="text-danger">{{ $errors->first('role') }}</small>
          </div>
          </div>
          <div class="btn-group pull-right">
             
              {!! Form::submit("Create", ['class' => 'btn btn-success']) !!}
          </div>
           <div class="btn-group pull-left">
              <a href="{{route('user.index')}}" class="btn btn-warning btn-ms">Back</a>
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
