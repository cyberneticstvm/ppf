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
                            Unit Officials
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="breadcrumbs creote">
                        <ul class="breadcrumb m-auto">
                            <li><a href="/">Home</a> </li>
                            <li class="active">Unit Officials</li>
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
            @forelse($regions as $key1 => $region)
            <div class="row">
                <div class="col-lg-12">
                    <div class="title_all_box style_one text-center dark_color">
                        <div class="title_sections">
                            <div class="before_title">{{ ucfirst($region->region) }}</div>
                        </div>
                        <!--===============spacing==============-->
                        <div class="pd_bottom_20"></div>
                        <!--===============spacing==============-->
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @forelse($officials->where('region', $region->region) as $key => $item)
                <div class="col-lg-2 col-md-4 col-sm-12 col-xs-12">
                    <div class="team_box style_two">
                        <div class="team_box_outer">
                            <div class="member_image">
                                <img src="{{ ($item->image) ? asset($item->image) : asset('/frontend/assets/images/team/avatar.png') }}" alt="Official image" />
                            </div>
                            <div class="about_member">
                                <div class="authour_details">
                                    <h6>{{ $item->name }}</h6>
                                    <span>{{ ucwords(str_replace('_', ' ', $item->panel)) }} </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                @endforelse
            </div>
            @empty
            @endforelse
        </div>
        <!--===============spacing==============-->
        <div class="pd_bottom_70"></div>
        <!--===============spacing==============-->
    </section>
</div>
<!--===============PAGE CONTENT END==============-->
@endsection