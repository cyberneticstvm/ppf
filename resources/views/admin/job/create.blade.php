@extends("admin.base")
@section("content")
<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Job Create</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Job Create</li>
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
                            {{ html()->form('POST', route('job.save'))->class('theme-form')->acceptsFiles()->open() }}
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="col-form-label pt-0 req" for="title">Job Name / Title </label>
                                        {{ html()->text('title', old('title'))->class('form-control')->placeholder('Job Name / Title') }}
                                        @error('title')
                                        <small class="text-danger">{{ $errors->first('title') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-form-label pt-0" for="image">Cover Image </label>
                                        {{ html()->file('image', old('image'))->class('form-control') }}
                                        <small class="form-text text-muted">Max file size should be less than 1MB</small>
                                        @error('image')
                                        <small class="text-danger">{{ $errors->first('image') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label pt-0" for="document">Document </label>
                                        {{ html()->file('document', old('document'))->class('form-control') }}
                                        <small class="form-text text-muted">Max file size should be less than 1MB</small>
                                        @error('document')
                                        <small class="text-danger">{{ $errors->first('document') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <label class="col-form-label pt-0 req" for="country_id">Country </label>
                                        {{ html()->select('country_id', $countries, old('country_id'))->class('form-control')->placeholder('Select') }}
                                        @error('country_id')
                                        <small class="text-danger">{{ $errors->first('country_id') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <label class="col-form-label pt-0 req" for="status">Status </label>
                                        {{ html()->select('status', status(), old('status'))->class('form-control')->placeholder('Select') }}
                                        @error('status')
                                        <small class="text-danger">{{ $errors->first('status') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <label class="col-form-label pt-0 req" for="category">Category </label>
                                        {{ html()->select('category', array('job' => 'Job', 'scheme' => 'Scheme'), old('category'))->class('form-control')->placeholder('Select') }}
                                        @error('category')
                                        <small class="text-danger">{{ $errors->first('category') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <label class="col-form-label pt-0 req" for="last_date_of_apply">Last Date of Application</label>
                                        {{ html()->date('last_date_of_apply', date('Y-m-d'))->class('form-control') }}
                                        @error('last_date_of_apply')
                                        <small class="text-danger">{{ $errors->first('last_date_of_apply') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <label class="col-form-label pt-0 req" for="description">Job Description </label>
                                        {{ html()->textarea('description', old('description'))->class('form-control editor')->placeholder('Publication Description') }}
                                        @error('description')
                                        <small class="text-danger">{{ $errors->first('description') }}</small>
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