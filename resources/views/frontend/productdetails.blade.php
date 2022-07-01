<!-- Header -->

<!-- Header -->

@extends('frontend.include.main')


@section('main')
    <section class="news-banner">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('products/' . $product->category) }}"
                                    class="text-white">{{ $product->category }}</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">{{ $product->title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>


    <section class="product-details">
        <div class="container">

            <div class="card">
                <div class="row g-0">
                    <div class="col-md-6 border-end">
                        <div class="d-flex flex-column justify-content-center">
                            <div class="main_image">
                                <img src="/uploads/{{ $product->image }}" id="main_product_image" width="350" />
                            </div>
                            <div class="thumbnail_images">
                                <ul id="thumbnail">
                                    {{-- <li><img onclick="changeImage(this)" src="" width="70" /></li>
                                        <li><img onclick="changeImage(this)" src="" width="70" /></li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 right-side">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="text-danger">{{ $product->title }}</h3>
                            </div>
                            {!!$product->description !!}
                        </div>

                    </div>
                </div>
            </div>

        </div>
        </div>
    </section>

    <!-- footer  -->
@endsection

<a href="https://wa.me/8826660388" class="whatsapp_float" target="_blank" rel="noopener noreferrer">
    <i class="fa fa-whatsapp whatsapp-icon"></i>
</a>
