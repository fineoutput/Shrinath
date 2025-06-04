@extends('Frontend.common.app')
@section('title','home')
@section('content')
<style>
    .not{
        display: none;
    }
    .raat{
        display: none
    }   
      .yutes{
        background: #fff;
        border-radius: 10px;
    }
</style>
<div class="page-title page-gallery">
    <div class="rellax" data-rellax-speed="5">
        <img src="{{ asset('Front/images/page-title/gallery.jpg') }}" alt="">
    </div>
    <div class="content-wrap">
        <div class="tf-container w-1290">
            <div class="row">
                <div class="col-lg-12">
                    <div class="content">
                        <p class="sub-title mt-5">
                            See Our Daily Photos
                        </p>
                        <h1 class="title">
                            farm gallery
                        </h1>
                        <div class="icon-img">
                            <img src="{{ asset('Front/images/item/line-throw-title.png') }}" alt="">
                        </div>
                        <div class="breadcrumb">
                            <a href="index.html">Home</a>
                            <div class="icon">
                                <i class="icon-arrow-right1"></i>
                            </div>
                            <a href="javascript:void(0)">Farm Gallery </a>
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
<div class="main-content page-gallery">
    <div class="tf-container">
        <div class="row">
            <div class="col-lg-12">
                <div class="wg-tabs">
                    <ul class="overflow-x-auto menu-tab mb-61">
                        <li class="item active"><a href="javascript:void(0)" class="btn-tab">All Projects</a></li>
                        <li class="item"><a href="javascript:void(0)" class="btn-tab">Organic</a></li>
                        <li class="item"><a href="javascript:void(0)" class="btn-tab">Farms</a></li>
                        <li class="item"><a href="javascript:void(0)" class="btn-tab">Harvest</a></li>
                        <li class="item"><a href="javascript:void(0)" class="btn-tab">Vegetable</a></li>
                        <li class="item"><a href="javascript:void(0)" class="btn-tab">Fruit</a></li>
                        <li class="item"><a href="javascript:void(0)" class="btn-tab">Cattle</a></li>
                    </ul>
                    <div class="widget-content-tab">
                        <div class="widget-content-inner active">
                            <div class="wg-gallery">
                                <div class="gallery-item item-1 wow fadeInUp" data-wow-delay="0s">
                                    <div class="image">
                                        <img class="lazyload" src="{{ asset('Front/images/widget/gallery-item-1.jpg') }}"
                                            data-src="{{ asset('Front/images/widget/gallery-item-1.jpg') }}" alt="">
                                    </div>
                                    <a href="gallery.html" class="add-gallery">+</a>
                                </div>
                                <div class="gallery-item item-2 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="image">
                                        <img class="lazyload" src="{{ asset('Front/images/widget/gallery-item-2.jpg') }}"
                                            data-src="{{ asset('Front/images/widget/gallery-item-2.jpg') }}" alt="">
                                    </div>
                                    <a href="gallery.html" class="add-gallery">+</a>
                                </div>
                                <div class="gallery-item item-3 wow fadeInUp" data-wow-delay="0.2s">
                                    <div class="image">
                                        <img class="lazyload" src="{{ asset('Front/images/widget/gallery-item-3.jpg') }}"
                                            data-src="{{ asset('Front/images/widget/gallery-item-3.jpg') }}" alt="">
                                    </div>
                                    <a href="gallery.html" class="add-gallery">+</a>
                                </div>
                                <div class="gallery-item item-4 wow fadeInUp" data-wow-delay="0s">
                                    <div class="image">
                                        <img class="lazyload" src="{{ asset('Front/images/widget/gallery-item-4.jpg') }}"
                                            data-src="{{ asset('Front/images/widget/gallery-item-4.jpg') }}" alt="">
                                    </div>
                                    <a href="gallery.html" class="add-gallery">+</a>
                                </div>
                                <div class="gallery-item item-5 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="image">
                                        <img class="lazyload" src="{{ asset('Front/images/widget/gallery-item-5.jpg') }}"
                                            data-src="{{ asset('Front/images/widget/gallery-item-5.jpg') }}" alt="">
                                    </div>
                                    <a href="gallery.html" class="add-gallery">+</a>
                                </div>
                                <div class="gallery-item item-6 wow fadeInUp" data-wow-delay="0s">
                                    <div class="image">
                                        <img class="lazyload" src="{{ asset('Front/images/widget/gallery-item-6.jpg') }}"
                                            data-src="{{ asset('Front/images/widget/gallery-item-6.jpg') }}" alt="">
                                    </div>
                                    <a href="gallery.html" class="add-gallery">+</a>
                                </div>
                                <div class="gallery-item item-7 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="image">
                                        <img class="lazyload" src="{{ asset('Front/images/widget/gallery-item-7.jpg') }}"
                                            data-src="{{ asset('Front/images/widget/gallery-item-7.jpg') }}" alt="">
                                    </div>
                                    <a href="gallery.html" class="add-gallery">+</a>
                                </div>
                                <div class="gallery-item item-8 wow fadeInUp" data-wow-delay="0.2s">
                                    <div class="image">
                                        <img class="lazyload" src="{{ asset('Front/images/widget/gallery-item-8.jpg') }}"
                                            data-src="{{ asset('Front/images/widget/gallery-item-8.jpg') }}" alt="">
                                    </div>
                                    <a href="gallery.html" class="add-gallery">+</a>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content-inner">
                            <div class="wg-gallery">
                                <div class="gallery-item item-1">
                                    <div class="image">
                                        <img class="lazyload" src="{{ asset('Front/images/widget/gallery-item-1.jpg') }}"
                                            data-src="{{ asset('Front/images/widget/gallery-item-1.jpg') }}" alt="">
                                    </div>
                                    <a href="gallery.html" class="add-gallery">+</a>
                                </div>
                                <div class="gallery-item item-2">
                                    <div class="image">
                                        <img class="lazyload" src="{{ asset('Front/images/widget/gallery-item-2.jpg') }}"
                                            data-src="{{ asset('Front/images/widget/gallery-item-2.jpg') }}" alt="">
                                    </div>
                                    <a href="gallery.html" class="add-gallery">+</a>
                                </div>
                                <div class="gallery-item item-3">
                                    <div class="image">
                                        <img class="lazyload" src="{{ asset('Front/images/widget/gallery-item-3.jpg') }}"
                                            data-src="{{ asset('Front/images/widget/gallery-item-3.jpg') }}" alt="">
                                    </div>
                                    <a href="gallery.html" class="add-gallery">+</a>
                                </div>
                                <div class="gallery-item item-4">
                                    <div class="image">
                                        <img class="lazyload" src="{{ asset('Front/images/widget/gallery-item-4.jpg') }}"
                                            data-src="{{ asset('Front/images/widget/gallery-item-4.jpg') }}" alt="">
                                    </div>
                                    <a href="gallery.html" class="add-gallery">+</a>
                                </div>
                                <div class="gallery-item item-5">
                                    <div class="image">
                                        <img class="lazyload" src="{{ asset('Front/images/widget/gallery-item-5.jpg') }}"
                                            data-src="{{ asset('Front/images/widget/gallery-item-5.jpg') }}" alt="">
                                    </div>
                                    <a href="gallery.html" class="add-gallery">+</a>
                                </div>
                                <div class="gallery-item item-6">
                                    <div class="image">
                                        <img class="lazyload" src="{{ asset('Front/images/widget/gallery-item-6.jpg') }}"
                                            data-src="{{ asset('Front/images/widget/gallery-item-6.jpg') }}" alt="">
                                    </div>
                                    <a href="gallery.html" class="add-gallery">+</a>
                                </div>
                                <div class="gallery-item item-7">
                                    <div class="image">
                                        <img class="lazyload" src="{{ asset('Front/images/widget/gallery-item-7.jpg') }}"
                                            data-src="{{ asset('Front/images/widget/gallery-item-7.jpg') }}" alt="">
                                    </div>
                                    <a href="gallery.html" class="add-gallery">+</a>
                                </div>
                                <div class="gallery-item item-8">
                                    <div class="image">
                                        <img class="lazyload" src="{{ asset('Front/images/widget/gallery-item-8.jpg') }}"
                                            data-src="{{ asset('Front/images/widget/gallery-item-8.jpg') }}" alt="">
                                    </div>
                                    <a href="gallery.html" class="add-gallery">+</a>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content-inner">
                            <div class="wg-gallery">
                                <div class="gallery-item item-1">
                                    <div class="image">
                                        <img class="lazyload" src="{{ asset('Front/images/widget/gallery-item-1.jpg') }}"
                                            data-src="{{ asset('Front/images/widget/gallery-item-1.jpg') }}" alt="">
                                    </div>
                                    <a href="gallery.html" class="add-gallery">+</a>
                                </div>
                                <div class="gallery-item item-2">
                                    <div class="image">
                                        <img class="lazyload" src="{{ asset('Front/images/widget/gallery-item-2.jpg') }}"
                                            data-src="{{ asset('Front/images/widget/gallery-item-2.jpg') }}" alt="">
                                    </div>
                                    <a href="gallery.html" class="add-gallery">+</a>
                                </div>
                                <div class="gallery-item item-3">
                                    <div class="image">
                                        <img class="lazyload" src="{{ asset('Front/images/widget/gallery-item-3.jpg') }}"
                                            data-src="{{ asset('Front/images/widget/gallery-item-3.jpg') }}" alt="">
                                    </div>
                                    <a href="gallery.html" class="add-gallery">+</a>
                                </div>
                                <div class="gallery-item item-4">
                                    <div class="image">
                                        <img class="lazyload" src="{{ asset('Front/images/widget/gallery-item-4.jpg') }}"
                                            data-src="{{ asset('Front/images/widget/gallery-item-4.jpg') }}" alt="">
                                    </div>
                                    <a href="gallery.html" class="add-gallery">+</a>
                                </div>
                                <div class="gallery-item item-5">
                                    <div class="image">
                                        <img class="lazyload" src="{{ asset('Front/images/widget/gallery-item-5.jpg') }}"
                                            data-src="{{ asset('Front/images/widget/gallery-item-5.jpg') }}" alt="">
                                    </div>
                                    <a href="gallery.html" class="add-gallery">+</a>
                                </div>
                                <div class="gallery-item item-6">
                                    <div class="image">
                                        <img class="lazyload" src="{{ asset('Front/images/widget/gallery-item-6.jpg') }}"
                                            data-src="{{ asset('Front/images/widget/gallery-item-6.jpg') }}" alt="">
                                    </div>
                                    <a href="gallery.html" class="add-gallery">+</a>
                                </div>
                                <div class="gallery-item item-7">
                                    <div class="image">
                                        <img class="lazyload" src="{{ asset('Front/images/widget/gallery-item-7.jpg') }}"
                                            data-src="{{ asset('Front/images/widget/gallery-item-7.jpg') }}" alt="">
                                    </div>
                                    <a href="gallery.html" class="add-gallery">+</a>
                                </div>
                                <div class="gallery-item item-8">
                                    <div class="image">
                                        <img class="lazyload" src="{{ asset('Front/images/widget/gallery-item-8.jpg') }}"
                                            data-src="{{ asset('Front/images/widget/gallery-item-8.jpg') }}" alt="">
                                    </div>
                                    <a href="gallery.html" class="add-gallery">+</a>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content-inner">
                            <div class="wg-gallery">
                                <div class="gallery-item item-1">
                                    <div class="image">
                                        <img class="lazyload" src="{{ asset('Front/images/widget/gallery-item-1.jpg') }}"
                                            data-src="{{ asset('Front/images/widget/gallery-item-1.jpg') }}" alt="">
                                    </div>
                                    <a href="gallery.html" class="add-gallery">+</a>
                                </div>
                                <div class="gallery-item item-2">
                                    <div class="image">
                                        <img class="lazyload" src="{{ asset('Front/images/widget/gallery-item-2.jpg') }}"
                                            data-src="{{ asset('Front/images/widget/gallery-item-2.jpg') }}" alt="">
                                    </div>
                                    <a href="gallery.html" class="add-gallery">+</a>
                                </div>
                                <div class="gallery-item item-3">
                                    <div class="image">
                                        <img class="lazyload" src="{{ asset('Front/images/widget/gallery-item-3.jpg') }}"
                                            data-src="{{ asset('Front/images/widget/gallery-item-3.jpg') }}" alt="">
                                    </div>
                                    <a href="gallery.html" class="add-gallery">+</a>
                                </div>
                                <div class="gallery-item item-4">
                                    <div class="image">
                                        <img class="lazyload" src="{{ asset('Front/images/widget/gallery-item-4.jpg') }}"
                                            data-src="{{ asset('Front/images/widget/gallery-item-4.jpg') }}" alt="">
                                    </div>
                                    <a href="gallery.html" class="add-gallery">+</a>
                                </div>
                                <div class="gallery-item item-5">
                                    <div class="image">
                                        <img class="lazyload" src="{{ asset('Front/images/widget/gallery-item-5.jpg') }}"
                                            data-src="{{ asset('Front/images/widget/gallery-item-5.jpg') }}" alt="">
                                    </div>
                                    <a href="gallery.html" class="add-gallery">+</a>
                                </div>
                                <div class="gallery-item item-6">
                                    <div class="image">
                                        <img class="lazyload" src="{{ asset('Front/images/widget/gallery-item-6.jpg') }}"
                                            data-src="{{ asset('Front/images/widget/gallery-item-6.jpg') }}" alt="">
                                    </div>
                                    <a href="gallery.html" class="add-gallery">+</a>
                                </div>
                                <div class="gallery-item item-7">
                                    <div class="image">
                                        <img class="lazyload" src="{{ asset('Front/images/widget/gallery-item-7.jpg') }}"
                                            data-src="{{ asset('Front/images/widget/gallery-item-7.jpg') }}" alt="">
                                    </div>
                                    <a href="gallery.html" class="add-gallery">+</a>
                                </div>
                                <div class="gallery-item item-8">
                                    <div class="image">
                                        <img class="lazyload" src="{{ asset('Front/images/widget/gallery-item-8.jpg') }}"
                                            data-src="{{ asset('Front/images/widget/gallery-item-8.jpg') }}" alt="">
                                    </div>
                                    <a href="gallery.html" class="add-gallery">+</a>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content-inner">
                            <div class="wg-gallery">
                                <div class="gallery-item item-1">
                                    <div class="image">
                                        <img class="lazyload" src="{{ asset('Front/images/widget/gallery-item-1.jpg') }}"
                                            data-src="{{ asset('Front/images/widget/gallery-item-1.jpg') }}" alt="">
                                    </div>
                                    <a href="gallery.html" class="add-gallery">+</a>
                                </div>
                                <div class="gallery-item item-2">
                                    <div class="image">
                                        <img class="lazyload" src="{{ asset('Front/images/widget/gallery-item-2.jpg') }}"
                                            data-src="{{ asset('Front/images/widget/gallery-item-2.jpg') }}" alt="">
                                    </div>
                                    <a href="gallery.html" class="add-gallery">+</a>
                                </div>
                                <div class="gallery-item item-3">
                                    <div class="image">
                                        <img class="lazyload" src="{{ asset('Front/images/widget/gallery-item-3.jpg') }}"
                                            data-src="{{ asset('Front/images/widget/gallery-item-3.jpg') }}" alt="">
                                    </div>
                                    <a href="gallery.html" class="add-gallery">+</a>
                                </div>
                                <div class="gallery-item item-4">
                                    <div class="image">
                                        <img class="lazyload" src="{{ asset('Front/images/widget/gallery-item-4.jpg') }}"
                                            data-src="{{ asset('Front/images/widget/gallery-item-4.jpg') }}" alt="">
                                    </div>
                                    <a href="gallery.html" class="add-gallery">+</a>
                                </div>
                                <div class="gallery-item item-5">
                                    <div class="image">
                                        <img class="lazyload" src="{{ asset('Front/images/widget/gallery-item-5.jpg') }}"
                                            data-src="{{ asset('Front/images/widget/gallery-item-5.jpg') }}" alt="">
                                    </div>
                                    <a href="gallery.html" class="add-gallery">+</a>
                                </div>
                                <div class="gallery-item item-6">
                                    <div class="image">
                                        <img class="lazyload" src="{{ asset('Front/images/widget/gallery-item-6.jpg') }}"
                                            data-src="{{ asset('Front/images/widget/gallery-item-6.jpg') }}" alt="">
                                    </div>
                                    <a href="gallery.html" class="add-gallery">+</a>
                                </div>
                                <div class="gallery-item item-7">
                                    <div class="image">
                                        <img class="lazyload" src="{{ asset('Front/images/widget/gallery-item-7.jpg') }}"
                                            data-src="{{ asset('Front/images/widget/gallery-item-7.jpg') }}" alt="">
                                    </div>
                                    <a href="gallery.html" class="add-gallery">+</a>
                                </div>
                                <div class="gallery-item item-8">
                                    <div class="image">
                                        <img class="lazyload" src="{{ asset('Front/images/widget/gallery-item-8.jpg') }}"
                                            data-src="{{ asset('Front/images/widget/gallery-item-8.jpg') }}" alt="">
                                    </div>
                                    <a href="gallery.html" class="add-gallery">+</a>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content-inner">
                            <div class="wg-gallery">
                                <div class="gallery-item item-1">
                                    <div class="image">
                                        <img class="lazyload" src="{{ asset('Front/images/widget/gallery-item-1.jpg') }}"
                                            data-src="{{ asset('Front/images/widget/gallery-item-1.jpg') }}" alt="">
                                    </div>
                                    <a href="gallery.html" class="add-gallery">+</a>
                                </div>
                                <div class="gallery-item item-2">
                                    <div class="image">
                                        <img class="lazyload" src="{{ asset('Front/images/widget/gallery-item-2.jpg') }}"
                                            data-src="{{ asset('Front/images/widget/gallery-item-2.jpg') }}" alt="">
                                    </div>
                                    <a href="gallery.html" class="add-gallery">+</a>
                                </div>
                                <div class="gallery-item item-3">
                                    <div class="image">
                                        <img class="lazyload" src="{{ asset('Front/images/widget/gallery-item-3.jpg') }}"
                                            data-src="{{ asset('Front/images/widget/gallery-item-3.jpg') }}" alt="">
                                    </div>
                                    <a href="gallery.html" class="add-gallery">+</a>
                                </div>
                                <div class="gallery-item item-4">
                                    <div class="image">
                                        <img class="lazyload" src="{{ asset('Front/images/widget/gallery-item-4.jpg') }}"
                                            data-src="{{ asset('Front/images/widget/gallery-item-4.jpg') }}" alt="">
                                    </div>
                                    <a href="gallery.html" class="add-gallery">+</a>
                                </div>
                                <div class="gallery-item item-5">
                                    <div class="image">
                                        <img class="lazyload" src="{{ asset('Front/images/widget/gallery-item-5.jpg') }}"
                                            data-src="{{ asset('Front/images/widget/gallery-item-5.jpg') }}" alt="">
                                    </div>
                                    <a href="gallery.html" class="add-gallery">+</a>
                                </div>
                                <div class="gallery-item item-6">
                                    <div class="image">
                                        <img class="lazyload" src="{{ asset('Front/images/widget/gallery-item-6.jpg') }}"
                                            data-src="{{ asset('Front/images/widget/gallery-item-6.jpg') }}" alt="">
                                    </div>
                                    <a href="gallery.html" class="add-gallery">+</a>
                                </div>
                                <div class="gallery-item item-7">
                                    <div class="image">
                                        <img class="lazyload" src="{{ asset('Front/images/widget/gallery-item-7.jpg') }}"
                                            data-src="{{ asset('Front/images/widget/gallery-item-7.jpg') }}" alt="">
                                    </div>
                                    <a href="gallery.html" class="add-gallery">+</a>
                                </div>
                                <div class="gallery-item item-8">
                                    <div class="image">
                                        <img class="lazyload" src="{{ asset('Front/images/widget/gallery-item-8.jpg') }}"
                                            data-src="{{ asset('Front/images/widget/gallery-item-8.jpg') }}" alt="">
                                    </div>
                                    <a href="gallery.html" class="add-gallery">+</a>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content-inner">
                            <div class="wg-gallery">
                                <div class="gallery-item item-1">
                                    <div class="image">
                                        <img class="lazyload" src="{{ asset('Front/images/widget/gallery-item-1.jpg') }}"
                                            data-src="{{ asset('Front/images/widget/gallery-item-1.jpg') }}" alt="">
                                    </div>
                                    <a href="gallery.html" class="add-gallery">+</a>
                                </div>
                                <div class="gallery-item item-2">
                                    <div class="image">
                                        <img class="lazyload" src="{{ asset('Front/images/widget/gallery-item-2.jpg') }}"
                                            data-src="{{ asset('Front/images/widget/gallery-item-2.jpg') }}" alt="">
                                    </div>
                                    <a href="gallery.html" class="add-gallery">+</a>
                                </div>
                                <div class="gallery-item item-3">
                                    <div class="image">
                                        <img class="lazyload" src="{{ asset('Front/images/widget/gallery-item-3.jpg') }}"
                                            data-src="{{ asset('Front/images/widget/gallery-item-3.jpg') }}" alt="">
                                    </div>
                                    <a href="gallery.html" class="add-gallery">+</a>
                                </div>
                                <div class="gallery-item item-4">
                                    <div class="image">
                                        <img class="lazyload" src="{{ asset('Front/images/widget/gallery-item-4.jpg') }}"
                                            data-src="{{ asset('Front/images/widget/gallery-item-4.jpg') }}" alt="">
                                    </div>
                                    <a href="gallery.html" class="add-gallery">+</a>
                                </div>
                                <div class="gallery-item item-5">
                                    <div class="image">
                                        <img class="lazyload" src="{{ asset('Front/images/widget/gallery-item-5.jpg') }}"
                                            data-src="{{ asset('Front/images/widget/gallery-item-5.jpg') }}" alt="">
                                    </div>
                                    <a href="gallery.html" class="add-gallery">+</a>
                                </div>
                                <div class="gallery-item item-6">
                                    <div class="image">
                                        <img class="lazyload" src="{{ asset('Front/images/widget/gallery-item-6.jpg') }}"
                                            data-src="{{ asset('Front/images/widget/gallery-item-6.jpg') }}" alt="">
                                    </div>
                                    <a href="gallery.html" class="add-gallery">+</a>
                                </div>
                                <div class="gallery-item item-7">
                                    <div class="image">
                                        <img class="lazyload" src="{{ asset('Front/images/widget/gallery-item-7.jpg') }}"
                                            data-src="{{ asset('Front/images/widget/gallery-item-7.jpg') }}" alt="">
                                    </div>
                                    <a href="gallery.html" class="add-gallery">+</a>
                                </div>
                                <div class="gallery-item item-8">
                                    <div class="image">
                                        <img class="lazyload" src="{{ asset('Front/images/widget/gallery-item-8.jpg') }}"
                                            data-src="{{ asset('Front/images/widget/gallery-item-8.jpg') }}" alt="">
                                    </div>
                                    <a href="gallery.html" class="add-gallery">+</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- /.Main-content -->
@endsection