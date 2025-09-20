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
                            Legal Information

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
                 <h3>Legal Information</h3>
            <p>This website, its content, and operations are owned by ShreenathSpices.</p>
            <div>
                <p><b>Intellectual Property:</b> All trademarks, brand names, packaging designs, and product images belong exclusively to ShreenathSpices.</li>
                <p><b>Business Compliance:</b> We comply with Indian trade, food safety, and FMCG regulations with all necessary licenses.</li>
                <p><b>Price & Deal Approvals:</b> Only authorized representatives can approve quotations and deals.</li>
                <p><b>Website Usage:</b> Users agree not to misuse any content or services.</li>
                <p><b>Disclaimer:</b> While we strive for accuracy, ShreenathSpices is not liable for typographical errors, outdated details, or external links.</li>
            </div>
            <p>We stand committed to conducting business with transparency, compliance, and respect for the law.</p>
            </div>
        </div>
    </div>
</section>
    @endsection