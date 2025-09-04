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
        background: #fff;
        border-radius: 10px;
    }
    #loading{
        display: none;
    }
</style>
  <div class="page-title page-blog-full-w mt-5">
            <div class="rellax" data-rellax-speed="5">
                <img src="images/page-title/blog-full-w.jpg" alt="">
            </div>
            <div class="content-wrap">
                <div class="tf-container w-1290">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="content">
                                <p class="sub-title">
                                    Read The Latest News From Us
                                </p>
                                <h1 class="title">
                                    Blog Single
                                </h1>
                                <div class="icon-img">
                                    <img src="images/item/line-throw-title.png" alt="">
                                </div>
                                <div class="breadcrumb">
                                    <a href="index.html">Home</a>
                                    <div class="icon">
                                        <i class="icon-arrow-right1"></i>
                                    </div>
                                    <a href="blog-right-sidebar.html"> Blog Right Sidebar</a>
                                    <div class="icon">
                                        <i class="icon-arrow-right1"></i>
                                    </div>
                                    <a href="javascript:void(0)">How to Care for Cows to have the Best Quality Meat</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="img-item item-2">
                <img src="images/item/grass.png" alt="">
            </div>
        </div><!-- /.Page-title -->

        <!-- Main-content -->
        <div class="main-content page-blog-single">
            <div class="blog-single">
                <div class="tf-container w-1290">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="content">
                                <h3 class="title-name fw-bold">
                                    How to Care for Cows to have the Best Quality Meat
                                </h3>
                                <div class="entry-meta">
                                  
                                </div>
                                <div class="entry-image">
                                    <img class="lazyload" src="{{ asset('Front/images/blog/blog-1.jpg') }}"
                                        data-src="{{ asset('Front/images/blog/blog-1.jpg') }}" alt="">
                                </div>
                                <p class="text text-1">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ut aliquam mauris.
                                    Maecenas porta odio lorem, in aliquet
                                    diam pellentesque vel. Donec pulvinar mi ipsum, a eleifend est porta id. Ut rutrum,
                                    quam vestibulum placerat sodales, ex
                                    eros tincidunt ipsum, varius venenatis risus magna.Pellentesque imperdiet id velit
                                    eu lobortis. Praesent metus tellus,
                                    venenatis ac volutpat ut, blandit ut arcu.
                                </p>
                                <p class="text text-2">
                                    Nulla accumsan sapien purus, at ultrices eros sagittis at. Duis leo purus, gravida
                                    ut consequat in, hendrerit a neque.
                                    Sed nec placerat odio, ut ultrices magna. Etiam in ligula pulvinar, semper dolor eu,
                                    commodo lorem. In interdum neque
                                    libero, eget volutpat nibh commodo et.
                                </p>
                               
                                <div class="entry-video">
                                    <div class="video-wrap wow fadeInUp" data-wow-delay="0s">
                                        <img class="lazyload" data-src="{{ asset('Front/images/widget/video-wrap.jpg') }}"
                                            src="{{ asset('Front/images/widget/video-wrap.jpg') }}" alt="">
                                        <a href="https://www.youtube.com/watch?v=MLpWrANjFbI"
                                            class="style-icon-play popup-youtube">
                                            <i class="fa-solid fa-play"></i>
                                            <div class="wave"></div>
                                            <div class="wave-1"></div>
                                        </a>
                                    </div>
                                    <ul class="benefit-list wow fadeInUp" data-wow-delay="0.1s">
                                        <li>
                                            <p>Aenean ut pharetra metus convallis</p>
                                        </li>
                                        <li>
                                            <p>Etiam at lectus et neque viverra</p>
                                        </li>
                                        <li>
                                            <p>Mauris feugiat metus eget velit
                                            </p>
                                        </li>
                                        <li>
                                            <p>Vestibulum euismod rutrum
                                            </p>
                                        </li>
                                        <li>
                                            <p>Nunc tempus sem consequat lacus</p>
                                        </li>
                                        <li>
                                            <p>Nulla eget rhoncus erat</p>
                                        </li>
                                        <li>
                                            <p>Pellentesque vehicula volutpat leo vitae</p>
                                        </li>
                                    </ul>
                                </div>
                                <p class="text text-4">
                                    Aenean ut pharetra metus, convallis tincidunt erat. Aliquam vel justo neque. Etiam
                                    at lectus et neque viverra interdum
                                    eget nec enim. Nullam eu suscipit ligula. Aliquam at massa lobortis, vulputate
                                    tellus sit amet, mollis mauris. Mauris
                                    feugiat metus eget velit tempus, vitae finibus ligula egestas.
                                </p>
                                <div class="block-quote style-3 wow fadeInUp" data-wow-delay="0s">
                                    <div class="has-border">
                                        <div class="quote">
                                            <div class="icon style-circle">
                                                <i class="icon-quote"></i>
                                            </div>
                                            <p class="font-snowfall cite">
                                                A sustainable smart city embodies the fusion of technological
                                                advancements
                                                with
                                                a
                                                commitment to minimizing environmental
                                                impact. These cities harness the power of digital innovation.
                                            </p>
                                        </div>
                                        <div class="bot">
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
                                <p class="title title-2 fw-bold font-worksans">
                                    A range of question types which test a number.
                                </p>
                                <p class="text text-5">
                                    Nulla accumsan sapien purus, at ultrices eros sagittis at. Duis leo purus, gravida
                                    ut consequat in, hendrerit a neque.
                                    Sed nec placerat odio, ut ultrices magna. Etiam in ligula pulvinar, semper dolor eu,
                                    commodo lorem. In interdum neque
                                    libero, eget volutpat nibh commodo et.
                                </p>
                                <ul class="opinion-list">
                                    <li>
                                        <p>
                                            Nunc tempus sem consequat lacus cursus, in laoreet urna molestie. Quisque
                                            interdum egestas

                                        </p>
                                    </li>
                                    <li>
                                        <p>
                                            Mauris sollicitudin consectetur nulla eu fringilla. Praesent id hendrerit
                                            urna

                                        </p>
                                    </li>
                                    <li>
                                        <p>
                                            Pellentesque quam dolor, posuere id mollis et, rutrum sed est. In vulputate
                                            neque

                                        </p>
                                    </li>
                                </ul>
                                <div class="splide entry-image-2" id="image-slider">
  <div class="splide__track">
    <ul class="splide__list">
      <li class="splide__slide">
        <div class="image img-1 wow fadeInUp" data-wow-delay="0s">
          <img class="lazyload"
               data-src="{{ asset('Front/images/widget/blog-single-1.jpg') }}"
               src="{{ asset('Front/images/widget/blog-single-1.jpg') }}"
               alt="">
        </div>
      </li>
      <li class="splide__slide">
        <div class="image img-2 wow fadeInUp" data-wow-delay="0.1s">
          <img class="lazyload"
               data-src="{{ asset('Front/images/widget/blog-single-2.jpg') }}"
               src="{{ asset('Front/images/widget/blog-single-2.jpg') }}"
               alt="">
        </div>
      </li>
      <li class="splide__slide">
        <div class="image img-2 wow fadeInUp" data-wow-delay="0.1s">
          <img class="lazyload"
               data-src="{{ asset('Front/images/widget/blog-single-2.jpg') }}"
               src="{{ asset('Front/images/widget/blog-single-2.jpg') }}"
               alt="">
        </div>
      </li>
    </ul>
  </div>
</div>
                                <p class="text text-6">
                                    Aenean ut pharetra metus, convallis tincidunt erat. Aliquam vel justo neque. Etiam
                                    at lectus et neque viverra interdum
                                    eget nec enim. Nullam eu suscipit ligula. Aliquam at massa lobortis, vulputate
                                    tellus sit amet, mollis mauris. Mauris
                                    feugiat metus eget velit tempus, vitae finibus ligula egestas.
                                </p>
                               
                               
                                <div class="post-comment-wrap" id="post-comment-wrap">
                                    <h2 class="fw-bold font-worksans wow fadeInUp" data-wow-delay="0s">
                                        Leave a Comment
                                    </h2>
                                    <p class="sub-title font-nunito">
                                        Your email address will not be published. Required fields are marked *
                                    </p>
                                    <form action="#" class="form-post-comment">
                                        <div class="cols ">
                                            <fieldset>
                                                <input type="text" placeholder="Name*" required>
                                            </fieldset>
                                            <fieldset>
                                                <input type="email" placeholder="Email*" required>
                                            </fieldset>
                                        </div>
                                        <div class="cols field-text">
                                            <textarea name="message" id="message" placeholder="Message..."
                                                required></textarea>
                                        </div>
                                        <div class="flex justify-center">
                                            <button type="submit" class="tf-btn">
                                                <span class="text-style">
                                                    Post Comment
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
            </div>
        </div><!-- /.Main-content -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    new Splide('#image-slider', {
      type   : 'loop',
      perPage: 3,
      autoplay: true,
      pagination: true,
      arrows: true,
    }).mount();
  });
</script>
@endsection