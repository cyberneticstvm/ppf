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
                            Contact
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="breadcrumbs creote">
                        <ul class="breadcrumb m-auto">
                            <li><a href="/">Home</a> </li>
                            <li class="active">Contact</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--===============PAGE CONTENT==============-->
<div id="content" class="site-content ">
    <div class="container">
        <div class="pd_top_80"></div>
        <section class="creote-contact-box">
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-4 mb-lg-4 mb-xl-0">
                    <div class="contact_box_content style_one">
                        <div class="contact_box_inner icon_yes ">
                            <div class="icon_bx">
                                <span class="fa fa-headphones"></span>
                            </div>
                            <div class="contnet">
                                <h3>Office Bearers</h3>
                                <p>President: <a href="tel:+96594094335"> +965 94094335</a><br />Gen. Secretary: <a href="tel:+96566845676"> +965 66845676</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-4 mb-lg-4 mb-xl-0">
                    <div class="contact_box_content style_one">
                        <div class="contact_box_inner icon_yes ">
                            <div class="icon_bx">
                                <span class="fa fa-envelope"></span>
                            </div>
                            <div class="contnet">
                                <h3>Email</h3>
                                <p><a href="mailto:ppfk@ppfkuwait.org"> ppfk@ppfkuwait.org</a><br />&nbsp;
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-4 mb-lg-4 mb-xl-0">
                    <div class="contact_box_content style_one">
                        <div class="contact_box_inner icon_yes">
                            <div class="icon_bx">
                                <span class="icon-placeholder"></span>
                            </div>
                            <div class="contnet">
                                <h3> Post Address </h3>
                                <p>Fahaheel Kala Centre, 30 St,<br /> Mangaf, Kuwait</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="contact_box_content style_one">
                        <div class="contact_box_inner icon_yes">
                            <div class="icon_bx">
                                <span class="fa fa-clock-o"></span>
                            </div>
                            <div class="contnet">
                                <h3> Operation Hours </h3>
                                <p>Saturday-Thursday: 09.00 to 07.00 (Friday: Closed)</p>
                            </div>
                        </div>
                    </div>
                </div>-->
            </div>
        </section>
        <section class="contact-map-section mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3486.1743192894264!2d48.131926514084675!3d29.10053456949782!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3fcf062559ae68e3%3A0xda2ccfa9fd4cdfaf!2sFahaheel%20Kala%20Centre%2C%20Mangaf!5e0!3m2!1sen!2sin!4v1655268923941!5m2!1sen!2sin" width="100%" height="350" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </section>
        <!--===============spacing==============-->
        <div class="pd_bottom_80"></div>
    </div>
</div>
<!--===============PAGE CONTENT END==============-->
@endsection