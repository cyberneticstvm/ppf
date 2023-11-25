@extends("admin.base")
@section("content")
<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Scrolling Message List</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Scrolling Message List</li>
                    </ol>
                </div>
                <div class="col-sm-6 text-end">
                    <a class="btn btn-primary" href="{{ route('scrolling.create') }}">Create New</a>
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
                            <div class="card-body table-responsive">
                                <table class="display table table-sm table-striped" id="basic-2">
                                    <thead>
                                        <th>SL No</th>
                                        <th>Message</th>
                                        <th>URL</th>
                                        <th>Status</th>
                                        <th>Deleted?</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </thead>
                                    <tbody>
                                        @forelse($messages as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{!! $item->message !!}</td>
                                            <td>{{ $item->url }}</td>
                                            <td>{!! $item->messageStatus() !!}</td>
                                            <td>{!! $item->deletedStatus() !!}</td>
                                            <td class="text-center"><a href="{{ route('scrolling.edit', encrypt($item->id)) }}"><i class="fa fa-edit text-warning fa-lg"></i></a></td>
                                            <td class="text-center"><a href="{{ route('scrolling.delete', encrypt($item->id)) }}" class="dlt"><i class="fa fa-trash text-danger fa-lg"></i></a></td>
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
    <!-- Container-fluid Ends-->
</div>
@endsection