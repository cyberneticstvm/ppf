@extends("admin.base")
@section("content")
<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Publication Update</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Publication Update</li>
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
                            {{ html()->form('POST', route('publication.update', $pub->id))->class('theme-form')->acceptsFiles()->open() }}
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="col-form-label pt-0 req" for="name">Publication Name / Title </label>
                                        {{ html()->text('name', $pub->name)->class('form-control')->placeholder('Publication Name / Title') }}
                                        @error('name')
                                        <small class="text-danger">{{ $errors->first('name') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-form-label pt-0 req" for="category_id">Publication Category </label>
                                        {{ html()->select('category_id', $types, $pub->category_id)->class('form-control')->placeholder('Select') }}
                                        @error('category_id')
                                        <small class="text-danger">{{ $errors->first('category_id') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-form-label pt-0 req" for="status">Status </label>
                                        {{ html()->select('status', status(), $pub->status)->class('form-control')->placeholder('Select') }}
                                        @error('status')
                                        <small class="text-danger">{{ $errors->first('status') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label pt-0 req" for="image">Cover Image </label>
                                        {{ html()->file('image')->class('form-control') }}
                                        <small class="form-text text-muted">Max file size should be less than 1MB </small><a class="text-info" href="{{ ($pub->image) ? url($pub->image) : '' }}" target="_blank">Cover Image</a>
                                        @error('image')
                                        <small class="text-danger">{{ $errors->first('image') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label pt-0" for="document">Document </label>
                                        {{ html()->file('document')->class('form-control') }}
                                        <small class="form-text text-muted">Max file size should be less than 1MB </small><a class="text-info" href="{{ ($pub->document) ? url($pub->document) : '' }}" target="_blank">Document</a>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label pt-0" for="video">Video </label>
                                        {{ html()->file('video')->class('form-control') }}
                                        <small class="form-text text-muted">Max file size should be less than 10MB </small><a class="text-info" href="{{ ($pub->video) ? url($pub->video) : '' }}" target="_blank">Video</a>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-form-label pt-0" for="url">Youtube iFrame / URL </label>
                                        {{ html()->text('url', $pub->url)->class('form-control')->placeholder('Youtube iFrame / URL') }}
                                        <!--<small class="form-text"><a href="https://ppf-kuwait-bucket.s3.ap-south-1.amazonaws.com/docs/instructions-youtube-upload.pdf" target="_blank" class="text-info">Instructions to add youtube Iframe/Url</a></small>-->
                                    </div>
                                    <div class="col-md-12">
                                        <label class="col-form-label pt-0 req" for="description">Publication Description </label>
                                        {{ html()->textarea('description', $pub->description)->class('form-control editor')->placeholder('Publication Description') }}
                                        @error('description')
                                        <small class="text-danger">{{ $errors->first('description') }}</small>
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