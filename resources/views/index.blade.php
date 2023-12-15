@extends("base")
@section("content")
<!--===============PAGE CONTENT==============-->
<div id="content" class="site-content">
    <!---slider-->
    <section class="slider style_four nav_position_one">
        <div class="owl-carousel owl_nav_block owl_dots_none theme_carousel owl-theme" data-options='{"loop": true, "margin": 0, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 7000, "smartSpeed": 1800, "responsive":{ "0" :{ "items": "1" }, "768" :{ "items" : "1" } , "1000":{ "items" : "1" }}}'>
            @forelse($sliders as $key => $item)
            <div class="slide-item-content">
                <div class="slide-item content_{{ ($key == 0 || $key == 2 || $key == 4) ? 'left' : 'right' }}">
                    <div class="image-layer" style="background-image:url( '{{ asset($item->image) }}' )">
                    </div>
                    <div class="auto-container">
                        <div class="row">
                            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                <div class="slider_content pd_top_180 pd_bottom_200">
                                    <h6 class="animate_up d-inline-block"> Our Vision to Grow Better </h6>
                                    <h1 class="animate_left"> Inspired <br> Performance </h1>
                                    <p class="description animate_right"> Duty obligations of business it will
                                        frequently occur that pleasures <br> have to be repudiated and annoyances
                                        accepted. </p>
                                    <div class="button_all animate_down">
                                        <a href="#" target="_blank" rel="nofollow" class="theme-btn one  animated">Read
                                            More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            @endforelse
        </div>
    </section>
    <!---slider-end--->
    <!--===============spacing==============-->
    <div class="pd_top_80"></div>
    <!--===============spacing==============-->
    <section class="image_grid_content style_one image_covered">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-3">
                    <h2>Events</h2>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="mg_image_box">
                        <div class="image_box">
                            <img decoding="async" src="{{ asset('frontend/assets/images/home/organization.jpg') }}" class="img" alt="image">
                            <a href="{{ route('events') }}" class="ab_link">
                                <span class="icon-right-arrow-long"></span>
                            </a>
                        </div>
                        <div class="content">
                            <h2><a href="{{ route('events') }}">View</a></h2>
                            <div class="tag">Upcoming Events</div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="mg_image_box">
                        <div class="image_box">
                            <img decoding="async" src="{{ asset('frontend/assets/images/home/completed.webp') }}" class="img" alt="image">
                            <a href="{{ route('events') }}" class="ab_link">
                                <span class="icon-right-arrow-long"></span>
                            </a>
                        </div>
                        <div class="content">
                            <h2><a href="{{ route('events') }}">View</a></h2>
                            <div class="tag">Completed Events</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="image_grid_content style_one image_covered">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="mb-3">
                        <h2>Galleries</h2>
                    </div>
                    <div class="mg_image_box">
                        <div class="image_box">
                            <img decoding="async" src="{{ asset('frontend/assets/images/home/gallery.webp') }}" class="img" alt="image">
                            <a href="{{ route('galleries') }}" class="ab_link">
                                <span class="icon-right-arrow-long"></span>
                            </a>
                        </div>
                        <div class="content">
                            <h2><a href="{{ route('galleries') }}">View</a></h2>
                            <div class="tag">Galleries</div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="mb-3">
                        <h2>Publications</h2>
                    </div>
                    <div class="mg_image_box">
                        <div class="image_box">
                            <img decoding="async" src="{{ asset('frontend/assets/images/home/webinar.jpg') }}" class="img" alt="image">
                            <a href="{{ route('publications') }}" class="ab_link">
                                <span class="icon-right-arrow-long"></span>
                            </a>
                        </div>
                        <div class="content">
                            <h2><a href="{{ route('publications') }}">View</a></h2>
                            <div class="tag">Publications</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="related_post">
                    <div class="title_sections_inner">
                        <h2>Advertisements</h2>
                    </div>
                    <!-- Swiper -->

                    <div class="swiper-container" data-swiper='{
                                       "loop": true,
                                       "autoplay": {
                                         "delay": 5000
                                       },
                                       "speed": 1000,
                                       "centeredSlides": false,
                                       "slidesPerView": 2,
                                       "spaceBetween": 30,
                                       "pagination": {
                                         "el": ".swiper-pagination",
                                         "clickable": true
                                       },
                                       "navigation": {
                                         "nextEl": ".related-button-next",
                                         "prevEl": ".related-button-prev"
                                       },
                                       "breakpoints": {
                                          "1200": {
                                             "slidesPerView": 2 
                                            },
                                          "1024": {
                                           "slidesPerView": 2 
                                          },
                                         "768": {
                                           "slidesPerView": 2 
                                         },
                                         "576": {
                                           "slidesPerView": 1 
                                         }
                                       }
                                     }'>
                        <div class="swiper-wrapper">
                            @forelse($ads as $key =>$item)
                            <div class="swiper-slide">
                                <div class="news_box default_style list_view normal_view clearfix has_images">
                                    <div class="image img_hover-1">
                                        <img src="{{ asset($item->image) }}" class="img-fluid" alt="img">
                                        <a href="{{ ($item->url) ?? '#' }}" class="categories" target="_blank">
                                            <i class="icon-folder"></i>{{ $item->name }}
                                        </a>
                                    </div>
                                    <div class="content_box">
                                        <div class="date">
                                            <span class="date_in_number">Advertisement</span>
                                        </div>
                                        <div class="source">
                                            <h2 class="title"><a href="{{ route('event.single', encrypt($item->id)) }}" rel="bookmark">{!! $item->description !!}</a></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                    <div class="arrow_related">
                        <div class="related-button-prev">
                            <i class="fa fa-angle-left"></i>
                        </div>
                        <div class="related-button-next">
                            <i class="fa fa-angle-right"></i>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>
</div>
<!--===============PAGE CONTENT END==============-->
@endsection