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
                            Government Schemes
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="breadcrumbs creote">
                        <ul class="breadcrumb m-auto">
                            <li><a href="/">Home</a> </li>
                            <li class="active">Government Schemes</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="content" class="site-content ">
    <div class="container">
        <div class="row default_row">
            <div class="full_width_box">
                <div class="row mt-5">
                    <div class="col-12">
                        <section class="faq_section type_two">
                            <div class="block_faq">
                                <div class="accordion">
                                    <dl>
                                        @forelse($schemes as $key => $item)
                                        <dt class="faq_header {{ ($key == 0) ? 'active' : '' }}">
                                            {{ $item->title }}<span class="icon-play"></span>
                                        </dt>
                                        <dd class="accordion-content hide" style="{{ ($key == 0) ? 'display:block;' : '' }}">
                                            <p>
                                                {!! substr($item->description, 0, 250) !!}...
                                            </p>
                                            <p class="text-end">Created On: {{ $item->created_at->format('d, M Y') }}</p>
                                            <p class="text-end"><a href="{{ route('scheme.single', encrypt($item->id)) }}">Read More..</a></p>
                                        </dd>
                                        @empty
                                        @endforelse
                                    </dl>
                                </div>
                            </div>
                        </section>
                        {!! $schemes->withQueryString()->links('pagination::bootstrap-5') !!}
                    </div>
                </div>
                <!--===============spacing==============-->
                <div class="pd_bottom_40"></div>
                <!--===============spacing==============-->
            </div>
        </div>
    </div>
</div>
@endsection