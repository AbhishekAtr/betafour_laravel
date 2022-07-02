<!-- Header -->

@extends('frontend.include.main')


@section('main')

<!-- Breadcrums start -->

<section class="cata-banner">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="text-white">Home</a></li>
                        <li class="breadcrumb-item active text-white" aria-current="page">Catalogue</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- end -->

<!-- pdf section start -->

<section class="my-5">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="heading">
          <h5 class="text-center text-uppercase"><span>C</span>atalogue</h5>
        </div>
      </div>
    </div>
</section>

<div class="container pdf">
    <object data='{{url('frontend/images/pdf/betafour-final-catalogue.pdf')}}' type="application/pdf" width="100%" height="700">
        <iframe src='{{url('frontend/images/pdf/betafour-final-catalogue.pdf')}}' width="100%" height="700">
            <p>This browser does not support PDF!</p>
        </iframe>
    </object>
</div>

<!-- end -->

<!-- footer  -->
@endsection


      <a href="https://wa.me/8826660388" class="whatsapp_float" target="_blank" rel="noopener noreferrer">
        <i class="fa fa-whatsapp whatsapp-icon"></i>
      </a>