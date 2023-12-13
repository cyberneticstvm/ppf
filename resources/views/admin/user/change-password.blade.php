@extends("admin.base")
@section("content")
<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Update Password</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Update Password</li>
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
                            {{ html()->form('POST', route('change.password.update'))->class('theme-form')->open() }}
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label class="col-form-label pt-0 req" for="password">Password </label>
                                        {{ html()->password('password', old('password'))->class('form-control')->placeholder('******') }}
                                        @error('password')
                                        <small class="text-danger">{{ $errors->first('password') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label pt-0 req" for="password_confirmation">Confirm Password </label>
                                        {{ html()->password('password_confirmation', old('password_confirmation'))->class('form-control')->placeholder('******') }}
                                        @error('password_confirmation')
                                        <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <a class="btn btn-danger" onclick="window.history.back();">Cancel</a>
                                <button class="btn btn-primary btn-submit" type="submit">Save</button>
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