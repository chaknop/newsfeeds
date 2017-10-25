@extends('master')
@section('title')

<title>Update Role</title>
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
      {!! Form::model($permission, ['route' => ['permission.update', $permission->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
      
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
              {!! Form::label('name', 'Name') !!}
              {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
              <small class="text-danger">{{ $errors->first('name') }}</small>
          </div>

          <div class="form-group">
                  <label for="for">Permission for</label>
                  <select name="for" id="for" class="form-control">
                    <option selected disable>Select Permission for</option>
                    <option value="user">User</option>
                    <option value="post">Post</option>
                    <option value="other">Other</option>
                  </select>
          </div>
          
          <div class="btn-group pull-right">
             
              {!! Form::submit("Save", ['class' => 'btn btn-success']) !!}
          </div>
           <div class="btn-group pull-left">
              <a href="{{route('permission.index')}}" class="btn btn-warning btn-ms">Back</a>
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
              Are you sure want to delete this post?
              <br/>
              {{$permission->name}}
            </div>
            <div class="modal-footer">
              <div class="btn-group pull-left">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              </div>
              <div class="btn-group pull-right">
               {!! Form::open(['method' => 'DELETE', 'route' => ['permission.destroy',$permission->id], 'class' => 'form-horizontal']) !!}

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
