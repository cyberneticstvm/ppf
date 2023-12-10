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
                            <img decoding="async" src="{{ $events->where('status', 'active')->take(1)->first()->image ? asset($events->where('status', 'active')->take(1)->first()->image) : asset('frontend/assets/images/cal-to-action-2.jpg')}}" class="img" alt="image">
                            <a href="#" class="ab_link">
                                <span class="icon-right-arrow-long"></span>
                            </a>
                        </div>
                        <div class="content">
                            <h2><a href="#">View</a></h2>
                            <div class="tag">Upcoming Events</div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="mg_image_box">
                        <div class="image_box">
                            <img decoding="async" src="{{ asset('frontend/assets/images/cal-to-action-2.jpg') }}" class="img" alt="image">
                            <a href="#" class="ab_link">
                                <span class="icon-right-arrow-long"></span>
                            </a>
                        </div>
                        <div class="content">
                            <h2><a href="#">View</a></h2>
                            <div class="tag">Completed Events</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!--===============PAGE CONTENT END==============-->
@endsection