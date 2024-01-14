@extends("admin.base")
@section("content")
<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Search Member</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Search Member</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-xl-12">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            {{ html()->form('POST', (Auth::user()->type == 'admin') ? route('admin.search.member.update') : route('search.member.update'))->class('theme-form')->open() }}
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-3">
                                        <label class="col-form-label pt-0" for="status">Qualification </label>
                                        {{ html()->select('qualification', $quals->pluck('name', 'name'), old('qualification'))->class('form-control')->placeholder('Select') }}
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-form-label pt-0" for="status">Profession </label>
                                        {{ html()->select('profession', $quals->pluck('name', 'name'), old('profession'))->class('form-control')->placeholder('Select') }}
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-form-label pt-0" for="status">Specialization </label>
                                        {{ html()->select('specialization', $quals->pluck('name', 'name'), old('specialization'))->class('form-control')->placeholder('Select') }}
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-form-label pt-0" for="status">Membership Status </label>
                                        {{ html()->select('approval_status', membershipStatus(), old('approval_status'))->class('form-control')->placeholder('Select') }}
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-form-label pt-0" for="status">Membership Type </label>
                                        {{ html()->select('type', membershipTypes(), old('type'))->class('form-control')->placeholder('Select') }}
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <a class="btn btn-danger" onclick="window.history.back();">Cancel</a>
                                <button class="btn btn-primary btn-submit" type="submit">Search</button>
                            </div>
                            {{ html()->form()->close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-xl-12">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body table-responsive">
                                <table class="display table table-sm table-striped" id="basic-3">
                                    <thead>
                                        <th>SL No</th>
                                        <th>Member Name</th>
                                        <th>Qualification</th>
                                        <th>Specialization</th>
                                        <th>Profession</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                    </thead>
                                    <tbody>
                                        @forelse($members as $key => $member)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $member->name }}</td>
                                            <td>{{ $member->qualification }}</td>
                                            <td>{{ $member->specialization }}</td>
                                            <td>{{ $member->profession }}</td>
                                            <td>{{ $member->type }}</td>
                                            <td>{{ $member->approval_status }}</td>
                                        </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection