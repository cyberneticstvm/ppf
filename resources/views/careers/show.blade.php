@extends('base')
@push('styles')<link rel="stylesheet" href="{{ asset('frontend/assets/css/careers.css') }}">@endpush
@section('content')
@include('careers.header')
<div class="careers-page" id="content"><div class="container"><article class="career-detail">
    <a href="{{ route('careers.index') }}" class="career-read-more">← All career opportunities</a>
    <h1>{{ $career->title }}</h1><p class="career-meta">{{ collect([$career->company, $career->location])->filter()->implode(' · ') }}</p><p class="career-date">Posted {{ $career->created_at->format('d M Y') }}@if($career->closing_date) · Closing date: {{ $career->closing_date->format('d M Y') }}@endif</p>
    @if($career->description)<div class="career-description">{!! $career->description !!}</div>@endif
    @if($career->poster_path)<div class="career-poster"><a href="{{ $career->poster_url }}" target="_blank" rel="noopener" aria-label="Open full-size job poster for {{ $career->title }}"><img src="{{ $career->poster_url }}" alt="Job poster for {{ $career->title }}"></a><p>Click the poster to view it full size.</p></div>@endif
    @if($career->application_url)<a href="{{ $career->application_url }}" target="_blank" rel="noopener noreferrer" class="theme-btn one">Apply / view application instructions</a>@endif
</article></div></div>
@endsection
