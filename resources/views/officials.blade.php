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
                            Officials
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="breadcrumbs creote">
                        <ul class="breadcrumb m-auto">
                            <li><a href="/">Home</a> </li>
                            <li class="active">Officials</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--===============PAGE CONTENT==============-->
<div id="content" class="site-content">
    <section class="team-section bg_light_1">
        <!--===============spacing==============-->
        <div class="pd_top_90"></div>
        <!--===============spacing==============-->
        <div class="container">
            <div class="row">
                @forelse($officials->where('panel', 'office_bearer') as $key => $item)
                <div class="col-lg-3">
                    <div class="team_box style_three">
                        <div class="team_box_outer">
                            <div class="member_image">
                                <img src="{{ asset($item->image) }}" alt="Official image" />
                            </div>
                            <div class="about_member">
                                <!--<div class="share_media">
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
                                </div>-->
                                <div class="authour_details">
                                    <span>{{ $item->designation }} </span>
                                    <h6>{{ $item->name }}</h6>
                                    <!--<div class="button_view">
                                        <a href="#" target="_blank" rel="nofollow" class="theme-btn one"> View Profile
                                        </a>
                                    </div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                @endforelse
            </div>
        </div>
        <!--===============spacing==============-->
        <div class="pd_bottom_70"></div>
        <!--===============spacing==============-->
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title_all_box style_one text-center dark_color">
                        <div class="title_sections">
                            <div class="before_title">EXECUTIVE MEMBERS</div>
                        </div>
                        <!--===============spacing==============-->
                        <div class="pd_bottom_20"></div>
                        <!--===============spacing==============-->
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse($officials->where('panel', 'executive_member') as $key => $item)
                <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
                    <div class="team_box style_one">
                        <div class="team_box_outer">
                            <div class="member_image">
                                <img src="{{ asset($item->image) }}" alt="Official image" />
                            </div>
                            <div class="about_member">
                                <!--<div class="share_media">
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
                                </div>-->
                                <div class="authour_details">
                                    <span>{{ $item->designation }} </span>
                                    <h6>{{ $item->name }}</h6>
                                    <!--<div class="button_view">
                                        <a href="#" target="_blank" rel="nofollow" class="theme-btn one"> View Profile
                                        </a>
                                    </div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                @endforelse
            </div>
        </div>
        <!--===============spacing==============-->
        <div class="pd_bottom_70"></div>
        <!--===============spacing==============-->
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title_all_box style_one text-center dark_color">
                        <div class="title_sections">
                            <div class="before_title">AUDITORS</div>
                        </div>
                        <!--===============spacing==============-->
                        <div class="pd_bottom_20"></div>
                        <!--===============spacing==============-->
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse($officials->where('panel', 'auditor') as $key => $item)
                <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
                    <div class="team_box style_one">
                        <div class="team_box_outer">
                            <div class="member_image">
                                <img src="{{ asset($item->image) }}" alt="Official image" />
                            </div>
                            <div class="about_member">
                                <!--<div class="share_media">
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
                                </div>-->
                                <div class="authour_details">
                                    <span>{{ $item->designation }} </span>
                                    <h6>{{ $item->name }}</h6>
                                    <!--<div class="button_view">
                                        <a href="#" target="_blank" rel="nofollow" class="theme-btn one"> View Profile
                                        </a>
                                    </div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                @endforelse
            </div>
        </div>
        <!--===============spacing==============-->
        <div class="pd_bottom_70"></div>
        <!--===============spacing==============-->
    </section>
</div>
<!--===============PAGE CONTENT END==============-->
@endsection