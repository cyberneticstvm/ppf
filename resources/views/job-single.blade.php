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
                            {{ $job->title }}
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="breadcrumbs creote">
                        <ul class="breadcrumb m-auto">
                            <li><a href="/">Home</a> </li>
                            <li><a href="{{ route('job.all') }}">Jobs / Community</a></li>
                            <li class="active">{{ $job->name }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="content" class="site-content ">
    <div class="auto-container">
        <div class="row default_row">
            <div class="pd_top_40"></div>
            <div id="primary" class="content-area service col-lg-8 col-md-12 col-sm-12 col-xs-12">
                <main id="main" class="site-main" role="main">
                    <section class="blog_single_details_outer">
                        <div class="single_content_upper">
                            <div class="blog_feature_image">
                                <img src="{{ ($job->image) ? asset($job->image) : asset('frontend/assets/images/home/job.webp') }}" class="wp-post-image" alt="img">
                            </div>
                            <!--===============spacing==============-->
                            <div class="pd_bottom_20"></div>
                            <!--===============spacing==============-->
                            <div class="post_single_content">
                                <h5>{{ $job->title }}</h5>
                                <!--===============spacing==============-->
                                <div class="pd_bottom_15"></div>
                                <!--===============spacing==============-->
                                <div class="description_box text-justify">
                                    {!! $job->description !!}
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <a href="{{ ($job->document) ? asset($job->document) : '#' }}" target="_blank">Attachment</a>
                        </div>
                        <div class="related_post">
                            <div class="title_sections_inner">
                                <h2>Recents Jobs</h2>
                            </div>
                            <!-- Swiper -->

                            <div class="swiper-container" data-swiper='{
                                       "loop": true,
                                       "autoplay": {
                                         "delay": 5000
                                       },
                                       "speed": 1000,
                                       "centeredSlides": false,
                                       "slidesPerView": 2,
                                       "spaceBetween": 30,
                                       "pagination": {
                                         "el": ".swiper-pagination",
                                         "clickable": true
                                       },
                                       "navigation": {
                                         "nextEl": ".related-button-next",
                                         "prevEl": ".related-button-prev"
                                       },
                                       "breakpoints": {
                                          "1200": {
                                             "slidesPerView": 2 
                                            },
                                          "1024": {
                                           "slidesPerView": 2 
                                          },
                                         "768": {
                                           "slidesPerView": 2 
                                         },
                                         "576": {
                                           "slidesPerView": 1 
                                         }
                                       }
                                     }'>
                                <div class="swiper-wrapper">
                                    @forelse($recents as $key =>$item)
                                    <div class="swiper-slide">
                                        <div class="news_box default_style list_view normal_view clearfix has_images">
                                            <div class="image img_hover-1">
                                                <img src="{{ ($item->image) ? asset($item->image) : asset('frontend/assets/images/home/job.webp') }}" class="img-fluid" alt="img">
                                                <a href="#" class="categories">
                                                    <i class="icon-folder"></i>{{ $item->country->name }}
                                                </a>
                                            </div>
                                            <div class="content_box">
                                                <div class="date">
                                                    <span class="date_in_number">{{ $item->created_at?->format('d, F Y') }}</span>
                                                </div>
                                                <div class="source">
                                                    <h2 class="title"><a href="{{ route('job.single', encrypt($item->id)) }}" rel="bookmark">{{ $item->title }}</a></h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    @endforelse
                                </div>
                            </div>
                            <div class="arrow_related">
                                <div class="related-button-prev">
                                    <i class="fa fa-angle-left"></i>
                                </div>
                                <div class="related-button-next">
                                    <i class="fa fa-angle-right"></i>
                                </div>
                            </div>

                        </div>
                    </section>
                </main>
            </div>
            <aside id="secondary" class="widget-area all_side_bar col-lg-4 col-md-12 col-sm-12">
                <div class="side_bar">
                    <div class="widgets_grid_box">
                        <h2 class="widget-title">Recent Jobs</h2>
                        <div class="widget_post_box">
                            @forelse($recents as $key =>$item)
                            <div class="blog_in clearfix image_in">
                                <div class="image">
                                    <img decoding="async" src="{{ ($item->image) ? asset($item->image) : asset('frontend/assets/images/home/job.webp') }}" alt="img">
                                </div>
                                <div class="content_inner">
                                    <p class="post-date"><span class="icon-calendar"></span>{{ $item->created_at?->format('d, F Y') }}</p>
                                    <h3><a href="{{ route('job.single', encrypt($item->id)) }}">{{ $item->title }}</a></h3>
                                </div>
                            </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>
    <!--===============spacing==============-->
    <div class="pd_bottom_40"></div>
    <!--===============spacing==============-->
</div>
@endsection