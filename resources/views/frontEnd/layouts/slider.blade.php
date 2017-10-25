<section id="sliderSection">
    <div class="row">
    
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="slick_slider">
        @foreach($article as $value)
          <div class="single_iteam"> <a href="{{route('articles.show',$value->id)}}"> <img src="{{ asset('images/'.$value->image) }}" alt="{{ $value->title}}"></a>
            <div class="slider_article">
            <h1><a class="slider_tittle" href="{{route('articles.show',$value->id)}}">{{ $value->SubCategory->sub_name}}</a></h1>
              <h2><a class="slider_tittle" href="{{route('articles.show',$value->id)}}">{{$value->title}}</a></h2>
              
            </div>
          </div>
          @endforeach
        </div>
      </div>
      
      <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="latest_post">
          <h2><span>Latest post</span></h2>
          <div class="latest_post_container">
            <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
            <ul class="latest_postnav">
             @foreach($article as $value)
              <li>
                <div class="media"> <a href="{{route('articles.show',$value->id)}}" class="media-left"> <img src="{{ asset('images/thumbnail/'.$value->image) }}" alt="{{ $value->title}}"> </a>
                  <div class="media-body"> <a href="pages/single_page.html" class="catg_title">{{$value->title}}</a> </div>
                </div>
              </li>
              @endforeach
            </ul>
            <div id="next-button"><i class="fa  fa-chevron-down"></i></div>
          </div>
        </div>
      </div>
    </div>
  </section>