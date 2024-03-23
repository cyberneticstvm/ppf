@extends("admin.base")
@section("content")
<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Slider Image Create</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Slider Image Create</li>
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
                            {{ html()->form('POST', route('slider.save'))->class('theme-form')->acceptsFiles()->open() }}
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="col-form-label pt-0 req" for="image">Slider Image </label>
                                        {{ html()->file('image', old('image'))->class('form-control') }}
                                        <small class="form-text text-muted">Max file size should be less than 1MB & 1920px(W) X 880px(H)</small>
                                        @error('image')
                                        <small class="text-danger">{{ $errors->first('image') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-form-label pt-0" for="top_label">Top Label / Text </label>
                                        {{ html()->text('top_label', old('top_label'))->class('form-control')->maxlength('25')->placeholder('Top Label') }}
                                        @error('top_label')
                                        <small class="text-danger">{{ $errors->first('top_label') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-form-label pt-0" for="heading">Heading </label>
                                        {{ html()->text('heading', old('heading'))->class('form-control')->maxlength('25')->placeholder('Heading') }}
                                        @error('heading')
                                        <small class="text-danger">{{ $errors->first('heading') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-form-label pt-0" for="description">Description </label>
                                        {{ html()->text('description', old('description'))->class('form-control')->maxlength('150')->placeholder('Description') }}
                                        @error('description')
                                        <small class="text-danger">{{ $errors->first('description') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-form-label pt-0" for="button_label">Button Label / Text </label>
                                        {{ html()->text('button_label', old('button_label'))->class('form-control')->maxlength('25')->placeholder('Button Label') }}
                                        @error('button_label')
                                        <small class="text-danger">{{ $errors->first('button_label') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-form-label pt-0" for="button_url">Button URL </label>
                                        {{ html()->text('button_url', old('button_url'))->class('form-control')->placeholder('Button URL') }}
                                        @error('button_url')
                                        <small class="text-danger">{{ $errors->first('button_url') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-form-label pt-0" for="target">Target (Behavior of link opening)</label>
                                        {{ html()->select('target', array('_blank' => 'New Tab', '' => 'Existing Tab'), old('target'))->class('form-control')->placeholder('Select') }}
                                        @error('target')
                                        <small class="text-danger">{{ $errors->first('target') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-form-label pt-0" for="display_order">Display Order </label>
                                        {{ html()->number('display_order', old('display_order'), 0, 100, '1')->class('form-control')->placeholder('0') }}
                                        @error('display_order')
                                        <small class="text-danger">{{ $errors->first('display_order') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-form-label pt-0 req" for="status">Status </label>
                                        {{ html()->select('status', array('published' => 'Publish', 'draft' => 'Draft'), old('status'))->class('form-control')->placeholder('Select') }}
                                        @error('status')
                                        <small class="text-danger">{{ $errors->first('status') }}</small>
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