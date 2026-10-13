@extends('admin.base')
@section('content')
<div class="page-body"><div class="container-fluid">
    <div class="page-header"><div class="row"><div class="col-sm-6"><h3>Careers</h3><ol class="breadcrumb"><li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li><li class="breadcrumb-item active">Careers</li></ol></div><div class="col-sm-6 text-end"><a href="{{ route('admin.careers.create') }}" class="btn btn-primary">Add Job Post</a><a href="{{ route('careers.index') }}" target="_blank" rel="noopener" class="btn btn-light">View Careers page</a></div></div></div>
    <div class="card"><div class="card-body">
        <form method="GET" class="row g-3 mb-4" action="{{ route('admin.careers.index') }}"><div class="col-md-5"><label for="career-search">Job title</label><input id="career-search" class="form-control" name="search" maxlength="255" placeholder="Filter by job title" value="{{ request('search') }}"></div><div class="col-md-3"><label for="career-filter">Status</label><select id="career-filter" name="status" class="form-control"><option value="">All statuses</option><option value="published" @selected(request('status') === 'published')>Published</option><option value="draft" @selected(request('status') === 'draft')>Draft</option></select></div><div class="col-md-4 d-flex align-items-end gap-2"><button type="submit" class="btn btn-primary">Filter</button><a class="btn btn-light" href="{{ route('admin.careers.index') }}">Reset</a></div></form>
        <div class="table-responsive"><table class="display table table-sm table-striped" id="basic-1">
            <thead><tr><th>SL No</th><th>Job title</th><th>Company / location</th><th>Content</th><th>Status</th><th>Posted</th><th data-orderable="false" data-searchable="false">View</th><th data-orderable="false" data-searchable="false">Edit</th><th data-orderable="false" data-searchable="false">Delete</th></tr></thead>
            <tbody>@foreach($careers as $career)<tr>
                <td>{{ $loop->iteration }}</td><td>{{ $career->title }}</td><td>{{ $career->company ?: '—' }}<br>{{ $career->location }}</td><td>{{ collect([trim(strip_tags($career->description ?? '')) ? 'Written post' : null, $career->poster_path ? 'Poster' : null])->filter()->implode(' + ') }}</td>
                <td><span class="badge badge-{{ $career->status === 'published' ? 'success' : 'secondary' }}">{{ ucfirst($career->status) }}</span></td><td data-order="{{ $career->created_at->timestamp }}">{{ $career->created_at->format('d M Y') }}</td>
                <td class="text-center">@if($career->status === 'published')<a href="{{ route('careers.show', $career->id) }}" target="_blank" rel="noopener" title="View job post" aria-label="View job post"><i class="fa fa-eye text-info fa-lg" aria-hidden="true"></i></a>@else<span class="text-muted">—</span>@endif</td>
                <td class="text-center"><a href="{{ route('admin.careers.edit', $career) }}" title="Edit job post" aria-label="Edit job post"><i class="fa fa-edit text-warning fa-lg" aria-hidden="true"></i></a></td>
                <td class="text-center"><form method="POST" action="{{ route('admin.careers.destroy', $career) }}" onsubmit="return confirm('Delete this career post? It will be removed from the website.')">@csrf @method('DELETE')<button class="border-0 bg-transparent p-0" type="submit" title="Delete job post" aria-label="Delete job post"><i class="fa fa-trash text-danger fa-lg" aria-hidden="true"></i></button></form></td>
            </tr>@endforeach</tbody>
        </table></div>
    </div></div>
</div></div>
@endsection
