@extends("admin.base")
@section("content")
<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>New Member List</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">New Member List</li>
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
                            <div class="card-body table-responsive">
                                <table class="display table table-sm table-striped" id="basic-2">
                                    <thead>
                                        <th>SL No</th>
                                        <th>Member Name</th>
                                        <th>Membership ID</th>
                                        <th>Type</th>
                                        <th>Email</th>
                                        <th>Primary Contact</th>
                                        <th>Approved Date</th>
                                        <th>View</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </thead>
                                    <tbody>
                                        @forelse($members as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->membership_number }}</td>
                                            <td>{{ ucfirst($item->type) }} Member</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->kw_primary_contact_number }}</td>
                                            <td>{{ $item->approved_date?->format('d/M/Y') }}</td>
                                            <td class="text-center"><a href="{{ route('member.show', encrypt($item->id)) }}"><i class="fa fa-eye text-info fa-lg"></i></a></td>
                                            <td class="text-center"><a href="{{ route('member.edit', encrypt($item->id)) }}"><i class="fa fa-edit text-warning fa-lg"></i></a></td>
                                            <td class="text-center"><a href="{{ route('member.delete', encrypt($item->id)) }}" class="dlt"><i class="fa fa-trash text-danger fa-lg"></i></a></td>
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