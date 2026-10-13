<!DOCTYPE html>
<html lang="en"><head><meta charset="UTF-8"><title>Quality Excellence Recognition</title></head>
<body style="font-family:Arial,sans-serif;color:#222;line-height:1.7;background:#f5f5f5;padding:24px">
<main style="max-width:720px;margin:auto;background:white;padding:32px;border-top:5px solid #e5102a">
    <p style="color:#e5102a">Progressive Professional Forum · Kuwait</p>
    <h1 style="font-size:24px">Quality Excellence Recognition {{ $submission->award_year }}</h1>
    @if($forAdmin)
    <p>A new entry has been received from <strong>{{ $submission->company_name }}</strong>.</p>
    <p><a href="{{ route('admin.quality-recognition.show', $submission) }}">Review this entry in the admin panel</a></p>
    @else
    <p>Dear {{ $submission->contact_name }},</p>
    <p>Thank you for sharing your quality story. We have received and saved your entry for <strong>{{ $submission->company_name }}</strong>. The PPF expert panel will review it.</p>
    <p>A PDF copy of your submitted answers is attached for your records. Please keep it along with your reference number.</p>
    <p>The admin will verify your submission and send any certificate separately after verification.</p>
    @endif
    <p><strong>Reference:</strong> {{ $submission->reference }}<br><strong>Submitted:</strong> {{ $submission->created_at->timezone('Asia/Kuwait')->format('d M Y, H:i') }} (Kuwait time)</p>
    <h2 style="font-size:18px">Company and contact details</h2>
    <table style="width:100%;border-collapse:collapse">@foreach(config('quality_recognition.company_fields') as $field => $details)<tr><th style="text-align:left;vertical-align:top;padding:8px;border-bottom:1px solid #ddd">{{ $details['label'] }}</th><td style="padding:8px;border-bottom:1px solid #ddd">{{ $submission->$field ?: '—' }}</td></tr>@endforeach</table>
    @if($forAdmin)
    @foreach(config('quality_recognition.questions') as $field => $question)<h2 style="font-size:18px">{{ $question['label'] }}</h2><p style="white-space:pre-wrap">{{ $submission->$field }}</p>@endforeach
    <p><strong>Possible evidence:</strong> {{ implode(', ', $submission->evidence_types ?? []) ?: 'None selected' }}</p>
    <p><strong>Impact metric:</strong> {{ $submission->impact_metric ?: 'Not provided' }}</p>
    <h2 style="font-size:18px">Optional showcase</h2><p style="white-space:pre-wrap">{{ $submission->showcase ?: 'Not provided' }}</p>
    <p><strong>Follow-up consent:</strong> {{ $submission->follow_up_consent ? 'Yes' : 'No' }}<br><strong>Best-practice sharing consent:</strong> {{ $submission->sharing_consent ? 'Yes' : 'No' }}</p>
    @endif
    <p>Progressive Professional Forum (PPF), Kuwait</p>
</main></body></html>
