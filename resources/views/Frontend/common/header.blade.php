<!DOCTYPE html>
<!--[if IE 8]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<!--<![endif]-->

<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8" />
    <title>Shreenath</title>
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- Bootstrap  -->
    <link rel="stylesheet" type="text/css" href="{{ asset('Front/css/bootstrap.css') }}">

    <!-- Theme Style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('Front/css/magnific-popup.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('Front/css/odometer.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('Front/css/swiper-bundle.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('Front/css/styles.css') }}" />

    <!-- Animation Style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('Front/css/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('Front/css/animate2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('Front/css/textanimation.css') }}">

    <!-- Map Style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('Front/css/map.min.css') }}">

    <!-- Font -->
    <link rel="stylesheet" href="{{ asset('Front/font/fonts.css') }}" />

    <!-- Icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('Front/icons/icomoon/style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('Front/icons/fontawesome/css/all.min.css') }}" />

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="{{ asset('Front/images/logo/sdas.png') }}" />
    <link rel="apple-touch-icon-precomposed" href="{{ asset('Front/images/logo/sdas.png') }}" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide/dist/css/splide.min.css">

    <!--[if lt IE 9]>
        <script src="javascript/html5shiv.js"></script>
        <script src="javascript/respond.min.js"></script>
    <![endif]-->
</head>

<body class="counter-scroll-2">

    <!-- Wrapper -->
    <div id="wrapper" class="wrapper-home-2">

        <!-- Bg-page -->
        <div class="bg-page absolute">
            <div class="image">
                <img class="not" class="lazyload" src="{{ asset('Front/images/item/yellow-field.jpg') }}" alt="">
            </div>
        </div><!-- /.Bg-page -->

        <!-- Preloader -->
        <div id="loading">
            <div id="loading-center">
                <div class="loader-container">
                    <div class="wrap-loader">
                        <div class="loader">
                        </div>
                        <div class="icon">
                            <img src="{{ asset('Front/images/logo/sdas.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.Preloader -->

        <!-- Header wrap -->
        <div class="header-wrap absolute">

            <!-- Top-bar -->
            {{-- <div class="tf-topbar style-2">
                <div class="tf-container w-1620">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="topbar-inner">

                                <div class="topbar-left">
                                    <div class="logo">
                                        <a href="{{route('/')}}">
                                            <img src="{{ asset('Front/images/logo/logo.png') }}" data-src="{{ asset('Front/images/logo/logo-2.png') }}" alt="" class="lazyload">
                                        </a>
                                    </div>
                                </div>
                                <div class="topbar-right">
                                    <ul class="contact-list">
                                        <li class="item">
                                            <div class="icon">
                                                <i class="icon-map-pin"></i>
                                            </div>
                                            <div class="infor">
                                                <p class="title">
                                                    Farm Address
                                                </p>
                                                <p class="text">
                                                    Prinsengracht 250, 2501016 PM <br>
                                                    Amsterdam Netherlands
                                                </p>
                                            </div>
                                        </li>
                                        <li class="item">
                                            <div class="icon">
                                                <i class="icon-envelope-open"></i>
                                            </div>
                                            <div class="infor">
                                                <p class="title">
                                                    Contact & Support
                                                </p>
                                                <p class="text">
                                                    Mail Us: Shrinaths@gmail.com <br>
                                                    Call Us 24/7: +1 987 654 3210
                                                </p>
                                            </div>
                                        </li>
                                        <li class="item">
                                            <div class="icon">
                                                <i class="icon-clock"></i>
                                            </div>
                                            <div class="infor">
                                                <p class="title">
                                                    Working Hours
                                                </p>
                                                <p class="text">
                                                    Mon - Fri: 8.00am - 18.00pm <br>
                                                    Sat: 9.00am - 17.00pm Holidays: Closes
                                                </p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                                <ul class="contact-list mobile">
                                    <li class="item">
                                        <div class="icon">
                                            <i class="fa-solid fa-location-dot"></i>
                                        </div>
                                        <p class="text">
                                            Prinsengracht 250, Amsterdam Netherlands
                                        </p>
                                    </li>
                                    <li class="item">
                                        <div class="icon">
                                            <i class="fa-solid fa-phone"></i>
                                        </div>
                                        <p class="text">
                                            +1 987 654 3210
                                        </p>
                                    </li>
                                    <li class="item">
                                        <div class="icon">
                                            <i class="fa-solid fa-envelope"></i>
                                        </div>
                                        <p class="text">
                                            Themesflat@gmail.com
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

            <!-- Header -->
            <header class="header style-3 has-item-bot" id="header-main">
                <div class="tf-container w-1620 yutes">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="header-inner">
                                <div class="header-left">
                                    <div class="logo-site"> 
                                        <a href="{{route('/')}}">
                                            <img src="{{ asset('Front/images/logo/sdas.png') }}" alt="">
                                        </a>
                                    </div>
                                    <div class="main-nav">
                                        <ul class="nav-list">
    <li class="item has-child {{ request()->routeIs('/') ? 'current-menu' : '' }}">
        <a href="{{ route('/') }}">Home</a>
    </li>
    <li class="item has-child {{ request()->routeIs('about') ? 'current-menu' : '' }}">
        <a href="{{ route('about') }}">About Us</a>
    </li>
    <li class="item has-child {{ request()->routeIs('our_team') ? 'current-menu' : '' }}">
        <a href="{{ route('our_team') }}">Our Team</a>
    </li>
    <li class="item has-child {{ request()->routeIs('our_products') ? 'current-menu' : '' }}">
        <a href="{{ route('our_products') }}">Products</a>
    </li>
    <li class="item has-child {{ request()->routeIs('our_gallery') ? 'current-menu' : '' }}">
        <a href="{{ route('our_gallery') }}">Gallery</a>
    </li>
    <li class="item has-child {{ request()->routeIs('blog') ? 'current-menu' : '' }}">
        <a href="{{ route('blog') }}">Blog</a>
    </li>
    <li class="item has-child {{ request()->routeIs('our_commitments') ? 'current-menu' : '' }}">
        <a href="{{ route('our_commitments') }}">Commitments</a>
    </li>
</ul>

                                    </div>
                                </div>
                                <div class="header-right">
                                    <div class="contact-wrap">
                                        <div class="icon">
                                            
                                        </div>
                                        <div class="contact">
                                            <p class="sub font-snowfall">
                                                <a class="peloe" target="_blank" href="https://connect.shreenathspices.com/">Connect with us</a></p>
                                            
                                        </div>
                                        <div class="contact">
                                            
                                            <p class="number font-worksans">
                                                <a target="_blank" href="HTTPS://BROCHURE.SHREENATHSPICES.COM/">Get Our Portfolio</a>
                                            </p>
                                        </div>
                                    </div>
                                    

                                    <div class="mobile-button">
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                            <div class="mobile-nav-wrap">
                                <div class="overlay-mobile-nav"></div>
                                <div class="inner-mobile-nav overflow-y-auto">
                                    <div class="top">
                                        <div class="logo">
                                            <a href="{{route('/')}}" rel="home" class="main-logo">
                                                <img id="mobile-logo_header" alt="" src="{{ asset('Front/images/logo/sdas.png') }}">
                                            </a>
                                            <div class="mobile-nav-close">
                                                <i class="icon-close"></i>
                                            </div>
                                        </div>
                                        <nav id="mobile-main-nav" class="mobile-main-nav">
                                            <ul id="menu-mobile-menu" class="menu">
                                                <li class="menu-item menu-item-has-children-mobile">
                                                    <a class="item-menu-mobile current" href="{{route('/')}}">
                                                        Home
                                                    </a>
                                                  
                                                </li>
                                                <li class="menu-item menu-item-has-children-mobile">
                                                    <a class="item-menu-mobile" href="{{route('about')}}">About Us</a>
                                                    {{-- <ul class="sub-menu-mobile">
                                                        <li class="menu-item">
                                                            <a href="about-us.html">About Us</a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="our-commitments.html">Our Commitments</a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="our-events.html">Our Events</a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="our-farmers.html">Our Farmers</a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="our-history.html">Our History</a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="coming-soon.html">Coming Soon</a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="404.html">404</a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="event-detail.html">Event Detail</a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="faq.html">FAQs</a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="gallery.html">Gallery</a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="testimonial.html">Testimonial</a>
                                                        </li>
                                                    </ul> --}}
                                                </li>
                                                <li class="menu-item menu-item-has-children-mobile">
                                                    <a class="item-menu-mobile" href="{{route('our_team')}}">
                                                        Our Team
                                                    </a>
                                                    {{-- <ul class="sub-menu-mobile">
                                                        <li class="menu-item"><a href="portfolio-style-1.html">Portfolio Style 1</a></li>
                                                        <li class="menu-item"><a href="portfolio-style-2.html">Portfolio Style 2</a></li>
                                                        <li class="menu-item"><a href="portfolio-style-3.html">Portfolio Style 3</a></li>
                                                        <li class="menu-item"><a href="portfolio-details.html">Portfolio Detail</a></li>
                                                    </ul> --}}
                                                </li>
                                                <li class="menu-item menu-item-has-children-mobile">
                                                    <a class="item-menu-mobile" href="{{route('our_products')}}">
                                                        Products
                                                    </a>
                                                    {{-- <ul class="sub-menu-mobile">
                                                        <li class="menu-item"><a href="shop-products.html">Shop Product</a></li>
                                                        <li class="menu-item"><a href="shop-details.html">Shop Detail</a></li>
                                                        <li class="menu-item"><a href="shop-cart.html">Shop Cart</a></li>
                                                        <li class="menu-item"><a href="wishlist.html">Wishlist</a></li>
                                                        <li class="menu-item"><a href="checkout.html">Checkout</a></li>
                                                        <li class="menu-item"><a href="order-tracking.html">Order Tracking</a></li>
                                                        <li class="menu-item"><a href="my-account.html">My Account</a></li>
                                                        <li class="menu-item"><a href="order-details.html">Order Detail</a></li>
                                                    </ul> --}}
                                                </li>
                                                <li class="menu-item menu-item-has-children-mobile">
                                                    <a class="item-menu-mobile" href="{{route('our_gallery')}}">
                                                        Gallery
                                                    </a>
                                                    {{-- <ul class="sub-menu-mobile">
                                                        <li class="menu-item">
                                                            <a href="our-services.html">Our Services</a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="service-detail.html">Service Detail</a>
                                                        </li>
                                                    </ul> --}}
                                                </li>
                                                
                                                {{-- <li class="menu-item menu-item-has-children-mobile">
                                                    <a class="item-menu-mobile" href="contact-us.html">Contact</a>
                                                </li> --}}
                                                <li class="menu-item menu-item-has-children-mobile">
                                                <a class="item-menu-mobile" href="{{route('blog')}}">Blog</a>
                                            </li>
                                            <li class="menu-item menu-item-has-children-mobile">
                                                <a class="item-menu-mobile" href="{{route('our_commitments')}}">Commitments</a>
                                            </li>
                                            <li class="menu-item menu-item-has-children-mobile">
                                                <a class="item-menu-mobile" style="
    color: #f8c32c;
" target="_blank" href="HTTPS://BROCHURE.SHREENATHSPICES.COM">Get Our Portfolio</a>
                                            </li>
                                            <li class="menu-item menu-item-has-children-mobile">
                                                <a class="item-menu-mobile" style="
    color: #f8c32c;
" target="_blank" href="https://connect.shreenathspices.com/">Connect with us</a></p>
                                            </li>
                                            </ul>
                                        </nav> 
                                        {{-- <div class="group-icon">
                                            <a class="site-nav-icon header-search" href="#canvasSearch" data-bs-toggle="offcanvas">
                                                <i class="icon-magnifying-glass fs-21"> </i>
                                                Search
                                            </a>
                                            <a href="shop-products.html" class="site-nav-icon wg-bag">
                                                <i class="icon-basket"></i>
                                                Shop
                                            </a>
                                        </div> --}}
                                    </div>
                                    <div class="bottom">
                                        <div class="infor-list">
                                            <ul>
                                                <li>
                                                    <h5 class="title">
                                                        Address:
                                                    </h5>
                                                    <p>
                                                        H-16, Krishi Upaj Mandi,
Nagaur-341001(Raj.)
                                                    </p>
                                                </li>
                                                <li>
                                                    <h5 class="title">
                                                        Phone:
                                                    </h5>
                                                    <p>
                                                        +91 8905015736
                                                    </p>
                                                </li>
                                                <li>
                                                    <h5 class="title">
                                                        Email:
                                                    </h5>
                                                    <p>
                                                        info@shreenathspices.com
                                                    </p>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="wg-social">
                                            <ul class="list">
                                                <li class="item">
                                                    <a href="#"><i class="icon-facebook1"></i></a>
                                                </li>
                                                <li class="item">
                                                    <a href="#"><i class="icon-twitter"></i></a>
                                                </li>
                                                <li class="item">
                                                    <a href="#"><i class="icon-instagram2"></i></a>
                                                </li>
            
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="fixed-header style-absolute">
                    <div class="tf-container w-1780">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="header-inner">
                                    <div class="header-left">
                                        <div class="logo-site">
                                            <a href="{{route('/')}}">
                                                <img src="{{ asset('Front/images/logo/sdas.png') }}" alt="">
                                            </a>
                                        </div>
                                        <div class="main-nav">
                                            <ul class="nav-list">
    <li class="item has-child {{ request()->routeIs('/') ? 'current-menu' : '' }}">
        <a href="{{ route('/') }}">Home</a>
    </li>
    <li class="item has-child {{ request()->routeIs('about') ? 'current-menu' : '' }}">
        <a href="{{ route('about') }}">About Us</a>
    </li>
    <li class="item has-child {{ request()->routeIs('our_team') ? 'current-menu' : '' }}">
        <a href="{{ route('our_team') }}">Our Team</a>
    </li>
    <li class="item has-child {{ request()->routeIs('our_products') ? 'current-menu' : '' }}">
        <a href="{{ route('our_products') }}">Products</a>
    </li>
    <li class="item has-child {{ request()->routeIs('our_gallery') ? 'current-menu' : '' }}">
        <a href="{{ route('our_gallery') }}">Gallery</a>
    </li>
    <li class="item has-child {{ request()->routeIs('blog') ? 'current-menu' : '' }}">
        <a href="{{ route('blog') }}">Blog</a>
    </li>
    <li class="item has-child {{ request()->routeIs('our_commitments') ? 'current-menu' : '' }}">
        <a href="{{ route('our_commitments') }}">Commitments</a>
    </li>
</ul>

                                        </div>
                                    </div>
                                    <div class="header-right">
                                       <div class="contact-wrap">
                                        <div class="icon">
                                            
                                        </div>
                                        <div class="contact">
                                            <p class="sub font-snowfall">
                                                <a target="_blank" href="https://connect.shreenathspices.com/">Connect with us</a></p>
                                            
                                        </div>
                                        <div class="contact">
                                            
                                            <p class="number font-worksans">
                                                <a target="_blank" href="HTTPS://BROCHURE.SHREENATHSPICES.COM">Get Our Portfolio</a>
                                            </p>
                                        </div>
                                    </div>
                                        

                                        <div class="mobile-button">
                                            <span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="header-item children">
                        <img class="raat" src="{{ asset('Front/images/item/page-title-top.png') }}" alt="">
                    </div>
                </div>
                <div class="header-item">
                    <img class="raat" src="{{ asset('Front/images/item/page-title-top.png') }}" alt="">
                </div>
            </header><!-- /.Header -->

        </div><!-- /.Header wrap-->