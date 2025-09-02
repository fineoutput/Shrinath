@extends('Frontend.common.app')
@section('title','about')
@section('content')

<style>
    .not{
        display: none;
    }
    .raat{
        display: none
    }   
    .raat{
        display: none
    }
    .dasd{
        z-index: 9999;
        position: relative;
        text-align: center;
        color: var(--Text-4);
    font-family: "GlitterySnowfall", sans-serif;
    font-size: 23px;
    line-height: 26px;
    margin-bottom: 16px;
    }
    .box-icon-list.style-2 .box-icon .icon::after {
    content: none !important;
    position: absolute;
    height: 100%;
    width: 2px;
    background-color: var(--Primary);
    top: 0;
    left: 50%;
    transform: translateX(-50%) rotate(-45deg);
}
</style>
<div class="page-title page-about-us">
    <div class="rellax" data-rellax-speed="5">
        <img src="{{ asset('Front/images/page-title/home-2-1.jpg') }}" alt="">
    </div>
    <div class="content-wrap">
        <div class="tf-container w-1290">
            <div class="row">
                <div class="col-lg-12">
                    <div class="content">
                        <p class="sub-title">
                            We are confident that Shreenath is a leading spice brand committed to ensuring food hygiene and safety for every customer.
                        </p>
                        <h1 class="title">
                            About Us
                        </h1>
                        <div class="icon-img">
                            <img src="{{ asset('Front/images/item/line-throw-title.png') }}" alt="">
                        </div>
                        <div class="breadcrumb">
                            <a href="{{route('/')}}">Home</a>
                            <div class="icon">
                                <i class="icon-arrow-right1"></i>
                            </div>
                            <a href="javascript:void(0)">About Us </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="img-item item-2">
        <img src="{{ asset('Front/images/item/grass.png') }}" alt="">
    </div>
</div><!-- /.Page-title -->

<!-- Main-content -->
<div class="main-content pb-0 pt-93">
    <!-- Section our-agriculture-2 -->
    <section class="s-our-agriculture style-2 type-2">
        <div class="counter-wrap">
            <div class="tf-container w-1290">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="wrap">
                            <p class="text font-snowfall fs-30">
                                We are confident that Shreenath is a leading spice brand committed to ensuring
                                <span>
                                    <a href="#" class="hover-text-4">
                                        food hygiene and safety
                                    </a>
                                </span>
                                for every customer.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="wg-counter style-5">
                            <div class="icon style-circle">
                                <i class="fa-solid fa-cow"></i>
                            </div>
                            <div class="counter-item">
                                <p class="title font-worksans fw-5 fs-18">
                                    Completed Deliveries
                                </p>
                                <div class="counter">
                                    <div id="odometer" class="odometer style-5">1000</div>
                                    <span class="sub-odo color-secondary">+</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="wg-counter style-5">
                            <div class="icon style-circle">
                                <i class="fa-solid fa-face-smile"></i>
                            </div>
                            <div class="counter-item">
                                <p class="title font-worksans fw-5 fs-18">
                                    Trusted Clients
                                </p>
                                <div class="counter">
                                    <div class="odometer style-5-2">350</div>
                                    <span class="sub-odo color-secondary">+</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /.Section our-agriculture-2 -->

    <!-- Section welcome to -->
    <section class="s-welcome-to">
        <div class="s-content-wrap">
            <div class="tf-container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="content-section">
                            <div class="heading-section style-4">
                                <div class="img-item">
                                    <img class="tf-animate-1" src="{{ asset('Front/images/item/rice-plant-2.png') }}" alt="">
                                </div>
                                <p class="sub-title">
                                    Welcome to Shreenath Spices
                                </p>
                                <p class="title wow fadeInUp" data-wow-delay="0s">
                                    A trusted source for quality products.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="text-wrap">
                            <p class="text-1 wow fadeInUp" data-wow-delay="0s">
                                We are dedicated to sourcing, processing, and delivering spices that ensure authenticity, hygiene, and satisfaction. Our focus is not farming but bridging the gap between reliable producers and trusted buyers.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="s-img-item item-1 scroll-element-3">
                <img class="scale-1-1" src="{{ asset('Front/images/section/yellow-f.png') }}" alt="">
            </div>
        </div>
        <div class="s-content-wrap-2">
            <div class="tf-container w-1620">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="swiper-container slider-gallery">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="gallery-item img-hover wow fadeInUp" data-wow-delay="0s">
                                        <div class="image hover-item">
                                            <img class="lazyload" src="{{ asset('Front/images/widget/gallery-item-4.jpg') }}"
                                                data-src="{{ asset('Front/images/widget/gallery-item-4.jpg') }}" alt="">
                                        </div>
                                        <a href="{{ route('our_gallery') }}" class="add-gallery">
                                            +
                                        </a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="gallery-item img-hover wow fadeInUp" data-wow-delay="0.1s">
                                        <div class="image hover-item">
                                            <img class="lazyload" src="{{ asset('Front/images/widget/gallery-item-7.jpg') }}"
                                                data-src="{{ asset('Front/images/widget/gallery-item-7.jpg') }}" alt="">
                                        </div>
                                        <a href="{{ route('our_gallery') }}" class="add-gallery">
                                            +
                                        </a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="gallery-item img-hover wow fadeInUp" data-wow-delay="0.2s">
                                        <div class="image hover-item">
                                            <img class="lazyload" src="{{ asset('Front/images/blog/blog-1.jpg') }}"
                                                data-src="{{ asset('Front/images/blog/blog-1.jpg') }}" alt="">
                                        </div>
                                        <a href="{{ route('our_gallery') }}" class="add-gallery">
                                            +
                                        </a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="gallery-item img-hover wow fadeInUp" data-wow-delay="0.3s">
                                        <div class="image hover-item">
                                            <img class="lazyload" src="{{ asset('Front/images/widget/gallery-item-9.jpg') }}"
                                                data-src="{{ asset('Front/images/widget/gallery-item-9.jpg') }}" alt="">
                                        </div>
                                        <a href="{{ route('our_gallery') }}" class="add-gallery">
                                            +
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tf-container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="box-text wow fadeInUp" data-wow-delay="0s">
                            <p class="title font-worksans fw-7">
                                Our Mission
                            </p>
                            <p class="text font-snowfall">
                                To provide customers with genuine, quality-tested products, backed by transparency and trust.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="box-text wow fadeInUp" data-wow-delay="0.1s">
                            <p class="title font-worksans fw-7">
                                Our Vision
                            </p>
                            <p class="text font-snowfall">
                                To become a leading name in quality spice trade—recognized for sustainable practices and long-term partnerships.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="s-img-item item-1">
                <img src="{{ asset('Front/images/item/wave-yellow-has-item.png') }}" alt="">
            </div>
        </div>
    </section><!-- /.Section welcome to -->

    <!-- Section our agriculture -->
    <section class="s-our-agriculture style-3">
        <div class="s-content-wrap content-section">
            <div class="tf-container w-1290">
                <div class="row">
                    <div class="col-lg-5 col-md-6">
                        <div class="image-wrap">
                            <div class="image video-wrap style-2">
                                <img src="{{ asset('Front/images/section/s-farm.jpg') }}" alt="" class="lazyload">
                                <a href="https://www.youtube.com/watch?v=MLpWrANjFbI"
                                    class="style-icon-play popup-youtube">
                                    <i class="fa-solid fa-play"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-6">
                        <div class="content">
                            <div class="heading-section style-2">
                                <div class="img-item">
                                    <div class="item">
                                        <img class="tf-animate-1" src="{{ asset('Front/images/item/rice-plant-2.png') }}" alt="" />
                                    </div>
                                    <p class="sub-title">
                                        Our Expertise
                                    </p>
                                </div>
                                <p class="title text-anime-style-1">
                                    We Believe In Delivering The Best To Our Customers
                                </p>
                            </div>
                            <p class="text mb-20">
                                For decades, Shreenath has been dedicated to delivering spices that are pure, hygienic, and full of authentic flavor. From sourcing to packaging, every step reflects our commitment to quality and trust.
                            </p>
                            <div class="wg-progress mb-29">
                                <div class="top">
                                    <span>Product Quality Assurance</span>
                                    <span>95%</span>
                                </div>
                                <div class="progress tf-animate-1" role="progressbar" aria-label="Basic example"
                                    aria-valuenow="95" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar" style="width: 95%"></div>
                                </div>
                            </div>
                            <div class="wg-progress mb-29">
                                <div class="top">
                                    <span>Customer Satisfaction</span>
                                    <span>90%</span>
                                </div>
                                <div class="progress tf-animate-1" role="progressbar" aria-label="Basic example"
                                    aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar" style="width: 90%"></div>
                                </div>
                            </div>
                            <div class="wg-progress">
                                <div class="top">
                                    <span>Efficient Supply Chain</span>
                                    <span>85%</span>
                                </div>
                                <div class="progress tf-animate-1" role="progressbar" aria-label="Basic example"
                                    aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar" style="width: 85%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="s-img-item item-1">
            <img class="wow fadeInRight" data-wow-delay="0s" src="{{ asset('Front/images/item/rice-plant-color.png') }}" alt="">
        </div>
        <div class="s-img-item item-2">
            <img src="{{ asset('Front/images/item/page-title-top.png') }}" alt="">
        </div>
    </section><!-- /.Section our agriculture -->

     <section class="s-history has-img-item tf-pt-0">
        
                <div class="tf-container w-1290">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="sub-title dasd">Our Journey</p>
                            <div class="main-history">
                               
                                <span class="line"></span>
                                <div class="wg-history mb-50 type-left">
                                    <div class="image type-1">
                                        <img src="{{asset('Front/images/widget/our-history-1.jpg')}}"
                                            data-src="{{asset('Front/images/widget/our-history-1.jpg')}}" alt="" class="lazyload">
                                    </div>
                                    <div class="year">
                                        <p class="number font-snowfall fs-30">
                                            2020-21
                                        </p>
                                    </div>
                                    <div class="content">
                                        <h3 class="title fw-6 font-worksans">
                                            The Beginning
                                        </h3>
                                        <p class="text font-nunito">
                                            Foundation laid with the vision of providing pure and affordable spices
                                        </p>
                                    </div>
                                </div>
                                <div class="wg-history mb-50 type-right img-hover  tf-img-hover">
                                    <div class="content text-right">
                                        <h3 class="title fw-6 font-worksans">
                                            Expansion
                                        </h3>
                                        <p class="text font-nunito ">
                                            Expanded into wholesale distribution, reaching retailers across Tamil Nadu & Uttar
Pradesh.
                                        </p>
                                    </div>
                                    <div class="year">
                                        <p class="number font-snowfall fs-30">
                                            2022
                                        </p>
                                    </div>
                                    <div class="image hover-item hover14">
                                        <img src="{{asset('Front/images/widget/our-history-2.jpg')}}"
                                            data-src="{{asset('Front/images/widget/our-history-2.jpg')}}" alt="" class="lazyload">
                                    </div>
                                </div>
                                <div class="wg-history mb-50 type-left img-hover tf-img-hover">
                                    <div class="image hover-item hover14">
                                        <img src="{{asset('Front/images/widget/our-history-3.jpg')}}"
                                            data-src="{{asset('Front/images/widget/our-history-3.jpg')}}" alt="" class="lazyload">
                                    </div>
                                    <div class="year ">
                                        <p class="number font-snowfall fs-30">
                                            2023
                                        </p>
                                    </div>
                                    <div class="content">
                                        <h3 class="title fw-6 font-worksans">
                                            First Factory
                                        </h3>
                                        <p class="text font-nunito ">
                                            Built our first modern factory with hygienic processing facilities.
                                        </p>
                                    </div>
                                </div>
                                <div class="wg-history mb-50 type-right img-hover tf-img-hover">
                                    <div class="content text-right">
                                        <h3 class="title fw-6 font-worksans">
                                            Further Growth
                                        </h3>
                                        <p class="text font-nunito ">
                                           Expanded with new depots across 3 states <br>
                                           Launched flagship products like Kasuri Methi and entered national markets through B2B
platforms.
                                        </p>
                                    </div>
                                    <div class="year">
                                        <p class="number font-snowfall fs-30" style="font-size: 22px;">
                                            2024-2025
                                        </p>
                                    </div>
                                    <div class="image hover-item hover14">
                                        <img src="{{asset('Front/images/widget/our-history-4.jpg')}}"
                                            data-src="{{asset('Front/images/widget/our-history-4.jpg')}}" alt="" class="lazyload">
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="s-img-item item-1">
                    <img src="{{asset('Front/images/item/page-title-top.png')}}" alt="">
                </div>
            </section><!-- /.Section history -->

    <!-- Section benefit -->
   <section class="s-benefit">
            <div class="benefit-list ">
                <div class="box-icon ic-hover">
                    <div class="icon mb-30 hover-icon style-circle">
                        <img src="{{ asset('Front/icons/precision-agriculture.png') }}" alt="">
                    </div>
                    <a href="#" class="caption mb-17 fw-6 font-worksans hover-text-secondary">
                         Modern Processing
                    </a>
                    <p class="text font-nunito">
                         Cleaned & packed with advanced technology.
                    </p>
                </div>
                <div class="box-icon ic-hover">
                    <div class="icon mb-30 style-circle hover-icon img-hover-2">
                        <img src="{{ asset('Front/icons/achievement.png') }}" alt="">
                    </div>
                    <a href="#" class="caption mb-17 fw-6 font-worksans hover-text-secondary">
                        Absolute Quality
                    </a>
                    <p class="text font-nunito">
                        Perfection in every grain, excellence in every pack.
                    </p>
                </div>
                <div class="box-icon ic-hover">
                    <div class="icon mb-30 hover-icon style-circle">
                        <img src="{{ asset('Front/icons/save-the-world.png') }}" alt="">
                    </div>
                    <a href="#" class="caption mb-17 fw-6 font-worksans hover-text-secondary">
                        Environmentally Friendly
                    </a>
                    <p class="text font-nunito">
                        Sustainability today, a greener tomorrow.
                    </p>
                </div>
                <div class="box-icon ic-hover">
                    <div class="icon mb-30 hover-icon style-circle">
                        <img src="{{ asset('Front/icons/hand (1).png') }}" alt="">
                    </div>
                    <a href="#" class="caption mb-17 fw-6 font-worksans hover-text-secondary">
                       Reasonable Price
                    </a>
                    <p class="text font-nunito">
                        Trusted by businesses across India.
                    </p>
                </div>
            </div>
        </section>
    <!-- Section quality of life -->
    <section class="s-quality-of-life style-2">
        <div class="tf-container w-1290">
            <div class="row">
                <div class="col-lg-12">
                    <div class="content-section text-center">
                        <div class="img-item item-3 tf-animate__box">
                            <img class="up-down-move" src="{{ asset('Front/images/item/notice-2.png') }}" alt="">
                        </div>
                        <div class="clip-color-text font-snowfall text-center">
                            <p class="clip-text-bg-vertical">
                                Committed to Authenticity & Freshness!
                            </p>
                        </div>
                        <p class="sub font-snowfall fs-30 text-anime-style-1">
                            We believe that good health begins with clean and pure food sources.
                        </p>
                       <div class="swiper-container slider-box-icon">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <ul class="box-icon-list style-2">
                                            <li>
                                                <div class="box-icon style-3 ic-hover wow fadeInUp" data-wow-delay="0s">
                                                    <div class="icon style-circle hover-icon">
                                                         <img src="{{ asset('Front/icons/no-preservatives.png') }}" alt="">
                                                    </div>
                                                    <a href="#"
                                                        class="caption fw-5 font-worksans hover-text-4">
                                                        100% Natural
                                                    </a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-icon style-3 ic-hover wow fadeInUp"
                                                    data-wow-delay="0.1s">
                                                    <div class="icon style-circle hover-icon">
                                                       <img src="{{ asset('Front/icons/aroma.png') }}" alt="">
                                                    </div>
                                                    <a href="#"
                                                        class="caption fw-5 font-worksans hover-text-4">
                                                        Rich in Aroma
                                                    </a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-icon style-3 ic-hover wow fadeInUp"
                                                    data-wow-delay="0.2s">
                                                    <div class="icon style-circle hover-icon">
                                                         <img src="{{ asset('Front/icons/premium-quality.png') }}" alt="">
                                                    </div>
                                                    <a href="#"
                                                        class="caption fw-5 font-worksans hover-text-4">
                                                        Premium Quality
                                                    </a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-icon style-3 ic-hover wow fadeInUp"
                                                    data-wow-delay="0.3s">
                                                    <div class="icon style-circle hover-icon">
                                                         <img src="{{ asset('Front/icons/safe.png') }}" alt="">
                                                    </div>
                                                    <a href="#"
                                                        class="caption fw-5 font-worksans hover-text-4">
                                                        Hygienically Packed
                                                    </a>
                                                </div>
                                            </li>
                                          
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <div class="bot flex justify-center">
                            <a href="{{ route('our_commitments') }}" class="tf-btn scale-50">
                                <span class="text-style">
                                    See More About Our Commitment
                                </span>
                                <div class="icon">
                                    <i class="icon-arrow_right"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /.Section quality of life -->

    <!-- Section our history -->
   
    <!-- Section farmer tour -->
    <section class="s-farm-tour">
        <div class="tf-container">
            <div class="row">
                <div class="col-md-6">
                    <div class="box-about-us img-hover wow fadeInUp" data-wow-delay="0s">
                        <div class="image hover-item">
                            <img src="{{ asset('Front/images/widget/about-us-1.jpg') }}" data-src="{{ asset('Front/images/widget/about-us-1.jpg') }}"
                                alt="" class="lazyload">
                        </div>
                        <div class="content">
                            <a href="{{ route('our_team') }}" class="title fw-7 fs-30 font-worksans hover-text-secondary">
                                Meet The Team
                            </a>
                            <p class="text">
                                The faces behind the flavors, working with passion to bring Shreenath to every home.
                            </p>
                            <div class="flex justify-center">
                                <a href="{{ route('our_team') }}" class="tf-btn-read text-white hover-text-secondary">
                                    View All The Team Members
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box-about-us img-hover wow fadeInUp" data-wow-delay="0.1s">
                        <div class="image hover-item">
                            <img src="{{ asset('Front/images/widget/about-us-2.jpg') }}" data-src="{{ asset('Front/images/widget/about-us-2.jpg') }}"
                                alt="" class="lazyload">
                        </div>
                        <div class="content">
                            <a href="{{ route('our_gallery') }}" class="title fw-7 fs-30 font-worksans hover-text-secondary">
                                Explore Our Gallery
                            </a>
                            <p class="text">
                                From Farm to Factory – The Journey of Purity, Handpicked Cumin Seeds for the Finest Flavor, Naturally Sun-Dried Kasuri Methi, Sealed Freshness, Trusted Quality.
                            </p>
                            <div class="flex justify-center">
                                <a href="{{ route('our_gallery') }}" class="tf-btn-read text-white hover-text-secondary">
                                    View Gallery
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /.Section farmer tour -->

    <!-- Section contact us -->
    <section class="s-contact-us style-2 bg-white pt-124 pb-82">
        <div class="section-wrap">
            <div class="tf-container w-1290">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="content-left">
                            <div class="box-map style-2">
                                <div id="map" class="map"></div>
                            </div>
                            <ul class="contact-list overflow-hidden">
                                <li class="wow fadeInUp" data-wow-duration="1.4s">
                                    <div class="icon style-circle">
                                        <i class="fa-solid fa-location-dot"></i>
                                    </div>
                                    <div class="infor">
                                        <p class="title">
                                            Head Office
                                        </p>
                                        <p class="text">
                                            c/o H-16, Kala Industries, Krishi Upaj Mandi, Nagaur-341001 (Raj.)
                                        </p>
                                    </div>
                                </li>
                                <li class="wow fadeInUp" data-wow-duration="1.4s">
                                    <div class="icon style-circle">
                                        <i class="fa-solid fa-address-book"></i>
                                    </div>
                                    <div class="infor">
                                        <p class="title">
                                            Contact Us
                                        </p>
                                        <p class="text">
                                            info@shreenathspices.com <br>
                                            +91 8905015736 (24/7 Support)
                                        </p>
                                    </div>
                                </li>
                                <li class="wow fadeInUp" data-wow-duration="1.4s">
                                    <div class="icon style-circle">
                                        <i class="fa-solid fa-clock"></i>
                                    </div>
                                    <div class="infor">
                                        <p class="title">
                                            Working Hours
                                        </p>
                                        <p class="text">
                                            Mon – Sat : 9.00am – 8.00pm
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="content-section">
                            <div class="heading-section has-text mb-50">
                                <p class="sub-title">Contact Us Today</p>
                                <p class="title text-anime-style-2">Dropdown Options:</p>
                                <p class="text">
                                    We will reply you within 24 hours via email, thank you for contacting
                                </p>
                                <div class="img-item">
                                    <img class="tf-animate-1" src="{{ asset('Front/images/item/rice-plant-2.png') }}" alt="" />
                                </div>
                            </div>
                            <form id="contactform" method="post" action="https://themesflat.co/html/Shrinath/contact/contact-process.php"
                                novalidate="novalidate" class="form-send-message style-2">
                                <div class="cols style-2 mb-15">
                                    <fieldset>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Name*" aria-required="true" required />
                                    </fieldset>
                                    <fieldset>
                                        <input type="email" class="form-control email" id="mail" name="mail"
                                            placeholder="Email*" required />
                                    </fieldset>
                                </div>
                                <div class="cols style-2 mb-15">
                                    <fieldset>
                                        <input type="text" class="form-control" id="phone" name="phone"
                                            placeholder="Phone*" aria-required="true" required />
                                    </fieldset>
                                    <fieldset class="dropdown">
                                        <select name="text" id="Support">
                                            <option value="General Inquiry" selected="">General Inquiry</option>
                                            <option value="Product Information">Product Information</option>
                                            <option value="Bulk/Wholesale Orders">Bulk/Wholesale Orders</option>
                                            <option value="Dealership / Distributor Inquiry">Dealership / Distributor Inquiry</option>
                                            <option value="Carrying & Forwarding Inquiry">Carrying & Forwarding Inquiry</option>
                                            <option value="Feedback / Suggestions">Feedback / Suggestions</option>
                                            <option value="Support / Complaint">Support / Complaint</option>
                                            <option value="Careers / Job Opportunities">Careers / Job Opportunities</option>
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="cols mb-30">
                                    <fieldset>
                                        <textarea name="message" id="message" placeholder="Message*"></textarea>
                                    </fieldset>
                                </div>
                                <div class="checkbox-item send-wrap">
                                    <label class="mb-0">
                                        <span class="text font-nunito"> Agree to our terms</span>
                                        <input type="checkbox" class="checkbox-item" checked>
                                        <span class="btn-checkbox"></span>
                                    </label>
                                    <button type="submit" class="tf-btn">
                                        <span class="text-style">
                                            Send Message
                                        </span>
                                        <span class="icon">
                                            <i class="icon-arrow_right"></i>
                                        </span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /.Section contact us -->

    <!-- Section partner -->
    <section class="s-partner style-2 has-img-item pb-71">
        <div class="tf-container w-1780">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-section text-center has-text mb-81">
                        <p class="sub-title">Trusted Quality, Globally Recognized</p>
                        <p class="title text-anime-style-2">
                            Our Certifications
                        </p>
                        <p class="text">
                            ISO | APEDA | FSSAI | HALAL | GMP | HACCP | IEC
                        </p>
                        <div class="img-item">
                            <img class="tf-animate-1" src="{{ asset('Front/images/item/rice-plant-2.png') }}" alt="" />
                        </div>
                    </div>
                    <div class="slider-wrap">
                        <div class="swiper-container slider-partner">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="slide-partner">
                                        <div class="image">
                                            <a href="#">
                                                <img src="{{ asset('Front/images/partner/wide-open.png') }}" alt="" class="lazyload">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="slide-partner">
                                        <div class="image">
                                            <a href="#">
                                                <img src="{{ asset('Front/images/partner/sollio.png') }}" alt="" class="lazyload">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="slide-partner">
                                        <div class="image">
                                            <a href="#">
                                                <img src="{{ asset('Front/images/partner/syngenta.png') }}" alt="" class="lazyload">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="slide-partner">
                                        <div class="image">
                                            <a href="#">
                                                <img src="{{ asset('Front/images/partner/strachan-valley.png') }}" alt="" class="lazyload">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="slide-partner">
                                        <div class="image">
                                            <a href="#">
                                                <img src="{{ asset('Front/images/partner/new-holland.png') }}" alt="" class="lazyload">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="slide-partner">
                                        <div class="image">
                                            <a href="#">
                                                <img src="{{ asset('Front/images/partner/ony-field.png') }}" alt="" class="lazyload">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="s-img-item item-1">
            <img src="{{ asset('Front/images/item/page-title-top.png') }}" alt="" />
        </div>
    </section><!-- /.Section partner -->

</div><!-- /.Main-content -->

@endsection