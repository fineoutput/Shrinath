@extends('Frontend.common.app')
@section('title','Blog Full Width')
@section('content')
    <!-- Page-title -->
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
        /* background: #fff; */
        border-radius: 10px;
    }
    #loading{
        display: none;
    }
    .revoior{
        height: 300px;
        width: 100%;
        object-fit: cover;
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
                       
                        <h1 class="title">
                            Confidentiality & Privacy
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



<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>Confidentiality & Privacy</h3>
            <p>At ShreenathSpices, your trust is our greatest asset. We are committed to safeguarding all information you share with us, whether you are a customer, dealer, distributor, or business partner.</p>
            <div class="sitnemane">
                <p><b>Data Collection:</b> We may collect details such as name, contact info, business details, and order history to ensure smooth operations.</li>
                <p><b>Use of Information:</b> Used solely for services, processing orders, and compliance with regulations.</li>
                <p><b>Confidential Handling:</b> We never disclose, sell, or rent data except by law or explicit consent.</li>
                <p><b>Security Measures:</b> Digital and offline processes follow strict confidentiality protocols.</li>
                </div>
            <p>Your privacy is at the core of how we do business—because strong relationships are built on trust.</p>
            </div>
        </div>
    </div>
</section>
    @endsection