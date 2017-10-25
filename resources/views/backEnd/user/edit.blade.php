@extends('master')
@section('title')

<title>Update User</title>
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
      {!! Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'PUT', 'class' => 'form-horizontal','enctype'=>'multipart/form-data']) !!}
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
       <img src="{{ asset('images/user/'.$user->image) }}" class="pull-right img-responsive">
          {!! Form::label('image', 'User Profile') !!}
          {!! Form::file('image') !!}
          <p class="help-block">Choose an image for profile </p>
          <small class="text-danger">{{ $errors->first('image') }}</small>
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
                <div class="row">
                  @foreach ($roles as $role)
                      <div class="col-lg-1">
                        <div class="checkbox">
                          <label ><input type="checkbox" name="role[]" value="{{ $role->id }}"
                          @foreach ($user->roles as $user_role)
                            @if ($user_role->id == $role->id)
                              checked
                            @endif
                          @endforeach> {{ $role->name }}</label>
                        </div>
                      </div>
                  @endforeach
                </div>
                </div>
          </div>
          <div class="btn-group pull-right">
             
              {!! Form::submit("Save", ['class' => 'btn btn-success']) !!}
          </div>
           <div class="btn-group pull-left">
              <a href="{{route('user.index')}}" class="btn btn-warning btn-ms">Back</a>
          </div>
      {!! Form::close() !!}

            &nbsp;
        <a class="btn btn-danger btn-ms" data-toggle="modal" href='#modal-id'>Delete</a>
      </div>
      
      <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal-id">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="gridSystemModalLabel"> Message</h4>
            </div>
            <div class="modal-body">
              Are you sure want to delete this user?
              <br/>
              {{$user->name}}
            </div>
            <div class="modal-footer">
              <div class="btn-group pull-left">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              </div>
              <div class="btn-group pull-right">
               {!! Form::open(['method' => 'DELETE', 'route' => ['user.destroy',$user->id], 'class' => 'form-horizontal']) !!}

               <div class="btn-group pull-right">

                 {!! Form::submit("Delete", ['class' => 'btn btn-danger']) !!}
               </div>
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
