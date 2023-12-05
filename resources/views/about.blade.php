@extends("base")
@section("content")
<!--===============PAGE CONTENT==============-->
<div id="content" class="site-content">
    <section class="about-section bg_light_1">
        <!--===============spacing==============-->
        <div class="pd_top_90"></div>
        <!--===============spacing==============-->
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-12 mb-5 mb-lg-5 mb-xl-0">
                    <div class="image_boxes style_one">
                        <div class="image one">
                            <img src="{{ asset('/frontend/assets/images/about/successful-happy-business-team.webp') }}" class="img" alt="image">
                        </div>
                        <div class="image two">
                            <img src="{{ asset('/frontend/assets/images/projects/arrows-with-copy-space.webp') }}" class="img" alt="image">
                            <!--<div class="video_box">
                                <a href="#" class="lightbox-image"><i class="icon-play"></i></a>
                            </div>-->
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-12 pd_left_40">
                    <div class="pd_left_20">
                        <div class="title_all_box style_two  dark_color">
                            <div class="title_sections two">
                                <div class="before_title">PPF Kuwait</div>
                                <h2>About Us</h2>
                                <div class="description_box">
                                    <p>{!! $about->description !!}</p>
                                </div>
                            </div>
                            <!--===============spacing==============-->
                            <div class="mr_bottom_20"></div>
                            <!--===============spacing==============-->
                        </div>

                        <!--===============spacing==============-->
                        <div class="mr_bottom_30"></div>
                        <!--===============spacing==============-->

                        <!--===============spacing==============-->
                        <div class="mr_bottom_30"></div>
                        <!--===============spacing==============-->
                        <div class="theme_btn_all color_one">
                            <a href="/contact" target="_blank" rel="nofollow" class="theme-btn three">Contact us</a>
                        </div>
                        <!--===============spacing==============-->
                        <div class="mr_bottom_20"></div>
                        <!--===============spacing==============-->
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-6 col-lg-6 mb-5 mb-lg-0 mb-xl-0">
                    <div class="icon_box_all style_one">
                        <div class="icon_content icon_centers">
                            <div class="icon">
                                <span class=" icon-line-chart"></span>
                            </div>
                            <div class="txt_content">
                                <h3>
                                    <a href="#" target="_blank" rel="nofollow">Mission</a>
                                </h3>
                                <p>{!! $about->mission !!}</p>
                            </div>
                        </div>
                    </div>
                    <!--===============spacing==============-->
                    <div class="mr_bottom_20"></div>
                    <!--===============spacing==============-->
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="icon_box_all style_one">
                        <div class="icon_content icon_centers ">
                            <div class="icon">
                                <span class="icon-bow-and-arrow"></span>
                            </div>
                            <div class="txt_content">
                                <h3><a href="#" target="_blank" rel="nofollow">Vision</a></h3>
                                <p>{!! $about->vision !!}</p>
                            </div>
                        </div>
                    </div>
                    <!--===============spacing==============-->
                    <div class="mr_bottom_20"></div>
                    <!--===============spacing==============-->
                </div>
            </div>
        </div>
        <!--===============spacing==============-->
        <div class="pd_bottom_70"></div>
        <!--===============spacing==============-->
    </section>
</div>
<!--===============PAGE CONTENT END==============-->
@endsection