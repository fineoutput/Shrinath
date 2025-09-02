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
<div class="page-title page-shop-detail  ">
    <div class="rellax" data-rellax-speed="5">
        <img src="{{ asset('Front/images/page-title/shop-detail.jpg') }}" alt="">
    </div>
    <div class="content-wrap">
        <div class="tf-container w-1290">
            <div class="row">
                <div class="col-lg-12">
                    <div class="content center">
                        <p class="sub-title mt-5">
                            Buy Health Foods At Our Store
                        </p>
                        <h1 class="title">
                            Shop products
                        </h1>
                        <div class="icon-img">
                            <img src="{{ asset('Front/images/item/line-throw-title.png') }}" alt="">
                        </div>
                        <div class="breadcrumb">
                            <a href="{{route('/')}}">Home</a>
                            <div class="icon">
                                <i class="icon-arrow-right1"></i>
                            </div>
                            <a href="javascript:void(0)"> Shop Products </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="img-item item-2">
        <img src="{{ asset('Front/images/item/grass-6.png') }}" alt="">
    </div>
</div><!-- /.Page-title -->

<!-- Main-content -->

<div class="main-content page-shop-product pt-0">
    <div class="tf-container">
        <div class="row">
            <div class="col-lg-4">
                <div class="tf-sidebar">
                   
                    
                    
                    <div class="sidebar-item sb-latest-new">
                        <h5 class="sb-title">
                            {{-- Popular Products --}}
                            Category
                        </h5>
                        <div class="sb-content sb-popular-product">
                            <ul class="latest-list style-2">

                              @foreach ($category as $value)
                                <li class="item img-hover">
                                    <div class="image hover-item">
                                        <img src="{{ asset($value->image) }}" alt="">
                                    </div>
                                    <div class="content">
                                        <a href="{{ route('our_products', $value->id) }}" class="name font-worksans fw-5 hover-text-4 {{ $selected_category_id == $value->id ? 'text-primary' : '' }}">
                                            {{ $value->category_name ?? '' }}
                                        </a>
                                    </div>
                                </li>
                            @endforeach
 
                            </ul>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="col-lg-8">
                <div class="tf-shop-control" id="tf-shop-control">
                    <div class="control-left">
                        <div class="btn-view view-grid">
                            <i class="fa-solid fa-grip"></i>
                        </div>
                        <div class="btn-view view-list">
                            <i class="fa-solid fa-list"></i>
                        </div>
                        <p class="font-worksans fw-5">
                            Showing 1–15 of 30 results
                        </p>
                    </div>
                    <div class="control-right">
                        <div class="tf-control-sorting">
                            <div class="tf-dropdown-sort">
                                <div class="tf-btn style-2" data-bs-toggle="dropdown">
                                    <span class="text-sort-value">Default sorting</span>
                                    <i class="icon-arrow_down"></i>
                                </div>
                                <div class="dropdown-menu ">
                                    <div class="select-item ">
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
                                    <div class="select-item ">
                                        <span class="text-value-item">
                                            All Post
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               <div class="wg-shop-content">
    <div class="grid-layout-3 gap-30-20">
        @foreach ($product as $value)
            <div class="card-product style-2 wow fadeInUp" data-wow-delay="0s">
                <div class="image">
                    <img src="{{ asset($value->image_1 ?? '') }}" data-src="{{ asset($value->image_1 ?? '') }}" alt=""
                        class="lazyload">
                </div>
                <a href="{{ route('prod_detail', $value->id) }}" class="name-product font-worksans hover-text-4">
                    {{$value->name ?? ''}}
                </a>
                <div class="pricing-star">
                    <div class="price-wrap">
                        <span class=" price-2">₹ {{ $value->price ?? ''}}</span>
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
        @endforeach
    </div>
</div>

<!-- Pagination -->
<div class="tf-page-pagination">
    @if ($product->hasPages())
        <ul>
            {{-- Previous Page Link --}}
            @if ($product->onFirstPage())
                <li><a href="javascript:void(0)" aria-disabled="true"><i class="fa fa-angle-left"></i></a></li>
            @else
                <li><a href="{{ $product->previousPageUrl() }}"><i class="fa fa-angle-left"></i></a></li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($product->getUrlRange(1, $product->lastPage()) as $page => $url)
                <li>
                    <a href="{{ $url }}" class="{{ $product->currentPage() == $page ? 'active' : '' }}">
                        {{ $page }}
                    </a>
                </li>
            @endforeach

            {{-- Next Page Link --}}
            @if ($product->hasMorePages())
                <li><a href="{{ $product->nextPageUrl() }}"><i class="fa fa-angle-right"></i></a></li>
            @else
                <li><a href="javascript:void(0)" aria-disabled="true"><i class="fa fa-angle-right"></i></a></li>
            @endif
        </ul>
    @endif
</div>
            </div>
        </div>
    </div>

</div>




@endsection
