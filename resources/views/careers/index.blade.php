@extends('base')
@push('styles')<link rel="stylesheet" href="{{ asset('frontend/assets/css/careers.css') }}">@endpush
@section('content')
@include('careers.header')
<div class="careers-page" id="content"><div class="container">
    <div class="careers-intro"><span class="careers-eyebrow">Opportunities shared by PPF Kuwait</span><h2>Find your next opportunity.</h2><p>Explore the latest job posts and openings shared by our team.</p></div>
    <div class="row">@forelse($careers as $career)<div class="col-lg-4 col-md-6 mb-4"><article class="career-card">
        @if($career->poster_path)<a href="{{ route('careers.show', $career->id) }}" class="career-card-poster"><img src="{{ $career->poster_url }}" alt="Job poster for {{ $career->title }}" loading="lazy"></a>@else<div class="career-card-icon" aria-hidden="true"><i class="fa fa-briefcase"></i></div>@endif
        <div class="career-card-body"><p class="career-date">Posted {{ $career->created_at->format('d M Y') }}</p><h3><a href="{{ route('careers.show', $career->id) }}">{{ $career->title }}</a></h3>@if($career->company || $career->location)<p class="career-meta">{{ collect([$career->company, $career->location])->filter()->implode(' · ') }}</p>@endif
            @if($career->description)<p>{{ \Illuminate\Support\Str::limit(html_entity_decode(strip_tags($career->description), ENT_QUOTES | ENT_HTML5, 'UTF-8'), 160) }}</p>@else<p>View the job poster for details and application instructions.</p>@endif
            @if($career->closing_date)<p class="career-date">Closing date: {{ $career->closing_date->format('d M Y') }}</p>@endif
            <a href="{{ route('careers.show', $career->id) }}" class="career-read-more">View job details <span aria-hidden="true">→</span></a>
        </div>
    </article></div>@empty<div class="col-12"><div class="careers-empty"><i class="fa fa-briefcase" aria-hidden="true"></i><h3>No openings posted yet.</h3><p>Please check back for new career opportunities.</p></div></div>@endforelse</div>
    {{ $careers->links('pagination::bootstrap-5') }}
</div></div>
@endsection
