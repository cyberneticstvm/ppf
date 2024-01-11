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
                            {{ $gallery->name }}
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="breadcrumbs creote">
                        <ul class="breadcrumb m-auto">
                            <li><a href="/">Home</a> </li>
                            <li><a href="{{ route('galleries') }}">Gallery</a></li>
                            <li><a href="{{ route('gallery.all', (encrypt($gallery->category_id))) }}">{{ $gallery->category->name }}</a></li>
                            <li class="active">{{ $gallery->name }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="content" class="site-content ">
    <div class="no-container">
        <div class="row default_row">
            <div class="full_width_box">
                <!--===============spacing==============-->
                <div class="pd_top_80"></div>
                <!--===============spacing==============-->
                <section class="image_box_carousel_content image_covered">
                    <div class="container">
                        <div class="owl-carousel owl_nav_block owl_dots_none theme_carousel owl-theme" data-options='{"loop": false, "margin": 20, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 7000, "smartSpeed": 1800, "responsive":{ "0" :{ "items": "1" }, "768" :{ "items" : "2" } , "1000":{ "items" : "3" } , "1200":{ "items" : "4" }}}'>
                            @forelse($gallery->images as $key => $item)
                            <div class="mg_image_box">
                                <div class="image_box">
                                    <!--<a href="{{ asset($item->image) }}" data-fancybox="gallery"><img decoding="async" src="{{ asset($item->image) }}" class="img" alt="image"></a>-->
                                    <a data-fancybox="gallery" data-src="{{ asset($item->image) }}">
                                        <img src="{{ asset($item->image) }}" class="img fBox" alt="image" />
                                    </a>
                                </div>
                            </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                </section>
                <!--===============spacing==============-->
                <div class="pd_bottom_40"></div>
            </div>
        </div>
    </div>
</div>
@endsection