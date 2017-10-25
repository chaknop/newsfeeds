@extends('frontEnd/master')

@section('title','News Feed')
@section('content')
<section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="single_post_content">
            <h2><span>Business</span></h2>
            <div class="single_post_content_left">
              <ul class="business_catgnav  wow fadeInDown">
               @foreach($artss as $key=>$art_cat)
               @if($key==0)
                <li>
                  <figure class="bsbig_fig"> <a href="{{route('articles.show',$art_cat->id)}}" class="featured_img"> <img src="{{ asset('images/thumbnail/'.$art_cat->image) }}" alt="{{ $art_cat->title}}"> <span class="overlay"></span> </a>
                    <figcaption> <a href="{{route('articles.show',$art_cat->id)}}">{{$art_cat->title}}</a> </figcaption>
                    <p>{!!substr($art_cat->body, 0,300)!!}{!!strlen($art_cat->body) > 300 ?"..." : ""!!}</p>
                  </figure>
                </li>
              </ul>
            </div>
            
            <div class="single_post_content_right">
              <ul class="spost_nav">
             @else
                <li>
                  <div class="media wow fadeInDown"> <a href="{{route('articles.show',$art_cat->id)}}" class="media-left"> <img src="{{ asset('images/thumbnail/'.$art_cat->image) }}" alt="{{ $art_cat->title}}"> </a>
                    <div class="media-body"> <a href="{{route('articles.show',$art_cat->id)}}" class="catg_title"> {{$art_cat->title}}</a> </div>
                  </div>
                </li>
              @endif
              @endforeach
              </ul>
            </div>
          </div>
          <div class="fashion_technology_area">
            <div class="fashion">
              <div class="single_post_content">
                <h2><span>Technology</span></h2>
                <ul class="business_catgnav wow fadeInDown">
                 @foreach($article_cat  as $key=>$art_cat)
                    @if($key==0)
                  <li>
                    <figure class="bsbig_fig"> <a href="{{route('articles.show',$art_cat->id)}}" class="featured_img"> <img src="{{ asset('images/thumbnail/'.$art_cat->image) }}" alt="{{ $art_cat->title}}"> <span class="overlay"></span> </a>
                      <figcaption> <a href="{{route('articles.show',$art_cat->id)}}">{{$art_cat->title}}</a> </figcaption>
                      <p>{!!substr($art_cat->body, 0,300)!!}{!!strlen($art_cat->body) > 300 ?"..." : ""!!}</p>
                    </figure>
                  </li>
                </ul>
                <ul class="spost_nav">
                @else
                  <li>
                    <div class="media wow fadeInDown"> <a href="{{route('articles.show',$art_cat->id)}}" class="media-left"> <img src="{{ asset('images/thumbnail/'.$art_cat->image) }}" alt="{{ $art_cat->title}}"> </a>
                      <div class="media-body"> <a href="{{route('articles.show',$art_cat->id)}}" class="catg_title"> {{$art_cat->title}}</a> </div>
                    </div>
                  </li>  
                  @endif
                @endforeach               
                </ul>
              </div>
            </div>
            <div class="technology">
              <div class="single_post_content">
                <h2><span>Health</span></h2>
                <ul class="business_catgnav">
                 @foreach($health  as $key=>$art_cat)
                    @if($key==0)
                  <li>
                    <figure class="bsbig_fig wow fadeInDown"> <a href="{{route('articles.show',$art_cat->id)}}" class="featured_img"> <img src="{{ asset('images/thumbnail/'.$art_cat->image) }}" alt="{{ $art_cat->title}}"> <span class="overlay"></span> </a>
                      <figcaption> <a href="{{route('articles.show',$art_cat->id)}}">{{$art_cat->title}}</a> </figcaption>
                      <p>{!!substr($art_cat->body, 0,300)!!}{!!strlen($art_cat->body) > 300 ?"..." : ""!!}</p>
                    </figure>
                  </li>
                </ul>
                <ul class="spost_nav">
                @else
                  <li>
                    <div class="media wow fadeInDown"> <a href="{{route('articles.show',$art_cat->id)}}" class="media-left"> <img src="{{ asset('images/thumbnail/'.$art_cat->image) }}" alt="{{ $art_cat->title}}"> </a>
                      <div class="media-body"> <a href="{{route('articles.show',$art_cat->id)}}" class="catg_title"> {{ $art_cat->title}}</a> </div>
                    </div>
                  </li>
                   @endif
                @endforeach
                </ul>
              </div>
            </div>
          </div>
          <div class="single_post_content">
            <h2><span>Photography</span></h2>
            <ul class="photograph_nav  wow fadeInDown">
              <li>
                <div class="photo_grid">
                  <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="images/photograph_img2.jpg" title="Photography Ttile 1"> <img src="images/photograph_img2.jpg" alt=""/></a> </figure>
                </div>
              </li>
              <li>
                <div class="photo_grid">
                  <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="images/photograph_img3.jpg" title="Photography Ttile 2"> <img src="images/photograph_img3.jpg" alt=""/> </a> </figure>
                </div>
              </li>
              <li>
                <div class="photo_grid">
                  <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="images/photograph_img4.jpg" title="Photography Ttile 3"> <img src="images/photograph_img4.jpg" alt=""/> </a> </figure>
                </div>
              </li>
              <li>
                <div class="photo_grid">
                  <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="images/photograph_img4.jpg" title="Photography Ttile 4"> <img src="images/photograph_img4.jpg" alt=""/> </a> </figure>
                </div>
              </li>
              <li>
                <div class="photo_grid">
                  <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="images/photograph_img2.jpg" title="Photography Ttile 5"> <img src="images/photograph_img2.jpg" alt=""/> </a> </figure>
                </div>
              </li>
              <li>
                <div class="photo_grid">
                  <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="images/photograph_img3.jpg" title="Photography Ttile 6"> <img src="images/photograph_img3.jpg" alt=""/> </a> </figure>
                </div>
              </li>
            </ul>
          </div>
          <div class="single_post_content">
            <h2><span>Sport</span></h2>
            <div class="single_post_content_left">
              <ul class="business_catgnav  wow fadeInDown">
               @foreach($Sport as $key=>$art_cat)
               @if($key==0)
                <li>
                  <figure class="bsbig_fig"> <a href="{{route('articles.show',$art_cat->id)}}" class="featured_img"> <img src="{{ asset('images/thumbnail/'.$art_cat->image) }}" alt="{{ $art_cat->title}}"> <span class="overlay"></span> </a>
                    <figcaption> <a href="{{route('articles.show',$art_cat->id)}}">{{$art_cat->title}}</a> </figcaption>
                     <p>{!!substr($art_cat->body, 0,300)!!}{!!strlen($art_cat->body) > 300 ?"..." : ""!!}</p>
                  </figure>
                </li>
              </ul>
            </div>
            
            <div class="single_post_content_right">
              <ul class="spost_nav">
             @else
                <li>
                  <div class="media wow fadeInDown"> <a href="{{route('articles.show',$art_cat->id)}}" class="media-left"> <img src="{{ asset('images/thumbnail/'.$art_cat->image) }}" alt="{{ $art_cat->title}}"> </a>
                    <div class="media-body"> <a href="{{route('articles.show',$art_cat->id)}}" class="catg_title"> {{$art_cat->title}}</a> </div>
                  </div>
                </li>
              @endif
              @endforeach
              </ul>
            </div>
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
                    <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                      <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 1</a> </div>
                    </div>
                  </li>
                  <li>
                    <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img2.jpg"> </a>
                      <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 2</a> </div>
                    </div>
                  </li>
                  <li>
                    <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                      <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 3</a> </div>
                    </div>
                  </li>
                  <li>
                    <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img2.jpg"> </a>
                      <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 4</a> </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="single_sidebar wow fadeInDown">
            <h2><span>Sponsor</span></h2>
            <a class="sideAdd" href="#"><img src="{{ asset('newsfeed/images/add_img.jpg') }}" alt=""></a> </div>
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
