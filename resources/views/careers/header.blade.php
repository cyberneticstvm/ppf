<div class="page_header_default style_one">
    <div class="parallax_cover"><img src="{{ asset('/frontend/assets/images/page-header-default.jpg') }}" alt="" class="cover-parallax"></div>
    <div class="page_header_content"><div class="auto-container"><div class="row"><div class="col-md-12"><div class="banner_title_inner"><div class="title_page">Careers</div></div><div class="breadcrumbs creote"><ul class="breadcrumb m-auto"><li><a href="{{ url('/') }}">Home</a></li>@isset($career)<li><a href="{{ route('careers.index') }}">Careers</a></li><li class="active">Job details</li>@else<li class="active">Careers</li>@endisset</ul></div></div></div></div></div>
</div>
