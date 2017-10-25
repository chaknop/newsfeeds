@extends('master')
@section('styles')
   <link href="{{ asset('AdminLTE-2.3.5/plugins/select2/select2.min.css') }}" rel="stylesheet" />
   <link href="{{ asset('AdminLTE-2.3.5/plugins/datepicker/datepicker3.css') }}" rel="stylesheet" />
   <link href="{{ asset('AdminLTE-2.3.5/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" />
   

@stop
@section('title')

<title>Add Article</title>
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
              {!! Form::open(['method' => 'POST', 'route' => 'article.store', 'class' => '
                form-horizontal','enctype'=>'multipart/form-data']) !!}
               <div class="form-group input-group-lg{{ $errors->has('title') ? ' has-error' : '' }}">
                  {!! Form::label('title', 'Title') !!}
                  {!! Form::text('title', null, ['class' => 'form-control', 'required' => 'required']) !!}
                  <small class="text-danger">{{ $errors->first('title') }}</small>
              </div>

              <div class="form-group{{ $errors->has('sub_id') ? ' has-error' : '' }}">
                      {!! Form::label('sub_id', 'Sub Category') !!}
                      {!! Form::select('sub_id', $SubCategory, null, ['id' => 'sub_id', 'class' => 'form-control', 'required' => 'required']) !!}
                      <small class="text-danger">{{ $errors->first('sub_id') }}</small>
               </div>

               <div class="form-group ">
                   {!! Form::label('tags[]', 'Tags') !!}
                   <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a Tag" style="width: 100%;" tabindex="-1" aria-hidden="true" name="tags[]">
                    @foreach($tags as $tag)
                     <option value="{{$tag->id}}">{{$tag->name}}</option>
                     @endforeach
                   </select>
              
               </div>

             
               <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                  {!! Form::label('image', 'Article Thumbnail') !!}
                  {!! Form::file('image', ['required' => 'required']) !!}
                  <p class="help-block">Choose an image for thumbnail </p>
                  <small class="text-danger">{{ $errors->first('image') }}</small>
              </div>

              <div class="box">
             <div class="box-header">
               <h3 class="box-title">Write Post Body Here
                 <small>Simple and fast</small>
               </h3>
               <!-- tools box -->
               <div class="pull-right box-tools">
                 <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                   <i class="fa fa-minus"></i></button>
                 </div>
                 <!-- /. tools -->
               </div>
               <!-- /.box-header -->
               <div class="box-body pad">
                 <textarea name="body" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="editor1"></textarea>
               </div>
             </div>
      
              <div class="form-group{{ $errors->has('publish_on') ? ' has-error' : '' }}">
                  {!! Form::label('publish_on', 'Publihs On') !!}
                  {!! Form::date('publish_on', null, ['class' => 'form-control', 'required' => 'required']) !!}
                  <small class="text-danger">{{ $errors->first('publish_on') }}</small>
              </div>

              <div class="form-group">
                  <div class="checkbox{{ $errors->has('is_publish') ? ' has-error' : '' }}">
                      <label for="is_publish">
                          {!! Form::checkbox('is_publish', '1', null, ['id' => 'is_publish']) !!} Status
                      </label>
                  </div>
                  <small class="text-danger">{{ $errors->first('is_publish') }}</small>
              </div>
              <div class="btn-group pull-right">
                 
                  {!! Form::submit("Create", ['class' => 'btn btn-success']) !!}
              </div>
               <div class="btn-group pull-left">
                  <a href="{{route('article.index')}}" class="btn btn-warning btn-ms">Back</a>
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
@stop
@section('scripts')
<script src="{{ asset('AdminLTE-2.3.5/plugins/select2/select2.min.js') }}"></script>
<script src="{{ asset('AdminLTE-2.3.5/plugins/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('AdminLTE-2.3.5/plugins/datepicker/bootstrap-datepicker.js') }}"></script>

<script src="{{ asset('AdminLTE-2.3.5/plugins/daterangepicker/daterangepicker.js') }}"></script>

<script>
  $(document).ready(function() {
    $(".select2").select2();
  });
</script>

<script>
    $(function () {
      // Replace the <textarea id="editor1"> with a CKEditor
      // instance, using default configuration.
      var options = {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
  };
      CKEDITOR.replace('editor1',options);
      //bootstrap WYSIHTML5 - text editor
      $(".textarea").wysihtml5();

      //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

    });
</script>
@endsection
