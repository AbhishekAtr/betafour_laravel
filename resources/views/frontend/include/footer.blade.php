< <div id="top-footer">
    <div class="container">
        <div class="row" style="display: flex; justify-content: space-around;">

            <div class="footer-block col-md-4 col-lg-4">

                <section id="text-2" class="widget widget_text">
                    <div class="textwidget">
                        <p><img loading="lazy" class="alignnone size-full wp-image-928"
                                src="{{ url('frontend/images/logo/final-logo-footer.png') }}" alt=""
                                width="246" height="60"></p>
                        <div class="textwidget">
                            <p> F-32, Okhla Industrial Area, Phase-I, New Delhi-110022, India<br>
                            <p><i class="fa fa-envelope" aria-hidden="true"></i> info@www.betafour.in</p>
                            <p><i class="fa fa-phone" aria-hidden="true"></i> 011-42575425
                            </p>
                            <p>Follow Us:</p>
                            <p><a href="https://www.instagram.com/" class="text-white" target="_blank"><i
                                        class="fa fa-instagram" aria-hidden="true"></i></a>
                                <a href="https://www.facebook.com/" class="text-white" target="_blank"><i
                                        class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="https://twitter.com/" class="text-white" target="_blank"> <i
                                        class="fa fa-twitter" aria-hidden="true"></i></a>
                            </p>
                        </div>
                    </div>
                </section>
            </div>

            <div class="footer-block col-md-2 col-lg-2">

                <section id="nav_menu-2" class="widget widget_nav_menu">
                    <h3 class="widget-title text-uppercase">Product Catgories</h3>
                    <div class="menu-product-categories-container">
                        <ul id="menu-product-categories" class="menu">
                            @foreach ($categories as $cat)
                                <li id="menu-item-912" class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-912">
                                    <a href="{{url('products/'.$cat->title)}}">{{ $cat->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </section>
            </div>

            <div class="footer-block col-lg-4 col-md-4">

                <section id="text-3" class="widget widget_text">
                    <h3 class="widget-title text-uppercase">Write Us!</h3>
                    <div class="form">
                        <form>
                            <div class="form-group">
                                <input type="text" id="form3Example1" class="form-control" placeholder="Name" />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Email">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Message"></textarea>
                            </div>
                            <button type="submit" class="btn btn-danger btn1 text-uppercase">Subscribe</button>
                        </form>
                    </div>
                </section>
            </div>

        </div>
    </div>
    </div>

    <footer class="footer pad-tp-bt-20 clinic_fdownbgc">
        <div class="container">
            <div class="row">
                <div class=" col-sm-4 col-md-6 text-uppercase">
                    COPYRIGHT © 2022 <span class="text-success"><strong>Beta Four</strong></span> all rights and
                    reserved
                </div>
                <div class="col-sm-8 col-md-6 copywrite footer_responsive1">
                    <span class="text-uppercase">Designed and Developed by <a href="https://www.uedeveloper.com"
                            target="_blank" class="text_normal0 text-success"><strong>UE Developer</strong></a> and
                        Team</span>
                </div>
            </div>
        </div>
    </footer>


    <!-- JS-url -->
    @include('frontend.include.js-url')

   
    <a href="https://wa.me/8826660388" class="whatsapp_float" target="_blank" rel="noopener noreferrer">
        <i class="fa fa-whatsapp whatsapp-icon"></i>
    </a>
