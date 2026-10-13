@extends('admin.base')
@section('content')
<div class="page-body"><div class="container-fluid">
    <div class="page-header"><h3>{{ $career->exists ? 'Edit Career Post' : 'Add Career Post' }}</h3><p>Write a job post using the editor, upload a job poster, or include both.</p></div>
    <div class="card"><form method="POST" action="{{ $career->exists ? route('admin.careers.update', $career) : route('admin.careers.store') }}" enctype="multipart/form-data">
        @csrf @if($career->exists) @method('PUT') @endif
        <div class="card-body">
            @if($errors->any())<div class="alert alert-danger" role="alert"><ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
            <div class="row g-3">
                <div class="col-md-8"><label class="col-form-label req" for="career-title">Job title</label><input type="text" id="career-title" name="title" value="{{ old('title', $career->title) }}" class="form-control" maxlength="255" required></div>
                <div class="col-md-4"><label class="col-form-label" for="career-status">Status</label><select id="career-status" name="status" class="form-control"><option value="published" @selected(old('status', $career->status ?? 'published') === 'published')>Published - visible on website</option><option value="draft" @selected(old('status', $career->status) === 'draft')>Draft - hidden from website</option></select></div>
                <div class="col-md-6"><label class="col-form-label" for="career-company">Company (optional)</label><input type="text" id="career-company" name="company" class="form-control" maxlength="255" value="{{ old('company', $career->company) }}"></div>
                <div class="col-md-6"><label class="col-form-label" for="career-location">Location (optional)</label><input type="text" id="career-location" name="location" class="form-control" maxlength="255" value="{{ old('location', $career->location) }}"></div>
                <div class="col-12"><label class="col-form-label" for="career-description">Job description</label><p class="text-muted">Use the same text editor as the other modules. A description is optional when a poster is provided. Upload posters using the field below.</p><textarea id="career-description" name="description" class="form-control editor" rows="10">{{ old('description', $career->description) }}</textarea></div>
                <div class="col-md-6"><label class="col-form-label" for="career-poster">Job poster image</label><input type="file" id="career-poster" name="poster" accept="image/jpeg,image/png,image/webp" class="form-control"><small class="text-muted">JPG, PNG or WebP, up to 5 MB. A poster is optional when a description is provided.</small>
                    @if($career->poster_path)<div class="mt-3"><a href="{{ $career->poster_url }}" target="_blank" rel="noopener"><img src="{{ $career->poster_url }}" alt="Current job poster" style="max-width:100%;max-height:250px;object-fit:contain"></a></div><label class="mt-2"><input type="checkbox" name="remove_poster" value="1" @checked(old('remove_poster'))> Remove current poster</label>@endif
                </div>
                <div class="col-md-6"><div class="mb-3"><label class="col-form-label" for="career-application">Application link (optional)</label><input type="url" id="career-application" name="application_url" class="form-control" maxlength="2000" placeholder="https://..." value="{{ old('application_url', $career->application_url) }}"></div><label class="col-form-label" for="career-closing">Closing date (optional)</label><input type="date" id="career-closing" name="closing_date" class="form-control" value="{{ old('closing_date', $career->closing_date?->format('Y-m-d')) }}"></div>
            </div>
        </div>
        <div class="card-footer text-end"><a class="btn btn-light" href="{{ route('admin.careers.index') }}">Cancel</a><button class="btn btn-primary" type="submit">{{ $career->exists ? 'Save changes' : 'Save job post' }}</button></div>
    </form></div>
</div></div>
@endsection
