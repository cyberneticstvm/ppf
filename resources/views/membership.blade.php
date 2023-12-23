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
                            Member Registration
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="breadcrumbs creote">
                        <ul class="breadcrumb m-auto">
                            <li><a href="/">Home</a> </li>
                            <li class="active">Member Registration</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="content" class="site-content ">
    <div class="container">
        <div class="row default_row">
            <div class="full_width_box">
                <div class="pd_top_80"></div>
                <section class="price_plan_with_tab price_tb_style_one">
                    <div class="tab-content price_tab_content" id="myTabContent">
                        <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="price_plan_box style_one tag_enables ">
                                        <div class="tag">Primary</div>
                                        <div class="inner_box">
                                            <div class="top">
                                                <h2>Primary Member</h2>
                                            </div>
                                            <div class="mid">
                                                <p>Kindly requested to register here to become Primary Member of PPF
                                                </p>
                                            </div>
                                            <div class="bottom">
                                                <a href="{{ route('membership.type', encrypt('primary')) }}" rel="&quot;nofollow&quot;" class="theme-btn two">
                                                    Register Here
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="price_plan_box style_one  tag_enables ">
                                        <div class="tag">Associate</div>
                                        <div class="inner_box">
                                            <div class="top">
                                                <h2>Associate Member</h2>
                                            </div>
                                            <div class="mid">
                                                <p>Kindly requested to register here to become Associate Member of PPF
                                                </p>
                                            </div>
                                            <div class="bottom">
                                                <a href="{{ route('membership.type', encrypt('associate')) }}" rel="&quot;nofollow&quot;" class="theme-btn two">
                                                    Register Here
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="price_plan_box style_one  tag_enables ">
                                        <div class="tag">Overseas</div>
                                        <div class="inner_box">
                                            <div class="top">
                                                <h2>Overseas Member</h2>
                                            </div>
                                            <div class="mid">
                                                <p>Kindly requested to register here to become Overseas Member of PPF
                                                </p>
                                            </div>
                                            <div class="bottom">
                                                <a href="{{ route('membership.type', encrypt('overseas')) }}" rel="&quot;nofollow&quot;" class="theme-btn two">
                                                    Register Here
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--===============spacing==============-->
                <div class="pd_bottom_70"></div>
                <!--===============spacing==============-->
            </div>
        </div>
    </div>
</div>
@endsection