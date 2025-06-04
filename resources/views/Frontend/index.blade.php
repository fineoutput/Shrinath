@extends('Frontend.common.app')
@section('title','home')
@section('content')

<style>
    .raat{
        display: none
    }
</style>
       <div class="page-title-home-2">
            <div class="swiper-container slider-home-2">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="slide-home-2">
                            <div class="image overflow-hidden">
                                <img src="{{ asset('Front/images/page-title/home-2-1.jpg') }}" data-src="{{ asset('Front/images/page-title/home-2-1.jpg') }}"
                                    alt="" class="lazyload tf-animate-zoom-in-out">
                            </div>
                            <div class="content">
                                <h1 class="title  font-farmhouse tf-fade-top fade-item-2">
                                    Every Crop Counts, <br>
                                    Every Farmer Matters
                                </h1>
                                <div class="img-item">
                                    <img class="tf-trainsition-draw-left access-trainsition"
                                        src="{{ asset('Front/images/item/line-throw-title.png') }}" alt="">
                                </div>
                                <p class="text font-nunito tf-fade-left fade-item-4">
                                    The paramount doctrine of the economic and technological euphoria of recent <br>
                                    decades has been that everything depends on innovation.
                                </p>
                                <a href="our-services.html" class="tf-btn btn-view bg-white tf-fade-bottom fade-item-5">
                                    <span class="text-style cl-primary">
                                        See Our Services
                                    </span>

                                    <div class="icon">
                                        <i class="icon-arrow_right"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="slide-home-2">
                            <div class="image overflow-hidden">
                                <img src="{{ asset('Front/images/page-title/home-2-2.jpg') }}" data-src="{{ asset('Front/images/page-title/home-2-2.jpg') }}"
                                    alt="" class="lazyload tf-animate-zoom-in-out">
                            </div>
                            <div class="content">
                                <h1 class="title  font-farmhouse tf-fade-top fade-item-2">
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
                                <a href="our-services.html" class="tf-btn btn-view bg-white tf-fade-bottom fade-item-5">
                                    <span class="text-style cl-primary">
                                        See Our Services
                                    </span>

                                    <div class="icon">
                                        <i class="icon-arrow_right"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
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
                        <img src="{{ asset('Front/icons/tomato.png') }}" alt="">
                    </div>
                    <a href="our-commitments.html" class="caption mb-17 fw-6  font-worksans hover-text-secondary">
                        100% Organic Products
                    </a>
                    <p class="text font-nunito">
                        Ultrices sagittis orci a scelerisque <br> purus semper eget duis at. <br>
                        Sollictudin nibh sit amet.
                    </p>
                </div>
                <div class="box-icon  ic-hover">
                    <div class="icon mb-30 style-circle hover-icon img-hover-2">
                        <i class="icon-tractor22"></i>
                    </div>
                    <a href="our-commitments.html" class="caption mb-17 fw-6  font-worksans hover-text-secondary">
                        Absolute Quality
                    </a>
                    <p class="text font-nunito">
                        Ultrices sagittis orci a scelerisque <br> purus semper eget duis at. <br>
                        Sollictudin nibh sit amet.
                    </p>
                </div>
                <div class="box-icon ic-hover">
                    <div class="icon mb-30 hover-icon style-circle">
                        <i class="fa-solid fa-leaf"></i>
                    </div>
                    <a href="our-commitments.html" class="caption mb-17 fw-6  font-worksans hover-text-secondary">
                        Environmentally Friendly
                    </a>
                    <p class="text font-nunito">
                        Ultrices sagittis orci a scelerisque <br> purus semper eget duis at. <br>
                        Sollictudin nibh sit amet.
                    </p>
                </div>
                <div class="box-icon ic-hover">
                    <div class="icon mb-30 hover-icon style-circle">
                        <img src="{{ asset('Front/icons/dollar-circle.png') }}" alt="">
                    </div>
                    <a href="our-commitments.html" class="caption mb-17 fw-6  font-worksans hover-text-secondary">
                        Reasonable Price
                    </a>
                    <p class="text font-nunito">
                        Ultrices sagittis orci a scelerisque <br> purus semper eget duis at. <br>
                        Sollictudin nibh sit amet.
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
                                            Welcome to Shrinath Agriculture & Organic Farms
                                        </p>
                                        <p class="title text-anime-style-2">
                                            What You Plant Now, <br>
                                            You Will Harvest Later
                                        </p>
                                    </div>

                                    <p class="text-1 font-snowfall mb-20">
                                        Elders is headquartered in Adelaide, South Australia, where our story began in
                                        <br>
                                        1839,
                                        but our expansive network now reaches every corner of Australia.
                                    </p>
                                    <p class="text-2 mb-42">
                                        At Mycorrhizal Applications (MA), we are dedicated to sustainability by <br>
                                        providing
                                        the agriculture, horticulture, landscaping, and forestry industries <br> with
                                        efficient
                                        and effective microbial-based biorational solutions. As the <br> world’s leading
                                        manufacturer and supplier of mycorrhizal soil inoculants, <br> MA researches,
                                        produces,
                                        and markets mycorrhizal fungi which accelerate <br> plant performance.
                                    </p>
                                </div>
                                <div class="bot flex justify-center">
                                    <a href="about-us.html" class="tf-btn ">
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
                                    <div id="odometer" class="odometer fs-65 style-4">1000</div>
                                </div>
                                <p class="title font-worksans fw-5">
                                    Completed Projects
                                </p>
                                <div class="icon-img">
                                    <img src="{{ asset('Front/images/item/line-throw-title.png') }}" alt="">
                                </div>
                            </div>
                            <div class="counter-item">
                                <div class="counter">
                                    <div class="odometer fs-65 style-4-2">1000</div>
                                </div>
                                <p class="title font-worksans fw-5">
                                    Animals And Plants
                                </p>
                                <div class="icon-img">
                                    <img src="{{ asset('Front/images/item/line-throw-title.png') }}" alt="">
                                </div>
                            </div>
                            <div class="counter-item">
                                <div class="counter">
                                    <div class="odometer fs-65 style-4-3">1000</div>
                                </div>
                                <p class="title font-worksans fw-5">
                                    Tons of Harvest
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
                <img class="scale-1-1" src="{{ asset('Front/images/section/yellow-f.png') }}" alt="">
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
                            Agricultural Services
                        </p>
                    </div>

                    <p class="title tf-animate-1">
                        Providing The Finest
                        Products To The Best
                        Feed Suppliers.
                    </p>
                </div>
                <p class="text">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ex
                    igula, pulvinar ultrices justo sed, bibendum lobortis nibh. Pellentesque
                    mattis eros sit amet lorem tristique faucibus.
                </p>
                <a href="our-services.html" class="tf-btn ">
                    <span class="text-style ">
                        See Our Services
                    </span>
                    <div class="icon">
                        <i class="icon-arrow_right"></i>
                    </div>
                </a>
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
                    <div class="btn-s-service-2 btn-next">
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
                        <div class="swiper-slide">
                            <div class="box-infor style-2 ic-hover img-hover">
                                <div class="image hover-icon hover-item">
                                    <img src="{{ asset('Front/images/widget/provide-item-1-1.jpg') }}"
                                        data-src="{{ asset('Front/images/widget/provide-item-1-1.jpg') }}" alt="" class=" lazyload">
                                    <div class="icon style-circle">
                                        <i class="icon-salad"></i>
                                    </div>
                                </div>
                                <div class="content">
                                    <a href="service-detail.html"
                                        class="title fs-23 fw-6 font-worksans hover-text-secondary">
                                        Clean Vegetables
                                    </a>
                                    <p class="text font-nunito">
                                        Ultrices sagittis orci a scelerisque purus semper eget duis at. Sollicitudin
                                        nibh sit amet
                                        commodo nulla.
                                    </p>
                                    <a href="our-services.html" class="tf-btn-read text-white hover-text-secondary">Read
                                        More</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="box-infor style-2 ic-hover img-hover">
                                <div class="image hover-icon hover-item">
                                    <img src="{{ asset('Front/images/widget/provide-item-2-2.jpg') }}"
                                        data-src="{{ asset('Front/images/widget/provide-item-2-2.jpg') }}" alt="" class=" lazyload">
                                    <div class="icon style-circle">
                                        <i class="icon-cow"></i>
                                    </div>
                                </div>
                                <div class="content">
                                    <a href="service-detail.html"
                                        class="title fs-23 fw-6 font-worksans hover-text-secondary">
                                        Pure Cow's Milk
                                    </a>
                                    <p class="text font-nunito">
                                        Ultrices sagittis orci a scelerisque purus semper eget duis at. Sollicitudin
                                        nibh sit amet
                                        commodo nulla.
                                    </p>
                                    <a href="our-services.html" class="tf-btn-read text-white hover-text-secondary">Read
                                        More</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="box-infor style-2 ic-hover img-hover">
                                <div class="image hover-icon hover-item">
                                    <img src="{{ asset('Front/images/widget/provide-item-3-3.jpg') }}"
                                        data-src="{{ asset('Front/images/widget/provide-item-3-3.jpg') }}" alt="" class=" lazyload">
                                    <div class="icon style-circle">
                                        <i class="icon-chicken-2"></i>
                                    </div>
                                </div>
                                <div class="content">
                                    <a href="service-detail.html"
                                        class="title fs-23 fw-6 font-worksans hover-text-secondary">
                                        Clean Chicken And Egg
                                    </a>
                                    <p class="text font-nunito">
                                        Ultrices sagittis orci a scelerisque purus semper eget duis at. Sollicitudin
                                        nibh sit amet
                                        commodo nulla.
                                    </p>
                                    <a href="our-services.html" class="tf-btn-read text-white hover-text-secondary">Read
                                        More</a>
                                </div>
                            </div>
                        </div>
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
                                We believe that to have good health, clean and healthy food sources are the key
                            </p>
                            <div class="swiper-container slider-box-icon">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <ul class="box-icon-list style-2">
                                            <li>
                                                <div class="box-icon style-3 ic-hover wow fadeInUp" data-wow-delay="0s">
                                                    <div class="icon style-circle hover-icon">
                                                        <i class="icon-chemical"></i>
                                                    </div>
                                                    <a href="our-commitments.html"
                                                        class="caption fw-5 font-worksans hover-text-4">
                                                        Minimal <br> Chemicals Used
                                                    </a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-icon style-3 ic-hover wow fadeInUp"
                                                    data-wow-delay="0.1s">
                                                    <div class="icon style-circle hover-icon">
                                                        <i class="icon-worm"></i>
                                                    </div>
                                                    <a href="our-commitments.html"
                                                        class="caption fw-5 font-worksans hover-text-4">
                                                        Minimal <br> Chemicals Used
                                                    </a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-icon style-3 ic-hover wow fadeInUp"
                                                    data-wow-delay="0.2s">
                                                    <div class="icon style-circle hover-icon">
                                                        <i class="icon-disposal"></i>
                                                    </div>
                                                    <a href="our-commitments.html"
                                                        class="caption fw-5 font-worksans hover-text-4">
                                                        All Organic <br> Waste Reused
                                                    </a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-icon style-3 ic-hover wow fadeInUp"
                                                    data-wow-delay="0.3s">
                                                    <div class="icon style-circle hover-icon">
                                                        <i class="icon-light-bulb"></i>
                                                    </div>
                                                    <a href="our-commitments.html"
                                                        class="caption fw-5 font-worksans hover-text-4">
                                                        Do Not Use <br> Artificial
                                                        Light
                                                    </a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="box-icon style-3 ic-hover wow fadeInUp"
                                                    data-wow-delay="0.4s">
                                                    <div class="icon style-circle hover-icon">
                                                        <i class="icon-water-drops"></i>
                                                    </div>
                                                    <a href="our-commitments.html"
                                                        class="caption fw-5 font-worksans hover-text-4">
                                                        Borehole <br> Sourced Water
                                                    </a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="bot flex justify-center">

                                <a href="our-commitments.html" class="tf-btn scale-50 gap-37">
                                    <span class="text-style ">
                                        See More Our Commitment
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
                        <p class="sub-title">What We Do</p>
                        <p class="title text-anime-style-1">
                            At Shrinath,
                            We Aim To Unite Men
                            And Nature!
                        </p>
                        <p class="text">
                            After more than five years of research, we have successfully come up with internationally
                            patented 100% organic agriculture inputs that can significantly enhance the quality of crops
                            aswell as the soil in a
                            completely natural way.
                        </p>
                    </div>
                    <a href="about-us.html" class="tf-btn bg-white">
                        <span class="text-style cl-primary">
                            Read More
                        </span>
                        <div class="icon">
                            <i class="icon-arrow_right"></i>
                        </div>
                    </a>
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
                    <ul>
                        <li class="wow fadeInUp" data-wow-delay="0s">
                            <p class="title">
                                <i class="fa-solid fa-circle-check"></i>
                                We Use New Technology
                            </p>
                            <p class="text">
                                Ultrices sagittis orci a scelerisque purus semper eget duis at. Sollicitudin nibh sit
                                amet
                                commodo nulla.
                            </p>
                        </li>
                        <li class="wow fadeInUp" data-wow-delay="0.1s">
                            <p class="title">
                                <i class="fa-solid fa-circle-check"></i>
                                Making Healthy Foods
                            </p>
                            <p class="text">
                                Ultrices sagittis orci a scelerisque purus semper eget duis at. Sollicitudin nibh sit
                                amet
                                commodo nulla.
                            </p>
                        </li>
                    </ul>
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

                                <div class="wg-exprerience  text-center tf-rotate-back-and-forth">
                                    <p class="year">65</p>
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
                                        We Believe In Bringing
                                        Customers The Best Product
                                    </p>
                                </div>
                                <p class="text">
                                    Mauris quam tellus, pellentesque ut faucibus pretium, aliquet vitae est. Nullam non
                                    lorem
                                    metus. Nulla pretium dui a diam faucibus. vehicula efficitur enim maximus. Proin
                                    sollicitudin erat eu auctor egestas.
                                </p>
                                <div class="wg-progress mb-29">
                                    <div class="top">
                                        <span>Organic Solutions</span>
                                        <span>76%</span>
                                    </div>
                                    <div class="progress tf-animate-1" role="progressbar" aria-label="Basic example"
                                        aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar" style="width: 76%"></div>
                                    </div>
                                </div>
                                <div class="wg-progress">
                                    <div class="top">
                                        <span>Quality Agriculture</span>
                                        <span>95%</span>
                                    </div>
                                    <div class="progress tf-animate-1" role="progressbar" aria-label="Basic example"
                                        aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar" style="width: 95%"></div>
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
                                    <a href="service-detail.html" class="title fw-6 font-worksans hover-text-4">
                                        Farmers
                                    </a>
                                    <p class="sub font-snowfall">
                                        The focal point of everything we do
                                    </p>
                                    <p class="text">
                                        At Union Organics, we aim to empower farmers
                                        by equipping them with affordable and 100%
                                        organic agriculture.
                                    </p>
                                    <a href="our-services.html" class="tf-btn-read hover-text-4">Read More</a>
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
                                    <a href="service-detail.html" class="title fw-6 font-worksans hover-text-4">
                                        Consumers
                                    </a>
                                    <p class="sub font-snowfall">
                                        Everyone deserves chemical-free food
                                    </p>
                                    <p class="text">
                                        At Union Organics, we aim to empower farmers
                                        by equipping them with affordable and 100%
                                        organic agriculture.
                                    </p>
                                    <a href="our-services.html" class="tf-btn-read hover-text-4">Read More</a>
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
                                    <a href="service-detail.html" class="title fw-6 font-worksans hover-text-4">
                                        Environment
                                    </a>
                                    <p class="sub font-snowfall">
                                        Protecting the planet is a top priority
                                    </p>
                                    <p class="text">
                                        At Union Organics, we aim to empower farmers
                                        by equipping them with affordable and 100%
                                        organic agriculture.
                                    </p>
                                    <a href="our-services.html" class="tf-btn-read hover-text-4">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section><!-- /.Section our agriculture -->

        <!-- Section project -->
        <section class="s-project">
            <div class="heading-side has-img-item">
                <div class="tf-container w-1290">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="heading-section style-3 has-text text-center">
                                <p class="sub-title">Closes Projects</p>
                                <p class="title tf-animate-3">
                                    Latest Projects List
                                </p>
                                <p class="text">
                                    Duis eleifend euismod arcu, nec
                                    faucibus mauris finibus id. Integer
                                    mattis, tellus non finibus rutrum.
                                </p>
                                <div class="img-item">
                                    <img src="{{ asset('Front/images/item/rice-plant-2.png') }}" class="tf-animate-1" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="s-img-item item-1">
                    <img src="{{ asset('Front/images/item/page-title-top.png') }}" alt="" />
                </div>
                <div class="s-img-item item-2 wow zoomIn" data-wow-delay="0.2s">
                    <div class="scroll-element-4">

                        <img src="{{ asset('Front/images/item/windmill.png') }}" alt="" />
                    </div>
                </div>
                <div class="s-img-item item-3">
                    <img src="{{ asset('Front/images/item/green.png') }}" alt="" />
                </div>
            </div>

            <div class="slider-side">
                <div class="tf-container w-1290">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="swiper-container slider-s-project">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="box-portfolio style-5">
                                            <div class="image">
                                                <img src="{{ asset('Front/images/section/s-project-1.jpg') }}"
                                                    data-src="{{ asset('Front/images/section/s-project-1.jpg') }}" alt=""
                                                    class="lazyload" />
                                            </div>
                                            <div class="content">
                                                <p class="sub font-farmhouse text-upper">
                                                    Agriculture - farm
                                                </p>
                                                <a href="portfolio-details.html"
                                                    class="title fs-23 font-worksans fw-6 hover-text-secondary">The
                                                    Joy
                                                    Of Sheep Farming</a>
                                                <div class="bot">
                                                    <p class="text font-nunito">
                                                        Lorem ipsum dolor sit amet,
                                                        consectetur adipiscing <br> elit. Sed
                                                        a cursus massa. Cras ut dui nec
                                                        nibh <br> vehicula fermentum. natoque
                                                        penatibus.
                                                    </p>
                                                    <a href="portfolio-style-1.html" class="btn-read icon style-circle">
                                                        <i class="icon-arrow_right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="box-portfolio style-5">
                                            <div class="image">
                                                <img src="{{ asset('Front/images/section/s-project-2.jpg') }}"
                                                    data-src="{{ asset('Front/images/section/s-project-2.jpg') }}" alt=""
                                                    class="lazyload" />
                                            </div>
                                            <div class="content">
                                                <p class="sub font-farmhouse text-upper">
                                                    Agriculture - farm
                                                </p>
                                                <a href="portfolio-details.html"
                                                    class="title fs-23 font-worksans fw-6 hover-text-secondary">The
                                                    Joy
                                                    Of Sheep Farming</a>
                                                <div class="bot">
                                                    <p class="text font-nunito">
                                                        Lorem ipsum dolor sit amet,
                                                        consectetur adipiscing <br> elit. Sed
                                                        a cursus massa. Cras ut dui nec
                                                        nibh <br> vehicula fermentum. natoque
                                                        penatibus.
                                                    </p>
                                                    <a href="portfolio-style-2.html" class="btn-read icon style-circle">
                                                        <i class="icon-arrow_right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="box-portfolio style-5">
                                            <div class="image">
                                                <img src="{{ asset('Front/images/section/s-project-3.jpg') }}"
                                                    data-src="{{ asset('Front/images/section/s-project-3.jpg') }}" alt=""
                                                    class="lazyload" />
                                            </div>
                                            <div class="content">
                                                <p class="sub font-farmhouse text-upper">
                                                    Agriculture - farm
                                                </p>
                                                <a href="portfolio-details.html"
                                                    class="title fs-23 font-worksans fw-6 hover-text-secondary">The
                                                    Joy
                                                    Of Sheep Farming</a>
                                                <p class="text font-nunito">
                                                    Lorem ipsum dolor sit amet,
                                                    consectetur adipiscing elit. Sed
                                                    a cursus massa. Cras ut dui nec
                                                    nibhvehicula fermentum. natoque
                                                    penatibus.
                                                </p>
                                                <div class="bot">
                                                    <a href="portfolio-style-3.html" class="btn-read icon style-circle">
                                                        <i class="icon-arrow_right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="bot">
                                <div class="swiper-pagination style-1 pagination-s-project"></div>
                                <a href="portfolio-style-1.html" class="tf-btn-read hover-text-4">View All Latest
                                    Projects</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="s-img-item item-4">
                <img src="{{ asset('Front/images/item/page-title-top.png') }}" alt="" />
            </div>
        </section><!-- /.Section project -->

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
                                            Shopping Today
                                        </p>
                                    </div>

                                    <p class="title  wow fadeInLeft" data-wow-delay="0s">
                                        We Provide High <br>
                                        Quality Agricultural <br>
                                        Products.
                                    </p>
                                    <p class="text">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ex
                                        igula, pulvinar ultrices justo sed, bibendum lobortis nibh. Pellentesque
                                        mattis eros sit amet lorem tristique faucibus.
                                    </p>
                                </div>
                                <a href="{{route('out_products')}}" class="tf-btn scale-40">
                                    <span class="text-style ">
                                        View All The Shop
                                    </span>

                                    <div class="icon">
                                        <i class="icon-arrow_right"></i>
                                    </div>
                                </a>
                            </div>
                            <div class="s-slider">
                                <div class="swiper-container slider-shopping-card">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="card-product mw-unset style-2 type-2 wow fadeInUp"
                                                data-wow-delay="0s">
                                                <ul class="trendy-list">
                                                    <li class="trendy-item ">
                                                        <p class="color-1">Sale!</p>
                                                    </li>
                                                </ul>
                                                <div class="image">
                                                   <img src="{{ asset('Front/images/item/first.png') }}" data-src="{{ asset('Front/images/item/first.png') }}" alt=""
                                    class="lazyload">
                                                </div>
                                                <a href="{{route('out_products')}}"
                                                    class="name-product font-worksans hover-text-4">
                                                    Kasuri Pan Methi
                                                </a>
                                                <div class="pricing-star">
                                                    <div class="price-wrap">
                                                        <span class=" price-1">₹ 200</span>
                                                        <span class=" price-2">₹ 500</span>
                                                    </div>
                                                    <div class="wg-rating">
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="card-product mw-unset style-2 type-2 wow fadeInUp"
                                                data-wow-delay="0.1s">
                                                <ul class="trendy-list">
                                                    <li class="trendy-item ">
                                                        <p class="color-1">Sale!</p>
                                                    </li>
                                                </ul>
                                                <div class="image">
                                                    <img src="{{ asset('Front/images/item/Media-(1).png') }}" data-src="{{ asset('Front/images/item/Media-(1).png') }}" alt=""
                                    class="lazyload">
                                                </div>
                                                <a href="{{route('out_products')}}"
                                                    class="name-product font-worksans hover-text-4">
                                                    Mor Pankh Spice

                                                </a>
                                                <div class="pricing-star">
                                                    <div class="price-wrap">
                                                        <span class=" price-1">₹ 200</span>
                                                        <span class=" price-2">₹ 500</span>
                                                    </div>
                                                    <div class="wg-rating">
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                    </div>
                                                </div>
                                              
                                            </div>
                                        </div>
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
        </section><!-- /.Section shopping today  -->

        <!-- Section testimonial -->
        <section class="s-testimonial-2">
            <div class="tf-container w-1290">
                <div class="row">
                    <div class="col-md-6">
                        <div class="heading-section">
                            <p class="sub-title">Testimonials From People Who Have Experienced It
                            </p>
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
                                        Trust By Clients
                                    </p>
                                    <div class="counter">
                                        <div class="odometer style-6">10000</div>
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
                                                    The Best Farm I Trust Uses Products
                                                </p>
                                                <p class="text font-worksans">
                                                    Having been a host farmer for three seasons, we’ve seen firsthand
                                                    the difference this
                                                    internship makes in beginning
                                                    farmers and host farms alike. As a farmer it is difficult to weigh
                                                    the benefits of
                                                    hosting young farmers. Fresh energy
                                                    and enthusiasm.
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
                                                                CHRISTINE ROSE
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
                                                            Director, Radical Orange Pty Ltd.
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
                                                    Rogue Farm Corps Has Helped Us Recruit And Retain Great!

                                                </p>
                                                <p class="text font-worksans">
                                                    As you know I am an organic wheat farmer here in Wyoming and we had
                                                    one of driest and coldest winters on record. I used your MycoApply
                                                    granular on my winter wheat and I am very pleased at what I am
                                                    seeing. The root systems are noticeably.
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
                                                                Sincerely
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
                                                            General Agriculture Crop Consultant.
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

        <!-- Section happy farm -->
        <section class="s-happy-farm">
            <div class="bg-section">
                <div class="scroll-element-3">
                    <img class="lazyload  scale-1-1" src="{{ asset('Front/images/item/gree-field.jpg') }}"
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
                                        <p class="sub-title fs-35 tf-animate-1">Happy Farming!</p>
                                        <div class="img-item item-2 tf-heartBeat">
                                            <img class="wow zoomIn " src="{{ asset('Front/images/item/happy.png') }}" alt="" />
                                        </div>
                                    </div>
                                    <p class="title wow fadeInUp" data-wow-delay="0s">
                                        We Passionately Care About
                                        Farmers, Consumers.

                                    </p>
                                    <p class="text wow fadeInUp" data-wow-delay="0s">
                                        If you need to buy clean agricultural products and learn about us, contact us
                                        now!
                                    </p>

                                    <a href="contact-us.html" class="tf-btn bg-white scale-40 wow fadeInUp"
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

        <!-- Section blog post -->
        <section class="s-blog-post pt-121 pb-44">
            <div class="tf-container w-1290">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="heading-section has-text text-center mb-81">
                            <p class="sub-title">From The Blog Post</p>
                            <p class="title text-anime-style-2">Latest News & Articles</p>
                            <p class="text">
                                Duis eleifend euismod arcu, nec faucibus
                                mauris finibus id. Integer mattis,
                                tellus non finibus rutrum.
                            </p>
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
                                    <div class="swiper-slide">
                                        <article class="article-blog-item type-3 style-2 img-hover wow fadeInUp"
                                            data-wow-delay="0s">
                                            <div class="image">
                                                <div class="video-wrap hover-item">
                                                    <img class="lazyload" data-src="{{ asset('Front/images/blog/blog-1.jpg') }}"
                                                        src="{{ asset('Front/images/blog/blog-1.jpg') }}" alt="" />
                                                    <a href="https://www.youtube.com/watch?v=MLpWrANjFbI"
                                                        class="style-icon-play popup-youtube">
                                                        <i class="fa-solid fa-play"></i>
                                                    </a>
                                                </div>
                                                <div class="entry-date">
                                                    <p class="day">
                                                        08
                                                    </p>
                                                    <p class="month-year">
                                                        Jun 24
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <ul class="entry-meta">
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
                                                </ul>
                                                <h3 class="title fw-6">
                                                    <a href="blog-single.html">
                                                        How to Care for
                                                        Cows to have the
                                                        Best Quality
                                                        Meat
                                                    </a>
                                                </h3>
                                                <p class="text">
                                                    Duis eleifend
                                                    euismod arcu, nec
                                                    faucibus mauris
                                                    finibus id. Integer
                                                    mattis, tellus non
                                                    finibus rutrum quam
                                                    lorem dignissim
                                                    nulla.
                                                </p>
                                                <div class="bot">
                                                    <a href="blog-single.html" class="tf-btn-read hover-text-4">Continue
                                                        Reading</a>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                    <div class="swiper-slide">
                                        <article class="article-blog-item type-3 style-2 img-hover wow fadeInUp"
                                            data-wow-delay="0.1s">
                                            <div class="image">
                                                <div class="video-wrap hover-item">
                                                    <img class="lazyload" data-src="{{ asset('Front/images/blog/blog-2.jpg') }}"
                                                        src="{{ asset('Front/images/blog/blog-2.jpg') }}" alt="" />
                                                    <a href="https://www.youtube.com/watch?v=MLpWrANjFbI"
                                                        class="style-icon-play popup-youtube">
                                                        <i class="fa-solid fa-play"></i>
                                                    </a>
                                                </div>
                                                <div class="entry-date">
                                                    <p class="day">
                                                        08
                                                    </p>
                                                    <p class="month-year">
                                                        Jun 24
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <ul class="entry-meta">
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
                                                </ul>
                                                <h3 class="title fw-6">
                                                    <a href="blog-single.html">
                                                        The Best Time to Harvest
                                                        Corn Without Wilting

                                                    </a>
                                                </h3>
                                                <p class="text">
                                                    Duis eleifend
                                                    euismod arcu, nec
                                                    faucibus mauris
                                                    finibus id. Integer
                                                    mattis, tellus non
                                                    finibus rutrum quam
                                                    lorem dignissim
                                                    nulla.
                                                </p>
                                                <div class="bot">
                                                    <a href="blog-single.html" class="tf-btn-read hover-text-4">Continue
                                                        Reading</a>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                    <div class="swiper-slide">
                                        <article class="article-blog-item type-3 style-2 img-hover wow fadeInUp"
                                            data-wow-delay="0.2s">
                                            <div class="image">
                                                <div class="video-wrap hover-item">
                                                    <img class="lazyload" data-src="{{ asset('Front/images/blog/blog-3.jpg') }}"
                                                        src="{{ asset('Front/images/blog/blog-3.jpg') }}" alt="" />
                                                    <a href="https://www.youtube.com/watch?v=MLpWrANjFbI"
                                                        class="style-icon-play popup-youtube">
                                                        <i class="fa-solid fa-play"></i>
                                                    </a>
                                                </div>
                                                <div class="entry-date">
                                                    <p class="day">
                                                        08
                                                    </p>
                                                    <p class="month-year">
                                                        Jun 24
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <ul class="entry-meta">
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
                                                </ul>
                                                <h3 class="title fw-6">
                                                    <a href="blog-single.html">
                                                        The Joy of Working Every Day
                                                        on a Sheep Farm
                                                    </a>
                                                </h3>
                                                <p class="text">
                                                    Duis eleifend
                                                    euismod arcu, nec
                                                    faucibus mauris
                                                    finibus id. Integer
                                                    mattis, tellus non
                                                    finibus rutrum quam
                                                    lorem dignissim
                                                    nulla.
                                                </p>
                                                <div class="bot">
                                                    <a href="blog-single.html" class="tf-btn-read hover-text-4">Continue
                                                        Reading</a>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
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
                <div Lubby class="row">
                    <div class="col-md-8">
                        <div class="heading-section style-4 has-text style-3">
                            <h6 class="img-item">
                                <div class="item mr-23">
                                    <img src="{{ asset('images/item/rice-plant-2.png') }}" class="tf-animate-1" alt="">
                                </div>
                                <p class="sub-title">
                                    Meet The Farmers
                                </p>
                            </div>
                            <p class="title text-anime-we-2">
                                We Are Dedicated Farmers!
                            </p>
                            <p class="text">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sodales faucibus
                                commodo.
                                Proin vehicula massa id congue quam, ex libero sodales ex, cursus euismod purus.
                            </p>
                            <a href="our-farmers.html" class="tf-btn-read text-white hover-text-secondary">
                                View All The Farmers
                            </a>
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
                                                Farm Address
                                            </p>
                                            <div class="text">
                                            <p class="text">
                                                Prinsengracht 250, 2501016 PM
                                                Amsterdam Netherlands
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
                                                Shrinaths@gmail.com <br>
                                                Call Us 24/7: +1 987 654 3210
                                            </p>
                                        </div>
                                    </li>
                                    <li class="wow fadeInUp" data-wow-duration="1.4s">
                                        <div class="icon style-circle">
                                            <i class="fa-solid fa-clock"></i>
                                            <div class="infor">
                                                <p class="title">
                                                    Working Hours
                                                </p>
                                                <p class="text">
                                                    Mon - Fri: 8.00am - 18.00pm <br>
                                                    Sat: 9.00am - 00.17pm
                                                    Holidays: Closes
                                            </p>
                                        </div>
                                    </ul>
                                </div>
                            </div>
                        <div class="col-lg-7">
                            <div class="content-section">
                                <div class="heading-section has-text mb-50">
                                    <p class="sub-title">Let's Cooperate Together</p>
                                    <p class="title tf-animate-1">Contact Us Today!</p>
                                    <p class="text">
                                        We will reply to you within 24 hours via email, thank you for contacting

                                    </p>
                                    <div class="img-item">
                                        <img src="{{ asset('images/item/rice-plant-2.png') }}" class="tf-animate-1" alt="" />
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
                                            <select name="text" class="lt-sp-07" id="Support">
                                                <option value="You need support?" selected>="">You need support?
                                                </option>
                                                <option value="You need support? 1">You need support? 1
                                                </option>
                                                <option value="You need support? 2">You need support? 2
                                                </option>
                                                <option value="You need support? 3">You need support? 3
                                                </option>
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
        <section class="s-partner style-2 has-img-item pb-53-0-75">
            <div class="tf-container w-1780">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="slider-wrap">
                            <div class="swiper-container slider-partner">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="slide-partner">
                                            <div class="image">
                                                <a href="#">

                                                    <img src="{{ asset('images/partner/wide-open.png') }}" alt="" class="lazyload">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="slide-partner">

                                            <div class="image">
                                                <a href="#">
                                                    <img src="{{ asset('images/partner/sollio.png') }}" alt="" class="lazyload">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="slide-partner">
                                            <div class="image">
                                                <a href="#">

                                                    <img src="{{ asset('images/partner/syngenta.png') }}" alt="" class="lazyload">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="slide-partner">

                                            <div class="image">
                                                <a href="#">
                                                    <img src="{{ asset('images/partner/strachan-valley.png') }}" alt="" class="lazyload">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="slide-partner">


                                            <div class="image">
                                                <a href="#">
                                                    <img src="{{ asset('images/partner/new-holland.png') }}" alt="" class="lazyload">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="slide-partner">

                                            <div class="image">
                                                <a href="#">
                                                    <img src="{{ asset('images/partner/stony-field.png') }}" alt="" class="lazyload">
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
                <img src="{{ asset('images/item/page-title-top.png') }}" alt="" />
            </div>
        </section><!-- /.Section partner -->

@endsection