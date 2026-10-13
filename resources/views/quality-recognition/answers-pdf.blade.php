<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Submitted answers - {{ $submission->reference }}</title>
    <style>
        @page { margin: 64px 48px 58px; }
        body { font-family: 'DejaVu Sans', sans-serif; font-size: 10px; line-height: 1.6; color: #222; }
        header { position: fixed; top: -40px; left: 0; right: 0; font-size: 9px; color: #666; border-bottom: 1px solid #ddd; padding-bottom: 8px; }
        footer { position: fixed; bottom: -36px; left: 0; right: 0; font-size: 8px; color: #666; border-top: 1px solid #ddd; padding-top: 8px; }
        .page-number { float: right; }
        .page-number:after { content: counter(page); }
        .eyebrow { color: #e5102a; font-size: 9px; font-weight: bold; text-transform: uppercase; letter-spacing: 1px; }
        h1 { font-size: 23px; line-height: 1.3; margin: 8px 0 5px; }
        .subtitle { color: #666; margin: 0 0 20px; }
        .reference { background: #fff1f3; border-left: 3px solid #e5102a; padding: 12px 15px; margin-bottom: 20px; }
        h2 { color: #b70d23; font-size: 14px; margin: 24px 0 10px; padding-bottom: 6px; border-bottom: 1px solid #ddd; page-break-after: avoid; }
        h3 { font-size: 11px; line-height: 1.5; margin: 16px 0 6px; page-break-after: avoid; }
        table { width: 100%; border-collapse: collapse; table-layout: fixed; }
        th, td { padding: 7px 10px; vertical-align: top; border-bottom: 1px solid #e6e6e6; word-wrap: break-word; }
        th { width: 32%; text-align: left; font-weight: bold; background: #f7f7f7; }
        tr { page-break-inside: avoid; }
        .answer { white-space: pre-wrap; word-wrap: break-word; margin: 0 0 12px; }
        .note { color: #666; font-size: 9px; margin-top: 22px; }
    </style>
</head>
<body>
    <header>Progressive Professional Forum (PPF), Kuwait | Quality Excellence Recognition {{ $submission->award_year }}</header>
    <footer>{{ $submission->reference }} | Submitted answers <span class="page-number">Page </span></footer>
    <div class="eyebrow">Your submission copy</div>
    <h1>Quality Excellence Recognition</h1>
    <p class="subtitle">Award {{ $submission->award_year }} - Submitted answers</p>
    <div class="reference">
        <strong>Reference:</strong> {{ $submission->reference }}<br>
        <strong>Submitted:</strong> {{ $submission->created_at->timezone('Asia/Kuwait')->format('d M Y, H:i') }} (Kuwait time)<br>
        <strong>Company / organization:</strong> {{ $submission->company_name }}
    </div>

    <h2>Company and contact details</h2>
    <table>
        @foreach(config('quality_recognition.company_fields') as $field => $details)
        <tr><th>{{ $details['label'] }}</th><td>{{ $submission->$field !== null && $submission->$field !== '' ? $submission->$field : 'Not provided' }}</td></tr>
        @endforeach
    </table>

    @foreach(config('quality_recognition.questions') as $field => $question)
        @if($loop->iteration === 1)<h2>1. Your Quality Foundation</h2>@endif
        @if($loop->iteration === 5)<h2>2. Innovation &amp; Improvement</h2>@endif
        <h3>{{ sprintf('%02d', $loop->iteration) }}. {{ str_replace(['—', '–'], '-', $question['label']) }}</h3>
        <p class="answer">{{ $submission->$field }}</p>
        @if($field === 'improvement')
        <h3>Possible evidence (optional)</h3>
        <p class="answer">{{ implode(', ', $submission->evidence_types ?? []) ?: 'None selected' }}</p>
        @endif
        @if($field === 'improvement_impact')
        <h3>One number that shows it (optional)</h3>
        <p class="answer">{{ $submission->impact_metric !== null && $submission->impact_metric !== '' ? $submission->impact_metric : 'Not provided' }}</p>
        @endif
    @endforeach

    <h3>Extraordinary quality step to showcase (optional)</h3>
    <p class="answer">{{ $submission->showcase ?: 'Not provided' }}</p>
    <h2>Consent preferences</h2>
    <table>
        <tr><th>Follow-up contact</th><td>{{ $submission->follow_up_consent ? 'Yes' : 'No' }}</td></tr>
        <tr><th>Best-practice sharing with credit</th><td>{{ $submission->sharing_consent ? 'Yes' : 'No' }}</td></tr>
        <tr><th>Form rules acknowledged</th><td>Yes, at submission</td></tr>
    </table>
    <p class="note">This document is a copy of the submitted entry and answers. The PPF team will verify the submission. Any certificate will be sent separately by the admin after verification.</p>
</body>
</html>
