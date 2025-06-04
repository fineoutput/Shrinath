
@extends('Frontend.common.app')
@section('title','Blog Full Width')
@section('content')
<style>
    .not{
        display: none;
    }
    .raat{
        display: none
    }   
    .finnaly{
        margin-top: 10px !important;
    }
    .yutes{
        background: #fff;
        border-radius: 10px;
    }
    #loading{
        display: none;
    }
</style>
<div class="page-title page-blog-full-w">
    <div class="rellax" data-rellax-speed="5">
        <img src="{{ asset('Front/images/page-title/blog-full-w.jpg') }}" alt="">
    </div>
    <div class="content-wrap">
        <div class="tf-container w-1290">
            <div class="row">
                <div class="col-lg-12">
                    <div class="content">
                        <p class="sub-title mt-5">
                            Read The Latest News From Us
                        </p>
                        <h1 class="title">
                            Blog Full Width
                        </h1>
                        <div class="icon-img">
                            <img src="{{ asset('Front/images/item/line-throw-title.png') }}" alt="">
                        </div>
                        <div class="breadcrumb">
                            <a href="index.html">Home</a>
                            <div class="icon">
                                <i class="icon-arrow-right1"></i>
                            </div>
                            <a href="javascript:void(0)">Blog Full Width</a>
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
<div class="main-content">
    <!-- Section sub -->
    <section class="s-sub">
        <div class="tf-container w-1290">
            <div class="row">
                <div class="col-lg-12">
                    <div class="subscribe-wrap">
                        <div class="has-border">
                            <div class="notice">
                                <div class="icon">
                                    <i class="fa-solid fa-envelope-open-text"></i>
                                </div>
                                <div class="content-inner">
                                    <h3 class="title font-worksans">
                                        Subscribe to Newsletter
                                    </h3>
                                    <p class="text">
                                        Please sign up to follow the latest news and events from us, we <br> promise not to spam your inbox.
                                    </p>
                                </div>
                            </div>
                            <form action="#" class="form-email">
                                <input type="email" class="style-1" placeholder="Email address" required>
                                <button type="submit" class="btn-send">
                                    <i class="fa-solid fa-paper-plane"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /.Section sub -->

    <!-- Section filter -->
    <section class="s-filter-sorting">
        <div class="tf-container w-1290">
            <div class="row">
                <div class="col-lg-12">
                    <div class="s-top">
                        <p class="text font-worksans">
                            Showing 1–15 of 30 results
                        </p>
                        <div class="tf-control-sorting">
                            <div class="tf-dropdown-sort">
                                <div class="tf-btn style-2" data-bs-toggle="dropdown">
                                    <span class="text-sort-value">Latest Posts</span>
                                    <i class="icon-arrow_down"></i>
                                </div>
                                <div class="dropdown-menu">
                                    <div class="select-item">
                                        <span class="text-value-item">
                                            New Post
                                        </span>
                                    </div>
                                    <div class="select-item">
                                        <span class="text-value-item">
                                            Regular Post
                                        </span>
                                    </div>
                                    <div class="select-item active">
                                        <span class="text-value-item">
                                            Lastest Posts
                                        </span>
                                    </div>
                                    <div class="select-item">
                                        <span class="text-value-item">
                                            All Post
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/. Section filter -->

    <!-- Section blog full wrap -->
    <section class="s-blog-full-wrap">
        <div class="tf-container w-1290">
            <div class="row">
                <div class="col-lg-12">
                    <div class="wrap-blog-list mb-50">
                        <article class="article-blog-item mb-35 wow fadeInUp" data-wow-delay="0s">
                            <div class="image">
                                <div class="video-wrap">
                                    <img class="lazyload" data-src="{{ asset('Front/images/blog/blog-1.jpg') }}"
                                        src="{{ asset('Front/images/blog/blog-1.jpg') }}" alt="">
                                    <a href="https://www.youtube.com/watch?v=MLpWrANjFbI"
                                        class="style-icon-play popup-youtube">
                                        <i class="fa-solid fa-play"></i>
                                        <div class="wave"></div>
                                        <div class="wave-1"></div>
                                    </a>
                                </div>
                                <div class="entry-date">
                                    <p class="day">08</p>
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
                                                By Hardson
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
                                            <a href="#">0 Comments</a>
                                        </p>
                                    </li>
                                    <li class="entry view">
                                        <i class="fa-solid fa-eye"></i>
                                        <p>
                                            <a href="#">350 View</a>
                                        </p>
                                    </li>
                                </ul>
                                <h3 class="title fw-7">
                                    <a href="blog-single.html">
                                        How to Care for Cows to have the Best Quality Meat
                                    </a>
                                </h3>
                                <p class="text">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lacus odio,
                                    egestas vitae augue sed, vulputate viverra
                                    velit. Quisque fringilla viverra turpis, at condimentum arcu convallis sit amet.
                                    Class aptent taciti sociosqu ad litora
                                    torquent per conubia nostra...
                                </p>
                                <div class="bot">
                                    <a class="tf-btn gap-35" href="blog-single.html">
                                        <span class="text-style">
                                            Continue Reading
                                        </span>
                                        <div class="icon">
                                            <i class="icon-arrow_right"></i>
                                        </div>
                                    </a>
                                    <div class="share">
                                        <div class="icon">
                                            <i class="fa-solid fa-share-nodes"></i>
                                        </div>
                                        <p class="fw-5 font-worksans mr-23">
                                            Share:
                                        </p>
                                        <ul class="social-list style-2">
                                            <li class="item">
                                                <a href="#">
                                                    <i class="icon-facebook"></i>
                                                </a>
                                            </li>
                                            <li class="item">
                                                <a href="#">
                                                    <i class="icon-twitter"></i>
                                                </a>
                                            </li>
                                            <li class="item">
                                                <a href="#">
                                                    <i class="fa-brands fa-skype"></i>
                                                </a>
                                            </li>
                                            <li class="item">
                                                <a href="#">
                                                    <i class="fa-brands fa-telegram"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <article class="article-blog-item mb-35 type-2 wow fadeInUp" data-wow-delay="0s">
                            <div class="image h-360">
                                <div class="video-wrap">
                                    <img class="lazyload" src="{{ asset('Front/images/blog/blog-2.jpg') }}"
                                        data-src="{{ asset('Front/images/blog/blog-2.jpg') }}" alt="">
                                    <a href="https://www.youtube.com/watch?v=MLpWrANjFbI"
                                        class="style-icon-play popup-youtube">
                                        <i class="fa-solid fa-play"></i>
                                        <div class="wave"></div>
                                        <div class="wave-1"></div>
                                    </a>
                                </div>
                                <div class="entry-date">
                                    <p class="day">08</p>
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
                                            <a href="#">
                                                By Hardson
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
                                            <a href="#">0 Comments</a>
                                        </p>
                                    </li>
                                    <li class="entry view">
                                        <i class="fa-solid fa-eye"></i>
                                        <p>
                                            <a href="#">350 View</a>
                                        </p>
                                    </li>
                                </ul>
                                <h3 class="title fw-7">
                                    <a href="blog-single.html">
                                        The Best Time to Harvest Corn Without Wilting
                                    </a>
                                </h3>
                                <p class="text">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lacus odio,
                                    egestas vitae augue sed, vulputate viverra
                                    velit. Quisque fringilla viverra turpis, at condimentum arcu convallis sit amet.
                                    Class aptent taciti sociosqu ad litora
                                    torquent per conubia nostra...
                                </p>
                                <div class="bot">
                                    <a class="tf-btn gap-35" href="blog-single.html">
                                        <span class="text-style">
                                            Continue Reading
                                        </span>
                                        <div class="icon">
                                            <i class="icon-arrow_right"></i>
                                        </div>
                                    </a>
                                    <div class="share">
                                        <div class="icon">
                                            <i class="fa-solid fa-share-nodes"></i>
                                        </div>
                                        <p class="fw-5 font-worksans mr-23">
                                            Share:
                                        </p>
                                        <ul class="social-list style-2">
                                            <li class="item">
                                                <a href="#">
                                                    <i class="icon-facebook"></i>
                                                </a>
                                            </li>
                                            <li class="item">
                                                <a href="#">
                                                    <i class="icon-twitter"></i>
                                                </a>
                                            </li>
                                            <li class="item">
                                                <a href="#">
                                                    <i class="fa-brands fa-skype"></i>
                                                </a>
                                            </li>
                                            <li class="item">
                                                <a href="#">
                                                    <i class="fa-brands fa-telegram"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <div class="block-quote mb-35 wow fadeInUp" data-wow-delay="0s">
                            <div class="has-border">
                                <div class="quote">
                                    <div class="icon style-circle">
                                        <i class="icon-quote"></i>
                                    </div>
                                    <p class="font-snowfall cite">
                                        A sustainable smart city embodies the fusion of technological advancements with a commitment to minimizing environmental impact. These cities harness the power of digital innovation.
                                    </p>
                                </div>
                                <div class="bot">
                                    <div class="meta-left">
                                        <div class="entry date">
                                            <i class="fa-solid fs-14 fa-calendar"></i>
                                            <p class="">
                                                08 June 2024
                                            </p>
                                        </div>
                                        <div class="entry tags">
                                            <i class="fa-solid fa-tag"></i>
                                            <p class="">
                                                <a href="#" class="hover-text-secondary">Agriculture</a>,
                                                <a href="#" class="hover-text-secondary">Farm</a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="entry-author">
                                        <p>
                                            <a href="#" class="hover-text-secondary">
                                                Christine Rose
                                            </a>
                                            - Quote
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <article class="article-blog-item type-2 mb-35 wow fadeInUp" data-wow-delay="0s">
                            <div class="image h-360">
                                <div class="video-wrap">
                                    <img class="lazyload" src="{{ asset('Front/images/blog/blog-3.jpg') }}"
                                        data-src="{{ asset('Front/images/blog/blog-3.jpg') }}" alt="">
                                    <a href="https://www.youtube.com/watch?v=MLpWrANjFbI"
                                        class="style-icon-play popup-youtube">
                                        <i class="fa-solid fa-play"></i>
                                        <div class="wave"></div>
                                        <div class="wave-1"></div>
                                    </a>
                                </div>
                                <div class="entry-date">
                                    <p class="day">08</p>
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
                                            <a href="#">
                                                By Hardson
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
                                            <a href="#">0 Comments</a>
                                        </p>
                                    </li>
                                    <li class="entry view">
                                        <i class="fa-solid fa-eye"></i>
                                        <p>
                                            <a href="#">350 View</a>
                                        </p>
                                    </li>
                                </ul>
                                <h3 class="title fw-7">
                                    <a href="blog-single.html">
                                        The Joy of Working Every Day on a Sheep Farm
                                    </a>
                                </h3>
                                <p class="text">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lacus odio,
                                    egestas vitae augue sed, vulputate viverra
                                    velit. Quisque fringilla viverra turpis, at condimentum arcu convallis sit amet.
                                    Class aptent taciti sociosqu ad litora
                                    torquent per conubia nostra...
                                </p>
                                <div class="bot">
                                    <a class="tf-btn gap-35" href="blog-single.html">
                                        <span class="text-style">
                                            Continue Reading
                                        </span>
                                        <div class="icon">
                                            <i class="icon-arrow_right"></i>
                                        </div>
                                    </a>
                                    <div class="share">
                                        <div class="icon">
                                            <i class="fa-solid fa-share-nodes"></i>
                                        </div>
                                        <p class="fw-5 font-worksans mr-23">
                                            Share:
                                        </p>
                                        <ul class="social-list style-2">
                                            <li class="item">
                                                <a href="#">
                                                    <i class="icon-facebook"></i>
                                                </a>
                                            </li>
                                            <li class="item">
                                                <a href="#">
                                                    <i class="icon-twitter"></i>
                                                </a>
                                            </li>
                                            <li class="item">
                                                <a href="#">
                                                    <i class="fa-brands fa-skype"></i>
                                                </a>
                                            </li>
                                            <li class="item">
                                                <a href="#">
                                                    <i class="fa-brands fa-telegram"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <div class="block-quote style-2 wow fadeInUp" data-wow-delay="0s">
                            <div class="has-border">
                                <div class="quote">
                                    <div class="icon style-circle">
                                        <i class="fa-solid fa-link"></i>
                                    </div>
                                    <p class="font-snowfall cite font-worksans fw-7">
                                        <a href="https://illuminationconsulting.com/blog/"
                                            class="hover-text-secondary text-white">
                                            Investing in Controlled Environment Agriculture with Confidence
                                        </a>
                                    </p>
                                </div>
                                <div class="bot">
                                    <div class="meta-left">
                                        <div class="entry date">
                                            <i class="fa-solid fa-calendar"></i>
                                            <p>
                                                08 June 2024
                                            </p>
                                        </div>
                                        <div class="entry tags">
                                            <i class="fa-solid fa-tag"></i>
                                            <p>
                                                <a href="#" class="hover-text-secondary">Agriculture</a>,
                                                <a href="#" class="hover-text-secondary">Farm</a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="entry-author">
                                        <a href="#" class="hover-text-secondary">
                                            https://illuminationconsulting.com/blog/
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <article class="article-blog-item type-2 wow fadeInUp" data-wow-delay="0s">
                            <div class="image">
                                <div class="video-wrap">
                                    <img class="lazyload" src="{{ asset('Front/images/blog/blog-4.jpg') }}"
                                        data-src="{{ asset('Front/images/blog/blog-4.jpg') }}" alt="">
                                    <a href="https://www.youtube.com/watch?v=MLpWrANjFbI"
                                        class="style-icon-play popup-youtube">
                                        <i class="fa-solid fa-volume-high"></i>
                                        <div class="wave"></div>
                                        <div class="wave-1"></div>
                                    </a>
                                </div>
                                <div class="entry-date">
                                    <p class="day">08</p>
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
                                            <a href="#">
                                                By Hardson
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
                                            <a href="#">0 Comments</a>
                                        </p>
                                    </li>
                                    <li class="entry view">
                                        <i class="fa-solid fa-eye"></i>
                                        <p>
                                            <a href="#">350 View</a>
                                        </p>
                                    </li>
                                </ul>
                                <h3 class="title fw-7">
                                    <a href="blog-single.html">
                                        The Case for Investing in Greenhouses
                                    </a>
                                </h3>
                                <p class="text">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lacus odio,
                                    egestas vitae augue sed, vulputate viverra
                                    velit. Quisque fringilla viverra turpis, at condimentum arcu convallis sit amet.
                                    Class aptent taciti sociosqu ad litora
                                    torquent per conubia nostra...
                                </p>
                                <div class="bot">
                                    <a class="tf-btn gap-35" href="blog-single.html">
                                        <span class="text-style">
                                            Continue Reading
                                        </span>
                                        <div class="icon">
                                            <i class="icon-arrow_right"></i>
                                        </div>
                                    </a>
                                    <div class="share">
                                        <div class="icon">
                                            <i class="fa-solid fa-share-nodes"></i>
                                        </div>
                                        <p class="fw-5 font-worksans mr-23">
                                            Share:
                                        </p>
                                        <ul class="social-list style-2">
                                            <li class="item">
                                                <a href="#">
                                                    <i class="icon-facebook"></i>
                                                </a>
                                            </li>
                                            <li class="item">
                                                <a href="#">
                                                    <i class="icon-twitter"></i>
                                                </a>
                                            </li>
                                            <li class="item">
                                                <a href="#">
                                                    <i class="fa-brands fa-skype"></i>
                                                </a>
                                            </li>
                                            <li class="item">
                                                <a href="#">
                                                    <i class="fa-brands fa-telegram"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="blog-pagination">
                        <ul>
                            <li>
                                <a class="active" href="javascript:void(0)">1</a>
                            </li>
                            <li>
                                <a href="#">2</a>
                            </li>
                            <li>
                                <a href="#">3</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /.Section blog full wrap -->
</div><!-- /.Main-content -->
@endsection