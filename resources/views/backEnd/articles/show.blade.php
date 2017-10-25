@extends('master')

<title>{{$article->title}}</title>


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
            <div class="col-md-8">
            <h2><label> {{$article->title}}</label></h2><br/>
    	       <p><label>{!!substr($article->body, 0,300)!!}{!!strlen($article->body) > 300 ?"..." : ""!!}</label></p><br/>
    	       <img class="img-center" src="{{ asset('images/thumbnail/'.$article->image) }}" alt="{{ $article->title}}">
            </div>

            <div class="col-md-4">
              <div class="well">
                <dl class="dl-horizontal">
                  <dt>Created at: </dt>
                  <dd>{{date('M j, Y h:ia', strtotime($article->created_at))}}</dd>
                </dl>

                <dl class="dl-horizontal">
                  <dt>Updated at: </dt>
                  <dd>{{date('M j, Y h:ia', strtotime($article->updated_at))}}</dd>
                </dl>
                <dl class="dl-horizontal">
                  <dt>Publish By: </dt>
                    <dd>{{$article->User->name}}</dd>
                </dl>
                 <dl class="dl-horizontal">
                  <dt>Category: </dt>
                  <dd>{{$article->subCategory->sub_name}}</dd>
                </dl>
                 
                <dl class="dl-horizontal">
                  <dt>Tags: </dt>
                    <dd>
                      @foreach($article->tags as $tag)
                          <p style="border: 1px ;">{{$tag->name}}</p>
                        @endforeach
                    </dd>
                </dl>
              </div>
              <a href="{{route('article.index')}}" class="btn btn-primary btn-ms pull-right">Back</a>
    
            </div>
        
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