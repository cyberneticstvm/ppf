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
    <div class="auto-container">
        <div class="pd_top_40"></div>
        <section class="project-section">
            <div class="container-fluid pd_zero">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="project_caro_section  style_two light_color">
                            <div class="swiper-container" data-swiper='{
                                             "autoplay": {
                                               "delay": 6000
                                             },
                                             "freeMode": false,
                                             "loop": true,
                                             "speed": 1000,
                                             "centeredSlides": true,
                                             "slidesPerView": 3,
                                             "spaceBetween": 30,
                                             "pagination": {
                                               "el": ".swiper-pagination",
                                               "clickable": true
                                             },
                                              
                                             "breakpoints": {
                                                "1200": {
                                                   "slidesPerView": 5
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
                                    @forelse($gallery->images as $key => $item)
                                    <div class="swiper-slide">
                                        <div class="project_post style_seven">
                                            <div class="image_box">
                                                <img src="{{ asset($item->image) }}" class="img-fluid" alt="img">
                                            </div>
                                            <div class="content_box ">
                                                <h2 class="title_pro"><a href="#" rel="bookmark">Time HR Prepares Plastic
                                                        Contract Manufacturer</a></h2>
                                                <div class="image_zoom_box ">
                                                    <a href="{{ asset($item->image) }}" data-fancybox="gallery"><span class="fa fa-plus zoom_icon"></span></a>
                                                </div>
                                            </div>
                                            <div class="overlay ">
                                                <div class="text ">
                                                    <h2 class="title_pro"><a href="#" rel="bookmark">{{ $gallery->name }}</a></h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <h3 class="text-danger">No images found!</h3>
                                    @endforelse
                                </div>
                                <div class="p_pagination">
                                    <div class="swiper-pagination"></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!--===============spacing==============-->
            <div class="pd_bottom_40"></div>
            <!--===============spacing==============-->

        </section>
    </div>
</div>
@endsection