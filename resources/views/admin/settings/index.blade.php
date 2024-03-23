@extends("admin.base")
@section("content")
<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>User Settings</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Settings</li>
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
                            {{ html()->form('POST', route('user.profile.settings.update' ))->class('theme-form')->open() }}
                            <div class="card-body">
                                <div class="row g-3">
                                    <h5>Let other members see your personal details while searching</h5>
                                    <div class="col-md-2">
                                        <label class="col-form-label pt-0" for="show_mobile">Show Mobile </label>
                                        {{ html()->checkbox('show_mobile', ($member->show_mobile) ? 'checked' : '', '1') }}
                                    </div>
                                    <div class="col-md-2">
                                        <label class="col-form-label pt-0" for="show_email">Show Email </label>
                                        {{ html()->checkbox('show_email', ($member->show_email) ? 'checked' : '', '1') }}
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <a class="btn btn-danger" onclick="window.history.back();">Cancel</a>
                                <button class="btn btn-primary btn-submit" type="submit">Update</button>
                            </div>
                            {{ html()->form()->close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>
@endsection