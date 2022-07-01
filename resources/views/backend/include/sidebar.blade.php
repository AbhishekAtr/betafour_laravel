@include('backend.include.css-url')

{{-- <header class="header" id="header">
    <div class="header_toggle">
        <i class='fa fa-bars' id="header-toggle"></i>
    </div>
    <div class="header_img">
        <img src="{{url('backend/image/user.png')}}" alt="">
    </div>
</header>
<div class="l-navbar" id="nav-bar">
    <nav class="nav" id="nav">
        <div>
            <a href="{{url('/dashboard')}}" class="nav_logo">
                <img src="{{url('backend/image/logo.png')}}" class="w-50" id="logo" alt="">
            </a>
            <div class="nav_list">
                <a href="{{url('/dashboard')}}" class="nav_link active">
                    <i class='fa fa-th-large nav_icon'></i>
                    <span class="nav_name">Dashboard</span>
                </a>
                <a href="{{url('/home-slider')}}" class="nav_link">
                    <i class='fa fa-home nav_icon'></i>
                    <span class="nav_name">Home Slider</span>
                </a>
                <a href="{{ route('category') }}" class="nav_link">
                    <i class='fa fa-bookmark nav_icon'></i>
                    <span class="nav_name">Category</span>
                </a>
                <a href="{{route('product')}}" class="nav_link">
                    <i class='fa fa-product-hunt nav_icon'></i>
                    <span class="nav_name">Products</span>
                </a>
                <a href="#" class="nav_link">
                    <i class='fa fa-shopping-cart nav_icon'></i>
                    <span class="nav_name">New Release</span>
                </a>
            </div>
        </div>
        <a href="/logout" class="nav_link">
            <i class='fa fa-sign-out nav_icon'></i>
            <span class="nav_name">SignOut</span>
        </a>
    </nav>
</div> --}}
<div class="container-fluid">
    <div class="row flex-nowrap">
        <header class="header" id="header">
            <div class="header_toggle">
                <a data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample"
                class="border rounded-3 p-1 text-decoration-none text-white"><i class="fa fa-bars bi-lg py-2 p-1"></i></a>
            </div>
            <div class="img">
               <img src="{{url('backend/image/logo.png')}}" alt="" class="w-50">
            </div>
            <div class="header_img">
                <img src="{{url('backend/image/user.png')}}" alt="">
            </div>
        </header>
        <div class="col-auto px-0">
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                <div id="sidebar-nav" class=" border-0 rounded-0 text-sm-start vh-100">
                    <a href="{{url('/dashboard')}}" class="nav_logo">
                        <img src="{{url('backend/image/logo.png')}}" class="w-50" id="logo" alt="">
                    </a>
                    <a href="{{url('/dashboard')}}" class="nav_link {{request()->is('dashboard')? 'active': ''}}" data-bs-parent="#sidebar"> 
                        <i class='fa fa-th-large nav_icon text-white'></i>
                        <span class="nav_name text-white">Dashboard</span>
                    </a>
                    <a href="{{url('/home-slider')}}" class="nav_link {{request()->is('home-slider')? 'active': ''}}" data-bs-parent="#sidebar">
                        <i class='fa fa-home nav_icon text-white'></i>
                        <span class="nav_name text-white">Home Slider</span>
                    </a>
                    <a href="{{ route('category') }}" class="nav_link {{request()->is('category')? 'active': ''}}" data-bs-parent="#sidebar">
                        <i class='fa fa-bookmark nav_icon text-white'></i>
                        <span class="nav_name text-white">Category</span>
                    </a>
                    <a href="{{route('product')}}" class="nav_link {{request()->is('product')? 'active': ''}}" data-bs-parent="#sidebar">
                        <i class='fa fa-product-hunt nav_icon text-white'></i>
                        <span class="nav_name text-white">Products</span>
                    </a>
                    <a href="{{route('new-release')}}" class="nav_link {{request()->is('new-release')? 'active': ''}}" data-bs-parent="#sidebar"> 
                        <i class='fa fa-shopping-cart nav_icon text-white'></i>
                        <span class="nav_name text-white">New Release</span>
                    </a>
                    <a href="/logout" class="nav_link {{request()->is('logout')? 'active': ''}}">
                        <i class='fa fa-sign-out nav_icon text-white'></i>
                        <span class="nav_name text-white">SignOut</span>
                    </a>
                    {{-- <img src="{{url('backend/image/user.png')}}" alt=""> --}}
                </div>
            </div>
        </div>
        
        <main class="col ps-md-2 pt-5">
            @yield('main')
        </main>
        
        
    </div>
</div>
<!--Container Main start-->


@include('backend.include.js-url')
