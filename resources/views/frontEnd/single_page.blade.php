
@extends('frontEnd/master')

@section('title')
{{$article2->title}}
@endsection
@section('slider')
@endsection
@section('content')

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=110473016345186";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

	 <section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="single_page">
            <ol class="breadcrumb">
              <li><a href="{{route('home')}}">Home</a></li>
              <li><a href="{{route('category',$article2->subCategory->id)}}">{{ $article2->SubCategory->sub_name}}</a></li>
              <li class="active">{{$article2->title}}</li>
            </ol>
            <h1>{{$article2->title}}</h1>
            <div class="post_commentbox"> <a href="#"><i class="fa fa-user"></i>{{ $article2->User->name }}</a> <span><i class="fa fa-calendar">
            </i>{{$article2->created_at->diffForHumans()}}</span> 
            <a href="{{route('category',$article2->subCategory->id)}}"><i class="fa fa-tags"></i>{{ $article2->SubCategory->sub_name}}</a> </div>
            <div class="single_page_content">

             <img class="img-center" src="{{ asset('images/'.$article2->image) }}" alt="{{ $article2->title}}">
              <p>{!! $article2->body!!}</p>

              <h3>Tag Clouds</h3>
              @foreach($article2->tags as $tag)
              <a href="{{route('tag',$tag->id)}}"><i class="fa fa-tags"></i>{{ $tag->name}}</a>
              @endforeach

              
            </div>
<div class="fb-comments" data-href="{{Request::url()}}" data-numposts="5">
               </div>
            <div class="social_link">
              <ul class="sociallink_nav">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
              </ul>
            </div>
            <div class="related_post">
              <h2>Related Post <i class="fa fa-thumbs-o-up"></i></h2>
              <ul class="spost_nav wow fadeInDown animated">
              @foreach($relatePost as $art)
                <li>
                  <div class="media"> <a class="media-left" href="{{route('articles.show',$art->id)}}"> <img src="{{ asset('images/thumbnail/'.$art->image) }}" alt="{{$art->title}}"> </a>
                    <div class="media-body"> <a class="catg_title" href="{{route('articles.show',$art->id)}}">{!! substr($art->title, 0,130)!!}{!!strlen($art->title) > 140 ?"..." : ""!!}</a> </div>
                  </div>
                </li>
                @endforeach
              
              </ul>
            </div>
          </div>
        </div>
      </div>
      <nav class="nav-slit"> <a class="prev" href="{{route('articles.show',$art->id)}}"> <span class="icon-wrap"><i class="fa fa-angle-left"></i></span>
      @foreach($relatePost as $key=>$art)
      @if($key==0)
        <div>
          <h3>{{$art->title}}</h3>
          <img src="{{ asset('images/thumbnail/'.$art->image) }}" alt="{{ $art->title}}/"> 
          </div>
          @else
        </a> <a class="next" href="{{route('articles.show',$art->id)}}"> <span class="icon-wrap"><i class="fa fa-angle-right"></i></span>

        <div>
         
         
          <h3>{{$art->title}}</h3>
          <img src="{{ asset('images/thumbnail/'.$art->image) }}" alt="{{ $art->title}}">
           </div>
         @endif
          @endforeach
        </a> </nav>
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
          <div class="single_sidebar">
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#category" aria-controls="home" role="tab" data-toggle="tab">Category</a></li>
              <li role="presentation"><a href="#video" aria-controls="profile" role="tab" data-toggle="tab">Video</a></li>
              <li role="presentation"><a href="#comments" aria-controls="messages" role="tab" data-toggle="tab">Comments</a></li>
            </ul>
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="category">
                <ul>
                   @foreach($SubCategory as $sub_cat)
                  <li class="cat-item"><a href="{{route('category',$sub_cat->id)}}">{{ $sub_cat->sub_name }}</a></li>
                   @endforeach
                </ul>
              </div>
              <div role="tabpanel" class="tab-pane" id="video">
                <div class="vide_area">
                  <iframe width="100%" height="250" src="http://www.youtube.com/embed/h5QWbURNEpA?feature=player_detailpage" frameborder="0" allowfullscreen></iframe>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane" id="comments">
                <ul class="spost_nav">
                  <li>
                    <div class="media wow fadeInDown"> <a href="single_page.html" class="media-left"> <img alt="" src="../images/post_img1.jpg"> </a>
                      <div class="media-body"> <a href="single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 1</a> </div>
                    </div>
                  </li>
                  <li>
                    <div class="media wow fadeInDown"> <a href="single_page.html" class="media-left"> <img alt="" src="../images/post_img2.jpg"> </a>
                      <div class="media-body"> <a href="single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 2</a> </div>
                    </div>
                  </li>
                  <li>
                    <div class="media wow fadeInDown"> <a href="single_page.html" class="media-left"> <img alt="" src="../images/post_img1.jpg"> </a>
                      <div class="media-body"> <a href="single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 3</a> </div>
                    </div>
                  </li>
                  <li>
                    <div class="media wow fadeInDown"> <a href="single_page.html" class="media-left"> <img alt="" src="../images/post_img2.jpg"> </a>
                      <div class="media-body"> <a href="single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 4</a> </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="single_sidebar wow fadeInDown">
            <h2><span>Sponsor</span></h2>
            <a class="sideAdd" href="#"><img src="../images/add_img.jpg" alt=""></a> </div>
          <div class="single_sidebar wow fadeInDown">
            <h2><span>Category Archive</span></h2>
            <select class="catgArchive">
              <option>Select Category</option>
              <option>Life styles</option>
              <option>Sports</option>
              <option>Technology</option>
              <option>Treads</option>
            </select>
          </div>
          <div class="single_sidebar wow fadeInDown">
            <h2><span>Links</span></h2>
            <ul>
              <li><a href="#">Blog</a></li>
              <li><a href="#">Rss Feed</a></li>
              <li><a href="#">Login</a></li>
              <li><a href="#">Life &amp; Style</a></li>
            </ul>
          </div>
        </aside>
      </div>
    </div>
  </section>
@endsection