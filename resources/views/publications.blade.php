@extends("base")
@section("content")
<!--===============PAGE CONTENT==============-->
<div id="content" class="site-content ">
    <div class="container-fluid">
        <div class="row default_row">
            <div class="full_width_box">
                <div class="pd_top_80"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="heading mb-3">
                            <h2>Publications</h2>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    @forelse($categories as $key => $item)
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="mg_image_box">
                            <div class="image_box">
                                <img decoding="async" src="{{ $item->image }}" class="img" alt="{{ $item->name }}">
                                <a href="" class="ab_link">
                                    <span class="icon-right-arrow-long"></span>
                                </a>
                            </div>
                            <div class="content">
                                <h2><a href="">{{ $item->name }}</a></h2>
                                <div class="tag">Publication</div>
                            </div>
                        </div>
                    </div>
                    @empty
                    @endforelse
                </div>
                <!--===============spacing==============-->
                <div class="pd_bottom_70"></div>
                <!--===============spacing==============-->
            </div>
        </div>
    </div>
</div>
<!--===============PAGE CONTENT END==============-->
@endsection