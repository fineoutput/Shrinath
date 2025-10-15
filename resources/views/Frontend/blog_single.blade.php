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
                                    {{$blog->title ?? ''}}
                                </h3>
                                <div class="entry-meta">
                                  
                                </div>
                                <div class="entry-image">
                                    <img class="lazyload" src="{{ asset($blog->profile_image) }}"
                                        data-src="{{ asset($blog->profile_image) }}" alt="">
                                </div>
                                <p class="text text-1">
                                   {!! $blog->description !!}
                                </p>
                                <p class="text text-2">
                                   
                                </p>
                               @php
    if ($blog->video) {
        $maze = $blog->profile_image; // optional fallback
    } else {
        $maze = $blog->profile_image;
    }
@endphp

<div class="entry-video">
    <div class="video-wrap wow fadeInUp" data-wow-delay="0s">
        <img class="lazyload" 
             data-src="{{ asset($maze) }}" 
             src="{{ asset($maze) }}" 
             alt="{{ $blog->title ?? 'Blog image' }}">
        @if($blog->video)
            <a href="{{ asset($blog->video) }}" class="style-icon-play popup-youtube">
                <i class="fa-solid fa-play"></i>
                <div class="wave"></div>
                <div class="wave-1"></div>
            </a>
        @endif
    </div>
</div>

                                   
                                </div>
                              
                                
                               
                               
                                <div class="splide entry-image-2" id="image-slider">
                                    
                                @php
                                    // Decode the image JSON
                                    $images = json_decode($blog->images, true);
                                @endphp

                                <div class="splide__track">
                                    <ul class="splide__list">
                                             @foreach(json_decode($blog->image, true) as $key => $img)
                                                <li class="splide__slide">
                                                    <div class="image img-{{ $key + 1 }} wow fadeInUp" data-wow-delay="0.{{ $key }}s">
                                                        <img class="lazyload revoior"
                                                            data-src="{{ asset($img) }}"
                                                            src="{{ asset($img) }}"
                                                            alt="Blog Image {{ $key + 1 }}">
                                                    </div>
                                                </li>
                                            @endforeach
                                           
                                    </ul>
                                </div>


                                </div>
                               
                               
                               
                                {{-- <div class="post-comment-wrap" id="post-comment-wrap">
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
                                </div> --}}
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div><!-- /.Main-content -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    new Splide('#image-slider', {
      type: 'loop',
      perPage: 3,
      autoplay: true,
      pagination: true,
      arrows: true,
      gap: '1rem', // space between slides
      breakpoints: {
        1200: {
          perPage: 3, // large screens
        },
        992: {
          perPage: 2, // tablets
        },
        768: {
          perPage: 1, // mobile landscape
        },
        480: {
          perPage: 1, // small mobile
          arrows: false, // hide arrows on very small screens
        },
      },
    }).mount();
  });
</script>

@endsection