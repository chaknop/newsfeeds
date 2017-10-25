@extends('frontEnd/master')

@section('title','News Feed | Erorre | 404')
@section('nav')
@endsection
@section('slider')
@endsection
@section('content')
 <section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="error_page">
            <h3>We Are Sorry</h3>
            <h1>404</h1>
            <p>Unfortunately, the page you were looking for could not be found. It may be temporarily unavailable, moved or no longer exists</p>
            <span></span> <a href="{{route('home')}}" class="wow fadeInLeftBig">Go to home page</a> </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <aside class="right_content">
          <div class="single_sidebar">
            <h2><span>Popular Post</span></h2>
             <ul class="spost_nav">
               @foreach($article as $art)
              <li>
                <div class="media wow fadeInDown"> <a href="{{route('articles.show',$art->id)}}" class="media-left"> <img src="{{ asset('images/thumbnail/'.$art->image) }}" alt="{{ $art->title}}"> </a>
                  <div class="media-body"> <a href="{{route('articles.show',$art->id)}}" class="catg_title"> {{$art->title}}</a> 

                  </div>
                  <small>{{$art->created_at->diffForHumans()}}</small><br/>
                  <i class="fa fa-user"></i>{{ $art->User->name }}
                </div>
              </li>
              @endforeach
            </ul>
          </div>
        </aside>
      </div>
    </div>
  </section>
  @endsection