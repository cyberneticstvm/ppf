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
                            Publications
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="breadcrumbs creote">
                        <ul class="breadcrumb m-auto">
                            <li><a href="/">Home</a> </li>
                            <li class="active">Publications</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--===============PAGE CONTENT==============-->
<div id="content" class="site-content ">
    <div class="container-fluid">
        <div class="row default_row">
            <div class="full_width_box">
                <div class="row mt-5">
                    @forelse($categories as $key => $item)
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="mg_image_box">
                            <div class="image_box">
                                <img decoding="async" src="{{ asset($item->image) }}" class="img" alt="{{ $item->name }}">
                                <a href="{{ route('publications.all', encrypt($item->id)) }}" class="ab_link">
                                    <span class="icon-right-arrow-long"></span>
                                </a>
                            </div>
                            <div class="content">
                                <h2><a href="{{ route('publications.all', encrypt($item->id)) }}">{{ $item->name }}</a></h2>
                                <div class="tag">Publication</div>
                            </div>
                        </div>
                    </div>
                    @empty
                    @endforelse
                </div>
                <!--===============spacing==============-->
                <div class="pd_bottom_40"></div>
                <!--===============spacing==============-->
            </div>
        </div>
    </div>
</div>
<!--===============PAGE CONTENT END==============-->
@endsection