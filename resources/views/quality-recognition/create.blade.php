@extends('base')
@push('styles')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/quality-recognition.css') }}">
@endpush
@push('scripts')
<script src="{{ asset('frontend/assets/js/quality-recognition.js') }}" defer></script>
@endpush
@section('content')
@include('quality-recognition.header')
<div id="content" class="site-content quality-recognition">
    <div class="container qr-container">
        <div class="qr-intro">
            <span class="qr-eyebrow">PPF Kuwait · Quality Recognition · Award {{ config('quality_recognition.year') }}</span>
            <h2>Every quality story deserves to be heard.</h2>
            <p>Celebrating quality management and innovation — in Kuwait, and across the world.</p>
            <div class="qr-theme"><strong>In celebration of World Quality Day {{ config('quality_recognition.year') }}</strong><br>“Quality: Powering Performance”<br>Behind every strong result is a quality culture powering it — show us yours.</div>
        </div>
        <div class="qr-notice"><strong>You never need to share anything confidential.</strong> No client names, no pricing, no proprietary details — tell your story at whatever level you're comfortable with. This is a celebration, not an audit, and there are no wrong answers. A small win from a small team counts as much as a large project. Wherever in the world your company or organization is based, this is your space to show the quality steps you're proud of.</div>
        <details class="qr-rules" open>
            <summary>Rules &amp; judging</summary>
            <ol>
                <li><strong>The PPF panel decides.</strong> Entries are assessed by the Progressive Professional Forum (PPF) expert panel — senior professionals in the quality field practising in Kuwait. Their evaluation and final decision are the ultimate authority: final and binding, and not subject to appeal.</li>
                <li><strong>Prizes &amp; recognition.</strong> Prizes are awarded to the best companies and organizations based in Kuwait. Companies and organizations anywhere in the world are warmly welcome to enter — and where international entries are received, the panel will choose a Special Recognition to honour outstanding quality beyond Kuwait.</li>
                <li><strong>Open to all.</strong> Companies and organizations of any size, sector, and country may enter. Please tell us your country and state/region so we can place your story on the map.</li>
                <li><strong>Tell the truth.</strong> Every entry must be genuine and reflect your own company's work over the last few years.</li>
                <li><strong>Share only what's comfortable.</strong> Claims may be verified. Shortlisted companies and organizations may be invited to share non-confidential evidence — documents, metrics, photos, or references — or to present to the panel. Nothing confidential is ever required.</li>
                <li><strong>One entry per company or organization</strong>, unless otherwise announced.</li>
                <li><strong>Your information</strong> is used only for this recognition, and may be shared as best practice with credit — only with your consent.</li>
            </ol>
            <p>The decision of the PPF expert panel is final.</p>
        </details>
        @if($errors->any())
        <div class="alert alert-danger" role="alert" tabindex="-1" id="qr-errors"><strong>Please check your entry:</strong><ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
        @endif
        <form method="POST" action="{{ route('quality-recognition.store') }}" enctype="multipart/form-data" id="quality-recognition-form" data-submit-progress data-submit-label="Submitting...">
            @csrf
            <p class="qr-required">Fields marked <span aria-hidden="true">*</span> are required. Supporting files are optional — share non-confidential material only.</p>
            @foreach([1 => ['Your Quality Foundation', array_slice(config('quality_recognition.questions'), 0, 4, true)], 2 => ['Innovation & Improvement', array_slice(config('quality_recognition.questions'), 4, null, true)]] as $section => [$heading, $questions])
            <section class="qr-card" aria-labelledby="section-{{ $section }}">
                <div class="qr-section-title"><span>{{ $section }}</span><h3 id="section-{{ $section }}">{{ $heading }}</h3></div>
                @foreach($questions as $field => $question)
                <div class="qr-field">
                    <label for="{{ $field }}"><span class="qr-question-number">{{ sprintf('%02d', array_search($field, array_keys(config('quality_recognition.questions'))) + 1) }}</span> {{ $question['label'] }} <span class="qr-star" aria-hidden="true">*</span></label>
                    <p id="{{ $field }}-hint" class="qr-hint">{{ $question['hint'] }}</p>
                    <textarea id="{{ $field }}" name="{{ $field }}" rows="4" maxlength="10000" required class="form-control @error($field) is-invalid @enderror" aria-describedby="{{ $field }}-hint @error($field) {{ $field }}-error @enderror" @error($field) aria-invalid="true" @enderror placeholder="{{ $question['placeholder'] }}">{{ old($field) }}</textarea>
                    @error($field)<small class="text-danger" id="{{ $field }}-error">{{ $message }}</small>@enderror
                </div>
                @if($field === 'improvement')
                <fieldset class="qr-evidence"><legend>If you'd love to show it off — what could you share? <small>(optional · non-confidential only)</small></legend>
                    <div class="qr-chips">@foreach(config('quality_recognition.evidence_options') as $option)<label><input type="checkbox" name="evidence_types[]" value="{{ $option }}" @checked(in_array($option, (array) old('evidence_types', [])))><span>{{ $option }}</span></label>@endforeach</div>
                    @error('evidence_types')<small class="text-danger">{{ $message }}</small>@enderror
                    @error('evidence_types.*')<small class="text-danger">{{ $message }}</small>@enderror
                    <div class="qr-field mt-3">
                        <label for="evidence_files">Upload supporting files <small>(optional)</small></label>
                        <p class="qr-hint" id="evidence-files-hint">Select up to 5 files, maximum 5 MB each. PDF, JPG, PNG, WebP, Word, Excel or PowerPoint. Files are available only to the PPF admin team and are not attached to emails.</p>
                        <input type="file" name="evidence_files[]" id="evidence_files" multiple accept=".pdf,.jpg,.jpeg,.png,.webp,.doc,.docx,.xls,.xlsx,.ppt,.pptx" class="form-control" aria-describedby="evidence-files-hint evidence-files-selection">
                        <p class="qr-hint mt-2" id="evidence-files-selection" role="status" aria-live="polite"></p>
                        @error('evidence_files')<small class="text-danger">{{ $message }}</small>@enderror
                        @foreach($errors->get('evidence_files.*') as $messages) @foreach($messages as $message)<small class="text-danger d-block">{{ $message }}</small>@endforeach @endforeach
                        @if($errors->any())<p class="qr-hint">Please reselect supporting files before submitting again.</p>@endif
                    </div>
                </fieldset>
                @endif
                @if($field === 'improvement_impact')
                <div class="qr-field"><label for="impact_metric">One number that shows it <small>(optional)</small></label><input type="text" id="impact_metric" name="impact_metric" maxlength="255" class="form-control" value="{{ old('impact_metric') }}" placeholder="e.g. rework dropped 8% → 2% during 2024">@error('impact_metric')<small class="text-danger">{{ $message }}</small>@enderror</div>
                @endif
                @endforeach
                @if($section === 2)
                <div class="qr-field qr-showcase"><label for="showcase">★ Have an extraordinary quality step you'd like to showcase to the world? <small>(optional)</small></label><p class="qr-hint">Your boldest or most original quality practice — the one you'd want others to learn from.</p><textarea id="showcase" name="showcase" rows="4" maxlength="10000" class="form-control" placeholder="The step we would put on the world stage is…">{{ old('showcase') }}</textarea>@error('showcase')<small class="text-danger">{{ $message }}</small>@enderror</div>
                @endif
            </section>
            @endforeach
            <section class="qr-card" aria-labelledby="section-3">
                <div class="qr-section-title"><span>3</span><h3 id="section-3">About Your Company or Organization</h3></div>
                <div class="row">
                    @foreach(config('quality_recognition.company_fields') as $field => $details)
                    <div class="col-md-6 qr-field"><label for="{{ $field }}">{{ $details['label'] }} @if($details['required'])<span class="qr-star" aria-hidden="true">*</span>@else<small>(optional)</small>@endif</label>
                        <input type="{{ $field === 'email' ? 'email' : ($field === 'phone' ? 'tel' : 'text') }}" name="{{ $field }}" id="{{ $field }}" value="{{ old($field) }}" placeholder="{{ $details['placeholder'] }}" maxlength="{{ ['country' => 100, 'region' => 150, 'industry' => 150, 'company_size' => 100, 'years_in_operation' => 50, 'contact_name' => 150, 'designation' => 150, 'phone' => 50][$field] ?? 255 }}" class="form-control @error($field) is-invalid @enderror" @required($details['required']) @error($field) aria-invalid="true" aria-describedby="{{ $field }}-error" @enderror>
                        @error($field)<small class="text-danger" id="{{ $field }}-error">{{ $message }}</small>@enderror
                    </div>
                    @endforeach
                </div>
                <div class="qr-consents">
                    <label><input type="checkbox" name="follow_up_consent" value="1" @checked(old('follow_up_consent'))><span>We're happy to be contacted for a follow-up.</span></label>
                    <label><input type="checkbox" name="sharing_consent" value="1" @checked(old('sharing_consent'))><span>We consent to our entry being shared as best practice with credit to our company or organization. (Optional)</span></label>
                    <label><input type="checkbox" name="rules_accepted" value="1" required @checked(old('rules_accepted'))><span>I have read the rules and judging information, and confirm this entry reflects our own company's work. <span class="qr-star" aria-hidden="true">*</span></span></label>
                    @error('rules_accepted')<small class="text-danger">{{ $message }}</small>@enderror
                </div>
            </section>
            <section class="qr-card" id="qr-review" hidden tabindex="-1" aria-labelledby="qr-review-heading"><h3 id="qr-review-heading">Review your entry</h3><p>Please check your answers and contact email before submitting.</p><dl id="qr-review-content"></dl><button type="button" class="btn btn-outline-secondary" id="qr-edit">Back to editing</button></section>
            <div class="qr-submit"><button type="submit" class="theme-btn one btn-submit" id="qr-submit">Submit entry</button><p data-submit-status hidden role="status" aria-live="polite">Submitting your entry and preparing your acknowledgement email. Please wait until the process finishes.</p><p>Your entry will be saved and sent to the PPF team for review. You will receive an acknowledgement email with a PDF copy of your answers. The admin will verify your submission and send any certificate separately.</p></div>
        </form>
        <p class="qr-footnote">Thank you for sharing your story. Entries are recognised by the Progressive Professional Forum (PPF), Kuwait — celebrating the quality that companies and organizations build the world over.</p>
    </div>
</div>
@endsection
