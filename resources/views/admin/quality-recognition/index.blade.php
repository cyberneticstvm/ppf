@extends('admin.base')
@section('content')
<div class="page-body"><div class="container-fluid">
    <div class="page-header"><div class="row"><div class="col-sm-12"><h3>Quality Excellence Recognition</h3><ol class="breadcrumb"><li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li><li class="breadcrumb-item active">Quality Recognition</li></ol></div></div><p>Review company entries, approve submissions, and check email delivery.</p></div>
    @if(!config('quality_recognition.notification_email'))<div class="alert alert-warning">The submission notification email is not configured yet. Set QUALITY_RECOGNITION_NOTIFICATION_EMAIL in .env. Saved submissions can be emailed using the retry action.</div>@endif
    <div class="card"><div class="card-body">
        <form method="GET" action="{{ route('admin.quality-recognition.index') }}" class="row g-3 mb-4">
            <div class="col-md-5"><label for="search">Company name or reference</label><input id="search" name="search" value="{{ request('search') }}" class="form-control" maxlength="255" placeholder="Filter by company name or reference"></div>
            <div class="col-md-3"><label for="status">Review status</label><select id="status" name="status" class="form-control"><option value="">All statuses</option>@foreach(['pending', 'approved', 'rejected'] as $status)<option value="{{ $status }}" @selected(request('status') === $status)>{{ ucfirst($status) }}</option>@endforeach</select></div>
            <div class="col-md-4 d-flex align-items-end gap-2"><button class="btn btn-primary" type="submit">Filter</button><a class="btn btn-light" href="{{ route('admin.quality-recognition.index') }}">Reset</a></div>
        </form>
        <div class="table-responsive"><table class="display table table-sm table-striped" id="basic-1">
            <thead><tr><th>SL No</th><th>Reference</th><th>Company</th><th>Country</th><th>Submitted</th><th>Status</th><th>Emails</th><th data-orderable="false" data-searchable="false">Review</th><th data-orderable="false" data-searchable="false">Delete</th></tr></thead>
            <tbody>@foreach($submissions as $submission)<tr>
                <td>{{ $loop->iteration }}</td><td>{{ $submission->reference }}</td><td>{{ $submission->company_name }}</td><td>{{ $submission->country }}</td><td data-order="{{ $submission->created_at->timestamp }}">{{ $submission->created_at->format('d M Y') }}</td>
                <td><span class="badge badge-{{ $submission->status === 'approved' ? 'success' : ($submission->status === 'rejected' ? 'danger' : 'warning') }}">{{ ucfirst($submission->status) }}</span></td>
                <td>Applicant: {{ $submission->acknowledgement_sent_at ? 'Sent' : 'Pending' }}<br>PPF: {{ $submission->notification_sent_at ? 'Sent' : 'Pending' }}</td>
                <td class="text-center"><a href="{{ route('admin.quality-recognition.show', $submission) }}" title="Review submission" aria-label="Review submission"><i class="fa fa-eye text-info fa-lg" aria-hidden="true"></i></a></td>
                <td class="text-center"><form method="POST" action="{{ route('admin.quality-recognition.destroy', $submission) }}" onsubmit="return confirm('Delete this Quality Recognition submission?')">@csrf @method('DELETE')<button class="border-0 bg-transparent p-0" type="submit" title="Delete submission" aria-label="Delete submission"><i class="fa fa-trash text-danger fa-lg" aria-hidden="true"></i></button></form></td>
            </tr>@endforeach</tbody>
        </table></div>
    </div></div>
</div></div>
@endsection
