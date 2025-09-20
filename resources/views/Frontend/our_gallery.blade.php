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
        /* background: #fff; */
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
                            <a href="{{route('/')}}">Home</a>
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
                        @foreach ($GalleryCategory as $index => $value)
                            <li class="item {{ $index == 0 ? 'active' : '' }}">
                                <a href="javascript:void(0)" 
                                class="btn-tab" 
                                data-category-id="{{ $value->id }}">
                                {{ $value->title ?? '' }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="widget-content-tab">
                    <div class="widget-content-inner active">
                        <div class="row">
                            @foreach ($gallery as $index => $value)
                                <div class="col-lg-4 item-{{$index+1}} wow fadeInUp" 
                                    data-wow-delay="0.{{$index+1}}s" 
                                    data-category-id="{{ $value->category_id }}">
                                    
                                    <div class="image" style="height: 350px;">
                                        <img style="height: 100%; border-radius: 30px;" class="lazyload" 
                                            src="{{ asset($value->image ?? '') }}"
                                            data-src="{{ asset($value->image ?? '') }}" 
                                            alt="">
                                    </div>
                                    <a href="{{route('our_gallery')}}" class="add-gallery">+</a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div><!-- /.Main-content -->


<script>
document.addEventListener('DOMContentLoaded', function () {
    const tabs = document.querySelectorAll('.btn-tab');
    const galleryItems = document.querySelectorAll('.gallery-item');

    tabs.forEach(tab => {
        tab.addEventListener('click', function () {
            const categoryId = this.getAttribute('data-category-id');

            // Remove active class from all tabs
            tabs.forEach(t => t.parentElement.classList.remove('active'));

            // Add active class to current tab
            this.parentElement.classList.add('active');

            // Show/Hide gallery items based on category
            galleryItems.forEach(item => {
                if (item.getAttribute('data-category-id') === categoryId) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });

    // Trigger click on first tab to show default category images
    if (tabs.length > 0) {
        tabs[0].click();
    }
});
</script>
@endsection