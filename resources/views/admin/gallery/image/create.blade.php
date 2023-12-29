@extends("admin.base")
@section("content")
<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Gallery Image List</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Gallery Image List</li>
                    </ol>
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
                            {{ html()->form('POST', route('gallery.image.save'))->class('theme-form')->acceptsFiles()->open() }}
                            <input type="hidden" name="gallery_id" value="{{ $gallery->id }}" />
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="col-form-label pt-0 req" for="name">Gallery Name / Title </label>
                                        {{ html()->text('name', $gallery->name)->class('form-control')->placeholder('Gallery Name')->attribute('readonly', 'true') }}
                                        @error('name')
                                        <small class="text-danger">{{ $errors->first('name') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-form-label pt-0 req" for="images">Gallery Image (Multiple images upload enabled)</label>
                                        {{ html()->file('images[]')->class('form-control')->multiple() }}
                                        <small class="form-text text-muted">Max file size should be less than 250KB for each image</small>
                                        @error('images')
                                        <small class="text-danger">{{ $errors->first('images') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-form-label pt-0 req" for="display_order">Display Order </label>
                                        {{ html()->number('display_order', old('display_order'), 0, 100, '1')->class('form-control')->placeholder('0') }}
                                        @error('display_order')
                                        <small class="text-danger">{{ $errors->first('display_order') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-form-label pt-0 req" for="status">Status </label>
                                        {{ html()->select('status', status(), old('status'))->class('form-control')->placeholder('Select') }}
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
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-xl-12">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body table-responsive">
                                <table class="display table table-sm table-striped" id="basic-2">
                                    <thead>
                                        <th>SL No</th>
                                        <th>Image</th>
                                        <th>Display Order</th>
                                        <th>Status</th>
                                        <th>Deleted?</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </thead>
                                    <tbody>
                                        @forelse($images as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td class="text-center"><a href="{{ asset($item->image) }}" target="_blank"><img src="{{ asset($item->image) }}" width="5%" class="img-fluid" /></a></td>
                                            <td class="text-center">{{ $item->display_order }}</td>
                                            <td>{!! $item->imageStatus() !!}</td>
                                            <td>{!! $item->deletedStatus() !!}</td>
                                            <td class="text-center"><a href="{{ route('gallery.image.edit', encrypt($item->id)) }}"><i class="fa fa-edit text-warning fa-lg"></i></a></td>
                                            <td class="text-center"><a href="{{ route('gallery.image.delete', encrypt($item->id)) }}" class="dlt"><i class="fa fa-trash text-danger fa-lg"></i></a></td>
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