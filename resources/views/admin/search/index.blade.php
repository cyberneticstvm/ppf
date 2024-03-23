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
                                        {{ html()->select('qualification', $quals->pluck('name', 'name'), (old('qualification')) ?? $inputs[0])->class('form-control')->placeholder('Select') }}
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-form-label pt-0" for="status">Profession </label>
                                        {{ html()->select('profession', $profs->pluck('name', 'name'), (old('profession')) ?? $inputs[1])->class('form-control')->placeholder('Select') }}
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-form-label pt-0" for="status">Industry / Specialization </label>
                                        {{ html()->select('specialization', $specs->pluck('name', 'name'), (old('specialization')) ?? $inputs[2])->class('form-control')->placeholder('Select') }}
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-form-label pt-0" for="status">Membership Status </label>
                                        {{ html()->select('approval_status', membershipStatus(), (old('approval_status')) ?? $inputs[3])->class('form-control')->placeholder('Select') }}
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-form-label pt-0" for="status">Membership Type </label>
                                        {{ html()->select('type', membershipTypes(), (old('type')) ?? $inputs[4])->class('form-control')->placeholder('Select') }}
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-form-label pt-0" for="skills">Skill Set </label>
                                        {{ html()->select('skills[]', $skills->pluck('name', 'id'), (old('skills')) ?? $inputs[5])->class('form-control select2')->multiple() }}
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
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>Qualification</th>
                                        <th>Industry</th>
                                        <th>Profession</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                    </thead>
                                    <tbody>
                                        @forelse($members as $key => $member)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $member->name }}</td>
                                            <td>{{ $member->showMobile() }}</td>
                                            <td>{{ $member->showEmail() }}</td>
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