@extends("admin.base")
@section("content")
<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>About Us Update</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">About Us Update</li>
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
                            {{ html()->form('POST', route('about.update'))->class('theme-form')->acceptsFiles()->open() }}
                            <input type="hidden" name="about_id" value="{{ encrypt($about->id) }}" />
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <label class="col-form-label pt-0 req" for="description">Description </label>
                                        {{ html()->textarea('description', $about->description)->class('form-control editor')->rows('3')->placeholder('Description') }}
                                        @error('description')
                                        <small class="text-danger">{{ $errors->first('description') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <label class="col-form-label pt-0 req" for="mission">Mission </label>
                                        {{ html()->textarea('mission', $about->mission)->class('form-control editor')->rows('3')->placeholder('Mission') }}
                                        @error('mission')
                                        <small class="text-danger">{{ $errors->first('mission') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <label class="col-form-label pt-0 req" for="vision">Vision </label>
                                        {{ html()->textarea('vision', $about->vision)->class('form-control editor')->rows('3')->placeholder('Vision') }}
                                        @error('vision')
                                        <small class="text-danger">{{ $errors->first('vision') }}</small>
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