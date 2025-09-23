@extends('Frontend.common.app')
@section('title','home')
@section('content')
<style>
    .raat{
        display: none
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
.peloe{
    color: #f9e433 !important;
}
.mtop{
    display: flex;
    flex-direction: column;
}
.mtop {
    display: flex;
    flex-direction: column;
    align-items: start;
}
.card-product .image {
    margin-top: 0px !important;
}
.card-product.style-2.type-2 .image {
    margin-bottom: 30px !important;
}
.card-product.style-2.type-2 .image img {
    max-width: 215px !important;
}
.pricing-star{
    margin-bottom: 0 !important;
}
</style>
       <div class="page-title-home-2">
            <div class="swiper-container slider-home-2">
                <div class="swiper-wrapper">
                    @foreach ($slider1 as $value)
                        <div class="swiper-slide">
                        <div class="slide-home-2">
                            <div class="image overflow-hidden">
                                <img src="{{ asset($value->image ?? '') }}" data-src="{{ asset($value->image ?? '') }}"
                                    alt="" class="lazyload tf-animate-zoom-in-out">
                            </div>
                            <div class="content">
                                <h1 class="title font-farmhouse tf-fade-top fade-item-2">
                                   Every Spice Counts, Every Flavor Matters.
                                </h1>
                                <div class="img-item">
                                    <img class="tf-trainsition-draw-left access-trainsition"
                                        src="{{ asset('Front/images/item/line-throw-title.png') }}" alt="">
                                </div>
                                <p class="text font-nunito tf-fade-left fade-item-4">
                                    From cumin to kasuri methi, from whole spices to authentic taste — Shreenath Spices delivers <br> 
                                    purity, aroma, and flavor straight from the mandi to your kitchen.
                                </p>
                                <a href="{{route('about')}}" class="tf-btn btn-view bg-white tf-fade-bottom fade-item-5">
                                    <span class="text-style cl-primary">
                                        About Us
                                    </span>
                                    <div class="icon">
                                        <i class="icon-arrow_right"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{-- <div class="swiper-slide">
                        <div class="slide-home-2">
                            <div class="image overflow-hidden">
                                <img src="{{ asset('Front/images/page-title/home-2-2.jpg') }}" data-src="{{ asset('Front/images/page-title/home-2-2.jpg') }}"
                                    alt="" class="lazyload tf-animate-zoom-in-out">
                            </div>
                            <div class="content">
                                <h1 class="title font-farmhouse tf-fade-top fade-item-2">
                                    Every Crop Counts, <br>
                                    Every Farmer Matters
                                </h1>
                                <div class="img-item ">
                                    <img class="tf-trainsition-draw-left access-trainsition"
                                        src="{{ asset('Front/images/item/line-throw-title.png') }}" alt="">
                                </div>
                                <p class="text font-nunito tf-fade-left fade-item-4">
                                    The paramount doctrine of the economic and technological euphoria of recent <br>
                                    decades has been that everything depends on innovation.
                                </p>
                                <a href="#" class="tf-btn btn-view bg-white tf-fade-bottom fade-item-5">
                                    <span class="text-style cl-primary">
                                        See Our Services
                                    </span>
                                    <div class="icon">
                                        <i class="icon-arrow_right"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <div class=" btn-slide-home-2 btn-next">
                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="80px" height="20px" viewBox="0 0 80 20"
                        preserveAspectRatio="xMidYMid meet">
                        <g fill="#ffffff">
                            <path
                                d="M63 19 c0 -0.5 2.6 -2.4 5.8 -4.2 l5.7 -3.3 -19.5 -0.8 c-11 -0.5 -27.1 -0.5 -37 0.1 -9.6 0.5 -17.7 0.7 -17.9 0.5 -2.4 -1.9 22 -3.5 48.7 -3.1 l25.2 0.3 -4.6 -3.9 c-2.5 -2.1 -4.3 -4 -4 -4.3 0.7 -0.7 14.6 8.9 14.6 10.2 0 1.1 -14.3 9.5 -16.2 9.5 -0.4 0 -0.8 -0.4 -0.8 -1z" />
                        </g>
                    </svg>
                </div>
                <div class=" btn-slide-home-2 btn-prev">
                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="80px" height="20px" viewBox="0 0 80 20"
                        preserveAspectRatio="xMidYMid meet">
                        <g fill="#ffffff">
                            <path
                                d="M7 15.4 c-3.6 -2.4 -6.6 -5 -6.8 -5.7 -0.2 -1.2 13.8 -9.7 16 -9.7 2.4 0 0.2 2.4 -4.9 5.2 l-5.8 3.3 19.5 0.8 c11 0.5 27.1 0.5 37 -0.1 9.6 -0.5 17.7 -0.7 17.9 -0.5 2.4 1.9 -22 3.5 -48.6 3.1 l-25.2 -0.3 4.7 4.2 c6.1 5.5 4.4 5.3 -3.8 -0.3z" />
                        </g>
                    </svg>
                </div>
            </div>
        </div><!-- /.Page-title-home-2 -->
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
        </section><!-- /.Section benefit -->
        <!-- Section about us 2 -->
        <section class="s-about-us-2">
            <div class="tf-container w-1620">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="content-section">
                            <div class="tf-animate__rotate-right ">
                                <div class="image image-left ">
                                    <img src="{{ asset('Front/images/section/s-about-2.jpg') }}" data-src="{{ asset('Front/images/section/s-about-2.jpg') }}"
                                        alt="" class="lazyload">
                                </div>
                            </div>
                            <div class="content-wrap">
                                <div class="content text-center">
                                    <div class="heading-section text-center style-4 mb-26">
                                        <div class="img-item justify-center mb-25">
                                            <img src="{{ asset('Front/images/item/rice-plant-2.png') }}" class="tf-animate-1" alt="" />
                                        </div>
                                        <p class="sub-title">
                                           Welcome to Shreenath Spices
                                        </p>
                                        <p class="title text-anime-style-2">
                                            What You Choose Today, Brings Flavor Tomorrow.
                                        </p>
                                    </div>
                                    <p class="text-1 font-snowfall mb-20">
                                        Rooted in tradition, growing with vision—Shreenath began its journey humbly, but today our 
                                        reach stretches across India and beyond.
                                    </p>
                                    <p class="text-2 mb-42">
                                       At Shreenath Spices, we believe every meal deserves purity. With deep mandi roots and 
                                       state-of-the-art facilities, we bring you cumin, kasuri methi, and whole spices that define 
                                       authenticity. 
                                       From households to distributors, Shreenath stands for quality, consistency, and trust.
                                    </p>
                                </div>
                                <div class="bot flex justify-center">
                                    <a href="#" class="tf-btn ">
                                        <span class="text-style ">
                                            More About Us
                                        </span>
                                        <div class="icon">
                                            <i class="icon-arrow_right"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="tf-animate__rotate-left ">
                                <div class="image image-right ">
                                    <img src="{{ asset('Front/images/section/s-about-3.jpg') }}" data-src="{{ asset('Front/images/section/s-about-3.jpg') }}"
                                        alt="" class="lazyload">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="wg-counter style-4">
                            <div class="counter-item">
                                <div class="counter">
                                    <div class="odometer fs-65 style-4">6+</div>
                                </div>
                                <p class="title font-worksans fw-5">
                                    Years of Legacy
                                </p>
                                <div class="icon-img">
                                    <img src="{{ asset('Front/images/item/line-throw-title.png') }}" alt="">
                                </div>
                            </div>
                            <div class="counter-item">
                                <div class="counter">
                                    <div class="odometer fs-65 style-4-2">8+</div>
                                </div>
                                <p class="title font-worksans fw-5">
                                    Depots Across India
                                </p>
                                <div class="icon-img">
                                    <img src="{{ asset('Front/images/item/line-throw-title.png') }}" alt="">
                                </div>
                            </div>
                            <div class="counter-item">
                                <div class="counter">
                                    <div class="odometer fs-65 style-4-3">350+</div>
                                </div>
                                <p class="title font-worksans fw-5">
                                    Happy Customers
                                </p>
                                <div class="icon-img">
                                    <img src="{{ asset('Front/images/item/line-throw-title.png') }}" alt="">
                                </div>
                            </div>
                            <div class="counter-item">
                                <div class="counter">
                                    <div class="odometer fs-65 style-4-3">2+</div>
                                </div>
                                <p class="title font-worksans fw-5">
                                    Processing Units
                                </p>
                                <div class="icon-img">
                                    <img src="{{ asset('Front/images/item/line-throw-title.png') }}" alt="">
                                </div>
                            </div>
                            <div class="counter-item">
                                <div class="counter">
                                    <div class="odometer fs-65 style-4-3">1500+</div>
                                </div>
                                <p class="title font-worksans fw-5">
                                   Farmers Connected
                                </p>
                                <div class="icon-img">
                                    <img src="{{ asset('Front/images/item/line-throw-title.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="s-img-item item-1 scroll-element-3">
                <img class="scale-1-1" src="{{ asset('Front/images/item/yellow-f.png') }}" alt="">
            </div>
        </section><!-- /.Section about us 2 -->
        <!-- Section service 2-->
        <section class="s-service-2 relative overflow-hidden">
            <div class="content-section">
                <div class="heading-section style-2">
                    <div class="img-item">
                        <div class="item">
                            <img src="{{ asset('Front/images/item/rice-plant-2.png') }}" class="tf-animate-1" alt="" />
                        </div>
                        <p class="sub-title">
                            What We Do
                        </p>
                    </div>
                    <p class="title tf-animate-1">
                        At Shreenath, we bridge tradition with innovation to create food that is pure, sustainable, and trusted.
                    </p>
                </div>
                {{-- <p class="text">
                  ✅  <b>We Use Modern Processing:</b> By adopting clean, efficient, and safe methods, we ensure every product retains its natural aroma and quality. 
                </p>
                <p>
                    ✅ <b>Making Healthy Foods:</b> Every product is processed with care and hygiene to deliver authentic taste, nutrition, and long-lasting freshness.
                </p> --}}
                {{-- <a href="#" class="tf-btn ">
                    <span class="text-style ">
                        Processing Video
                    </span>
                    <div class="icon">
                        <i class="icon-arrow_right"></i>
                    </div>
                </a> --}}
                <div class="button-slide-wrap">
                    <div class="btn-s-service-2 btn-prev">
                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="58px" height="15px"
                            viewBox="0 0 80 20" preserveAspectRatio="xMidYMid meet">
                            <g fill="#0d401c">
                                <path
                                    d="M7 15.4 c-3.6 -2.4 -6.6 -5 -6.8 -5.7 -0.2 -1.2 13.8 -9.7 16 -9.7 2.4 0 0.2 2.4 -4.9 5.2 l-5.8 3.3 19.5 0.8 c11 0.5 27.1 0.5 37 -0.1 9.6 -0.5 17.7 -0.7 17.9 -0.5 2.4 1.9 -22 3.5 -48.6 3.1 l-25.2 -0.3 4.7 4.2 c6.1 5.5 4.4 5.3 -3.8 -0.3z" />
                            </g>
                        </svg>
                    </div>
                    <div class=" btn-s-service-2 btn-next">
                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="58px" height="15px"
                            viewBox="0 0 80 20" preserveAspectRatio="xMidYMid meet">
                            <g fill="#0d401c">
                                <path
                                    d="M63 19 c0 -0.5 2.6 -2.4 5.8 -4.2 l5.7 -3.3 -19.5 -0.8 c-11 -0.5 -27.1 -0.5 -37 0.1 -9.6 0.5 -17.7 0.7 -17.9 0.5 -2.4 -1.9 22 -3.5 48.7 -3.1 l25.2 0.3 -4.6 -3.9 c-2.5 -2.1 -4.3 -4 -4 -4.3 0.7 -0.7 14.6 8.9 14.6 10.2 0 1.1 -14.3 9.5 -16.2 9.5 -0.4 0 -0.8 -0.4 -0.8 -1z" />
                            </g>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="slider-wrap">
                <div class="swiper-container slider-s-service-2">
                    <div class="swiper-wrapper">
                        @foreach ($slider2 as $value)
                                                    <div class="swiper-slide">
                            <div class="box-infor style-2 ic-hover img-hover">
                                <div class="image hover-icon hover-item">
                                    <img src="{{ asset($value->image ?? '') }}"
                                        data-src="{{ asset($value->image ?? '') }}" alt="" class=" lazyload">
                                    <div class="icon style-circle">
                                        <i class="icon-salad"></i>
                                    </div>
                                </div>
                                <div class="content">
                                    <a href="#"
                                        class="title fs-23 fw-6 font-worksans hover-text-secondary">
                                        {{$value->title ?? ''}}
                                    </a>
                                    {{-- <p class="text font-nunito">
                                        Ultrices sagittis orci a scelerisque purus semper eget duis at. Sollicitudin
                                        nibh sit amet
                                        commodo nulla.
                                    </p> --}}
                                    {{-- <a href="#" class="tf-btn-read text-white hover-text-secondary">Read
                                        More</a> --}}
                                </div>
                            </div>
                        </div>
                        @endforeach
                      
                    </div>
                </div>
            </div>
        </section><!-- /.Section service -->
        <!-- Section quality of life -->
        <section class="s-quality-of-life">
            <div class="tf-container w-1290">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="content-section text-center">
                            <div class="img-item item-3 tf-animate__box ">
                                <img class="lazyload up-down-move" src="{{ asset('Front/images/item/notice-2.png') }}" alt="">
                            </div>
                            <div class="clip-color-text font-snowfall text-center">
                                <p class="clip-text-bg-vertical">
                                    Healthy Life With <br>
                                    Fresh Products!
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
                                <a href="{{route('our_commitments')}}" class="tf-btn scale-50 gap-37">
                                    <span class="text-style ">
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
            <div class="img-item item-1 wow fadeInRight" data-wow-delay="0.1s">
                <img src="{{ asset('Front/images/item/rice-plant-color.png') }}" alt="">
            </div>
            <div class="img-item item-2 wow fadeInLeft" data-wow-delay="0.1s">
                <img src="{{ asset('Front/images/item/corn-color.png') }}" alt="">
            </div>
        </section><!-- /.Section quality of life -->
        <!-- Section what we do -->
        <section class="s-what-we-do ">
            <div class="content-wrap">
                <div class="content-section">
                    <div class="heading-section style-3 has-text">
                        <p class="sub-title">Our Skills</p>
                        <p class="title text-anime-style-1">
                            Our Expertise
                        </p>
                        <p class="text">
                            We believe in bringing customers the best spices. For decades, Shreenath has been dedicated to delivering spices that are pure, hygienic, and full of authentic flavor. From sourcing to packaging, every step reflects our commitment to quality and trust.
                        </p>
                    </div>
                    {{-- <a href="#" class="tf-btn bg-white">
                        <span class="text-style cl-primary">
                            Read More
                        </span>
                        <div class="icon">
                            <i class="icon-arrow_right"></i>
                        </div>
                    </a> --}}
                    <div class="img-item item-1 nhapNhap">
                        <img src="{{ asset('Front/images/item/barn-2.png') }}" alt="">
                    </div>
                    <div class="video-wrap style-3 tf-animate__box-2 animate__slow">
                        <a href="https://www.youtube.com/watch?v=MLpWrANjFbI" class="style-icon-play popup-youtube">
                            <i class="icon-play3"></i>
                            <div class="wave"></div>
                            <div class="wave-1"></div>
                        </a>
                    </div>
                </div>
                <div class="we-do-list">
                 
                </div>
            </div>
        </section><!-- /.Section what we do -->
        <!-- Section our agriculture -->
        <section class="s-our-agriculture">
            <div class="content-section">
                <div class="tf-container w-1290">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="image-wrap img-hover">
                                <div class="image hover-item">
                                    <img src="{{ asset('Front/images/section/s-farm.jpg') }}" alt="" class="lazyload">
                                </div>
                                <div class="wg-exprerience text-center tf-rotate-back-and-forth">
                                    <p class="year">45</p>
                                    <p class="text">
                                        Years Of <br> Experience
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="content">
                                <div class="heading-section style-2">
                                    <div class="img-item">
                                        <div class="item mr-25">
                                            <img src="{{ asset('Front/images/item/rice-plant-2.png') }}" class="tf-animate-1" alt="" />
                                        </div>
                                        <p class="sub-title">
                                            Our Agriculture Skill
                                        </p>
                                    </div>
                                    <p class="title tf-animate-2">
                                        We Believe In Bringing Customers The Best Spices
                                    </p>
                                </div>
                                <p class="text">
                                    For decades, Shreenath has been dedicated to delivering spices that are pure, hygienic, and full of authentic flavor. From sourcing to packaging, every step reflects our commitment to quality and trust.
                                </p>
                                <div class="wg-progress mb-29">
                                    <div class="top">
                                        <span>Pure and Natural</span>
                                        <span>99%</span>
                                    </div>
                                    <div class="progress tf-animate-1" role="progressbar" aria-label="Basic example"
                                        aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar" style="width: 99%"></div>
                                    </div>
                                </div>
                                <div class="wg-progress">
                                    <div class="top">
                                        <span>Quality You Can Trust</span>
                                        <span>99%</span>
                                    </div>
                                    <div class="progress tf-animate-1" role="progressbar" aria-label="Basic example"
                                        aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar" style="width: 99%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tf-container w-1290">
                <div class="row">
                    <div class="col-md-4">
                        <div class="wrap">
                            <div class="box-event style-2 ic-hover wow fadeInUp" data-wow-delay="0s">
                                <div class="content hover-icon-2">
                                    <div class="icon">
                                        <i class="icon-farmer-2"></i>
                                    </div>
                                    <a href="#" class="title fw-6 font-worksans hover-text-4">
                                        Team & Farmers
                                    </a>
                                    <p class="sub font-snowfall">
                                        Our Roots, Our Strength
                                    </p>
                                    <p class="text">
                                        Every spice has a story. Shreenath Spices honors the generations of farmers whose hard work makes authentic flavors possible—bringing their legacy from the fields to your kitchen.
                                    </p>
                                    <a href="#" class="tf-btn-read hover-text-4">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="wrap">
                            <div class="box-event style-2 ic-hover wow fadeInUp" data-wow-delay="0.1s">
                                <div class="content hover-icon-2">
                                    <div class="icon">
                                        <i class="icon-customer"></i>
                                    </div>
                                    <a href="#" class="title fw-6 font-worksans hover-text-4">
                                        Consumers
                                    </a>
                                    <p class="sub font-snowfall">
                                        Pure Taste, Pure Trust
                                    </p>
                                    <p class="text">
                                        We believe every home deserves spices that are 100% pure, safe, and full of flavor. Shreenath Spices brings you the real taste of India—free from adulteration, full of authenticity.
                                    </p>
                                    <a href="#" class="tf-btn-read hover-text-4">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="wrap">
                            <div class="box-event style-2 ic-hover wow fadeInUp" data-wow-delay="0.2s">
                                <div class="content hover-icon-2">
                                    <div class="icon">
                                        <i class="icon-farm"></i>
                                    </div>
                                    <a href="#" class="title fw-6 font-worksans hover-text-4">
                                        Environment
                                    </a>
                                    <p class="sub font-snowfall">
                                        Growing Today, Preserving Tomorrow
                                    </p>
                                    <p class="text">
                                        From sustainable farming to eco-friendly processing, Shreenath Spices is committed to protecting the planet while delivering purity to your plate.
                                    </p>
                                    <a href="#" class="tf-btn-read hover-text-4">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /.Section our agriculture -->
        <!-- Section project -->
     <!-- /.Section project -->
         <section class="s-shopping">
            <div class="tf-container w-1620">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="content-wrap">
                            <div class="content-section">
                                <div class="heading-section style-2 has-text">
                                    <div class="img-item">
                                        <div class="item">
                                            <img class="tf-animate-1" src="images/item/rice-plant-2.png" alt="" />
                                        </div>
                                        <p class="sub-title">
                                           Our Products
                                        </p>
                                    </div>
                                    <p class="title wow fadeInLeft" data-wow-delay="0s">
                                        Providing the Finest Spices to Every Kitchen & Business
                                    </p>
                                    <p class="text">
                                        The heart of Indian cuisine, available in premium grades—Udaan, Kashi Bhagat, Gold, Silver,
and Morpankh. Naturally sun-dried Kasuri Methi, sourced from Nagaur, adds a rich aroma to
your recipes.

                                    </p>
                                </div>
                                <a href="{{route('our_products')}}" class="tf-btn scale-40">
                                    <span class="text-style ">
                                        View All Products
                                    </span>
                                    <div class="icon">
                                        <i class="icon-arrow_right"></i>
                                    </div>
                                </a>
                            </div>
                            <div class="s-slider">
                                <div class="swiper-container slider-shopping-card">
                                    <div class="swiper-wrapper">
                                        @foreach ($product as $value)
                                              <div class="swiper-slide">
                                                <a href="{{ route('prod_detail', $value->id) }}">
                                            <div class="card-product mw-unset style-2 type-2 wow fadeInUp"
                                                data-wow-delay="0s">
                                              
                                                <div class="image">
                                                   <img src="{{ asset($value->image_1 ?? '') }}" data-src="{{ asset($value->image_1 ?? '') }}" alt="" class="lazyload">
                                                </div>
                                                <a href="{{ route('prod_detail', $value->id) }}"
                                                    class="name-product font-worksans hover-text-4">
                                                    {{ $value->name ?? ''}}
                                                </a>
                                                <div class="pricing-star">
                                                   <div class="price-wrap mtop">
                                                    @if(($value->mrp ?? 0) > 0 && ($value->price ?? 0) > 0)
                                                        <span class="price-1">₹ {{ $value->mrp }}</span>
                                                        <span class="price-2">₹ {{ $value->price }}</span>
                                                    @else
                                                        <span class="price-2">Out Of Stock</span>
                                                    @endif
                                                </div>
                                                    
                                                </div>
                                                
                                            </div>
                                            </a>
                                        </div>
                                        @endforeach
                                      
                                    </div>
                                </div>
                            </div>
                            <div class="btn-slide-wrap">
                                <div class="btn-prev btn-slider-shopping">
                                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="68px" height="18px"
                                        viewBox="0 0 68 18" preserveAspectRatio="xMidYMid meet">
                                        <g fill="#0d401c">
                                            <path
                                                d="M6.3 14.3 c-3.5 -2.1 -6.3 -4.2 -6.3 -4.9 0 -0.6 2.7 -3 6 -5.3 6.4 -4.5 8.3 -4.1 2.6 0.6 l-3.5 2.8 24.7 0 c23.6 0 38.2 0.9 38.2 2.3 0 0.4 -7.3 0.3 -16.3 -0.1 -9 -0.5 -23.3 -0.5 -31.8 0 l-15.4 0.8 5.3 2.9 c5 2.8 6.6 4.6 4 4.6 -0.7 0 -4.1 -1.7 -7.5 -3.7z" />
                                        </g>
                                    </svg>
                                </div>
                                <div class="btn-next btn-slider-shopping">
                                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="68px" height="18px"
                                        viewBox="0 0 80 20" preserveAspectRatio="xMidYMid meet">
                                        <g fill="#0d401c">
                                            <path
                                                d="M63 19 c0 -0.5 2.6 -2.4 5.8 -4.2 l5.7 -3.3 -19.5 -0.8 c-11 -0.5 -27.1 -0.5 -37 0.1 -9.6 0.5 -17.7 0.7 -17.9 0.5 -2.4 -1.9 22 -3.5 48.7 -3.1 l25.2 0.3 -4.6 -3.9 c-2.5 -2.1 -4.3 -4 -4 -4.3 0.7 -0.7 14.6 8.9 14.6 10.2 0 1.1 -14.3 9.5 -16.2 9.5 -0.4 0 -0.8 -0.4 -0.8 -1z" />
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="s-img-item item-1">
                <img src="images/item/page-title-top.png" alt="">
            </div>
            <div class="s-img-item item-2 wow zoomIn">
                <div class="nhapNhap">
                    <img src="images/item/house-mountain-3.png" alt="">
                </div>
            </div>
        </section><!-- /.Section shopping today -->
        <!-- Section testimonial -->
        <section class="s-testimonial-2">
            <div class="tf-container w-1290">
                <div class="row">
                    <div class="col-md-6">
                        <div class="heading-section">
                            <p class="sub-title">What Our Customers Say</p>
                            <p class="title text-anime-style-1">What Customers Says?</p>
                            <div class="img-item">
                                <img src="{{ asset('Front/images/item/rice-plant-2.png') }}" class="tf-animate-1" alt="" />
                            </div>
                            <div class="img-item item-2">
                                <i class="icon-quote"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="counter-wrap">
                            <div class="wg-counter style-5 style-6">
                                <div class="icon style-circle">
                                    <i class="icon-barley"></i>
                                </div>
                                <div class="counter-item">
                                    <p class="title font-worksans fw-5 fs-18">
                                        Happy Customers Served
                                    </p>
                                    <div class="counter">
                                        <div class="odometer style-6">350</div>
                                        <span class="sub-odo color-secondary">+</span>
                                    </div>
                                </div>
                            </div>
                            <div class="img-item">
                                <img src="{{ asset('Front/images/item/line-throw-title.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="s-slider">
                <div class="tf-container w-1290">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="swiper-container slider-s-testimonial-2">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="testimonial style-2">
                                            <div class="comment">
                                                <p class="caption fs-23 font-snowfall">
                                                    “Shreenath Jeera brings unmatched taste to my dishes.”
                                                </p>
                                                <p class="text font-worksans">
                                                    – Mayank Agarwal, Delhi
                                                </p>
                                            </div>
                                            <div class="author-wrap">
                                                <div class="left">
                                                    <div class="image-avt">
                                                        <img src="{{ asset('Front/images/widget/author-comment.jpg') }}" alt="">
                                                    </div>
                                                    <div class="infor">
                                                        <div class="name-wrap">
                                                            <a href="#" class="name text-upper hover-text-4">
                                                                Mayank Agarwal
                                                            </a>
                                                            <div class="wg-rating">
                                                                <i class="fa-solid fa-star"></i>
                                                                <i class="fa-solid fa-star"></i>
                                                                <i class="fa-solid fa-star"></i>
                                                                <i class="fa-solid fa-star"></i>
                                                                <i class="fa-solid fa-star"></i>
                                                            </div>
                                                        </div>
                                                        <p class="duty">
                                                            Delhi
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="testimonial style-2">
                                            <div class="comment">
                                                <p class="caption fs-23 font-snowfall">
                                                    “As a retailer, I trust Shreenath for consistent supply & quality.”
                                                </p>
                                                <p class="text font-worksans">
                                                    – Ravikanta, Ludhiana
                                                </p>
                                            </div>
                                            <div class="author-wrap">
                                                <div class="left">
                                                    <div class="image-avt">
                                                        <img src="{{ asset('Front/images/section/customer-say-3.jpg') }}" alt="">
                                                    </div>
                                                    <div class="infor">
                                                        <div class="name-wrap">
                                                            <a href="#" class="name text-upper hover-text-4">
                                                                Ravikanta
                                                            </a>
                                                            <div class="wg-rating">
                                                                <i class="fa-solid fa-star"></i>
                                                                <i class="fa-solid fa-star"></i>
                                                                <i class="fa-solid fa-star"></i>
                                                                <i class="fa-solid fa-star"></i>
                                                                <i class="fa-solid fa-star"></i>
                                                            </div>
                                                        </div>
                                                        <p class="duty">
                                                            Ludhiana
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" btn-slide-testimonial-2 btn-next">
                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="58px" height="15px" viewBox="0 0 80 20"
                        preserveAspectRatio="xMidYMid meet">
                        <g fill="#0d401c">
                            <path
                                d="M63 19 c0 -0.5 2.6 -2.4 5.8 -4.2 l5.7 -3.3 -19.5 -0.8 c-11 -0.5 -27.1 -0.5 -37 0.1 -9.6 0.5 -17.7 0.7 -17.9 0.5 -2.4 -1.9 22 -3.5 48.7 -3.1 l25.2 0.3 -4.6 -3.9 c-2.5 -2.1 -4.3 -4 -4 -4.3 0.7 -0.7 14.6 8.9 14.6 10.2 0 1.1 -14.3 9.5 -16.2 9.5 -0.4 0 -0.8 -0.4 -0.8 -1z" />
                        </g>
                    </svg>
                </div>
                <div class=" btn-slide-testimonial-2 btn-prev">
                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="58px" height="15px" viewBox="0 0 80 20"
                        preserveAspectRatio="xMidYMid meet">
                        <g fill="#0d401c">
                            <path
                                d="M7 15.4 c-3.6 -2.4 -6.6 -5 -6.8 -5.7 -0.2 -1.2 13.8 -9.7 16 -9.7 2.4 0 0.2 2.4 -4.9 5.2 l-5.8 3.3 19.5 0.8 c11 0.5 27.1 0.5 37 -0.1 9.6 -0.5 17.7 -0.7 17.9 -0.5 2.4 1.9 -22 3.5 -48.6 3.1 l-25.2 -0.3 4.7 4.2 c6.1 5.5 4.4 5.3 -3.8 -0.3z" />
                        </g>
                    </svg>
                </div>
            </div>
        </section><!-- /.Section testimonial -->
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
                                            <p>
                                                <img src="{{ asset('Front/images/partner/fss.png') }}" alt="" class="lazyload">
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="slide-partner">
                                        <div class="image">
                                            <p>
                                                <img src="{{ asset('Front/images/partner/asd.png') }}" alt="" class="lazyload">
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="slide-partner">
                                        <div class="image">
                                            <p>
                                                <img src="{{ asset('Front/images/partner/asdasd.png') }}" alt="" class="lazyload">
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="slide-partner">
                                        <div class="image">
                                            <p>
                                                <img src="{{ asset('Front/images/partner/ww.png') }}" alt="" class="lazyload">
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="slide-partner">
                                        <div class="image">
                                            <p>
                                                <img src="{{ asset('Front/images/partner/haa.png') }}" alt="" class="lazyload">
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="slide-partner">
                                        <div class="image">
                                            <p>
                                                <img src="{{ asset('Front/images/partner/iso.png') }}" alt="" class="lazyload">
                                            </p>
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

       <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <img src="" alt="">
                    </div>
                    <div class="col-lg-2">
                        <img src="{{ asset('images/partner/images.png') }}" alt="">
                    </div>
                    <div class="col-lg-2">
                        <img src="{{ asset('images/partner/partner-2.png') }}" alt="">
                    </div>
                    <div class="col-lg-2">
                        <img src="{{ asset('images/partner/partner-3.png') }}" alt="">
                    </div>
                    <div class="col-lg-2">
                        <img src="{{ asset('images/partner/partner-4.png') }}" alt="">
                    </div>
                    <div class="col-lg-2">
                        <img src="{{ asset('images/partner/partner-5.png') }}" alt="">
                    </div>
                   
                </div>
            </div>
        </section>
        <!-- Section happy farm -->
        <section class="s-happy-farm">
            <div class="bg-section">
                <div class="scroll-element-3">
                    <img class="lazyload scale-1-1" src="{{ asset('Front/images/item/gree-field.jpg') }}"
                        data-src="{{ asset('Front/images/item/gree-field.jpg') }}" alt="">
                </div>
                <div class="s-img-item item-1">
                    <img src="{{ asset('Front/images/item/page-title-top.png') }}" alt="">
                </div>
            </div>
            <div class="content-section">
                <div class="tf-container w-1620">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="content">
                                <div class="heading-section style-3 has-text">
                                    <div class="top">
                                        <p class="sub-title fs-35 tf-animate-1">Happy Family</p>
                                        <div class="img-item item-2 tf-heartBeat">
                                            <img class="wow zoomIn " src="{{ asset('Front/images/item/happy.png') }}" alt="" />
                                        </div>
                                    </div>
                                    <p class="title wow fadeInUp" data-wow-delay="0s">
                                        We Care For Farmers, Employees & Families Alike.
                                    </p>
                                    <p class="text wow fadeInUp" data-wow-delay="0s">
                                        Shreenath is more than just spices—it’s a commitment to creating value for farmers, partners, and households.
                                    </p>
                                    <a href="#" class="tf-btn bg-white scale-40 wow fadeInUp"
                                        data-wow-delay="0s">
                                        <span class="text-style cl-primary">
                                            Contact Us Today
                                        </span>
                                        <div class="icon">
                                            <i class="icon-arrow_right"></i>
                                        </div>
                                    </a>
                                </div>
                                <div class="image-wrap">
                                    <img src="{{ asset('Front/images/section/s-hp-farm.png') }}" data-src="{{ asset('Front/images/section/s-hp-farm.png') }}"
                                        alt="" class="lazyload">
                                </div>
                                <div class="img-item item-1 nhapNhap">
                                    <img src="{{ asset('Front/images/item/house-mountain-2.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /.Section happy farm -->

         <section class="s-mission">
                <div class="tf-container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="heading-section text-center">
                                <p class="title text-anime-style-1">
                                   Our Family, Our Spices, Our Pride
                                </p>
                                <p class="text font-snowfall fs-30 ">
                                    Our Gallery
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tf-container w-1620">
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="swiper-container slider-gallery" style="margin-bottom: 0;">
                                <div class="swiper-wrapper">

                                    @foreach ($gallery as $value)
                                              <div class="swiper-slide">
                                        <div class="gallery-item img-hover wow fadeInUp" data-wow-delay="0s">
                                            <div class="image hover-item">
                                                <img class=" lazyload" src={{ asset($value->image ?? '') }}
                                                    data-src={{ asset($value->image ?? '') }} alt="">
                                            </div>
                                            
                                            <a href={{route('our_gallery')}} class="add-gallery">
                                                {{ $value->title ?? ''}}
                                            </a>
                                        </div>
                                        </div>
                                        
                                    @endforeach
                                    {{-- <div class="swiper-slide">
                                        <div class="gallery-item img-hover wow fadeInUp" data-wow-delay="0s">
                                            <div class="image hover-item">
                                                <img class=" lazyload" src={{ asset('Front/images/widget/history-1.jpg') }}
                                                    data-src={{ asset('Front/images/widget/history-1.jpg') }} alt="">
                                            </div>
                                            
                                            <a href={{route('our_gallery')}} class="add-gallery">
                                                From Farm to Factory – The Journey of Purity
                                            </a>
                                        </div>
                                    </div>

                                    <div class="swiper-slide">
                                        <div class="gallery-item img-hover wow fadeInUp" data-wow-delay="0.1s">
                                            <div class="image hover-item">
                                                <img class=" lazyload" src={{ asset('Front/images/widget/history-2.jpg') }}
                                                    data-src={{ asset('Front/images/widget/history-2.jpg') }} alt="">
                                            </div>
                                            <a href={{route('our_gallery')}} class="add-gallery">
                                                Handpicked Cumin Seeds for the Finest Flavo
                                            </a>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="gallery-item img-hover wow fadeInUp" data-wow-delay="0.2s">
                                            <div class="image hover-item">
                                                <img class=" lazyload" src={{ asset('Front/images/widget/history-3.jpg') }}
                                                    data-src={{ asset('Front/images/widget/history-3.jpg') }} alt="">
                                            </div>
                                            <a href={{route('our_gallery')}} class="add-gallery">
                                                Naturally Sun-Dried Kasuri Methi
                                            </a>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="gallery-item img-hover wow fadeInUp" data-wow-delay="0.3s">
                                            <div class="image hover-item">
                                                <img class=" lazyload" src={{ asset('Front/images/widget/history-4.jpg') }}
                                                    data-src={{ asset('Front/images/widget/history-4.jpg') }} alt="">
                                            </div>
                                            <a href={{route('our_gallery')}} class="add-gallery">
                                                Sealed Freshness, Trusted Quality
                                            </a>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="s-img-item item-1">
                    <div class="wg-exprerience text-center z-5 tf-rotate-back-and-forth">
                        <p class="year">65</p>
                        <p class="text">
                            Years Of <br> Experience
                        </p>
                    </div>
                </div>
            </section><!-- /.Section mission -->

        <!-- Section blog post -->
        <section class="s-blog-post pt-121 pb-44">
            <div class="tf-container w-1290">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="heading-section has-text text-center mb-81">
                            <p class="sub-title">Latest News & Articles</p>
                            <p class="title text-anime-style-2">Shreenath Speaks: Flavour, Family & Future</p>
                            
                            <div class="img-item">
                                <img src="{{ asset('Front/images/item/rice-plant-2.png') }}" class="tf-animate-1" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="s-slide">
                <div class="tf-container w-1290">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="swiper-container slider-blog-post">
                                <div class="swiper-wrapper">
                                    @foreach ($blogs as $value)
                                              <div class="swiper-slide">
                                        <article class="article-blog-item type-3 style-2 img-hover wow fadeInUp"
                                            data-wow-delay="0s">
                                            <div class="image">
                                                <div class="video-wrap hover-item">
                                                       @php
                                                            $images = json_decode($value->image, true); // decode as array
                                                            $firstImage = !empty($images) ? $images[0] : null;
                                                        @endphp
                                                    @if ($firstImage)
                                        <img class="lazyload" data-src="{{ asset($firstImage) }}" src="{{ asset($firstImage) }}" alt="">
                                    @endif
                                                    <a href="https://www.youtube.com/watch?v=MLpWrANjFbI"
                                                        class="style-icon-play popup-youtube">
                                                        <i class="fa-solid fa-play"></i>
                                                    </a>
                                                </div>
                                                @php
                                    $date = \Carbon\Carbon::parse($value->created_at);
                                @endphp
                                <div class="entry-date">
                                    <p class="day">{{ $date->format('d') }}</p>
                                    <p class="month-year">
                                        {{ $date->format('M y') }}
                                    </p>
                                </div>
                                            </div>
                                            <div class="content">
                                                {{-- <ul class="entry-meta">
                                                    <li class="entry author">
                                                        <i class="fa-solid fa-circle-user"></i>
                                                        <p>
                                                            <a class="" href="#">
                                                                By
                                                                Hardson
                                                            </a>
                                                        </p>
                                                    </li>
                                                    <li class="entry tags">
                                                        <i class="fa-solid fa-tag"></i>
                                                        <p>
                                                            <a href="#">Agriculture</a>,
                                                            <a href="#">Farm</a>
                                                        </p>
                                                    </li>
                                                    <li class="entry comment">
                                                        <i class="fa-solid fa-comment"></i>
                                                        <p>
                                                            <a href="#">0
                                                                Comments</a>
                                                        </p>
                                                    </li>
                                                </ul> --}}
                                                <h3 class="title fw-6">
                                                    <a href="#">
                                                        {{ $value->title ?? ''}}
                                                    </a>
                                                </h3>
                                                <p class="text">
                                                      {!! $value->description !!}
                                                </p>
                                                <div class="bot">
                                                    <a href="#" class="tf-btn-read hover-text-4">Continue
                                                        Reading</a>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                    @endforeach
                              
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="btn-s-blog-post btn-next">
                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="58px" height="15px" viewBox="0 0 80 20"
                        preserveAspectRatio="xMidYMid meet">
                        <g fill="#0d401c">
                            <path
                                d="M63 19 c0 -0.5 2.6 -2.4 5.8 -4.2 l5.7 -3.3 -19.5 -0.8 c-11 -0.5 -27.1 -0.5 -37 0.1 -9.6 0.5 -17.7 0.7 -17.9 0.5 -2.4 -1.9 22 -3.5 48.7 -3.1 l25.2 0.3 -4.6 -3.9 c-2.5 -2.1 -4.3 -4 -4 -4.3 0.7 -0.7 14.6 8.9 14.6 10.2 0 1.1 -14.3 9.5 -16.2 9.5 -0.4 0 -0.8 -0.4 -0.8 -1z" />
                        </g>
                    </svg>
                </div>
                <div class="btn-s-blog-post btn-prev">
                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="58px" height="15px" viewBox="0 0 80 20"
                        preserveAspectRatio="xMidYMid meet">
                        <g fill="#0d401c">
                            <path
                                d="M7 15.4 c-3.6 -2.4 -6.6 -5 -6.8 -5.7 -0.2 -1.2 13.8 -9.7 16 -9.7 2.4 0 0.2 2.4 -4.9 5.2 l-5.8 3.3 19.5 0.8 c11 0.5 27.1 0.5 37 -0.1 9.6 -0.5 17.7 -0.7 17.9 -0.5 2.4 1.9 -22 3.5 -48.6 3.1 l-25.2 -0.3 4.7 4.2 c6.1 5.5 4.4 5.3 -3.8 -0.3z" />
                        </g>
                    </svg>
                </div>
            </div>
        </section><!-- /.Section blog post -->
        <!-- Section meet farmer -->
        <section class="s-meet-farmer has-img-item tf-pt-0">
            <div class="content-section">
                <div class="tf-container w-1290">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="heading-section style-4 has-text style-3">
                                <h6 class="img-item">
                                    <div class="item mr-23">
                                        <img src="{{ asset('images/item/rice-plant-2.png') }}" class="tf-animate-1" alt="">
                                    </div>
                                    <p class="sub-title">
                                        Meet The Team
                                    </p>
                                </h6>
                                <p class="title text-anime-we-2">
                                    The faces behind the flavors, working with passion to bring Shreenath to every home.
                                </p>
                                <p class="text">
                                    The people dedicated to their work and to nature. Their efforts make purity possible.
                                </p>
                                <a href="#" class="tf-btn-read text-white hover-text-secondary">
                                    View All The Team Members
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="s-img-item item-1">
                <img src="{{ asset('Front/images/item/page-title-top.png') }}" alt="" />
            </div>
            <div class="s-img-item item-2">
                <img src="{{ asset('Front/images/item/item-bottom.png') }}" alt="" />
            </div>
        </section><!-- /.Section meet farmer -->
        <!-- Section contact us -->
        <section class="s-contact-us style-2 pt-147 pb-80">
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
                                            <div class="text">
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
                                    <p class="title tf-animate-1">Contact Us Today</p>
                                    <p class="text">
                                        We will reply to you within 24 hours via email, thank you for contacting
                                    </p>
                                    <div class="img-item">
                                        <img src="{{ asset('images/item/rice-plant-2.png') }}" class="tf-animate-1" alt="" />
                                    </div>
                                </div>
                                <form id="contactform" method="post" action="https://themesflat.co/html/donalfarm/contact/contact-process.php"
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
                                            <select name="text" class="lt-sp-07" id="Support">
                                                <option value="You need support?" selected>="">You need support?
                                                </option>
                                                <option value="General Inquiry">General Inquiry</option>
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
                                            <textarea name="message" id="message" placeholder="Message..."></textarea>
                                        </fieldset>
                                    </div>
                                    <div class="checkbox-item send-wrap">
                                        <label class="mb-0">
                                            <span class="text font-nunito">Agree to our terms and
                                                conditions</span>
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
        
       
@endsection