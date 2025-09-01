@extends('Frontend.common.app')
@section('title', 'Our Team')
@section('content')
<style>
    .not {
        display: none;
    }
    .raat {
        display: none;
    }   
    .finnaly {
        margin-top: 10px !important;
    }
    .yutes {
        background: #fff;
        border-radius: 10px;
    }
</style>
<div class="page-title page-our-team">
    <div class="rellax" data-rellax-speed="5">
        <img src="{{ asset('Front/images/page-title/our-farmer.jpg') }}" alt="">
    </div>
    <div class="content-wrap">
        <div class="tf-container w-1290">
            <div class="row">
                <div class="col-lg-12">
                    <div class="content">
                        <p class="sub-title finnaly">
                            Dedicated And Professional People
                        </p>
                        <h1 class="title">
                            Meet the Shreenath Family
                        </h1>
                        <div class="icon-img">
                            <img src="{{ asset('Front/images/item/line-throw-title.png') }}" alt="">
                        </div>
                        <div class="breadcrumb">
                            <a href="index.html">Home</a>
                            <div class="icon">
                                <i class="icon-arrow-right1"></i>
                            </div>
                            <a href="about-us.html">About Us</a>
                            <div class="icon">
                                <i class="icon-arrow-right1"></i>
                            </div>
                            <a href="javascript:void(0)">Our Team</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="img-item item-2">
        <img src="{{ asset('Front/images/item/grass-5.png') }}" alt="">
    </div>
</div><!-- /.Page-title -->

<!-- Main-content -->
<div class="main-content page-our-team pt-0 pb-0">
    <!-- Section we are -->
    <section class="s-we-are">
        <div class="tf-container">
            <div class="row">
                <div class="col-md-6">
                    <div class="we-are-wrap img-hover pb-30">
                        <div class="image hover-item wow zoomIn ">
                            <img src="{{ asset('Front/images/widget/card-provide-3.jpg') }}"
                                data-src="{{ asset('Front/images/widget/card-provide-3.jpg') }}" alt="" class="lazyload">
                        </div>
                        <div class="content">
                            <a href="about-us.html" class="hover-text-primary title font-worksans">
                                We Are Family
                            </a>
                            <p class="text">
                                Behind every pack of Shreenath Spices is a dedicated team ensuring purity, quality, and
                                consistency. From sourcing to processing, our experts share one vision: making Shreenath
                                Spices a household name across India and beyond.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="we-are-wrap img-hover">
                        <div class="image hover-item wow zoomIn">
                            <img src="{{ asset('Front/images/widget/tea.jpg') }}" data-src="{{ asset('Front/images/widget/tea.jpg') }}" alt=""
                                class="lazyload">
                        </div>
                        <div class="content">
                            <a href="about-us.html" class="hover-text-primary title font-worksans">
                                We Value Nature
                            </a>
                            <p class="text">
                                We care for the environment by adopting responsible sourcing and eco-friendly practices,
                                ensuring purity in every spice while protecting the planet.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="s-img-item item-1">
            <img src="{{ asset('Front/images/item/yellow-bottom.png') }}" alt="">
        </div>
    </section><!-- /.Section we are -->

    <!-- Section creator of success -->
    <section class="s-testimonial style-2 type-2">
        <div class="wrap">
            <div class="image scroll-element wow fadeInLeft" data-wow-delay="0s">
                <img class="" src="{{ asset('Front/images/item/s-testi.png') }}" alt="" />
                <div class="sign scroll-element-3">
                    <img src="{{ asset('Front/images/item/sign.png') }}" alt="">
                </div>
            </div>
            <div class="content-section">
                <div class="heading-section">
                    <p class="title tf-animate-1">Creator Of Success</p>
                </div>
                <p class="quote font-snowfall fs-30 text-anime-style-1">
                    At Shreenath, our pursuit is not just about products, but about trust, purity, and excellence. We
                    believe quality food brings happiness and health. Our journey is built on dedication, innovation,
                    and deep respect for nature.
                </p>
                <div class="bot">
                    <div class="author-wrap">
                        <p class="author text-upper fw-6 font-worksans">
                            Shreenath Spices
                        </p>
                        <p class="duty">
                            Crafting Purity and Excellence
                        </p>
                    </div>
                    <a href="about-us.html" class="tf-btn-read hover-text-4">
                        Learn More About Us
                    </a>
                </div>
                <div class="icon tf-animate__box-2 animate__slow">
                    <i class="icon-quote"></i>
                </div>
            </div>
        </div>
    </section><!-- /.Section creator of success -->

    <!-- Section meet team -->
    <section class="s-meet-farm">
        <div class="tf-container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-section text-center has-text mb-81">
                        <p class="sub-title">Meet The Team</p>
                        <p class="title text-anime-style-2">
                            People Who Are Dedicated <br>
                            To Their Work And Love Nature
                        </p>
                        <p class="text">
                            The people dedicated to their work and to nature. Their efforts make purity possible.
                        </p>
                        <div class="img-item">
                            <img class="tf-animate-1" src="{{ asset('Front/images/item/rice-plant-2.png') }}" alt="" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="box-farmer img-hover pb-30 wow fadeInUp" data-wow-delay="0s">
                        <div class="image hover-item">
                            <img src="{{ asset('Front/images/widget/farmer-1.jpg') }}" data-src="{{ asset('Front/images/widget/farmer-1.jpg') }}"
                                alt="" class="lazyload">
                        </div>
                        <div class="content">
                            <div class="author-wrap">
                                <div class="has-border">
                                    <a href="#" class="name fw-7 fs-23 hover-text-4 font-worksans">
                                        Mahiram Mahiya
                                    </a>
                                    <p class="duty">
                                        Founder & CEO
                                    </p>
                                </div>
                            </div>
                            <p class="text font-nunito">
                                Mahiram is the driving force behind Shreenath, blending strategic vision with deep industry
                                insight. With years of experience in spices & FMCG, he focuses on innovation, sustainability,
                                and global recognition. His leadership keeps Shreenath rooted in tradition while embracing growth.
                            </p>
                            <div class="wg-social style-2">
                                <ul class="list">
                                    <li><a href="#"><i class="icon-facebook1"></i></a></li>
                                    <li><a href="#"><i class="icon-twitter"></i></a></li>
                                    <li><a href="#"><i class="icon-instagram2"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-skype"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-telegram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="say-hi">
                            <div class="img-item">
                                <img src="{{ asset('Front/images/item/say-hi.png') }}" alt="">
                                <p class="font-worksans fw-6 fs-30">Say Hi!</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="box-farmer img-hover pb-30 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="image hover-item">
                            <img src="{{ asset('Front/images/widget/farmer-2.jpg') }}" 
                                data-src="{{ asset('Front/images/widget/farmer-2.jpg') }}" alt="Deepak Rathi" class="lazyload">
                        </div>
                        <div class="content">
                            <div class="author-wrap">
                                <div class="has-border">
                                    <a href="#" class="name fw-7 fs-23 hover-text-4 font-worksans">
                                        Deepak Rathi
                                    </a>
                                    <p class="duty">
                                        Co-Founder & CMO
                                    </p>
                                </div>
                            </div>
                            <p class="text font-nunito">
                                Deepak brings unmatched operational expertise in supply chain, mandi operations, and quality
                                control. He ensures every Shreenath product reflects purity, consistency, and excellence. His
                                focus is building efficiency across sourcing, manufacturing, and distribution.
                            </p>
                            <div class="wg-social style-2">
                                <ul class="list">
                                    <li><a href="#"><i class="icon-facebook1"></i></a></li>
                                    <li><a href="#"><i class="icon-twitter"></i></a></li>
                                    <li><a href="#"><i class="icon-instagram2"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-skype"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-telegram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="say-hi">
                            <div class="img-item">
                                <img src="{{ asset('Front/images/item/say-hi.png') }}" alt="">
                                <p class="font-worksans fw-6 fs-30">Say Hi!</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="box-farmer img-hover wow fadeInUp" data-wow-delay="0.2s">
                        <div class="image hover-item">
                            <img src="{{ asset('Front/images/widget/farmer-2.jpg') }}" 
                                data-src="{{ asset('Front/images/widget/farmer-2.jpg') }}" alt="Ashok Rathi" class="lazyload">
                        </div>
                        <div class="content">
                            <div class="author-wrap">
                                <div class="has-border">
                                    <a href="#" class="name fw-7 fs-23 hover-text-4 font-worksans">
                                        Ashok Rathi
                                    </a>
                                    <p class="duty">
                                        Angel Investor & Venture Capitalist
                                    </p>
                                </div>
                            </div>
                            <p class="text font-nunito">
                                Ashok is a strategic investor supporting Shreenath’s journey of expansion and innovation. With
                                proven success in venture funding, he provides financial strength and mentorship, helping the
                                brand scale confidently into new markets.
                            </p>
                            <div class="wg-social style-2">
                                <ul class="list">
                                    <li><a href="#"><i class="icon-facebook1"></i></a></li>
                                    <li><a href="#"><i class="icon-twitter"></i></a></li>
                                    <li><a href="#"><i class="icon-instagram2"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-skype"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-telegram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="say-hi">
                            <div class="img-item">
                                <img src="{{ asset('Front/images/item/say-hi.png') }}" alt="">
                                <p class="font-worksans fw-6 fs-30">Say Hi!</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="box-farmer img-hover pb-30 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="image hover-item">
                            <img src="{{ asset('Front/images/widget/farmer-2.jpg') }}" 
                                data-src="{{ asset('Front/images/widget/farmer-2.jpg') }}" alt="Subhash Choudhary" class="lazyload">
                        </div>
                        <div class="content">
                            <div class="author-wrap">
                                <div class="has-border">
                                    <a href="#" class="name fw-7 fs-23 hover-text-4 font-worksans">
                                        Subhash Choudhary
                                    </a>
                                    <p class="duty">
                                        Factory Operations Manager
                                    </p>
                                </div>
                            </div>
                            <p class="text font-nunito">
                                Subhash’s precision-driven approach ensures spices are processed with the highest hygiene
                                and compliance standards, making our factory the backbone of authenticity.
                            </p>
                            <div class="wg-social style-2">
                                <ul class="list">
                                    <li><a href="#"><i class="icon-facebook1"></i></a></li>
                                    <li><a href="#"><i class="icon-twitter"></i></a></li>
                                    <li><a href="#"><i class="icon-instagram2"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-skype"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-telegram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="say-hi">
                            <div class="img-item">
                                <img src="{{ asset('Front/images/item/say-hi.png') }}" alt="">
                                <p class="font-worksans fw-6 fs-30">Say Hi!</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="box-farmer img-hover pb-30 wow fadeInUp" data-wow-delay="0.4s">
                        <div class="image hover-item">
                            <img src="{{ asset('Front/images/widget/farmer-3.jpg') }}" 
                                data-src="{{ asset('Front/images/widget/farmer-3.jpg') }}" alt="Gautam Sharma" class="lazyload">
                        </div>
                        <div class="content">
                            <div class="author-wrap">
                                <div class="has-border">
                                    <a href="#" class="name fw-7 fs-23 hover-text-4 font-worksans">
                                        Gautam Sharma
                                    </a>
                                    <p class="duty">
                                        Marketing, Tech & Accounts
                                    </p>
                                </div>
                            </div>
                            <p class="text font-nunito">
                                Gautam bridges creativity, technology, and finance. With an eye for detail and innovation, he
                                strengthens Shreenath’s digital presence while ensuring disciplined financial management.
                            </p>
                            <div class="wg-social style-2">
                                <ul class="list">
                                    <li><a href="#"><i class="icon-facebook1"></i></a></li>
                                    <li><a href="#"><i class="icon-twitter"></i></a></li>
                                    <li><a href="#"><i class="icon-instagram2"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-skype"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-telegram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="say-hi">
                            <div class="img-item">
                                <img src="{{ asset('Front/images/item/say-hi.png') }}" alt="">
                                <p class="font-worksans fw-6 fs-30">Say Hi!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /.Section meet team -->

    <!-- Section happy farm -->
    <section class="s-happy-farm-2 style-2 has-img-item tf-pt-0">
        <div class="tf-container w-1290">
            <div class="row">
                <div class="col-lg-8">
                    <div class="content-section">
                        <div class="heading-section style-3 has-text">
                            <div class="top">
                                <p class="sub-title tf-animate-1">Happy Farming!</p>
                                <div class="img-item item-2 wow zoomIn">
                                    <div class="tf-heartBeat">
                                        <img src="{{ asset('Front/images/item/happy.png') }}" alt="" />
                                    </div>
                                </div>
                            </div>
                            <p class="title">
                                We Passionately Care About <br>
                                Farmers, Consumers, and Our Team
                            </p>
                            <p class="text">
                                If you want to buy clean, pure, and quality products—or to learn more about us—contact us
                                today!
                            </p>
                            <a href="contact-us.html" class="tf-btn bg-white scale-40">
                                <span class="text-style cl-primary text-anime-style-1">
                                    Contact Us Today
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
        <div class="s-img-item item-1">
            <img src="{{ asset('Front/images/item/page-title-top.png') }}" alt="">
        </div>
        <div class="s-img-item item-2 tf-animate__rotate-right">
            <img class="up-down-move" src="{{ asset('Front/images/item/leaf-3.png') }}" alt="">
        </div>
    </section><!-- /.Section happy farm -->
</div><!-- /.Main-content -->

@endsection