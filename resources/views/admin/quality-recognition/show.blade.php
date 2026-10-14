@extends('admin.base')
@section('content')
<div class="page-body"><div class="container-fluid">
    <div class="page-title"><h3>{{ $submission->company_name }}</h3><p>{{ $submission->reference }} · Award {{ $submission->award_year }} · {{ ucfirst($submission->status) }}</p><a href="{{ route('admin.quality-recognition.index') }}">← All submissions</a></div>
    <div class="row"><div class="col-xl-8">
        <div class="card"><div class="card-header"><h5>Company and contact details</h5></div><div class="card-body"><dl class="row">
            @foreach(config('quality_recognition.company_fields') as $field => $details)<dt class="col-sm-4">{{ $details['label'] }}</dt><dd class="col-sm-8" style="overflow-wrap:anywhere">{{ $submission->$field ?: '—' }}</dd>@endforeach
            <dt class="col-sm-4">Follow-up consent</dt><dd class="col-sm-8">{{ $submission->follow_up_consent ? 'Yes' : 'No' }}</dd><dt class="col-sm-4">Best-practice sharing consent</dt><dd class="col-sm-8">{{ $submission->sharing_consent ? 'Yes' : 'No' }}</dd>
        </dl></div></div>
        <div class="card"><div class="card-header"><h5>Quality story</h5></div><div class="card-body">
            @foreach(config('quality_recognition.questions') as $field => $question)<h6>{{ $loop->iteration }}. {{ $question['label'] }}</h6><p style="white-space:pre-wrap;overflow-wrap:anywhere">{{ $submission->$field }}</p><hr>@endforeach
            <h6>Possible evidence</h6><p>{{ implode(', ', $submission->evidence_types ?? []) ?: 'None selected' }}</p>
            <h6>Uploaded supporting files</h6>
            @forelse($submission->evidence_files ?? [] as $file)
                <p style="overflow-wrap:anywhere"><a href="{{ route('admin.quality-recognition.evidence', [$submission, $file['id']]) }}"><i class="fa fa-download" aria-hidden="true"></i> {{ $file['name'] }}</a> <small class="text-muted">({{ number_format($file['size'] / 1024, 1) }} KB)</small></p>
            @empty
                <p>No files uploaded.</p>
            @endforelse
            <h6>Impact metric</h6><p>{{ $submission->impact_metric ?: 'Not provided' }}</p><h6>Optional showcase</h6><p style="white-space:pre-wrap;overflow-wrap:anywhere">{{ $submission->showcase ?: 'Not provided' }}</p>
        </div></div>
    </div><div class="col-xl-4">
        <div class="card"><div class="card-header"><h5>Panel review</h5></div><div class="card-body">
            @if($errors->any())<div class="alert alert-danger">@foreach($errors->all() as $error)<p>{{ $error }}</p>@endforeach</div>@endif
            <form method="POST" action="{{ route('admin.quality-recognition.update', $submission) }}">@csrf
                <div class="mb-3"><label for="review-status">Status</label><select id="review-status" name="status" class="form-control">@foreach(['pending', 'approved', 'rejected'] as $status)<option value="{{ $status }}" @selected(old('status', $submission->status) === $status)>{{ ucfirst($status) }}</option>@endforeach</select></div>
                <div class="mb-3"><label for="review-notes">Internal review notes</label><textarea id="review-notes" name="review_notes" class="form-control" rows="5" maxlength="5000">{{ old('review_notes', $submission->review_notes) }}</textarea></div>
                <button class="btn btn-primary" type="submit">Save review</button>
            </form>
            @if($submission->reviewed_at)<p class="mt-3">Last reviewed: {{ $submission->reviewed_at->format('d M Y, H:i') }}</p>@endif
            <form class="mt-3" method="POST" action="{{ route('admin.quality-recognition.destroy', $submission) }}" onsubmit="return confirm('Delete this Quality Recognition submission?')">@csrf @method('DELETE')<button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Delete submission</button></form>
        </div></div>
        <div class="card"><div class="card-header"><h5>Email delivery</h5></div><div class="card-body">
            <p>Applicant acknowledgement with answers PDF: <strong>{{ $submission->acknowledgement_sent_at ? 'Sent' : 'Pending' }}</strong></p>
            <p>PPF notification: <strong>{{ $submission->notification_sent_at ? 'Sent' : 'Pending' }}</strong></p>
            @if(!$submission->acknowledgement_sent_at || !$submission->notification_sent_at)<form method="POST" action="{{ route('admin.quality-recognition.retry-emails', $submission) }}">@csrf<button type="submit" class="btn btn-outline-primary">Retry pending emails</button></form>@endif
        </div></div>
        <div class="card"><div class="card-header"><h5>Certificate</h5></div><div class="card-body">
            <p>After verifying the submission, the admin sends the certificate manually.</p>
            @if($submission->status !== 'approved')<p>Certificate generation requires admin approval.</p>
            @elseif(config('quality_recognition.certificate_view') && view()->exists(config('quality_recognition.certificate_view')))<a href="{{ route('admin.quality-recognition.certificate', $submission) }}" class="btn btn-primary">Download PDF certificate</a>
            @else<p>This submission is approved. The certificate will be available once the final design is configured.</p>@endif
        </div></div>
    </div></div>
</div></div>
@endsection
