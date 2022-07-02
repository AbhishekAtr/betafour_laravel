<!-- Header -->

@extends('frontend.include.main')


@section('main')
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
  </ol>
  <div class="carousel-inner mt-5">
    @php $i= 1; @endphp
    @foreach($slider as $slideritem)
    <div class="carousel-item {{$i=='1'?'active':''}}">
      @php $i++; @endphp
      <img src="uploads/{{ $slideritem->image }}" class="d-block w-100" alt="...">
    </div>
    @endforeach
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


<!-- section New Release products start -->



 

<section class="mt-5">
  <div class="container">
    <div class="row justify-content-center text-center">
      <div class="col-md-8 col-lg-6">
        <div class="header heading">
          <h6 class="text-uppercase text-danger">Products</h6>
          <h2 class="text-uppercase"><span>C</span>ategories</h2>
        </div>
      </div>
    </div>
</section>
<section class="section-products">
  <div class="container">
    <div class="row">
      <!-- Single Product -->
      
      @foreach($categories as $cat)
          <div class="col-md-4">
            <a  href="/products?cat_name={{$cat->title}}">
            <div id="product-1" class="single-product">
              <div class="part-1 hover-zoom text-center">
                <img src="uploads/{{$cat->image}}" alt="">
              </div>
              <div class="part-2">
                <h3 class="product-title text-danger text-uppercase text-center">{{$cat->title}}</h3>
                <p class="text-center text-dark">{{$cat->description}}</p>
              </div>
            </div>
            </a>
          </div>
      @endforeach
    </div>
  </div>
  </div>
</section>
<!-- end -->

<!-- Best Product Slider section start -->

{{-- <section class="my-5">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="heading">
          <h3 class="text-center text-uppercase">The <span>B</span>est PA & DJ Equipment</h3>
        </div>
      </div>
    </div>
</section>


<div class="container">
  <div class="row my-5">
    <div class="col-lg-12">
      <div class="card-slider">
        @foreach($categories as $cat)
            <div class="card s_card text-center">
              <!-- Notice that both the image and the product title are in the same link. This can massively reduce the number of redundant tabstops on a page with lots of products, creating a better UX for keyboard-only and screen reader users. -->
              <a href="#" target="_blank" class="main-link">
                <h2 class="title">{{$cat->title}}</h2>
                <!-- This image has a descriptive alt attribute, so it helps to place it after the heading in the DOM. Flexbox is used to place it above the heading visually (see the CSS tab to see how). -->
                <div class="image">
                  <img src="uploads/{{$cat->image}}" alt="Small succulent with long, spikey leaves in a mug-like planter.">
                </div>
              </a>
              <p class="description">{{$cat->description}}</p>
              <a href="#">
                <button class="btn btn-danger">View all</button>
              </a>
            </div>
@endforeach
      </div>
    </div>
  </div>
</div>
</div> --}}


<!-- end -->

<!-- Why Us Section -->
<section class="why-us">
  <div class="container">
    <div class="row">
      <div class="col-md-8 offset-md-2 heading">
        <h2 class="mt-5 text-center text-uppercase">Credi<span>b</span>ility</h2>

      </div>
    </div>
</section>
<div class="container why-us">
  <div class="row mt-5">
    <div class="col-sm-4 col-lg-4">
      <div class="box">
        <i class="fa fa-coffee" aria-hidden="true"></i>
        <h4 class="text-uppercase">Experience</h4>
        <p>We have experience of more than 25 years in the Music System Industry.</p>
        <a href="about.php">Read More...</a>
      </div>
    </div>
    <div class="col-sm-4 col-lg-4">
      <div class="box">
        <i class="fa fa-life-ring" aria-hidden="true"></i>
        <h4 class="text-uppercase">Expertise</h4>
        <p>We have well educated and expert engineers from the industry</p>
        <a href="about.php">Read More...</a>
      </div>
    </div>
    <div class="col-sm-4 col-lg-4">
      <div class="box">
        <i class="fa fa-expand" aria-hidden="true"></i>
        <h4 class="text-uppercase">Engineering</h4>
        <p>We have world-class engineering and research lab for the PA systems.</p>
        <a href="about.php">Read More...</a>
      </div>
    </div>

  </div>
</div>
</div>
<!-- End Why Us Section -->


<!-- section Video -->

<div class="container-fluid my-5">
  <div class="row">
    <div class="col-lg-12">
      <iframe width="100%" height="800" src="https://www.youtube.com/embed/f-nUl94jDsg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

      <video class="wp-video-shortcode" id="video-5-1_from_mejs" preload="metadata" src="https://www.youtube.com/watch?v=f-nUl94jDsg&amp;_=1" style="width: 100%; height: 100%; display: none;">
        <source type="video/youtube" src="https://www.youtube.com/watch?v=f-nUl94jDsg&amp;_=1"><a href="https://www.youtube.com/watch?v=f-nUl94jDsg">https://www.youtube.com/watch?v=f-nUl94jDsg</a>
      </video>
    </div>
  </div>

</div>

<!-- end -->

<!-- News Section start -->

<section class="my-5">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="heading">
          <h5 class="text-center text-uppercase"><span>L</span>atest News & Events</h5>
        </div>
      </div>
    </div>
</section>
<section class="news-slider d-flex justify-content-center  my-5">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-sm-3 col-xm-3">
        <div class="card news_card">
          <img class="card-img-top" src="{{url('frontend/images/20190720_141453-370x270 (1).jpg')}}" alt="Card image cap">
          <div class="card-body text-center">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-danger">View</a>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card news_card">
          <img class="card-img-top" src="{{url('frontend/images/IMG-0816-370x270 (1).jpg')}}" alt="Card image cap">
          <div class="card-body text-center">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-danger">View</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card news_card">
          <img class="card-img-top" src="{{url('frontend/images/IMG_20180720_145302015-370x270 (1).jpg')}}" alt="Card image cap">
          <div class="card-body text-center">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-danger">View</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</section>

<!-- end -->


<!-- clients Section start-->

<div class="container heading my-5">
  <h4 class="text-uppercase">Our Others <span>B</span>rands</h4>
</div>
<div class="container my-5">
  <div class="row text-center">
    <div class="col-md-4 col-lg-4">
      <img src="{{url('frontend/images/brands/1.png')}}" alt="">
    </div>
    <div class="col-md-4 col-lg-4">
      <img src="{{url('frontend/images/brands/SM-LOGO-png-1536x585.png')}}" alt="" style="width: 350px;">
    </div>
    <div class="col-md-4 col-lg-4">
      <img src="{{url('frontend/images/brands/SMK-circle-logo-png-150x150.png')}}" alt="">
    </div>
  </div>
</div>

<!-- end -->


@endsection





