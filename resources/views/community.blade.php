@extends("base")
@section("content")
<div class="page_header_default style_one ">
    <div class="parallax_cover">
        <img src="{{ asset('/frontend/assets/images/page-header-default.jpg') }}" alt="bg_image" class="cover-parallax">
    </div>
    <div class="page_header_content">
        <div class="auto-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner_title_inner">
                        <div class="title_page">
                            Community
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="breadcrumbs creote">
                        <ul class="breadcrumb m-auto">
                            <li><a href="/">Home</a> </li>
                            <li class="active">Community</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--===============PAGE CONTENT==============-->
<div id="content" class="site-content ">
    <div class="container">
        <div class="row default_row">
            <div class="full_width_box">
                <div class="pd_top_80"></div>
                <div class="row">
                    <div class="col-12">
                        <div class="description_box">
                            <p class="text-justify">Progressive Professional Forum (PPF), Kuwait has established cordial relationships with similar Professional organizations all over the world working for the social and scientific development of the society. PPF has been destined to instigate the transfer of technology, knowledge, experience, and modern management techniques for the total comprehensive and sustainable development of the State of Kerala, heads for a knowledge-based economy. This has been done by an inclusive integration of experience and skills ascertained from overseas work profile of graduates from Kerala who have built a successful work profile in the development of Kuwait and all countries abroad.</p>
                            <p class="text-justify">PPF Kuwait also promotes their members to avail better placement by linking matching placements in human resources at different parts of the world.</p>
                        </div>
                    </div>
                </div>
                <!--===============spacing==============-->
                <div class="pd_bottom_70"></div>
                <!--===============spacing==============-->
            </div>
        </div>
        <section class="tabs_all_box tabs_all_box_start type_two">
            <div class="tab_over_all_box">
                <div class="tabs_header clearfix">
                    <ul class="showcase_tabs_btns nav-pills nav clearfix">
                        <li class="nav-item">
                            <a class="s_tab_btn nav-link active" data-tab="#twotabtabone">01.Our Associates & Links</a>
                        </li>
                        <li class="nav-item">
                            <a class="s_tab_btn nav-link" data-tab="#twotabtabtwo">02. Search for Jobs</a>
                        </li>
                        <li class="nav-item">
                            <a class="s_tab_btn nav-link" data-tab="#twotabtabtthree">03. Discussions</a>
                        </li>
                        <li class="nav-item">
                            <a class="s_tab_btn nav-link" data-tab="#twotabtabfour">04. Advertisement</a>
                        </li>
                    </ul>
                </div>
                <div class="s_tab_wrapper">
                    <div class="s_tabs_content">
                        <div class="s_tab fade active-tab show" id="twotabtabone">
                            <div class="tab_content one">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 mb-5 mb-lg-0 mb-xl-0">
                                        <div class="image">
                                            <img src="{{ asset('frontend/assets/images/tab-ser-img.png') }}" alt="img">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                        <div class="content_bx">
                                            <h6>Our Associates & Links</h6>
                                            <h2>The Way of Success</h2>
                                            <p>Progressive Professional Forum (PPF), Kuwait is a secular collective for channelizing expertise..</p>
                                            <ul>
                                                <li><a href="#">Kerala Professional Network (KPN)</a></li>
                                                <li><a href="#">Technos Global, UAE</a></li>
                                                <li><a href="https://kalakuwait.com" target="_blank">KALA Kuwait</a></li>
                                                <li><a href="https://norkaroots.org" target="_blank">NORKA-ROOTS</a></li>
                                                <li><a href="https://pravasikerala.org" target="_blank">Kerala Pravasi Welfare Board</a></li>
                                                <li><a href="https://indembkwt.gov.in" target="_blank">Indian Embassy Kuwait</a></li>
                                            </ul>
                                            <a href="/contact" rel="nofollow" class="theme-btn two">Contact Us</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="s_tab fade" id="twotabtabtwo">
                            <div class="tab_content one">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <div class="image">
                                            <img src="{{ asset('frontend/assets/images/tab-ser-img.png') }}" alt="img">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <div class="quotes_box style_one">
                                            <div class="icon">
                                                <span class="icon-quote"></span>
                                            </div>
                                            <div class="content">
                                                <h6>Coming Soon..
                                                </h6>
                                                <a href="/contact" rel="nofollow" class="theme-btn two">Contact Us</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="s_tab fade" id="twotabtabtthree">
                            <div class="tab_content one">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <div class="image">
                                            <img src="{{ asset('frontend/assets/images/tab-ser-img.png') }}" alt="img">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <div class="quotes_box style_one">
                                            <div class="icon">
                                                <span class="icon-quote"></span>
                                            </div>
                                            <div class="content">
                                                <h6>Coming Soon..
                                                </h6>
                                                <a href="/contact" rel="nofollow" class="theme-btn two">Contact Us</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="s_tab fade" id="twotabtabfour">
                            <div class="tab_content one">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <div class="image">
                                            <img src="{{ asset('frontend/assets/images/tab-ser-img.png') }}" alt="img">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <div class="quotes_box style_one">
                                            <div class="icon">
                                                <span class="icon-quote"></span>
                                            </div>
                                            <div class="content">
                                                <h6>Coming Soon..
                                                </h6>
                                                <a href="/contact" rel="nofollow" class="theme-btn two">Contact Us</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--===============spacing==============-->
        <div class="pd_bottom_80"></div>
    </div>
</div>
<!--===============PAGE CONTENT END==============-->
@endsection