@extends("base")
@section("content")
<!--===============PAGE CONTENT==============-->
<div id="content" class="site-content">
    <!---slider-->
    <section class="slider style_four nav_position_one">
        <div class="owl-carousel owl_nav_block owl_dots_none theme_carousel owl-theme" data-options='{"loop": true, "margin": 0, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 7000, "smartSpeed": 1800, "responsive":{ "0" :{ "items": "1" }, "768" :{ "items" : "1" } , "1000":{ "items" : "1" }}}'>

            <div class="slide-item-content">
                <div class="slide-item content_left">
                    <div class="image-layer" style="background-image:url('{{ asset("/frontend/assets/images/sliders/slider-1-1.jpg") }}' )">
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
            <div class="slide-item-content">
                <div class="slide-item content_center">
                    <div class="image-layer" style="background-image:url(/frontend/assets/images/sliders/slider-1-2.jpg)">
                    </div>
                    <div class="auto-container">
                        <div class="row">
                            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                <div class="slider_content pd_top_180 pd_bottom_200">
                                    <h6 class="animate_up d-inline-block"> Hire the Best </h6>
                                    <h1 class="animate_left"> Hire Better, <br> Faster! </h1>
                                    <p class="description animate_right"> On the other hand, we denounce with
                                        righteous indignation and <br> dislike men who are so beguiled. </p>
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
            <div class="slide-item-content">
                <div class="slide-item content_right">
                    <div class="image-layer" style="background-image:url(/frontend/assets/images/sliders/slider-1-3.jpg)">
                    </div>
                    <div class="auto-container">
                        <div class="row">
                            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                <div class="slider_content pd_top_180 pd_bottom_200">
                                    <h6 class="animate_up d-inline-block"> Our Vision to Grow Better </h6>
                                    <h1 class="animate_left"> Countless <br> Happy Clients </h1>
                                    <p class="description animate_right"> These cases are perfectly simple and easy
                                        to distinguish. In a free <br> hour, when our power of choice is untrammelled.
                                    </p>
                                    <a href="#" target=_blank rel=nofollow class="theme-btn one  animated _zoomIn"> Read
                                        More </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!---slider-end--->
    <!---about us-->
    <section class="about_us_section" id="about">
        <!--===============spacing==============-->
        <div class="pd_top_100"></div>
        <!--===============spacing==============-->
        <div class="container pd_zero">
            <div class="row">
                <div class="col-xl-6 col-lg-12">
                    <div class="title_all_box style_one dark_color">
                        <div class="title_sections left">
                            <div class="before_title"> Intelligent </div>
                            <h2> Human Resources</h2>
                            <p> Our power of choice is untrammelled and when nothing prevents being able to do what we
                                like best every pleasure.</p>
                        </div>
                    </div>
                    <!--===============spacing==============-->
                    <div class="pd_bottom_20"></div>
                    <!--===============spacing==============-->
                    <div class="process_box style_one dark_color">
                        <div class="process_box_outer">
                            <div class="icon">
                                <span class=" icon-line-chart"></span>
                                <div class="number"> 01 </div>
                            </div>
                            <div class="content_box">
                                <h2>
                                    <a href="#" target="_blank" rel="nofollow">Claims of duty</a>
                                </h2>
                                <p> Certain circumstances seds owing to the claims duty ourighteous indignation and so
                                    beguiled.</p>
                            </div>
                        </div>
                    </div>
                    <div class="process_box style_one dark_color">
                        <div class="process_box_outer">
                            <div class="icon">
                                <span class=" icon-line-chart"></span>
                                <div class="number"> 02 </div>
                            </div>
                            <div class="content_box">
                                <h2>
                                    <a href="#" target="_blank" rel="nofollow"> Accepted always </a>
                                </h2>
                                <p> To take a trivial example, which of us ever undertakes get laborious physical
                                    exercise. </p>
                            </div>
                        </div>
                    </div>
                    <!--===============spacing==============-->
                    <div class="pd_bottom_30"></div>
                    <!--===============spacing==============-->
                    <div class="signature_wrapper">
                        <div class="row gutter_15px">
                            <div class="col-lg-4 col-md-12">
                                <div class="theme_btn_all color_one">
                                    <a href="#" target="_blank" rel="nofollow" class="theme-btn two">Read More</a>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-12">
                                <div class="extra_content authour_box dark_color">
                                    <div class="authour_box_content">
                                        <div class="image">
                                            <img src="{{ asset('/frontend/assets/images/signature.png') }}" class="img-fluid sign_image" alt="authour Image" />
                                        </div>
                                        <div class="text">
                                            <h6>Liam Oliver, <span>Founder &amp; CEO of Qetus</span>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--===============spacing==============-->
                    <div class="pd_bottom_30"></div>
                    <!--===============spacing==============-->
                    <div class="extra_content download_docs dark_color">
                        <div class="download_box_content">
                            <a href="#" download>Download our latest presentation <i class="icon-download-symbol"></i>
                            </a>
                        </div>
                    </div>
                    <!--===============spacing==============-->
                    <div class="pd_bottom_30"></div>
                    <!--===============spacing==============-->
                </div>
                <div class="col-xl-6 col-lg-12">

                    <div class="service_wrapper">
                        <div class="move_image_absolute">
                            <img src="{{ asset('/frontend/assets/images/about/about-1-1.png') }}" class="class-fluid" alt="image" />
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="service_box style_one dark_color">
                                    <div class="service_content">
                                        <div class="image ">
                                            <img src="{{ asset('/frontend/assets/images/service-illu-1.png') }}" class="img-fluid" alt="Service Image" />
                                        </div>
                                        <div class="content_inner">
                                            <h2>
                                                <a href="#"> Innovative HR Solutions </a>
                                            </h2>
                                            <p> Except too obtain some work advantages from it but whom has any rights.
                                            </p>
                                            <a href="#" class="read_more"> Read more </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <!--===============spacing==============-->
                                <div class="pd_top_100"></div>
                                <div class="pd_top_100 d_md_none"></div>
                                <!--===============spacing==============-->
                                <div class="service_box style_one dark_color last">
                                    <div class="service_content">
                                        <div class="image ">
                                            <img src="{{ asset('/frontend/assets/images/service-illu-1.png') }}" class="img-fluid" alt="Service Image" />
                                        </div>
                                        <div class="content_inner">
                                            <h2>
                                                <a href="#"> Leadership Development </a>
                                            </h2>
                                            <p> Actual teachings of the great explorer of the truth masters human
                                                happiness.
                                            </p>
                                            <a href="#" class="read_more"> Read more </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--===============spacing==============-->
        <div class="pd_bottom_80"></div>
        <!--===============spacing==============-->
    </section>
    <!---about us end-->
    <!---service--->
    <section class="service_section bg_light_1" id="service">
        <!--===============spacing==============-->
        <div class="pd_top_80"></div>
        <!--===============spacing==============-->
        <div class="container">
            <div class="row">
                <div class="title_all_box style_one text-center dark_color">
                    <div class="title_sections">
                        <div class="before_title">Leading</div>
                        <h2>Effective Solutions</h2>
                        <p>We work with your company to identify position requirements, implement recruitment
                            programs, and <br> initiate employee assessments that maximize recruitment efforts </p>
                    </div>
                </div>
                <!--===============spacing==============-->
                <div class="pd_bottom_20"></div>
                <!--===============spacing==============-->
                <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="service_box style_two dark_color">
                        <div class="service_content_two ">
                            <div class="content_inner" style="background-image:url(/frontend/assets/images/service/service-image-1.png);">
                                <div class="content_inner_in">
                                    <div class="icon_image">
                                        <img src="{{ asset('/frontend/assets/images/010-job-search.png') }}" class="img-fluid" alt="Service Image" />
                                    </div>
                                    <h2>
                                        <a href="#">Recruitment Process</a>
                                    </h2>
                                    <p>These cases are perfectly simple and easy to distinguish.</p>
                                    <ul>
                                        <li>Reducing Redundancy</li>
                                        <li>Uncovering Hidden Resources</li>
                                        <li>Increasing Company's Agility</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="ovarlay_link">
                                <a href="#">
                                    <i class="icon-right-arrow"></i>
                                </a>
                            </div>
                            <div class="overlay_content">
                                <h2>
                                    <a href="#">Recruitment Process</a>
                                </h2>
                                <p>These cases are perfectly simple and easy to distinguish.</p>
                            </div>
                        </div>
                    </div>
                    <!--===============spacing==============-->
                    <div class="mr_bottom_20"></div>
                    <!--===============spacing==============-->
                </div>
                <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="service_box style_two dark_color">
                        <div class="service_content_two  active_ser">
                            <div class="content_inner" style="background-image:url(/frontend/assets/images/service/service-image-2.png);">
                                <div class="content_inner_in">
                                    <div class="icon_image">
                                        <img src="{{ asset('/frontend/assets/images/service-ico-1.png') }}" class="img-fluid" alt="Service Image" />
                                    </div>
                                    <h2>
                                        <a href="#">Employee Relations</a>
                                    </h2>
                                    <p>Indignation sed dislike men who are beguiled and demoralized.</p>
                                    <ul>
                                        <li>
                                            Improving Communication
                                        </li>
                                        <li>
                                            Employee issue resolution
                                        </li>
                                        <li>
                                            Proper Documentation Process
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="ovarlay_link">
                                <a href="#">
                                    <i class="icon-right-arrow"></i>
                                </a>
                            </div>
                            <div class="overlay_content">
                                <h2>
                                    <a href="#">Employee Relations</a>
                                </h2>
                                <p>Indignation sed dislike men who are beguiled and demoralized.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!--===============spacing==============-->
                    <div class="mr_bottom_20"></div>
                    <!--===============spacing==============-->
                </div>
                <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="service_box style_two dark_color">
                        <div class="service_content_two ">
                            <div class="content_inner" style="background-image:url(/frontend/assets/images/service/service-image-3.png);">
                                <div class="content_inner_in">
                                    <div class="icon_image">
                                        <img src="{{ asset('/frontend/assets/images/service-ico-2.png') }}" class="img-fluid" alt="Service Image" />
                                    </div>
                                    <h2>
                                        <a href="#">Compliance Audits</a>
                                    </h2>
                                    <p>Prevents our being able too what get like best every pleasure.</p>
                                    <ul>
                                        <li>
                                            Handling of employment
                                        </li>
                                        <li>
                                            Greater retention rates
                                        </li>
                                        <li>
                                            A fully engaged workforce
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="ovarlay_link">
                                <a href="#">
                                    <i class="icon-right-arrow"></i>
                                </a>
                            </div>
                            <div class="overlay_content">
                                <h2>
                                    <a href="#">Compliance Audits</a>
                                </h2>
                                <p>Prevents our being able too what get like best every pleasure.</p>
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
    <!---service end-->
    <!---expertise--->
    <section class="expertise">
        <div class="area_of_expertise">
            <div class="simpleParallax">
                <img src="{{ asset('/frontend/assets/images/areaof-ecp-1.jpg') }}" class="cover-parallax" alt="image">
            </div>
            <div class="title_and_video">
                <div class="auto-container">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="video_box text-center">
                                <a href="https://www.youtube.com/embed/-VK0axfge4A" class="lightbox-image"><i class="icon-play"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-2"></div>
                        <div class="col-lg-6">
                            <div class="title_all_box style_one text-end">
                                <div class="title_sections">
                                    <h2>Create Meaningful Experiences for employees</h2>
                                    <p>Our power of choice is untrammelled and when nothing prevents our able to do what
                                        we like best every pleasure is to be welcomed and occur that pleasures have to be
                                        repudiated.</p>
                                </div>
                                <div class="theme_btn">
                                    <a href="service-default.html" class="theme-btn one">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="expertise">
                <div class="auto-container">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 expertise_box">
                            <div class="step_number">
                                <h1>01.</h1>
                            </div>
                            <h2 class="title"><a href="#">Payroll Management</a>
                            </h2>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 expertise_box">
                            <div class="step_number">
                                <h1>02.</h1>
                            </div>
                            <h2 class="title">
                                <a href="#">Employee Compensation</a>
                            </h2>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 expertise_box">
                            <div class="step_number">
                                <h1>03.</h1>
                            </div>
                            <h2 class="title">
                                <a href="#">Benefits Management</a>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!---expertise-end--->
    <!---process--->
    <section class="process" id="process">
        <!--===============spacing==============-->
        <div class="pd_top_80"></div>
        <!--===============spacing==============-->
        <div class="container">
            <div class="row">
                <div class="title_all_box style_one  text-center dark_color">
                    <div class="title_sections">
                        <div class="before_title">
                            The Steps of
                        </div>
                        <h2>Recruitment Process</h2>
                    </div>
                    <!--===============spacing==============-->
                    <div class="pd_bottom_30"></div>
                    <!--===============spacing==============-->
                </div>

                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="process_box style_two dark_color">
                        <div class="process_box_outer_two">
                            <div class="number">
                                Step 01
                            </div>
                            <div class="content_box clearfix">
                                <div class="icon">
                                    <div class="img">
                                        <img src="{{ asset('/frontend/assets/images/service-ico-3.png') }}" class="img-fluid svg_image" alt="icon png" />
                                    </div>
                                </div>
                                <h2><a href="#" target="_blank" rel="nofollow"> Identifiying the Needs</a></h2>
                            </div>
                            <p>Holds in these matters principles all selection right rejects.</p>
                            <a href="#" target="_blank" rel="nofollow" class="theme-btn two">Read more</a>
                        </div>
                    </div>
                    <!--===============spacing==============-->
                    <div class="mr_bottom_30"></div>
                    <!--===============spacing==============-->
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="process_box style_two dark_color">
                        <div class="process_box_outer_two">
                            <div class="number">
                                Step 02
                            </div>
                            <div class="content_box clearfix">
                                <div class="icon">
                                    <div class="img">
                                        <img src="{{ asset('/frontend/assets/images/process-icon-im-1.png') }}" class="img-fluid svg_image" alt="icon png" />
                                    </div>
                                </div>
                                <h2><a href="#" target="_blank" rel="nofollow"> Preparing a Job Description </a></h2>
                            </div>
                            <p> Frequently occur that's pleasures in have to repudiated.</p>
                            <a href="#" target="_blank" rel="nofollow" class="theme-btn two"> Read more </a>
                        </div>
                    </div>
                    <!--===============spacing==============-->
                    <div class="mr_bottom_30"></div>
                    <!--===============spacing==============-->
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="process_box style_two dark_color">
                        <div class="process_box_outer_two">
                            <div class="number">
                                Step 03
                            </div>
                            <div class="content_box clearfix">
                                <div class="icon">
                                    <div class="img">
                                        <img src="{{ asset('/frontend/assets/images/service-ico-2.png') }}" class="img-fluid svg_image" alt="icon png" />
                                    </div>
                                </div>
                                <h2><a href="#" target="_blank" rel="nofollow"> Find a Talented Candidate</a></h2>
                            </div>
                            <p> Fault with man who choose enjoy a annoying consequences. </p>
                            <a href="#" target="_blank" rel="nofollow" class="theme-btn two"> Read more </a>
                        </div>
                    </div>
                    <!--===============spacing==============-->
                    <div class="mr_bottom_30"></div>
                    <!--===============spacing==============-->
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="process_box style_two dark_color">
                        <div class="process_box_outer_two">
                            <div class="number">
                                Step 04
                            </div>
                            <div class="content_box clearfix">
                                <div class="icon">
                                    <div class="img">
                                        <img src="{{ asset('/frontend/assets/images/process-icon-im-2.png') }}" class="img-fluid svg_image" alt="icon png" />
                                    </div>
                                </div>
                                <h2><a href="#" target="_blank" rel="nofollow"> Screening and Shortlisting </a>
                                </h2>
                            </div>
                            <p> Holds in these matters principles all selection right rejects.</p>
                            <a href="#" target="_blank" rel="nofollow" class="theme-btn two"> Read more </a>
                        </div>
                    </div>
                    <!--===============spacing==============-->
                    <div class="mr_bottom_30"></div>
                    <!--===============spacing==============-->
                </div>
            </div>
        </div>
        <!--===============spacing==============-->
        <div class="pd_bottom_60"></div>
        <!--===============spacing==============-->
    </section>
    <!---process-end--->
    <!---team--->
    <section class="team bg_light_1">
        <!--===============spacing==============-->
        <div class="pd_top_80"></div>
        <!--===============spacing==============-->
        <div class="container">
            <div class="row align-items-end">
                <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="title_all_box style_one  dark_color">
                        <div class="title_sections">
                            <div class="before_title"> Dedicated Team</div>
                            <h2>Professional Individuals</h2>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="description_box">
                        <p>Our power of choice is untrammelled and when nothing prevents being able to do what we
                            like best every pleasure.</p>
                        <!--===============spacing==============-->
                        <div class="mr_bottom_20"></div>
                        <!--===============spacing==============-->
                    </div>
                </div>
                <!--===============spacing==============-->
                <div class="mr_bottom_30"></div>
                <!--===============spacing==============-->
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    <div class="team_box style_one">
                        <div class="team_box_outer">
                            <div class="member_image">
                                <img src="{{ asset('/frontend/assets/images/team/team-1.jpg') }}" alt="team image" />
                            </div>
                            <div class="about_member">
                                <div class="share_media">
                                    <ul class="first">
                                        <li class="text">Share</li>
                                        <li><i class="fa fa-share-alt"></i></li>
                                    </ul>
                                    <ul>
                                        <li class="shar_alt"><i class="fa fa-share-alt"></i></li>
                                        <li><a href="#"> <i class="fa fa-facebook"> </i></a></li>
                                        <li><a href="#"> <i class="fa fa-twitter"> </i></a></li>
                                        <li><a href="#"> <i class="fa fa-skype"> </i></a></li>
                                        <li><a href="#"> <i class="fa fa-instagram"> </i></a></li>
                                    </ul>
                                </div>
                                <div class="authour_details">
                                    <span>Director </span>
                                    <h6>Amelia Margaret</h6>
                                    <div class="button_view">
                                        <a href="#" target="_blank" rel="nofollow" class="theme-btn one"> View Profile
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--===============spacing==============-->
                    <div class="mr_bottom_30"></div>
                    <!--===============spacing==============-->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    <div class="team_box style_one">
                        <div class="team_box_outer">
                            <div class="member_image">
                                <img src="{{ asset('/frontend/assets/images/team/team-2.jpg') }}" alt="team image" />
                            </div>
                            <div class="about_member">
                                <div class="share_media">
                                    <ul class="first">
                                        <li class="text">Share</li>
                                        <li><i class="fa fa-share-alt"></i></li>
                                    </ul>
                                    <ul>
                                        <li class="shar_alt"><i class="fa fa-share-alt"></i></li>
                                        <li><a href="#"> <i class="fa fa-facebook"> </i> </a></li>
                                        <li><a href="#"> <i class="fa fa-twitter"> </i> </a></li>
                                        <li><a href="#"> <i class="fa fa-skype"> </i> </a></li>
                                        <li><a href="#"> <i class="fa fa-instagram"> </i> </a></li>
                                    </ul>
                                </div>
                                <div class="authour_details">
                                    <span>Team Leader </span>
                                    <h6>Andrew Cameron</h6>
                                    <div class="button_view">
                                        <a href="#" target="_blank" rel="nofollow" class="theme-btn one"> View Profile
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--===============spacing==============-->
                    <div class="mr_bottom_30"></div>
                    <!--===============spacing==============-->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    <div class="team_box style_one">
                        <div class="team_box_outer">
                            <div class="member_image">
                                <img src="{{ asset('/frontend/assets/images/team/team-3.png') }}" alt="team image" />
                            </div>
                            <div class="about_member">
                                <div class="share_media">
                                    <ul class="first">
                                        <li class="text">Share</li>
                                        <li><i class="fa fa-share-alt"></i></li>
                                    </ul>
                                    <ul>
                                        <li class="shar_alt"><i class="fa fa-share-alt"></i></li>
                                        <li><a href="#"> <i class="fa fa-facebook"> </i> </a></li>
                                        <li><a href="#"> <i class="fa fa-twitter"> </i> </a></li>
                                        <li><a href="#"> <i class="fa fa-skype"> </i> </a></li>
                                        <li><a href="#"> <i class="fa fa-instagram"> </i> </a></li>
                                    </ul>
                                </div>
                                <div class="authour_details">
                                    <span>Manager </span>
                                    <h6>Sofia Charlotte</h6>
                                    <div class="button_view">
                                        <a href="#" target="_blank" rel="nofollow" class="theme-btn one"> View Profile
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--===============spacing==============-->
                    <div class="mr_bottom_30"></div>
                    <!--===============spacing==============-->
                </div>
            </div>
        </div>
        <!--===============spacing==============-->
        <div class="pd_bottom_60"></div>
        <!--===============spacing==============-->
    </section>
    <!---team-end--->
    <!---project--->
    <section class="project-carousel" id="projects">
        <!--===============spacing==============-->
        <div class="pd_top_80"></div>
        <!--===============spacing==============-->
        <div class="container">
            <div class="row">
                <div class="title_all_box style_one text-center dark_color">
                    <div class="title_sections">
                        <div class="before_title">Incredibly</div>
                        <h2>Effective Case Studies</h2>
                    </div>
                    <!--===============spacing==============-->
                    <div class="mr_bottom_10"></div>
                    <!--===============spacing==============-->
                </div>
            </div>
        </div>
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">

                    <div class="project_caro_section carousel style_one ">
                        <div class="swiper-container" data-swiper='{
                           "loop": true,
                           "autoplay": {
                             "delay": 5000
                           },
                           "speed": 1000,
                           "centeredSlides": false,
                           "slidesPerView": 4,
                           "spaceBetween": 30,
                           "pagination": {
                             "el": ".swiper-pagination",
                             "clickable": true
                           },
                           "navigation": {
                             "nextEl": ".swiper-button-next",
                             "prevEl": ".swiper-button-prev"
                           },
                           "breakpoints": {
                              "1200": {
                                 "slidesPerView": 4 
                                },
                              "1024": {
                               "slidesPerView": 2 
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
                                <!----swiper warapper start---->
                                <div class="swiper-slide">
                                    <div class="project_post style_one mr_top_20">
                                        <div class="image">
                                            <img src="{{ asset('/frontend/assets/images/projects/project-6-img.jpg') }}" class="img-fluid" alt="img" />
                                        </div>
                                        <div class="project_caro_content">
                                            <div class="left_side">
                                                <p>Recruiting</p>
                                                <h2 class="title_pro"><a href="project-details.html">Shared Time Human
                                                        Resources Management</a></h2>
                                            </div>
                                            <div class="right_side">
                                                <a href="project-details.html"><i class="icon-right-arrow"></i></a>
                                                <a href="project-details.html" class="two"><i class="icon-right-arrow"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="project_post style_one mr_top_20">
                                        <div class="image">
                                            <img src="{{ asset('/frontend/assets/images/projects/project-5-img.jpg') }}" class="img-fluid" alt="img" />
                                        </div>
                                        <div class="project_caro_content">
                                            <div class="left_side">
                                                <p>Values</p>
                                                <h2 class="title_pro"><a href="project-details.html">Six Essential Steps To
                                                        Writing Successful Job</a></h2>
                                            </div>
                                            <div class="right_side">
                                                <a href="project-details.html"><i class="icon-right-arrow"></i></a>
                                                <a href="project-details.html" class="two"><i class="icon-right-arrow"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="project_post style_one mr_top_20">
                                        <div class="image">
                                            <img src="{{ asset('/frontend/assets/images/projects/project-4-img.jpg') }}" class="img-fluid" alt="img" />
                                        </div>
                                        <div class="project_caro_content">
                                            <div class="left_side">
                                                <p>Pre sale</p>
                                                <h2 class="title_pro"><a href="project-details.html">Time HR Prepares
                                                        Plastic Contract Manufacturer</a></h2>
                                            </div>
                                            <div class="right_side">
                                                <a href="project-details.html"><i class="icon-right-arrow"></i></a>
                                                <a href="project-details.html" class="two"><i class="icon-right-arrow"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="project_post style_one mr_top_20">
                                        <div class="image">
                                            <img src="{{ asset('/frontend/assets/images/projects/project-3-img.jpg') }}" class="img-fluid" alt="img" />
                                        </div>
                                        <div class="project_caro_content">
                                            <div class="left_side">
                                                <p>Human Resources</p>
                                                <h2 class="title_pro"><a href="project-details.html">Essential Steps to
                                                        Writing Job Description</a></h2>
                                            </div>
                                            <div class="right_side">
                                                <a href="project-details.html"><i class="icon-right-arrow"></i></a>
                                                <a href="project-details.html" class="two"><i class="icon-right-arrow"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="project_post style_one mr_top_20">
                                        <div class="image">
                                            <img src="{{ asset('/frontend/assets/images/projects/project-6-img.jpg') }}" class="img-fluid" alt="img" />
                                        </div>
                                        <div class="project_caro_content">
                                            <div class="left_side">
                                                <p>Recruiting</p>
                                                <h2 class="title_pro"><a href="project-details.html">Shared Time Human
                                                        Resources Management</a></h2>
                                            </div>
                                            <div class="right_side">
                                                <a href="project-details.html"><i class="icon-right-arrow"></i></a>
                                                <a href="project-details.html" class="two"><i class="icon-right-arrow"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="project_post style_one mr_top_20">
                                        <div class="image">
                                            <img src="{{ asset('/frontend/assets/images/projects/project-5-img.jpg') }}" class="img-fluid" alt="img" />
                                        </div>
                                        <div class="project_caro_content">
                                            <div class="left_side">
                                                <p>Values</p>
                                                <h2 class="title_pro"><a href="project-details.html">Six Essential Steps To
                                                        Writing Successful Job</a></h2>
                                            </div>
                                            <div class="right_side">
                                                <a href="project-details.html"><i class="icon-right-arrow"></i></a>
                                                <a href="project-details.html" class="two"><i class="icon-right-arrow"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="project_post style_one mr_top_20">
                                        <div class="image">
                                            <img src="{{ asset('/frontend/assets/images/projects/project-4-img.jpg') }}" class="img-fluid" alt="img" />
                                        </div>
                                        <div class="project_caro_content">
                                            <div class="left_side">
                                                <p>Pre sale</p>
                                                <h2 class="title_pro"><a href="project-details.html">Time HR Prepares
                                                        Plastic Contract Manufacturer</a></h2>
                                            </div>
                                            <div class="right_side">
                                                <a href="project-details.html"><i class="icon-right-arrow"></i></a>
                                                <a href="project-details.html" class="two"><i class="icon-right-arrow"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="project_post style_one mr_top_20">
                                        <div class="image">
                                            <img src="{{ asset('/frontend/assets/images/projects/project-3-img.jpg') }}" class="img-fluid" alt="img" />
                                        </div>
                                        <div class="project_caro_content">
                                            <div class="left_side">
                                                <p>Human Resources</p>
                                                <h2 class="title_pro"><a href="project-details.html">Essential Steps to
                                                        Writing Job Description</a></h2>
                                            </div>
                                            <div class="right_side">
                                                <a href="project-details.html"><i class="icon-right-arrow"></i></a>
                                                <a href="project-details.html" class="two"><i class="icon-right-arrow"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!----swiper warapper end---->
                            </div>
                            <!----swiper-pagination start---->
                            <div class="p_pagination">
                                <div class="swiper-pagination">
                                </div>
                            </div>
                            <!----swiper-pagination end---->
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--===============spacing==============-->
        <div class="pd_bottom_90"></div>
        <!--===============spacing==============-->
    </section>
    <!---project-end--->
    <!---testimonial--->
    <section class="testimonial bg_op_1" style="background-image: url(/frontend/assets/images/testimonialbg.jpg);">
        <div class="row align-items-center">
            <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-12 pd_zero">
                <div class="image">
                    <img src="{{ asset('/frontend/assets/images/testi-image.jpg') }}" class="object-fit-cover img-fluid height_560px" alt="image" />
                </div>
            </div>
            <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-12 pd_zero">
                <!--===============spacing==============-->
                <div class="pd_top_70"></div>
                <!--===============spacing==============-->
                <div class="testimonial_sec_wrapper pd_left_70">
                    <div class="title_all_box style_one light_color">
                        <div class="title_sections">
                            <div class="before_title">
                                Quote About
                            </div>
                            <h2> Customers Experience</h2>
                        </div>
                        <!--===============spacing==============-->
                        <div class="mr_bottom_20"></div>
                        <!--===============spacing==============-->
                    </div>
                    <div class="testimonial_sec light_color style_one">
                        <div class="icon_quotes">
                            <i class="icon-quote"></i>
                        </div>
                        <div class="swiper-container" data-swiper='{
                              "loop": true,
                              "autoplay": {
                                "delay": 7000
                              },
                              "speed": 1000,
                              "centeredSlides": false,
                              "slidesPerView": 1,
                              "spaceBetween": 30,
                              "navigation": {
                                "nextEl": ".next-single-one",
                                "prevEl": ".prev-single-one"
                              },
                              "pagination": {
                                "el": ".number-pagination",
                                "type": "fraction"
                              },
                              "breakpoints": {
                                "1200": {
                                  "slidesPerView": 1 
                                },
                                "1024": {
                                  "slidesPerView": 1 
                                },
                                "768": {
                                  "slidesPerView": 1 
                                },
                                "576": {
                                  "slidesPerView": 1 
                                }
                              }
                            }'>
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="testimonial_box">
                                        <div class="rating">
                                            <ul>
                                                <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star empty"></span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="authour_details  image_yes ">
                                            <div class="image">
                                                <img src="{{ asset('/frontend/assets/images/testi-3.png') }}" alt="image" />
                                            </div>
                                            <div class="details">
                                                <h2>Jacob Leonardo</h2>
                                                <span>Senior Manager of Excel Solution</span>
                                            </div>
                                        </div>
                                        <div class="comment">
                                            While running an early stage startup everything feels
                                            hard, that’s why it’s been so nice to have our accounting
                                            feel easy. We recommed Qetus.
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="testimonial_box">
                                        <div class="rating">
                                            <ul>
                                                <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="authour_details  image_yes ">
                                            <div class="image">
                                                <img src="{{ asset('/frontend/assets/images/testi-2.png') }}" alt="image" />
                                            </div>
                                            <div class="details">
                                                <h2>Jacob Leonardo</h2>
                                                <span>Senior Manager of Excel Solution</span>
                                            </div>
                                        </div>
                                        <div class="comment">
                                            While running an early stage startup everything feels
                                            hard, that’s why it’s been so nice to have our accounting
                                            feel easy. We recommed Qetus.
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="testimonial_box">
                                        <div class="rating">
                                            <ul>
                                                <li><span class="fa fa-star fill"></span><span class="fa fa-star fill"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span><span class="fa fa-star empty"></span></li>
                                            </ul>
                                        </div>
                                        <div class="authour_details  image_yes ">
                                            <div class="image">
                                                <img src="{{ asset('/frontend/assets/images/testi-1.png') }}" alt="image" />
                                            </div>
                                            <div class="details">
                                                <h2>Jacob Leonardo</h2>
                                                <span>Senior Manager of Excel Solution</span>
                                            </div>
                                        </div>
                                        <div class="comment">
                                            While running an early stage startup everything feels
                                            hard, that’s why it’s been so nice to have our accounting
                                            feel easy. We recommed Qetus.
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="arrows">
                                <div class="prev-single-one"></div>
                                <div class="next-single-one"></div>
                            </div>
                            <div class="num_pagination">
                                <div class="number-pagination">

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!--===============spacing==============-->
                <div class="pd_bottom_70"></div>
                <!--===============spacing==============-->
            </div>
            <!---empty column--->
            <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-12">
            </div>
            <!---empty column--->
        </div>
    </section>
    <!---testimonial-end--->
    <!---blog--->
    <section class="blog-post" id="blog">
        <!--===============spacing==============-->
        <div class="pd_top_80"></div>
        <!--===============spacing==============-->
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title_all_box style_one text-center  dark_color">
                        <div class="title_sections">
                            <div class="before_title"> Find Out Our</div>
                            <h2>Insights &amp; Intelligence</h2>
                        </div>
                    </div>
                    <!--===============spacing==============-->
                    <div class="pd_bottom_20"></div>
                    <!--===============spacing==============-->
                </div>

                <section class="two_column news_wrapper_grid">
                    <div class="grid_show_case grid_layout clearfix">
                        <div class="news_box style_two grid_box _card has_images">
                            <div class="content_box">
                                <div class="overlay"> </div>
                                <img src="{{ asset('/frontend/assets/images/blog/blog-image-1.jpg') }}" class="img-fluid" alt="img" />
                                <div class="category">
                                    <a href="#" class="categories"><i class="icon-folder"></i>Compliance Audits</a>
                                </div>
                                <div class="content_mid">
                                    <span class="date_in_number">Oct 06 , 2023</span>
                                    <h2 class="title"><a href="blog-single.html">Outsource Accounting
                                            &#038; HR Functions</a></h2>
                                </div>
                                <div class="auhtour_box">
                                    <img alt='img' class="img-fluid" src="{{ asset('/frontend/assets/images/auth-1.png') }}" height='60' width='60' />
                                    <div class="contnet_a">
                                        <p>POSTED BY</p>
                                        <h4> Evan Thomas </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="news_box style_two grid_box _card has_images">
                            <div class="content_box">
                                <div class="overlay"> </div>
                                <img src="{{ asset('/frontend/assets/images//blog/blog-image-11.jpg') }}" class="img-fluid" alt="img" />
                                <div class="category">
                                    <a href="#" class="categories"><i class="icon-folder"></i>Coaching</a>
                                </div>
                                <div class="content_mid">
                                    <span class="date_in_number">Oct 08 , 2023</span>
                                    <h2 class="title"><a href="blog-single.html">Workplace problems in
                                            your business?</a></h2>
                                </div>
                                <div class="auhtour_box">
                                    <img alt='img' class="img-fluid" src="{{ asset('/frontend/assets/images/auth-2.png') }}" height='60' width='60' />
                                    <div class="contnet_a">
                                        <p>POSTED BY</p>
                                        <h4> Roman Brayden </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="four_column news_wrapper_grid">
                    <div class="grid_show_case grid_layout clearfix">

                        <div class="news_box style_six grid_box _card has_images">
                            <div class="content_box">
                                <div class="overlay"> </div>
                                <img width="852" height="812" src="{{ asset('/frontend/assets/images/blog/blog-image-9.jpg') }}" class="img-fluid" alt="img" />
                                <div class="category">
                                    <a href="#" class="categories"><i class="icon-folder"></i>Coaching</a>
                                </div>
                                <div class="content_mid">
                                    <span class="date_in_number">Oct 08 , 2023</span>
                                    <h2 class="title"><a href="blog-single.html">Why Should Business
                                            Payroll Outsourcing?</a></h2>
                                </div>
                                <div class="auhtour_box">
                                    <img alt='img' class="img-fluid" src="{{ asset('/frontend/assets/images/auth-2.png') }}" height='60' width='60' />
                                    <div class="contnet_a">
                                        <p>POSTED BY</p>
                                        <h4> Evan Thomas </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="news_box style_six grid_box _card has_images">
                            <div class="content_box">
                                <div class="overlay"> </div>
                                <img width="1047" height="697" src="{{ asset('/frontend/assets/images/blog/blog-image-8.jpg') }}" class="img-fluid" alt="img" />
                                <div class="category">
                                    <a href="#" class="categories"><i class="icon-folder"></i>HR Consulting</a>
                                </div>
                                <div class="content_mid">
                                    <span class="date_in_number">Oct 08 , 2023</span>
                                    <h2 class="title"><a href="blog-single.html">Workforce Challenges
                                            &#038; Opportunities</a></h2>
                                </div>
                                <div class="auhtour_box">
                                    <img alt='img' class="img-fluid" src="{{ asset('/frontend/assets/images/auth-1.png') }}" height='60' width='60' />
                                    <div class="contnet_a">
                                        <p>POSTED BY</p>
                                        <h4> Roman Brayden </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="news_box style_six grid_box _card has_images">
                            <div class="content_box">
                                <div class="overlay"> </div>
                                <img width="1557" height="1038" src="{{ asset('/frontend/assets/images/blog/blog-image-7.jpg') }}" class="img-fluid" alt="img" />
                                <div class="category">
                                    <a href="#" class="categories"><i class="icon-folder"></i>Compliance Audits</a>
                                </div>
                                <div class="content_mid">
                                    <span class="date_in_number">Oct 08 , 2023</span>
                                    <h2 class="title"><a href="blog-single.html">How to Handle Your Good
                                            Employee</a></h2>
                                </div>
                                <div class="auhtour_box">
                                    <img alt='img' class="img-fluid" src="{{ asset('/frontend/assets/images/auth-2.png') }}" height='60' width='60' />
                                    <div class="contnet_a">
                                        <p>POSTED BY</p>
                                        <h4> Evan Thomas </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="news_box style_six grid_box _card has_images">
                            <div class="content_box">
                                <div class="overlay"> </div>
                                <img width="593" height="396" src="{{ asset('/frontend/assets/images/blog/blog-image-6.jpg') }}" class="img-fluid" alt="img" />
                                <div class="category">
                                    <a href="#" class="categories"><i class="icon-folder"></i>Coaching</a>
                                </div>
                                <div class="content_mid">
                                    <span class="date_in_number">Oct 08 , 2023</span>
                                    <h2 class="title"><a href="blog-single.html">Retaining Good Employees
                                            &#038; Motivated</a></h2>
                                </div>
                                <div class="auhtour_box">
                                    <img alt='img' class="img-fluid" src="{{ asset('/frontend/assets/images/auth-2.png') }}" height='60' width='60' />
                                    <div class="contnet_a">
                                        <p>POSTED BY</p>
                                        <h4> Roman Brayden </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!--===============spacing==============-->
        <div class="pd_bottom_70"></div>
        <!--===============spacing==============-->
    </section>
    <!---blog-end--->
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