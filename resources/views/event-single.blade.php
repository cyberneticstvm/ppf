@extends("base")
@section("content")
<div id="content" class="site-content ">
    <div class="container">
        <div class="row default_row">
            <div class="full_width_box">
                <div class="pd_top_80"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="heading mb-3">
                            <h2>{{ $event->name }}</h2>
                        </div>
                    </div>
                </div>
                <!--===============spacing==============-->
                <div class="pd_bottom_40"></div>
                <!--===============spacing==============-->
            </div>
        </div>
    </div>
    <div class="auto-container">
        <div class="row default_row">
            <div id="primary" class="content-area service col-lg-8 col-md-12 col-sm-12 col-xs-12">
                <main id="main" class="site-main" role="main">
                    <section class="blog_single_details_outer">
                        <div class="single_content_upper">
                            <div class="blog_feature_image">
                                <img src="{{ asset($event->image) }}" class="wp-post-image" alt="img">
                            </div>
                            <!--===============spacing==============-->
                            <div class="pd_bottom_20"></div>
                            <!--===============spacing==============-->
                            <div class="post_single_content">
                                <h5>{{ $event->name }}</h5>
                                <!--===============spacing==============-->
                                <div class="pd_bottom_15"></div>
                                <!--===============spacing==============-->
                                <div class="description_box">
                                    {!! $event->description !!}
                                </div>
                            </div>
                        </div>
                        <div class="related_post">

                            <div class="title_sections_inner">
                                <h2>Recents Events</h2>
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
                                    <div class="swiper-slide">
                                        <div class="news_box default_style list_view normal_view clearfix has_images">
                                            <div class="image img_hover-1">
                                                <img src="assets/images/blog/blog-image-7.jpg" class="img-fluid" alt="img">
                                                <a href="#" class="categories">
                                                    <i class="icon-folder"></i>Compliance Audits
                                                </a>
                                            </div>
                                            <div class="content_box">
                                                <div class="date">
                                                    <span class="date_in_number">October 8, 2023</span>
                                                </div>
                                                <div class="source">
                                                    <h2 class="title"><a href="blog-single.html" rel="bookmark">How to
                                                            Handle Employee</a></h2>
                                                    <p class="short_desc">How well this mistaken ideas off denouncing
                                                        pleasure &amp; praisings will give you complete.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="news_box default_style list_view normal_view clearfix has_images">
                                            <div class="image img_hover-1">
                                                <img width="750" height="420" src="assets/images/blog/blog-image-6.jpg" class="img-fluid" alt="img">
                                                <a href="#" class="categories">
                                                    <i class="icon-folder"></i>Coaching
                                                </a>
                                            </div>
                                            <div class="content_box">
                                                <div class="date">
                                                    <span class="date_in_number">October 8, 2023</span>
                                                </div>
                                                <div class="source">
                                                    <h2 class="title"><a href="blog-single.html" rel="bookmark">Retaining
                                                            Good Employees &amp; Motivated</a></h2>
                                                    <p class="short_desc">How well this mistaken ideas off denouncing
                                                        pleasure &amp; praisings will give you complete.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="news_box default_style list_view normal_view clearfix has_images">
                                            <div class="image img_hover-1">
                                                <img width="750" height="420" src="assets/images/blog/blog-image-9.jpg" class="img-fluid" alt="img">
                                                <a href="#" class="categories">
                                                    <i class="icon-folder"></i>Coaching
                                                </a>
                                            </div>
                                            <div class="content_box">
                                                <div class="date">
                                                    <span class="date_in_number">October 8, 2023</span>
                                                </div>
                                                <div class="source">
                                                    <h2 class="title"><a href="blog-single.html" rel="bookmark">Why Should
                                                            Business Payroll Outsourcing?</a></h2>
                                                    <p class="short_desc">How well this mistaken ideas off denouncing
                                                        pleasure &amp; praisings will give you complete.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

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
                        <form role="search" method="get" action="index.html/">
                            <div class="wp-block-search__inside-wrapper">
                                <input type="search" name="s" value="" placeholder="Key Words here" required="">
                                <i class="fa fa-search"></i>
                            </div>
                        </form>
                    </div>
                    <div class="widgets_grid_box">
                        <h2 class="widget-title">Recent Events</h2>
                        <div class="widget_post_box">
                            <div class="blog_in clearfix image_in">
                                <div class="image">
                                    <img decoding="async" src="assets/images/blog/blog-image-9.jpg" alt="img">
                                </div>
                                <div class="content_inner">
                                    <p class="post-date"><span class="icon-calendar"></span>October 8, 2023</p>
                                    <h3><a href="blog-single.html">Why Should Business Payroll Outsourcing?</a></h3>
                                </div>
                            </div>
                            <div class="blog_in clearfix image_in">
                                <div class="image">
                                    <img decoding="async" src="assets/images/blog/blog-image-8.jpg" alt="img">
                                </div>
                                <div class="content_inner">
                                    <p class="post-date"><span class="icon-calendar"></span>October 8, 2023</p>
                                    <h3><a href="blog-single.html">Most Employees Support Measures</a></h3>
                                </div>
                            </div>
                            <div class="blog_in clearfix image_in">
                                <div class="image">
                                    <img decoding="async" src="assets/images/blog/blog-image-7.jpg" alt="img">
                                </div>
                                <div class="content_inner">
                                    <p class="post-date"><span class="icon-calendar"></span>October 8, 2023</p>
                                    <h3><a href="blog-single.html">How to Handle Employee</a></h3>
                                </div>
                            </div>
                            <div class="blog_in clearfix image_in">
                                <div class="image">
                                    <img decoding="async" src="assets/images/blog/blog-image-6.jpg" alt="img">
                                </div>
                                <div class="content_inner">
                                    <p class="post-date"><span class="icon-calendar"></span>October 8, 2023</p>
                                    <h3><a href="blog-single.html">Retaining Good Employees &amp; Motivated</a></h3>
                                </div>
                            </div>

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