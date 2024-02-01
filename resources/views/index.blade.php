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
                                    <h6 class="animate_up d-inline-block"> {!! $item->top_label !!} </h6>
                                    <h1 class="animate_left"> {!! $item->heading !!} </h1>
                                    <p class="description animate_right"> {!! $item->description !!} </p>
                                    <div class="button_all animate_down">
                                        <a href="{{ $item->button_url }}" rel="nofollow" class="theme-btn one  animated" target="{{ $item->target }}">{{ $item->button_label }}</a>
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
    @if($adt)
    <!--===============spacing==============-->
    <div class="pd_top_80"></div>
    <!--===============spacing==============-->
    <section>
        <div class="container mt-5">
            <div class="row">
                <div class="col">
                    <a href="{{ $adt->url ?? '#' }}" target="_blank"><img src="{{ ($adt && $adt->image) ? asset($adt->image) : '' }}" class="img-fluid" /></a>
                </div>
            </div>
        </div>
    </section>
    @endif
    <!--===============spacing==============-->
    <div class="pd_top_80"></div>
    <!--===============spacing==============-->
    <section class="image_grid_content style_one image_covered">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <h4>Upcoming Events</h4>
                    </div>
                    <div class="mg_image_box">
                        <div class="image_box">
                            <img decoding="async" src="{{ asset('frontend/assets/images/home/ue.webp') }}" class="img" alt="image">
                            <a href="{{ route('events.all', encrypt(11)) }}" class="ab_link">
                                <span class="icon-right-arrow-long"></span>
                            </a>
                        </div>
                        <div class="content">
                            <h2><a href="{{ route('events.all', encrypt(11)) }}">Upcoming Events</a></h2>
                            <div class="tag"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <h4>completed Events</h4>
                    </div>
                    <div class="mg_image_box">
                        <div class="image_box">
                            <img decoding="async" src="{{ asset('frontend/assets/images/home/comp-eve.png') }}" class="img" alt="image">
                            <a href="{{ route('events') }}" class="ab_link">
                                <span class="icon-right-arrow-long"></span>
                            </a>
                        </div>
                        <div class="content">
                            <h2><a href="{{ route('events') }}">Completed Events</a></h2>
                            <div class="tag"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <h4>Benevolent Activities</h4>
                    </div>
                    <div class="mg_image_box">
                        <div class="image_box">
                            <img decoding="async" src="{{ asset('frontend/assets/images/home/benevolent.jpg') }}" class="img" alt="image">
                            <a href="{{ route('events.all', encrypt(15)) }}" class="ab_link">
                                <span class="icon-right-arrow-long"></span>
                            </a>
                        </div>
                        <div class="content">
                            <h2><a href="{{ route('events.all', encrypt(15)) }}">Benevolent Activities</a></h2>
                            <div class="tag"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="mb-3">
                        <h4>Galleries</h4>
                    </div>
                    <div class="mg_image_box">
                        <div class="image_box">
                            <img decoding="async" src="{{ asset('frontend/assets/images/home/gal.png') }}" class="img" alt="image">
                            <a href="{{ route('galleries') }}" class="ab_link">
                                <span class="icon-right-arrow-long"></span>
                            </a>
                        </div>
                        <div class="content">
                            <h2><a href="{{ route('galleries') }}">Galleries</a></h2>
                            <div class="tag"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="mb-3">
                        <h4>Publications</h4>
                    </div>
                    <div class="mg_image_box">
                        <div class="image_box">
                            <img decoding="async" src="{{ asset('frontend/assets/images/home/publication.jpg') }}" class="img" alt="image">
                            <a href="{{ route('publications') }}" class="ab_link">
                                <span class="icon-right-arrow-long"></span>
                            </a>
                        </div>
                        <div class="content">
                            <h2><a href="{{ route('publications') }}">Publications</a></h2>
                            <div class="tag"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="mb-3">
                        <h4>Competitions</h4>
                    </div>
                    <div class="mg_image_box">
                        <div class="image_box">
                            <img decoding="async" src="{{ asset('frontend/assets/images/home/competitions.webp') }}" class="img" alt="image">
                            <a href="{{ route('events.all', encrypt(4)) }}" class="ab_link">
                                <span class="icon-right-arrow-long"></span>
                            </a>
                        </div>
                        <div class="content">
                            <h2><a href="{{ route('events.all', encrypt(4)) }}">Competitions</a></h2>
                            <div class="tag"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container mt-5">
            <div class="row">
                <div class="col">
                    <a href="{{ $adb->url ?? '#' }}" target="_blank"><img src="{{ ($adb && $adb->image) ? asset($adb->image) : '' }}" class="img-fluid" /></a>
                </div>
            </div>
        </div>
    </section>
    <section class="mb-5">
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
                                             "slidesPerView": 4 
                                            },
                                          "1024": {
                                           "slidesPerView": 4 
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