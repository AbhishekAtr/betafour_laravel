<!-- CSS-url -->
@include('frontend.include.css-url')
<!-- Header Start -->

<div class="site-mobile-menu site-navbar-target">
  <div class="site-mobile-menu-header">
    <div class="site-mobile-menu-close mt-3">
      <span class="icon-close2 js-menu-toggle"></span>
    </div>
  </div>
  <div class="site-mobile-menu-body"></div>
</div>



<header class="site-navbar site-navbar-target bg-white fixed-top text-uppercase" role="banner">

  <div class="container">
    <div class="row align-items-center position-relative">

      <div class="col-lg-4">
        <nav class="site-navigation ml-auto" role="navigation">
          <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
            <li class="nav-item dropdown active">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Products</a>
             
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                @foreach($categories as $cat)
                  <li><a class="dropdown-item" href="{{url('products/'.$cat->title)}}">{{$cat->title}}</a></li>
                @endforeach
              </ul>
            </li>
            <li><a href="newrelease.php" class="nav-link {{request()->is('new-release')? 'active': ''}}">New Release</a></li>
            <li><a href="catalogue.php" class="nav-link {{request()->is('catalogue')? 'active': ''}}">Catalogue</a></li>
          </ul>
         
        </nav>
      </div>
      <div class="col-lg-4 text-center">
        <div class="site-logo">
          <a href="{{url('/')}}">
            <img src="{{url('frontend/images/logo/logo1.png')}}" alt="">
          </a>
        </div>


        <div class="ml-auto toggle-button d-inline-block d-lg-none">
          <a href="#" class="site-menu-toggle py-5 js-menu-toggle text-black">
            <span class="icon-menu h3 text-black"></span>
          </a>
        </div>
      </div>
      <div class="col-lg-4">
        <nav class="site-navigation" role="navigation" style="padding-left: 25px;">
          <ul class="site-menu main-menu js-clone-nav  d-none d-lg-block ">
            <li class="{{request()->is('news')? 'active': ''}}"><a href="news.php" class="nav-link">News & Events</a></li>
            <li class="{{request()->is('about')? 'active': ''}}"><a href="{{url('/about')}}" class="nav-link">About</a></li>
            <li class="{{request()->is('contact')? 'active': ''}}"><a href="{{url('/contact')}}" class="nav-link">Contact</a></li>
          </ul>
        </nav>
      </div>


    </div>
  </div>

</header>

<!-- end -->