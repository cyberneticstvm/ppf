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
                            Benevolent Activities / Jobs / Government Schemes
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="breadcrumbs creote">
                        <ul class="breadcrumb m-auto">
                            <li><a href="/">Home</a> </li>
                            <li class="active">Benevolent Activities / Jobs / Government Schemes</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--===============PAGE CONTENT==============-->
<div id="content" class="site-content">
    <!--===============spacing==============-->
    <div class="pd_top_80"></div>
    <!--===============spacing==============-->
    <section class="image_grid_content style_one image_covered">
        <div class="container">
            <div class="row">
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
                <div class="col-md-4">
                    <div class="mb-3">
                        <h4>Jobs</h4>
                    </div>
                    <div class="mg_image_box">
                        <div class="image_box">
                            <img decoding="async" src="{{ asset('frontend/assets/images/home/job.webp') }}" class="img" alt="image">
                            <a href="{{ route('job.all') }}" class="ab_link">
                                <span class="icon-right-arrow-long"></span>
                            </a>
                        </div>
                        <div class="content">
                            <h2><a href="{{ route('job.all') }}">Jobs</a></h2>
                            <div class="tag"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <h4>Government Schemes</h4>
                    </div>
                    <div class="mg_image_box">
                        <div class="image_box">
                            <img decoding="async" src="{{ asset('frontend/assets/images/home/govt.webp') }}" class="img" alt="image">
                            <a href="{{ route('schemes') }}" class="ab_link">
                                <span class="icon-right-arrow-long"></span>
                            </a>
                        </div>
                        <div class="content">
                            <h2><a href="{{ route('schemes') }}">Government Schemes</a></h2>
                            <div class="tag"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!--===============PAGE CONTENT END==============-->
<!--===============spacing==============-->
<div class="pd_bottom_70"></div>
<!--===============spacing==============-->
@endsection