@extends('frontEnd/master')

@section('title','News Feed | contact')
@section('slider')
@endsection
@section('content')
<section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="contact_area">
            <h2>Contact Us</h2>
            
            <form action="send" method="post" class="contact_form">
            {{csrf_field()}}
              <input class="form-control" name="to" type="text" placeholder="Name*">
              <input class="form-control" type="email" placeholder="Email*">
              <textarea class="form-control" name="message" cols="30" rows="10" placeholder="Message*"></textarea>
              <input type="submit" value="Send">
            </form>
          </div>
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