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

                                @foreach ($gallery as $index => $value)
                                 <div class="gallery-item item-{{$index+1}} wow fadeInUp" data-wow-delay="0.{{$index+1}}s">
                                    <div class="image">
                                        <img class="lazyload" src="{{ asset($value->image ?? '') }}"
                                            data-src="{{ asset($value->image ?? '') }}" alt="">
                                    </div>
                                    <a href="gallery.html" class="add-gallery">+</a>
                                </div>
                                @endforeach
                           

                                {{-- <div class="gallery-item item-2 wow fadeInUp" data-wow-delay="0.1s">
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
                                </div> --}}
                              
                                
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- /.Main-content -->
@endsection