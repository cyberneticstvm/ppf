@extends("admin.base")
@section("content")
<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Manage Logo & Header</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Manage Logo & Header</li>
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
                            {{ html()->form('POST', route('logo.update' ))->class('theme-form')->acceptsFiles()->open() }}
                            <input type="hidden" name="logo_id" value="{{ encrypt($logo->id) }}" />
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="col-form-label pt-0 req" for="logo">Logo Image </label>
                                        {{ html()->file('logo')->class('form-control') }}
                                        <small class="form-text text-muted">Max file size should be less than 1MB</small>
                                        @error('logo')
                                        <small class="text-danger">{{ $errors->first('logo') }}</small>
                                        @enderror
                                        <div class=""><img src="{{ ($logo->logo) ? asset($logo->logo) : '' }}" class="img-fluid" width="25%" alt="{{ $logo->alt_text }}" /></div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-form-label pt-0 req" for="alt_text">Alt Text </label>
                                        {{ html()->text('alt_text', $logo->alt_text)->class('form-control')->placeholder('Alt Text') }}
                                        @error('alt_text')
                                        <small class="text-danger">{{ $errors->first('alt_text') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-form-label pt-0 req" for="mobile">Mobile </label>
                                        {{ html()->text('mobile', $logo->mobile)->class('form-control')->placeholder('Mobile')->maxlength('15') }}
                                        @error('mobile')
                                        <small class="text-danger">{{ $errors->first('mobile') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-form-label pt-0 req" for="email">Email </label>
                                        {{ html()->email('email', $logo->email)->class('form-control')->placeholder('Email') }}
                                        @error('email')
                                        <small class="text-danger">{{ $errors->first('email') }}</small>
                                        @enderror
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