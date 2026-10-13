@extends('base')
@push('styles')<link rel="stylesheet" href="{{ asset('frontend/assets/css/careers.css') }}">@endpush
@section('content')
@include('careers.header')
<div class="careers-page" id="content"><div class="container">
    <a href="{{ route('careers.index') }}" class="career-back"><span aria-hidden="true">←</span> All career opportunities</a>
    <div class="career-detail-heading"><span class="careers-eyebrow">Career opportunity</span><h1>{{ $career->title }}</h1><p>{{ collect([$career->company, $career->location])->filter()->implode(' · ') }}</p></div>
    @include('careers.disclaimer')
    <div class="row"><div class="col-lg-8 mb-4"><article class="career-detail">
        @if($career->description)<h2>About this opportunity</h2><div class="career-description">{!! $career->description !!}</div>@endif
        @if($career->poster_path)<div class="career-poster"><h2>Job poster</h2><a href="{{ $career->poster_url }}" target="_blank" rel="noopener" aria-label="Open full-size job poster for {{ $career->title }}"><img src="{{ $career->poster_url }}" alt="Job poster for {{ $career->title }}"></a><p><i class="fa fa-expand" aria-hidden="true"></i> Click the poster to view it full size.</p></div>@endif
    </article></div><div class="col-lg-4 mb-4"><aside class="career-summary" aria-label="Job overview">
        <h2>Job overview</h2><dl>
            @if($career->company)<div><dt><i class="fa fa-building-o" aria-hidden="true"></i> Company</dt><dd>{{ $career->company }}</dd></div>@endif
            @if($career->location)<div><dt><i class="fa fa-map-marker" aria-hidden="true"></i> Location</dt><dd>{{ $career->location }}</dd></div>@endif
            <div><dt><i class="fa fa-calendar" aria-hidden="true"></i> Posted on</dt><dd>{{ $career->created_at->format('d M Y') }}</dd></div>
            @if($career->closing_date)<div><dt><i class="fa fa-clock-o" aria-hidden="true"></i> Closing date</dt><dd>{{ $career->closing_date->format('d M Y') }}</dd></div>@endif
        </dl>
        @if($career->application_url)<a href="{{ $career->application_url }}" target="_blank" rel="noopener noreferrer" class="career-apply">Apply / view application instructions <span aria-hidden="true">↗</span></a>@else<p class="career-apply-help">Follow the application instructions in the job description or poster.</p>@endif
        <a href="{{ route('careers.index') }}" class="career-more">Browse all opportunities <span aria-hidden="true">→</span></a>
    </aside></div></div>
</div></div>
@endsection
