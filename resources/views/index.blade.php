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
                    <div class="image-layer" style="background-image:url( '{{ url($item->image) }}' )">
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
    <section class="project-section bg_op_1" style="background: url(assets/images/projects/project-background-6-min.jpg);">
        <div class="medium-container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12">
                    <div class="heading mb-3">
                        <h2>Events</h2>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="project_caro_section carousel style_three ">
                        <div class="swiper-container" data-swiper='{
                                          "autoplay": {
                                            "delay": 6000
                                          },
                                          "freeMode": false,
                                          "loop": true,
                                          "speed": 1000,
                                          "centeredSlides": false,
                                          "slidesPerView": 4,
                                          "spaceBetween": 10,
                                          "pagination": {
                                            "el": ".swiper-pagination",
                                            "clickable": true
                                          },
                                          "breakpoints": {
                                             "1200": {
                                                "slidesPerView": 4
                                             },
                                             "1024": {
                                              "slidesPerView": 3 
                                             },
                                            "768": {
                                              "slidesPerView": 2 
                                            },
                                            "576": {
                                              "slidesPerView": 1 
                                            },
                                            "0": {
                                              "slidesPerView": 1 
                                            }
                                          }
                                        }'>
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="project_post style_nine">
                                        <div class="image">
                                            <img loading="lazy" width="999" height="665" src="../assets/images/projects/project-1-img.jpg" class="img-fluid" alt="img">
                                            <div class="image_zoom_box ">
                                                <a href="../assets/images/projects/project-1-img.jpg" data-fancybox="gallery"><span class="fa fa-plus zoom_icon"></span></a>
                                            </div>
                                        </div>
                                        <div class="project_caro_content">
                                            <p>Leadership</p>
                                            <h2 class="title_pro"><a href="#" rel="bookmark">Company Values &amp; The
                                                    Relationship</a></h2>
                                        </div>
                                    </div>
                                </div>
                                @forelse($events as $key => $item)
                                <div class="swiper-slide">
                                    <div class="project_post style_nine">
                                        <div class="image">
                                            <img width="746" height="497" src="{{ $item->image }}" class="img-fluid" alt="img">
                                            <div class="image_zoom_box ">
                                                <a href="{{ $item->image }}" data-fancybox="gallery"><span class="fa fa-plus zoom_icon"></span></a>
                                            </div>
                                        </div>
                                        <div class="project_caro_content">
                                            <p>{{ $item->category->name }}</p>
                                            <h2 class="title_pro"><a href="#" rel="bookmark">{{ $item->name }}</a></h2>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                @endforelse
                            </div>
                            <div class="p_pagination">
                                <div class="pswiper-pagination"></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!--===============spacing==============-->
    <div class="pd_bottom_80"></div>
    <!--===============spacing==============-->
    <!---newsteller--->
    <section class="newsteller style_one bg_dark_1">
        <!--===============spacing==============-->
        <div class="pd_top_40"></div>
        <!--===============spacing==============-->
        <div class="auto-container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12">
                    <div class="content">
                        <h2>Join Our Mailing List</h2>
                        <p>For receiving our news and updates in your inbox directly. </p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="item_scubscribe">
                        <div class="input_group">
                            <form class="mc4wp-form" method="post" data-name="Subscibe">
                                <div class="mc4wp-form-fields">
                                    <input type="email" name="EMAIL" placeholder="Your email address" required="">
                                    <input type="submit" value="Sign up">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--===============spacing==============-->
        <div class="pd_bottom_40"></div>
        <!--===============spacing==============-->
    </section>
    <!---newsteller end--->
</div>
<!--===============PAGE CONTENT END==============-->
@endsection