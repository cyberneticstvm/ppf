@extends('base')
@push('styles')<link rel="stylesheet" href="{{ asset('frontend/assets/css/quality-recognition.css') }}">@endpush
@section('content')
@include('quality-recognition.header')
<div class="quality-recognition"><div class="container qr-container"><section class="qr-card qr-thanks">
    <span class="qr-eyebrow">Thank you for sharing your story</span>
    <h2>Your entry has been received.</h2>
    <p>We have saved your Quality Excellence Recognition entry for the PPF expert panel to review.</p>
    <p class="qr-reference">Your reference: <strong>{{ $reference }}</strong></p>
    <p>An acknowledgement email with a PDF copy of your submitted answers will be sent to the email address you provided. Please keep this reference for any follow-up. The admin will verify your submission and send any certificate separately.</p>
    <a href="{{ url('/') }}" class="theme-btn one">Back to home</a>
</section></div></div>
@endsection
