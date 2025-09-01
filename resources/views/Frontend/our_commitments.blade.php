@extends('Frontend.common.app')
@section('title','Our Commitments')
@section('content')

<div class="page-title page-our-commitments">
    <div class="rellax" data-rellax-speed="5">
        <img class="" src="{{ asset('Front/images/page-title/our-commitments.jpg') }}" alt="">
    </div>
    <div class="content-wrap">
        <div class="tf-container w-1290">
            <div class="row">
                <div class="col-lg-12">
                    <div class="content">
                        <p class="sub-title">
                            Why Can You Trust Us?
                        </p>
                        <h1 class="title">
                            Our Commitment
                        </h1>
                        <div class="icon-img">
                            <img src="{{ asset('Front/images/item/line-throw-title.png') }}" alt="">
                        </div>
                        <div class="breadcrumb">
                            <a href="index.html">Home</a>
                            <div class="icon">
                                <i class="icon-arrow-right1"></i>
                            </div>
                            <a href="about-us.html">About Us </a>
                            <div class="icon">
                                <i class="icon-arrow-right1"></i>
                            </div>
                            <a href="javascript:void(0)">Our Commitment </a>
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
<div class="main-content page-our-commitments pb-0 mb--20px">
    <!-- Section quality of life -->
    <section class="s-quality-of-life">
        <div class="tf-container w-1290">
            <div class="row">
                <div class="col-lg-12">
                    <div class="content-section text-center">
                        <div class="img-item item-3 tf-animate__box">
                            <img class="up-down-move" src="{{ asset('Front/images/item/notice-2.png') }}" alt="">
                        </div>
                        <div class="heading font-snowfall text-center">
                            <p class=" text-anime-style-2">
                                Purity Beyond Taste – Processed with Care, Delivered with Trust
                            </p>
                            <div class=" img-item item-4">
                                <img class="tf-animate-1" src="{{ asset('Front/images/item/rice-plant-2.png') }}" alt="">
                            </div>
                        </div>
                        <p class="sub font-snowfall fs-23">
                            At Shreenath Spices, every cumin seed, every leaf of kasuri methi, and every blend passes
                            through world-class processing, strict hygiene, and rigorous quality checks—so that only the
                            purest reaches your kitchen.
                        </p>
                        <div class="swiper-container slider-box-icon">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <ul class="box-icon-list style-2">
                                        <li class="wow fadeInUp" data-wow-delay="0s">
                                            <div class="box-icon style-3 ic-hover">
                                                <div class="icon style-circle hover-icon">
                                                    <i class="icon-chemical"></i>
                                                </div>
                                                <a href="#" class="caption fw-5 font-worksans hover-text-4">
                                                    Hygienic Processing
                                                </a>
                                                <p class="text">
                                                    Advanced cleaning & dust-free facilities
                                                </p>
                                            </div>
                                        </li>
                                        <li class="wow fadeInUp" data-wow-delay="0.1s">
                                            <div class="box-icon style-3 ic-hover">
                                                <div class="icon style-circle hover-icon">
                                                    <i class="icon-worm"></i>
                                                </div>
                                                <a href="#" class="caption fw-5 font-worksans hover-text-4">
                                                    Natural Goodness
                                                </a>
                                                <p class="text">
                                                    Minimal chemicals, maximum natural purity
                                                </p>
                                            </div>
                                        </li>
                                        <li class="wow fadeInUp" data-wow-delay="0.2s">
                                            <div class="box-icon style-3 ic-hover">
                                                <div class="icon style-circle hover-icon">
                                                    <i class="icon-disposal"></i>
                                                </div>
                                                <a href="#" class="caption fw-5 font-worksans hover-text-4">
                                                    Quality Checked
                                                </a>
                                                <p class="text">
                                                    Multiple lab tests at every stage
                                                </p>
                                            </div>
                                        </li>
                                        <li class="wow fadeInUp" data-wow-delay="0.3s">
                                            <div class="box-icon style-3 ic-hover">
                                                <div class="icon style-circle hover-icon">
                                                    <i class="icon-light-bulb"></i>
                                                </div>
                                                <a href="#" class="caption fw-5 font-worksans hover-text-4">
                                                    Freshness Locked
                                                </a>
                                                <p class="text">
                                                    Modern packaging that seals aroma & taste
                                                </p>
                                            </div>
                                        </li>
                                        <li class="wow fadeInUp" data-wow-delay="0.4s">
                                            <div class="box-icon style-3 ic-hover">
                                                <div class="icon style-circle hover-icon">
                                                    <i class="icon-water-drops"></i>
                                                </div>
                                                <a href="#" class="caption fw-5 font-worksans hover-text-4">
                                                    Food-Safe Standards
                                                </a>
                                                <p class="text">
                                                    Certified processes ensuring consumer safety
                                                </p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="video-wrap style-2">
                        <img src="{{ asset('Front/images/widget/video-wrap-2.jpg') }}" 
                            data-src="{{ asset('Front/images/widget/video-wrap-2.jpg') }}" alt="" class=" lazyload">
                        <a href="https://www.youtube.com/watch?v=MLpWrANjFbI" class="style-icon-play popup-youtube">
                            <i class="fa-solid fa-play"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="s-img-item item-1">
            <img src="{{ asset('Front/images/section/Our-commitment.jpg') }}" 
                data-src="{{ asset('Front/images/section/Our-commitment.jpg') }}" alt="" class="lazyload">
        </div>
        <div class="s-img-item item-2">
            <img src="{{ asset('Front/images/item/page-title-top.png') }}" alt="">
        </div>
    </section><!-- /.Section quality of life -->

    <!-- Section other commitment -->
    <section class="s-other-commitment">
        <div class="tf-container">
            <div class="row wrap-reverse">
                <div class="col-lg-6">
                    <div class="content">
                        <div class="img-item item-5 relative">
                            <img class="tf-animate-1" src="{{ asset('Front/images/item/rice-plant-2.png') }}" alt="">
                        </div>
                        <h2 class="title fw-7 fs-45 font-worksans text-anime-style-1">
                            Other Commitments
                        </h2>
                        <div class="other-list">
                            <ul>
                                <li>
                                    <div class="icon"><i class="fa-solid fa-circle-check"></i></div>
                                    <p>Raw Material Selection: Only the finest cumin, kasuri methi, and whole spices sourced
                                        directly from trusted farmers and mandis.</p>
                                </li>
                                <li>
                                    <div class="icon"><i class="fa-solid fa-circle-check"></i></div>
                                    <p>Advanced Processing: Automated cleaning, grading & sorting to remove impurities.
                                    </p>
                                </li>
                                <li>
                                    <div class="icon"><i class="fa-solid fa-circle-check"></i></div>
                                    <p>Hygiene First: Dust-free environment, stainless steel equipment & routine sanitization.
                                    </p>
                                </li>
                                <li>
                                    <div class="icon"><i class="fa-solid fa-circle-check"></i></div>
                                    <p>Quality Control: Lab-tested for purity, flavor, and food safety at multiple checkpoints.
                                    </p>
                                </li>
                                <li>
                                    <div class="icon"><i class="fa-solid fa-circle-check"></i></div>
                                    <p>Modern Packaging: Airtight, food-grade packs that retain freshness until delivery.</p>
                                </li>
                                <li>
                                    <div class="icon"><i class="fa-solid fa-circle-check"></i></div>
                                    <p>Sustainability: Energy-efficient processes & eco-friendly practices to protect nature.</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="image-wrap">
                        <div class="image">
                            <img src="{{ asset('Front/images/section/s-orther.jpg') }}" 
                                data-src="{{ asset('Front/images/section/s-orther.jpg') }}" alt="" class="lazyload">
                        </div>
                        <div class="img-item item-1">
                            <img class="tf-animate__rotate-right" src="{{ asset('Front/images/item/leaf-5.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="s-img-item item-1 wow fadeInRight" data-wow-delay="0s">
            <img src="{{ asset('Front/images/item/rice-plant-color.png') }}" alt="">
        </div>
        <div class="s-img-item item-2 wow fadeInLeft" data-wow-delay="0s">
            <img src="{{ asset('Front/images/item/corn-color.png') }}" alt="">
        </div>
    </section><!-- /.Section other commitment -->

    <!-- Section benefit -->
    <section class="s-benefit style-2">
        <div class="tf-container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="benefit-list">
                        <div class="swiper-container slider-box-list">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="box-icon ic-hover">
                                        <div class="icon hover-icon style-circle">
                                            <img src="{{ asset('Front/icons/tomato.png') }}" alt="">
                                        </div>
                                        <a href="our-commitments.html" class="caption fw-6 font-worksans hover-text-secondary">
                                            Modern Processing
                                        </a>
                                        <p class="text font-nunito">
                                            Cleaned & packed with advanced technology.
                                        </p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="box-icon ic-hover">
                                        <div class="icon style-circle hover-icon img-hover-2">
                                            <i class="fa-solid fa-tractor"></i>
                                        </div>
                                        <a href="our-commitments.html" class="caption fw-6 font-worksans hover-text-secondary">
                                            Absolute Quality
                                        </a>
                                        <p class="text font-nunito">
                                            Perfection in every grain, excellence in every pack.
                                        </p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="box-icon ic-hover">
                                        <div class="icon hover-icon style-circle">
                                            <i class="fa-solid fa-leaf"></i>
                                        </div>
                                        <a href="our-commitments.html" class="caption fw-6 font-worksans hover-text-secondary">
                                            Environmentally Friendly
                                        </a>
                                        <p class="text font-nunito">
                                            Sustainability today, a greener tomorrow.
                                        </p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="box-icon ic-hover">
                                        <div class="icon hover-icon style-circle">
                                            <img src="{{ asset('Front/icons/dollar-circle.png') }}" alt="">
                                        </div>
                                        <a href="our-commitments.html" class="caption fw-6 font-worksans hover-text-secondary">
                                            Reasonable Price
                                        </a>
                                        <p class="text font-nunito">
                                            Trusted by businesses across India.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="btn-slide-box-list btn-prev">
            <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="58px" height="15px" viewBox="0 0 68 18"
                preserveAspectRatio="xMidYMid meet">
                <g fill="#ffffff">
                    <path
                        d="M6.3 14.3 c-3.5 -2.1 -6.3 -4.2 -6.3 -4.9 0 -0.6 2.7 -3 6 -5.3 6.4 -4.5 8.3 -4.1 2.6 0.6 l-3.5 2.8 24.7 0 c23.6 0 38.2 0.9 38.2 2.3 0 0.4 -7.3 0.3 -16.3 -0.1 -9 -0.5 -23.3 -0.5 -31.8 0 l-15.4 0.8 5.3 2.9 c5 2.8 6.6 4.6 4 4.6 -0.7 0 -4.1 -1.7 -7.5 -3.7z" />
                </g>
            </svg>
        </div>
        <div class="btn-slide-box-list btn-next">
            <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="58px" height="15px" viewBox="0 0 80 20"
                preserveAspectRatio="xMidYMid meet">
                <g fill="#ffffff">
                    <path
                        d="M63 19 c0 -0.5 2.6 -2.4 5.8 -4.2 l5.7 -3.3 -19.5 -0.8 c-11 -0.5 -27.1 -0.5 -37 0.1 -9.6 0.5 -17.7 0.7 -17.9 0.5 -2.4 -1.9 22 -3.5 48.7 -3.1 l25.2 0.3 -4.6 -3.9 c-2.5 -2.1 -4.3 -4 -4 -4.3 0.7 -0.7 14.6 8.9 14.6 10.2 0 1.1 -14.3 9.5 -16.2 9.5 -0.4 0 -0.8 -0.4 -0.8 -1z" />
                </g>
            </svg>
        </div>
    </section><!-- /.Section benefit -->

    <!-- Section award -->
    <section class="s-award">
        <div class="tf-container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="top heading-section mb-0 style-2">
                        <div class="img-item">
                            <div class="item mr-25">
                                <img class="tf-animate-1" src="{{ asset('Front/images/item/rice-plant-2.png') }}" alt="" />
                            </div>
                            <p class="sub-title">
                                Work Achievements
                            </p>
                        </div>
                        <p class="title text-anime-style-1">
                            Our Certifications & Recognitions
                        </p>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="headding-text">
                        <p>
                            Our dedication to purity and hygiene has made us a trusted name in the spice industry. With
                            strong dealer networks, loyal customers, and national recognition, Shreenath continues to set
                            benchmarks in quality and trust.
                        </p>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="block-quote style-4">
                        <div class="quote">
                            <div class="icon style-circle">
                                <i class="icon-quote"></i>
                            </div>
                            <p class="font-snowfall cite fs-30">
                                “We don’t just pack spices, we pack trust. Our commitment is to deliver purity, safety, and
                                authenticity in every grain.”
                            </p>
                            <p class="author">— Shreenath Spices Team</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class=" wg-award-winner">
                        <p class="title font-worksans fw-7">
                            Certificates
                        </p>
                        <p class="text-wrap">
                            FSSAI | GMP | ISO | APEDA | HALAL
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="wrap">
                        <div class="img-item-award">
                            <img src="{{ asset('Front/images/item/award.png') }}" 
                                data-src="{{ asset('Front/images/item/award.png') }}" alt="" class="lazyload tf-animation-pulse">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="wrap">
                        <div class="image-award wow fadeInUp" data-wow-delay="0s">
                            <div class="tf-overlay">
                            </div>
                            <img src="{{ asset('Front/images/widget/award-1.jpg') }}" 
                                data-src="{{ asset('Front/images/widget/award-1.jpg') }}" alt="" class="lazyload">
                            <a href="gallery.html">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="wrap">
                        <div class="image-award wow fadeInUp" data-wow-delay="0.1s">
                            <div class="tf-overlay"></div>
                            <img src="{{ asset('Front/images/widget/award-2.jpg') }}" 
                                data-src="{{ asset('Front/images/widget/award-2.jpg') }}" alt="" class="lazyload">
                            <a href="gallery.html">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="image-award wow fadeInUp" data-wow-delay="0.2s">
                        <div class="tf-overlay"></div>
                        <img src="{{ asset('Front/images/widget/award-3.jpg') }}" 
                            data-src="{{ asset('Front/images/widget/award-3.jpg') }}" alt="" class="lazyload">
                        <a href="gallery.html">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /.Section award -->

    <!-- Section contact us -->
    <section class="s-contact-us style-2 has-img-item pt-138 pb-78 tf-pt-0">
        <div class="section-wrap">
            <div class="tf-container w-1290">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="content-left">
                            <div class="box-map style-2">
                                <div id="map" class="map"></div>
                            </div>
                            <ul class="contact-list">
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
                                <p class="title tf-animate-1">Dropdown Options:</p>
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
                                    <button type="submit" class="tf-btn ">
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
        <div class="s-img-item item-1">
            <img src="{{ asset('Front/images/item/page-title-top.png') }}" alt="">
        </div>
    </section><!-- /.Section contact us -->
</div><!-- /.Main-content -->

@endsection