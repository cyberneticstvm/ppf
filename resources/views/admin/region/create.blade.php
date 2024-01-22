@extends("admin.base")
@section("content")
<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Regional Official Create</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Regional Official Create</li>
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
                            {{ html()->form('POST', route('region.save'))->class('theme-form')->acceptsFiles()->open() }}
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="col-form-label pt-0 req" for="name">Official Name </label>
                                        {{ html()->text('name', old('name'))->class('form-control')->placeholder('Official Name') }}
                                        @error('name')
                                        <small class="text-danger">{{ $errors->first('name') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-form-label pt-0 req" for="panel">Panel </label>
                                        {{ html()->select('panel', array('convener' => 'Convener', 'joint_convener' => 'Joint Convener', 'executive_committee_member' => 'Executive Committee Member'), old('panel'))->class('form-control')->placeholder('Select') }}
                                        @error('panel')
                                        <small class="text-danger">{{ $errors->first('panel') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-form-label pt-0 req" for="region">Region </label>
                                        {{ html()->select('region', array('fahaheel' => 'Fahaheel', 'abbasiya' => 'Abbasiya', 'salmiya' => 'Salmiya'), old('region'))->class('form-control')->placeholder('Select') }}
                                        @error('region')
                                        <small class="text-danger">{{ $errors->first('region') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <label class="col-form-label pt-0" for="order">Display Order </label>
                                        {{ html()->text('display_order', old('display_order'))->class('form-control')->placeholder('Display Order') }}
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label pt-0 req" for="image">Official Image </label>
                                        {{ html()->file('image', old('image'))->class('form-control') }}
                                        <small class="form-text text-muted">Max file size should be less than 1MB</small>
                                        @error('image')
                                        <small class="text-danger">{{ $errors->first('image') }}</small>
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