@extends('admin.base')
@section('content')
<div class="page-body"><div class="container-fluid">
    <div class="page-title"><h3>Quality Excellence Recognition</h3><p>Review company entries, approve submissions, and check email delivery.</p></div>
    @if(!config('quality_recognition.notification_email'))<div class="alert alert-warning">The submission notification email is not configured yet. Set QUALITY_RECOGNITION_NOTIFICATION_EMAIL in .env. Saved submissions can be emailed using the retry action.</div>@endif
    <div class="card"><div class="card-body">
        <form method="GET" action="{{ route('admin.quality-recognition.index') }}" class="row g-3 mb-4">
            <div class="col-md-5"><label for="search">Company name or reference</label><input id="search" name="search" value="{{ request('search') }}" class="form-control" maxlength="255"></div>
            <div class="col-md-3"><label for="status">Review status</label><select id="status" name="status" class="form-control"><option value="">All statuses</option>@foreach(['pending', 'approved', 'rejected'] as $status)<option value="{{ $status }}" @selected(request('status') === $status)>{{ ucfirst($status) }}</option>@endforeach</select></div>
            <div class="col-md-4 d-flex align-items-end gap-2"><button class="btn btn-primary" type="submit">Filter</button><a class="btn btn-light" href="{{ route('admin.quality-recognition.index') }}">Reset</a></div>
        </form>
        <div class="table-responsive"><table class="table table-bordered"><thead><tr><th>Reference</th><th>Company</th><th>Country</th><th>Submitted</th><th>Status</th><th>Emails</th><th>Action</th></tr></thead><tbody>
            @forelse($submissions as $submission)<tr>
                <td>{{ $submission->reference }}</td><td>{{ $submission->company_name }}</td><td>{{ $submission->country }}</td><td>{{ $submission->created_at->format('d M Y') }}</td>
                <td><span class="badge badge-{{ $submission->status === 'approved' ? 'success' : ($submission->status === 'rejected' ? 'danger' : 'warning') }}">{{ ucfirst($submission->status) }}</span></td>
                <td>Applicant: {{ $submission->acknowledgement_sent_at ? 'Sent' : 'Pending' }}<br>PPF: {{ $submission->notification_sent_at ? 'Sent' : 'Pending' }}</td>
                <td><a class="btn btn-primary btn-sm" href="{{ route('admin.quality-recognition.show', $submission) }}">Review</a></td>
            </tr>@empty<tr><td colspan="7" class="text-center">No submissions found.</td></tr>@endforelse
        </tbody></table></div>
        {{ $submissions->links('pagination::bootstrap-5') }}
    </div></div>
</div></div>
@endsection
