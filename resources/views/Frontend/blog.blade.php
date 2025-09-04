
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
                            <a href="{{route('/')}}">Home</a>
                            <div class="icon">
                                <i class="icon-arrow-right1"></i>
                            </div>
                            {{-- <a href="{{route('blog_single')}}">Blog Full Width</a> --}}
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

                        @foreach ($blog as $value)
                            <article class="article-blog-item mb-35 wow fadeInUp" data-wow-delay="0s">
                            <div class="image">
                                <div class="video-wrap">
                                   @php
                                        $images = json_decode($value->image, true); // decode as array
                                        $firstImage = !empty($images) ? $images[0] : null;
                                    @endphp

                                    @if ($firstImage)
                                        <img class="lazyload" data-src="{{ asset($firstImage) }}" src="{{ asset($firstImage) }}" alt="">
                                    @endif
                                   
                                </div>
                               @php
                                    $date = \Carbon\Carbon::parse($value->created_at);
                                @endphp

                                
                            </div>
                            <div class="content">
                               
                                <h3 class="title fw-7">
                                    <a href="{{route('blog')}}">
                                         {{ $value->title ?? ''}}
                                    </a>
                                </h3>
                                <p class="text">
                                    {!! $value->description !!}
                                </p>
                                <div class="bot">
                                    <a class="tf-btn gap-35" href="{{ route('blog_single', encrypt($value->id)) }}">
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
                        @endforeach
                        
                        

                         @foreach ($blog2 as $value)
                            <article class="article-blog-item mb-35 wow fadeInUp" data-wow-delay="0s">
                            <div class="image">
                                <div class="video-wrap">
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
                                        <div class="wave"></div>
                                        <div class="wave-1"></div>
                                    </a>
                                </div>
                               @php
                                    $date = \Carbon\Carbon::parse($value->created_at);
                                @endphp

                                
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
                                    <a href="{{route('blog')}}">
                                         {{ $value->title ?? ''}}
                                    </a>
                                </h3>
                                <p class="text">
                                    {!! $value->description !!}
                                </p>
                                <div class="bot">
                                    <a class="tf-btn gap-35" href="{{route('blog')}}">
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
                        @endforeach

                       
                        @foreach ($blog3 as $value)
                            <article class="article-blog-item mb-35 wow fadeInUp" data-wow-delay="0s">
                            <div class="image">
                                <div class="video-wrap">
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
                                        <div class="wave"></div>
                                        <div class="wave-1"></div>
                                    </a>
                                </div>
                               @php
                                    $date = \Carbon\Carbon::parse($value->created_at);
                                @endphp

                                
                            </div>
                            <div class="content">
                                
                                <h3 class="title fw-7">
                                    <a href="{{route('blog')}}">
                                         {{ $value->title ?? ''}}
                                    </a>
                                </h3>
                                <p class="text">
                                    {!! $value->description !!}
                                </p>
                                <div class="bot">
                                    <a class="tf-btn gap-35" href="{{route('blog')}}">
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
                        @endforeach
                    </div>
                </div>
                @if ($paginator->hasPages())
                    <div class="col-lg-12">
                        <div class="blog-pagination">
                            <ul>
                                {{-- Previous Page Link --}}
                                @if ($paginator->onFirstPage())
                                    <li><a href="javascript:void(0)"><i class="fa fa-angle-left"></i></a></li>
                                @else
                                    <li><a href="{{ $paginator->previousPageUrl() }}"><i class="fa fa-angle-left"></i></a></li>
                                @endif

                                {{-- Pagination Elements --}}
                                @foreach ($paginator->getUrlRange(1, $paginator->lastPage()) as $page => $url)
                                    <li>
                                        <a href="{{ $url }}" class="{{ $paginator->currentPage() == $page ? 'active' : '' }}">
                                            {{ $page }}
                                        </a>
                                    </li>
                                @endforeach

                                {{-- Next Page Link --}}
                                @if ($paginator->hasMorePages())
                                    <li><a href="{{ $paginator->nextPageUrl() }}"><i class="fa fa-angle-right"></i></a></li>
                                @else
                                    <li><a href="javascript:void(0)"><i class="fa fa-angle-right"></i></a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section><!-- /.Section blog full wrap -->
</div><!-- /.Main-content -->
@endsection