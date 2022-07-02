<!-- Header -->

@extends('frontend.include.main')


@section('main')
<!-- Breadcrums start -->

<section class="news-banner">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}" class="text-white">Home</a></li>
            
            <li class="breadcrumb-item active text-white" aria-current="page">{{$category->title}}</li>
            
          </ol>
        </nav>
      </div>
    </div>
  </div>
</section>

<!-- Our Products start -->

<section style="background-color: #eee;">
  <div class="container py-5 heading">
    <h4 class="text-center mb-5 text-uppercase"> <span>O</span>ur Products</h4>

    <div class="row">

      @foreach($products as $product)
          <div class=" col-md-4 mb-4">

            <div class="bg-image hover-zoom ripple shadow-1-strong rounded card p-2 border">
              <a href="{{url('productdetails/'.$product->id)}}" class="text-center">

                <img src="/uploads/{{$product->image}}" class="w-100" />
                <div class="mt-2 card-footer">
                  <h6 class="text-dark font-weight-bold">{{$product->title}}</h6>
                  <button class="btn btn-danger">Read More</button>
                </div>
              </a>
            </div>
          </div>
          @endforeach
    </div>
  </div>
</section>
@endsection

<!-- footer  -->
      <a href="https://wa.me/8826660388" class="whatsapp_float" target="_blank" rel="noopener noreferrer">
        <i class="fa fa-whatsapp whatsapp-icon"></i>
      </a>