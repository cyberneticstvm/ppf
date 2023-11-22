<!DOCTYPE html>
<html lang="en-US">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
   <title>{{ $title }}</title>
   <!-- Fav Icon -->
   <link rel="icon" href="{{ asset('/backend/assets/images/favicon.ico') }}" type="image/x-icon">
   <!-- Fav Icon -->
   <!-- Google Fonts -->
   <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Spartan%3A400%2C500%2C600%2C700%2C800%2C900%7CInter%3A300%2C400%2C500%2C600%2C700%2C800%2C900&subset=latin%2Clatin-ext' type='text/css' media='all' />
   <!-- Google Fonts -->
   <!-- Style -->
   <link rel='stylesheet' href="{{ asset('/frontend/assets/css/bootstrap.min.css') }}" type='text/css' media='all' />
   <link rel='stylesheet' href="{{ asset('/frontend/assets/css/owl.css') }}" type='text/css' media='all' />
   <link rel='stylesheet' href="{{ asset('/frontend/assets/css/swiper.min.css') }}" type='text/css' media='all' />
   <link rel='stylesheet' href="{{ asset('/frontend/assets/css/jquery.fancybox.min.css') }}" type='text/css' media='all' />
   <link rel='stylesheet' href="{{ asset('/frontend/assets/css/icomoon.css') }}" type='text/css' media='all' />
   <link rel='stylesheet' href="{{ asset('/frontend/assets/css/flexslider.css') }}" type='text/css' media='all' />
   <link rel='stylesheet' href="{{ asset('/frontend/assets/css/font-awesome.min.css') }}" type='text/css' media='all' />
   <link rel='stylesheet' href="{{ asset('/frontend/assets/css/style.css') }}" type='text/css' media='all' />
   <link rel='stylesheet' href="{{ asset('/frontend/assets/css/scss/elements/theme-css.css') }}" type='text/css' media='all' />
   <link rel='stylesheet' id="creote-color-switcher-css" href="{{ asset('/frontend/assets/css/scss/elements/color-switcher/color1.css') }}" type='text/css' media='all' />
   <!-- Style-->
   <!----woocommerce---->
   <!--<link rel='stylesheet' href="{{ asset('/frontend/assets/css/woocommerce-layout.css') }}" type='text/css' media='all' />
   <link rel='stylesheet' href="{{ asset('/frontend/assets/css/woocommerce.css') }}" type='text/css' media='all' />-->
   <!----woocommerce---->
</head>

<body class="theme-creote">
   <div id="page" class="page_wapper hfeed site">
      <!---============== wrapper_full =================-->
      <div id="wrapper_full" class="content_all_warpper">
         <!----mini cart----->
         <div class="mini_cart_togglers fixed_cart">
            <div class="mini-cart-count">
               0
            </div>
            <i class="icon-shopping-cart"></i>
         </div>
         <!----mini cart----->
         <!----preloader----->
         <div class="preloader-wrap">
            <div class="preloader" style="background-image:url('{{ asset("/frontend/assets/images/preloader.gif") }}')">
            </div>
            <div class="overlay"></div>
         </div>
         <!----preloader----->
         <!----header----->
         <div class="header_area" id="header_contents">
            <div class="top_bar style_one">
               <div class="auto-container">
                  <div class="row align-items-center">
                     <div class="col-lg-12">
                        <div class="top_inner">
                           <div class="left_side common_css">
                              <div class="contntent address">
                                 <i class="icon-placeholder"></i>
                                 <div class="text">
                                    <small>Location</small>
                                    <span>61W Business Str Hobert, LA </span>
                                 </div>
                              </div>
                              <div class="contntent email">
                                 <i class="icon-email"></i>
                                 <div class="text">
                                    <small>Email</small>
                                    <a href="mailto:sendmail@creote.com">sendmail@creote.com</a>
                                 </div>
                              </div>
                           </div>
                           <div class="right_side common_css">
                              <div class="contntent phone">
                                 <i class="icon-phone-call"></i>
                                 <div class="text">
                                    <small>Phone</small>
                                    <a href="tel:+9806071234">+9806071234</a>
                                 </div>
                              </div>
                              <div class="contntent media">
                                 <i class="icon-share"></i>
                                 <div class="text">
                                    <small>Share</small>
                                    <a href="#" target=_blank rel=nofollow>
                                       <small>Fb</small>
                                    </a>
                                    <a href="#" target=_blank rel=nofollow>
                                       <small>Tw</small>
                                    </a>
                                    <a href="#" target=_blank rel=nofollow>
                                       <small>Sk</small>
                                    </a>
                                    <a href="#" target=_blank rel=nofollow>
                                       <small>Te</small>
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            @include("nav")
         </div>
         <!----header end----->
         <!--===============PAGE CONTENT==============-->
         @yield("content")
         <!--===============PAGE CONTENT END==============-->
      </div>
      <!---============== wrapper_full =================-->
      <!---==============footer start =================-->
      <div class="footer_area" id="footer_contents">
         <div class="footer_widgets_wrap bg_dark_2">
            <!--===============spacing==============-->
            <div class="pd_top_80"></div>
            <!--===============spacing==============-->
            <div class="container">
               <div class="row">
                  <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                     <div class="footer_widgets about_company light_color">
                        <div class="about_company_inner">
                           <div class="footer_logo">
                              <a href="#" target="_blank" rel="nofollow">
                                 <img src="{{ asset('/frontend/assets/images/logo-white.png') }}" class="img-fluid" alt="logo" />
                              </a>
                              <!--===============spacing==============-->
                              <div class="pd_bottom_30"></div>
                              <!--===============spacing==============-->
                           </div>
                           <div class="content_box">
                              <p>
                                 Duty the obligations of business will frequently occur that pleasure have too
                                 repudiated annoyances endures accepted.
                              </p>
                              <div class="consulting">
                                 <div class="image">
                                    <img src="{{ asset('/frontend/assets/images/authour-image.png') }}" alt="need help" />
                                 </div>
                                 <div class="help_con">
                                    <h6>Need Help?</h6>
                                    <h2>
                                       <a href="#" target="_blank" rel="nofollow"> Free Consultation</a>
                                    </h2>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                     <div class="footer_widgets wid_tit style_one">
                        <div class="fo_wid_title">
                           <h2>Get In Touch</h2>
                        </div>
                     </div>
                     <!--===============spacing==============-->
                     <div class="pd_bottom_25"></div>
                     <!--===============spacing==============-->
                     <div class="footer_widgets get_in_touch_foo light_color">
                        <div class="get_intouch_inrfo">
                           <div class="foo_cont_inner">
                              <div class="top">
                                 <h6> Location</h6>
                                 <p>
                                    280 Granite Run Drive Suite #200
                                    Lancaster, PA 1760
                                 </p>
                              </div>
                              <div class="bottom">
                                 <h6> Contact</h6>
                                 <div class="con_content">
                                    <h5> Phone :</h5>
                                    <a href="tel:+9806071234"> +98 060 712 34</a>
                                 </div>
                                 <div class="con_content">
                                    <h5> Mail Us :</h5>
                                    <a href="tel:sendmail@creote.com"> sendmail@creote.com</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-4 col-md-4 col-sm-12">
                     <div class="footer_widgets wid_tit style_one">
                        <div class="fo_wid_title">
                           <h2>Company</h2>
                        </div>
                     </div>
                     <!--===============spacing==============-->
                     <div class="pd_bottom_25"></div>
                     <!--===============spacing==============-->
                     <div class="footer_widgets clearfix navigation_foo light_color style_one">
                        <div class="navigation_foo_box">
                           <div class="navigation_foo_inner">

                              <ul class="menu">
                                 <li><a href="#">Home</a></li>
                                 <li><a href="#">About Us</a></li>
                                 <li><a href="#">Contact</a></li>
                                 <li><a href="#">Professionals</a></li>
                                 <li><a href="#">Insights</a></li>
                                 <li><a href="#">HR Solutions</a></li>
                              </ul>

                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-4 col-md-4 col-sm-12">
                     <div class="footer_widgets wid_tit style_one">
                        <div class="fo_wid_title">
                           <h2>Information</h2>
                        </div>
                     </div>
                     <!--===============spacing==============-->
                     <div class="pd_bottom_25"></div>
                     <!--===============spacing==============-->
                     <div class="footer_widgets clearfix navigation_foo light_color style_one">
                        <div class="navigation_foo_box">
                           <div class="navigation_foo_box">
                              <div class="navigation_foo_inner">

                                 <ul class="menu">
                                    <li><a href="#">How it's Work</a></li>
                                    <li><a href="#">Partners</a></li>
                                    <li><a href="#">Testimonials</a></li>
                                    <li><a href="#">Key Areas</a></li>
                                    <li><a href="#">Case Studies</a></li>
                                    <li><a href="#">Pricing</a></li>
                                 </ul>

                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-4 col-md-4 col-sm-12">
                     <div class="footer_widgets wid_tit style_one">
                        <div class="fo_wid_title">
                           <h2>Essentials</h2>
                        </div>
                     </div>
                     <!--===============spacing==============-->
                     <div class="pd_bottom_25"></div>
                     <!--===============spacing==============-->
                     <div class="footer_widgets clearfix navigation_foo light_color style_one">
                        <div class="navigation_foo_box">
                           <div class="navigation_foo_inner">

                              <ul class="menu">
                                 <li><a href="#">Careers</a></li>
                                 <li><a href="#">Infrastructure</a></li>
                                 <li><a href="#">Client Support</a></li>
                                 <li><a href="#">Privacy Policy</a></li>
                                 <li><a href="#">Terms of Use</a></li>
                                 <li><a href="#">Sitemap</a></li>
                              </ul>

                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!--===============spacing==============-->
            <div class="pd_bottom_50"></div>
            <!--===============spacing==============-->
         </div>
         <div class="creote-footer-copyright bg_dark_3">

            <div class="container">
               <div class="row align-items-center">
                  <div class="col-lg-6 col-md-12 col-sm-12">
                     <!--===============spacing==============-->
                     <div class="pd_top_10"></div>
                     <!--===============spacing==============-->
                     <div class="footer_copy_content color_white">
                        © {{ date('Y') }} <a href="https://ppfkuwait.org">PPF Kuwait.</a> All Rights
                        Reserved.
                     </div>
                     <!--===============spacing==============-->
                     <div class="pd_bottom_10"></div>
                     <!--===============spacing==============-->
                  </div>
                  <div class="col-lg-6 col-md-12 col-sm-12 text-md-end">
                     <!--===============spacing==============-->
                     <div class="pd_top_10"></div>
                     <!--===============spacing==============-->
                     <div class="footer_copy_content_right">
                        <div class="social_media_v_one">
                           <ul>
                              <li>
                                 <a href="#">
                                    <span class="fa fa-facebook"></span>
                                    <small>facebook</small>
                                 </a>
                              </li>
                              <li>
                                 <a href="#">
                                    <span class="fa fa-twitter"></span>
                                    <small>twitter</small>
                                 </a>
                              </li>
                              <li>
                                 <a href="#">
                                    <span class="fa fa-skype"></span>
                                    <small>skype</small>
                                 </a>
                              </li>
                              <li>
                                 <a href="#">
                                    <span class="fa fa-instagram"></span>
                                    <small>instagram</small>
                                 </a>
                              </li>
                           </ul>
                        </div>
                     </div>
                     <!--===============spacing==============-->
                     <div class="pd_bottom_10"></div>
                     <!--===============spacing==============-->
                  </div>
               </div>
            </div>

         </div>
      </div>
      <!---==============footer end =================-->
      <!---==============mobile menu =================-->
      <div class="crt_mobile_menu">
         <div class="menu-backdrop"></div>
         <nav class="menu-box">
            <div class="close-btn"><i class="icon-close"></i></div>
            <form role="search" method="get" action="#">
               <input type="search" class="search" placeholder="Search..." value="" name="s" title="Search" />
               <button type="submit" class="sch_btn"> <i class="icon-search"></i></button>
            </form>
            <div class="menu-outer">
               <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
            </div>
         </nav>
      </div>
      <!---==============mobile menu end =================-->
      <!---==============search popup =================-->
      <div id="search-popup" class="search-popup">
         <div class="close-search"><i class="fa fa-times"></i></div>
         <div class="popup-inner">
            <div class="overlay-layer"></div>
            <div class="search-form">
               <fieldset>
                  <form role="search" method="get" action="#">
                     <input type="search" class="search" placeholder="Search..." value="" name="s" title="Search" />
                     <button type="submit" class="sch_btn"> <i class="icon-search"></i></button>
                  </form>
               </fieldset>
            </div>
         </div>
      </div>
      <!---==============search popup end =================-->
      <!---==============modal popup =================-->
      <div class="modal_popup one">
         <div class="modal-popup-inner">
            <div class="close-modal"><i class="fa fa-times"></i></div>
            <div class="modal_box">
               <div class="row">
                  <div class="col-lg-5 col-md-12 form_inner">
                     <div class="form_content">
                        <form class="contact-form" method="post" action="sendemail.php">
                           <p>
                              <label> Your name<br />
                                 <input type="text" name="name" value="" size="40" aria-required="true" aria-invalid="false" placeholder="Enter Your Name" />
                                 <br />
                                 <i class="fa fa-user"></i><br />
                              </label>
                           </p>
                           <p><label> Your email<br />
                                 <input type="email" name="email" value="" size="40" aria-required="true" aria-invalid="false" placeholder="Enter Your Email" />
                                 <br />
                                 <i class="fa fa-envelope"></i><br />
                              </label>
                           </p>
                           <p>
                              <label> Subject<br />
                                 <input type="text" name="subject" value="" size="40" aria-required="true" aria-invalid="false" placeholder="Enter Your Subject" />
                                 <br />
                                 <i class="fa fa-folder"></i><br />
                              </label>
                           </p>
                           <p>
                              <label> Your message (optional)<br />
                                 <textarea name="message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false" placeholder="Enter Your Message"></textarea>
                                 <br />
                                 <i class="fa fa-comments"></i><br />
                              </label>
                           </p>
                           <p><input type="submit" value="Submit" /></p>
                        </form>
                     </div>
                  </div>
                  <div class="col-lg-7 col-md-12 about_company_inner">
                     <div class="abt_content">
                        <div class="logo">
                           <img src="{{ asset('/frontend/assets/images/logo-default.png') }}" alt="img" class="company_logo_modal">
                        </div>
                        <div class="text">
                           <p> The great explorer of the truth, the master-builder of human happiness no one rejects
                              dislikes avoids pleasure itself because it is pleasure but because know who do not those
                              how to pursue pleasures rationally encounter consequences that are extremely painful
                              desires to obtain.</p>
                           <a href="#">Read More</a>
                        </div>
                        <div class="post_contet_modal">
                           <h2> Latest News</h2>
                           <div class="post_enable">
                              <div class="modal_post_grid">
                                 <a href="blog-single.html">
                                    <img width="852" height="812" src="{{ asset('/frontend/assets/images/blog/blog-image-9.jpg') }}" class="main_img wp-post-image" alt="img" />
                                 </a>
                              </div>
                              <div class="modal_post_grid">
                                 <a href="blog-single.html">
                                    <img width="852" height="812" src="{{ asset('/frontend/assets/images/blog/blog-image-8.jpg') }}" class="main_img wp-post-image" alt="img" />
                                 </a>
                              </div>
                              <div class="modal_post_grid">
                                 <a href="blog-single.html">
                                    <img width="852" height="812" src="{{ asset('/frontend/assets/images/blog/blog-image-7.jpg') }}" class="main_img wp-post-image" alt="img" />
                                 </a>
                              </div>
                              <div class="modal_post_grid">
                                 <a href="blog-single.html">
                                    <img width="852" height="812" src="{{ asset('/frontend/assets/images/blog/blog-image-6.jpg') }}" class="main_img wp-post-image" alt="img" />
                                 </a>
                              </div>
                              <div class="modal_post_grid">
                                 <a href="blog-single.html">
                                    <img width="852" height="812" src="{{ asset('/frontend/assets/images/blog/blog-image-5.jpg') }}" class="main_img wp-post-image" alt="img" />
                                 </a>
                              </div>
                           </div>
                        </div>
                        <div class="copright">
                           © 2023 Creote. All Rights Reserved.
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!---==============modal popup end=================-->
      <!---==============cart=================-->
      <div class="side_bar_cart" id="mini_cart">
         <div class="cart_overlay"></div>
         <div class="cart_right_conten">
            <div class="close">
               <div class="close_btn_mini"><i class="icon-close"></i></div>
            </div>
            <div class="cart_content_box">
               <div class="contnet_cart_box">
                  <div class="widget_shopping_cart_content">
                     <p class="woocommerce-mini-cart__empty-message">No products in the cart.</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!---==============cart=================-->
      <!---==============floating menu=================-->
      <div class="floating_menu_box">
         <ul class="float_menu_box">
            <i class="close fa fa-times"></i>
            <li class="floating_menu_text active">
               <a href="#home"> Home </a>
            </li>

            <li class="floating_menu_text ">
               <a href="#about">About </a>
            </li>

            <li class="floating_menu_text ">
               <a href="#service"> Service </a>
            </li>

            <li class="floating_menu_text ">
               <a href="#process"> Process </a>
            </li>

            <li class="floating_menu_text ">
               <a href="#projects"> Projects </a>
            </li>

            <li class="floating_menu_text">
               <a href="#blog"> Blog </a>
            </li>
         </ul>
      </div>
      <!---==============floating menu=================-->
   </div>
   <!-- Back to top with progress indicator-->
   <div class="prgoress_indicator">
      <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
         <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
      </svg>
   </div>
   <!---========================== javascript ==========================-->
   <script type='text/javascript' src="{{ asset('/frontend/assets/js/jquery-3.6.0.min.js') }}"></script>
   <script type='text/javascript' src="{{ asset('/frontend/assets/js/bootstrap.min.js') }}"></script>
   <script type='text/javascript' src="{{ asset('/frontend/assets/js/jquery.fancybox.js') }}"></script>
   <script type='text/javascript' src="{{ asset('/frontend/assets/js/jQuery.style.switcher.min.js') }}"></script>
   <script type='text/javascript' src="{{ asset('/frontend/assets/js/jquery.flexslider-min.js') }}"></script>
   <script type='text/javascript' src="{{ asset('/frontend/assets/js/color-scheme.js') }}"></script>
   <script type='text/javascript' src="{{ asset('/frontend/assets/js/owl.js') }}"></script>
   <script type='text/javascript' src="{{ asset('/frontend/assets/js/swiper.min.js') }}"></script>
   <script type='text/javascript' src="{{ asset('/frontend/assets/js/isotope.min.js') }}"></script>
   <script type='text/javascript' src="{{ asset('/frontend/assets/js/countdown.js') }}"></script>
   <script type='text/javascript' src="{{ asset('/frontend/assets/js/simpleParallax.min.js') }}"></script>
   <script type='text/javascript' src="{{ asset('/frontend/assets/js/appear.js') }}"></script>
   <script type='text/javascript' src="{{ asset('/frontend/assets/js/jquery.countTo.js') }}"></script>
   <script type='text/javascript' src="{{ asset('/frontend/assets/js/sharer.js') }}"></script>
   <script type='text/javascript' src="{{ asset('/frontend/assets/js/validation.js') }}"></script>
   <!-- map script -->
   <!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-CE0deH3Jhj6GN4YvdCFZS7DpbXexzGU"></script>
   <script src="{{ asset('/frontend/assets/js/gmaps.js') }}"></script>
   <script src="{{ asset('/frontend/assets/js/map-helper.js') }}"></script>-->
   <!-- main-js -->
   <script type='text/javascript' src="{{ asset('/frontend/assets/js/creote-extension.js') }}"></script>
   <!---========================== javascript ==========================-->
</body>

</html>