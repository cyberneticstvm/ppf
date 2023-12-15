@extends("admin.base")
@section("content")
<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Member Details</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Member Details</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid general-widget">
        <div class="row">
            <div class="col-xl-4 col-md-6 box-col-6">
                <div class="card custom-card">
                    <div class="card-header pb-0"><img class="img-fluid" src="{{ asset('/backend/assets/images/user-card/user-card-bg.webp') }}" alt=""></div>
                    <div class="card-profile"><img class="rounded-circle" src="{{ ($member->photo) ? url($member->photo) : asset('/backend/assets/images/dashboard/1.png') }}" alt=""></div>
                    <div class="text-center profile-details">
                        <h4><a href="social-app.html" alt="" data-bs-original-title="" title="">{{ $member->name }}</a></h4>
                        <h6>{{ $member->profession }}</h6>
                    </div>
                    <div class="card-footer row">
                        <div class="col-4 col-sm-4">
                            <h6>Member ID</h6>
                            <h5>{{ $member->membership_number }}</h5>
                        </div>
                        <div class="col-4 col-sm-4">
                            <h6>Gender</h6>
                            <h5>{{ $member->gender }}</h5>
                        </div>
                        <div class="col-4 col-sm-4">
                            <h6>DOB</h6>
                            <h5>{{ $member->dob?->format('d-M-Y') }}</h5>
                        </div>
                    </div>
                    <div class="card-footer row">
                        <div class="col-4 col-sm-4">
                            <h6>Membership Fee Collected</h6>
                            <h5>
                                <p>{{ ($member->membership_fee_collected == 1) ? 'Yes' : 'No' }}</p>
                            </h5>
                        </div>
                        <div class="col-4 col-sm-4">
                            <h6>Approved Date</h6>
                            <h5>{{ $member->approved_date?->format('d-M-Y') }}</h5>
                        </div>
                        <div class="col-4 col-sm-4">
                            <h6>Next Renewal Date</h6>
                            <h5>{{ $member->next_renewal_date?->format('d-M-Y') }}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-md-10">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>Member Details</h5>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs border-tab" id="top-tab" role="tablist">
                            <li class="nav-item"><a class="nav-link active" id="top-home-tab" data-bs-toggle="tab" href="#top-home" role="tab" aria-controls="top-home" aria-selected="true"><i class="icofont icofont-man-in-glasses"></i>Personal</a></li>
                            <li class="nav-item"><a class="nav-link" id="profile-top-tab" data-bs-toggle="tab" href="#top-profile" role="tab" aria-controls="top-profile" aria-selected="false"><i class="icofont icofont-contacts"></i>Address</a></li>
                            <li class="nav-item"><a class="nav-link" id="contact-top-tab" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false"><i class="icofont icofont-ui-home"></i>Family</a></li>
                        </ul>
                        <div class="tab-content" id="top-tabContent">
                            <div class="tab-pane fade show active" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
                                <div class="card">
                                    <div class="card-header social-header">
                                        <h5 class="f-w-600">Personal Details</h5>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="row details-about">
                                            <div class="col-sm-6">
                                                <div class="your-details">
                                                    <h6 class="f-w-600">Civil Id:</h6>
                                                    <p>{{ $member->civil_id }}</p>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="your-details your-details-xs">
                                                    <h6 class="f-w-600">Qualification:</h6>
                                                    <p>{{ $member->qualification }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row details-about">
                                            <div class="col-sm-6">
                                                <div class="your-details">
                                                    <h6 class="f-w-600">Institute:</h6>
                                                    <p>{{ $member->institute }}</p>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="your-details your-details-xs">
                                                    <h6 class="f-w-600">Organization:</h6>
                                                    <p>{{ $member->organization }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row details-about">
                                            <div class="col-sm-6">
                                                <div class="your-details">
                                                    <h6 class="f-w-600">Email:</h6>
                                                    <p>{{ $member->email }}</p>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="your-details your-details-xs">
                                                    <h6 class="f-w-600">Passport Number:</h6>
                                                    <p>{{ $member->passport_number }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row details-about">
                                            <div class="col-sm-6">
                                                <div class="your-details">
                                                    <h6 class="f-w-600">Specialization:</h6>
                                                    <p>{{ $member->specialization }}</p>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="your-details your-details-xs">
                                                    <h6 class="f-w-600">Date of Joined:</h6>
                                                    <p>{{ $member->doj?->format('d, M Y') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row details-about">
                                            <div class="col-sm-6">
                                                <div class="your-details">
                                                    <h6 class="f-w-600">Primary Contact:</h6>
                                                    <p>{{ $member->kw_primary_contact_number }}</p>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="your-details your-details-xs">
                                                    <h6 class="f-w-600">Secondary Contact:</h6>
                                                    <p>{{ $member->kw_secondary_contact_number }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row details-about">
                                            <div class="col-sm-6">
                                                <div class="your-details">
                                                    <h6 class="f-w-600">Marital Status:</h6>
                                                    <p>{{ $member->marital_status }}</p>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="your-details your-details-xs">
                                                    <h6 class="f-w-600">Family in Kuwait:</h6>
                                                    <p>{{ ($member->family_in_kuwait == 1) ? 'Yes' : 'No' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="top-profile" role="tabpanel" aria-labelledby="profile-top-tab">
                                <div class="card">
                                    <div class="card-header social-header">
                                        <h5 class="f-w-600">Address Details</h5>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="row details-about">
                                            <div class="col-sm-6">
                                                <div class="your-details">
                                                    <h6 class="f-w-600">Kuwait Address:</h6>
                                                    <p>
                                                        Flat No: {{ $member->kw_flat_number }}<br />
                                                        Building No: {{ $member->kw_building_number }}<br />
                                                        Street No: {{ $member->kw_street_number }}<br />
                                                        Block No:{{ $member->kw_block_number }}<br />
                                                        Area: {{ $member->kw_area }}<br />
                                                        Governorate: {{ $member->kw_area }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="your-details your-details-xs">
                                                    <h6 class="f-w-600">India Address:</h6>
                                                    <p>
                                                        House Name: {{ $member->in_house_name }}<br />
                                                        Ward / Area: {{ $member->in_ward_area }}<br />
                                                        Taluk: {{ $member->in_taluk }}<br />
                                                        Post Office: {{ $member->in_post_office }}<br />
                                                        District: {{ $member->in_district }}<br />
                                                        State: {{ $member->in_state }}<br />
                                                        Pincode: {{ $member->in_pincode }}<br />
                                                        Primary Contact: {{ $member->in_primary_contact_number }}<br />
                                                        Secondary Contact: {{ $member->in_secondary_contact_number }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="top-contact" role="tabpanel" aria-labelledby="contact-top-tab">
                                <div class="card">
                                    <div class="card-header social-header">
                                        <h5 class="f-w-600">Family Details</h5>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="row details-about">
                                            <div class="col-sm-6">
                                                <div class="your-details">
                                                    <h6 class="f-w-600">Spouse Name:</h6>
                                                    <p>
                                                        {{ $member->spouse_name }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="your-details your-details-xs">
                                                    <h6 class="f-w-600">Child Names:</h6>
                                                    <p>
                                                        Child 1: {{ $member->child1_name }}<br />
                                                        Child 2: {{ $member->child2_name }}<br />
                                                        Child 3: {{ $member->child3_name }}<br />
                                                        Child 4: {{ $member->child4_name }}<br />
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection