@extends('base')
@push('styles')<link rel="stylesheet" href="{{ asset('frontend/assets/css/careers.css') }}">@endpush
@section('content')
@include('careers.header')
<div class="careers-page" id="content"><div class="container">
    <div class="careers-intro"><div><span class="careers-eyebrow">Careers at a glance</span><h2>Your next chapter starts here.</h2><p>Explore opportunities shared by the PPF Kuwait community.</p></div>@if($careers->total())<span class="careers-count"><i class="fa fa-briefcase" aria-hidden="true"></i> {{ $careers->total() }} {{ \Illuminate\Support\Str::plural('opportunity', $careers->total()) }}</span>@endif</div>
    @include('careers.disclaimer')
    <div class="row careers-grid">
        @forelse($careers as $career)
        <div class="col-lg-4 col-md-6 mb-4">
            <a class="career-card" href="{{ route('careers.show', $career->id) }}" aria-label="View job details: {{ $career->title }}">
                @if($career->poster_path)<div class="career-card-poster"><img src="{{ $career->poster_url }}" alt="Job poster for {{ $career->title }}" loading="lazy"></div>@endif
                <div class="career-card-body">
                    <div class="career-card-top"><span class="career-monogram" aria-hidden="true">{{ mb_strtoupper(mb_substr($career->company ?: $career->title, 0, 1)) }}</span><span class="career-posted">{{ $career->created_at->format('d M Y') }}</span>@if($career->created_at->gte(now()->subDays(7)))<span class="career-new">New</span>@endif</div>
                    <h3>{{ $career->title }}</h3>
                    <p class="career-company">{{ $career->company ?: 'Opportunity shared by PPF' }}</p>
                    @if($career->location)<p class="career-location"><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $career->location }}</p>@endif
                    <p class="career-excerpt">{{ $career->description ? $career->excerpt : 'Explore the job poster for role details, requirements and application instructions.' }}</p>
                    <div class="career-card-bottom"><div><span class="career-card-label">{{ $career->closing_date ? 'Closing date' : 'Explore this role' }}</span><strong>{{ $career->closing_date ? $career->closing_date->format('d M Y') : 'View job details' }}</strong></div><span class="career-card-arrow" aria-hidden="true">→</span></div>
                </div>
            </a>
        </div>
        @empty
        <div class="col-12"><div class="careers-empty"><span class="career-empty-icon"><i class="fa fa-briefcase" aria-hidden="true"></i></span><h3>No openings posted yet.</h3><p>Please check back for new career opportunities.</p></div></div>
        @endforelse
    </div>
    @if($careers->total())<div class="careers-pagination"><p>Showing {{ $careers->firstItem() }}–{{ $careers->lastItem() }} of {{ $careers->total() }} opportunities</p><nav aria-label="Career listing pages">{{ $careers->links('pagination::bootstrap-5') }}</nav></div>@endif
</div></div>
@endsection
