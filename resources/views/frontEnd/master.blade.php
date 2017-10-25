<!DOCTYPE html>
<html>
	<head>
	@include('frontEnd/layouts/head')
	</head>
<body>

<div id="preloader">
  <div id="status">&nbsp;</div>
</div>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<div class="container">
 @include('frontEnd/layouts/header')
 @include('frontEnd/layouts/nav')
 @include('frontEnd/layouts/news')
 @section('slider')
 @include('frontEnd/layouts/slider')
 @show
 @yield('content')
 @include('frontEnd/layouts/footer')
</div>

<script src="{{ asset('newsfeed/assets/js/jquery.min.js') }}"></script> 
<script src="{{ asset('newsfeed/assets/js/wow.min.js') }}"></script> 
<script src="{{ asset('newsfeed/assets/js/bootstrap.min.js') }}"></script> 
<script src="{{ asset('newsfeed/assets/js/slick.min.js') }}"></script> 
<script src="{{ asset('newsfeed/assets/js/jquery.li-scroller.1.0.js') }}"></script> 
<script src="{{ asset('newsfeed/assets/js/jquery.newsTicker.min.js') }}"></script> 
<script src="{{ asset('newsfeed/assets/js/jquery.fancybox.pack.js') }}"></script> 
<script src="{{ asset('newsfeed/assets/js/custom.js') }}"></script>

</body>
</html>