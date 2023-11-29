@extends("admin.base")
@section("content")
<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Member Update</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Member Update</li>
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
                            {{ html()->form('POST', route('member.update', $member->id))->class('theme-form')->acceptsFiles()->open() }}
                            <div class="card-body">
                                <div class="row g-3">
                                    <h4>Personal Details</h4>
                                    <div class="col-md-3">
                                        <label class="col-form-label pt-0 req" for="approval_status">Approval Status </label>
                                        {{ html()->select('approval_status', array('approved' => 'Approved', 'rejected' => 'Rejected', 'pending' => 'Pending'), $member->approval_status)->class('form-control')->if(($member->approval_status == 'approved'), function($q){
                                            return $q->disabled();
                                        })->placeholder('Select') }}
                                        @error('approval_status')
                                        <small class="text-danger">{{ $errors->first('approval_status') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-form-label pt-0 req" for="type">Membership Type </label>
                                        {{ html()->select('type', membershipTypes(), $member->type)->class('form-control')->placeholder('Select') }}
                                        @error('type')
                                        <small class="text-danger">{{ $errors->first('type') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <label class="col-form-label pt-0" for="membership_number">Membership ID </label>
                                        {{ html()->text('membership_number', $member->membership_number)->class('form-control')->attribute('readonly', 'true') }}
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label pt-0" for="photo">Photo </label>
                                        {{ html()->file('photo')->class('form-control') }}
                                        <small class="form-text text-muted">Max file size should be less than 1MB</small>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-form-label pt-0 req" for="name">Applicant Name </label>
                                        {{ html()->text('name', $member->name)->class('form-control')->placeholder('Applicant Name') }}
                                        @error('name')
                                        <small class="text-danger">{{ $errors->first('name') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <label class="col-form-label pt-0" for="dob">Applicant DOB </label>
                                        {{ html()->date('dob', $member->dob?->format('Y-m-d') ?? date('Y-m-d'))->class('form-control') }}
                                        @error('dob')
                                        <small class="text-danger">{{ $errors->first('dob') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <label class="col-form-label pt-0 req" for="civil_id">Civil ID Number </label>
                                        {{ html()->text('civil_id', $member->civil_id)->class('form-control')->placeholder('Civil ID Number') }}
                                        @error('civil_id')
                                        <small class="text-danger">{{ $errors->first('civil_id') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <label class="col-form-label pt-0 req" for="qualification">Qualification </label>
                                        {{ html()->text('qualification', $member->qualification)->class('form-control')->placeholder('Qualification') }}
                                        @error('qualification')
                                        <small class="text-danger">{{ $errors->first('qualification') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-form-label pt-0 req" for="institute">Institute </label>
                                        {{ html()->text('institute', $member->institute)->class('form-control')->placeholder('Institute') }}
                                        @error('institute')
                                        <small class="text-danger">{{ $errors->first('institute') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-form-label pt-0 req" for="profession">Profession </label>
                                        {{ html()->text('profession', $member->qualification)->class('form-control')->placeholder('Profession') }}
                                        @error('profession')
                                        <small class="text-danger">{{ $errors->first('profession') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-form-label pt-0 req" for="organization">Organization </label>
                                        {{ html()->text('organization', $member->organization)->class('form-control')->placeholder('Organization') }}
                                        @error('organization')
                                        <small class="text-danger">{{ $errors->first('organization') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-form-label pt-0 req" for="kw_primary_contact_number">Primary Contact Number </label>
                                        {{ html()->text('kw_primary_contact_number', $member->kw_primary_contact_number)->class('form-control')->placeholder('Primary Contact Number') }}
                                        @error('kw_primary_contact_number')
                                        <small class="text-danger">{{ $errors->first('kw_primary_contact_number') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-form-label pt-0 req" for="kw_secondary_contact_number">Secondary Contact Number </label>
                                        {{ html()->text('kw_secondary_contact_number', $member->kw_secondary_contact_number)->class('form-control')->placeholder('Secondary Contact Number') }}
                                        @error('kw_secondary_contact_number')
                                        <small class="text-danger">{{ $errors->first('kw_secondary_contact_number') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-form-label pt-0 req" for="email">Email </label>
                                        {{ html()->email('email', $member->email)->class('form-control')->placeholder('Email') }}
                                        @error('email')
                                        <small class="text-danger">{{ $errors->first('email') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-form-label pt-0 req" for="passport_number">Passport Number </label>
                                        {{ html()->text('passport_number', $member->passport_number)->class('form-control')->placeholder('Passport Number') }}
                                        @error('passport_number')
                                        <small class="text-danger">{{ $errors->first('passport_number') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-form-label pt-0" for="specialization">Specialization </label>
                                        {{ html()->text('specialization', $member->specialization)->class('form-control')->placeholder('Specialization') }}
                                    </div>
                                    <div class="col-md-2">
                                        <label class="col-form-label pt-0" for="doj">Date of Joining </label>
                                        {{ html()->date('doj', $member->doj?->format('Y-m-d') ?? date('Y-m-d'))->class('form-control') }}
                                        @error('doj')
                                        <small class="text-danger">{{ $errors->first('doj') }}</small>
                                        @enderror
                                    </div>
                                    <h4 class="mt-3">Address in Kuwait</h4>
                                    <div class="col-md-2">
                                        <label class="col-form-label pt-0 req" for="kw_flat_number">Flat Number </label>
                                        {{ html()->text('kw_flat_number', $member->kw_flat_number)->class('form-control')->placeholder('Flat Number') }}
                                        @error('kw_flat_number')
                                        <small class="text-danger">{{ $errors->first('kw_flat_number') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <label class="col-form-label pt-0 req" for="kw_building_number">Building Number </label>
                                        {{ html()->text('kw_building_number', $member->kw_building_number)->class('form-control')->placeholder('Building Number') }}
                                        @error('kw_building_number')
                                        <small class="text-danger">{{ $errors->first('kw_building_number') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <label class="col-form-label pt-0 req" for="kw_street_number">Street Number </label>
                                        {{ html()->text('kw_street_number', $member->kw_street_number)->class('form-control')->placeholder('Street Number') }}
                                        @error('kw_street_number')
                                        <small class="text-danger">{{ $errors->first('kw_street_number') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <label class="col-form-label pt-0 req" for="kw_block_number">Block Number </label>
                                        {{ html()->text('kw_block_number', $member->kw_block_number)->class('form-control')->placeholder('Block Number') }}
                                        @error('kw_block_number')
                                        <small class="text-danger">{{ $errors->first('kw_block_number') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <label class="col-form-label pt-0 req" for="kw_area">Area </label>
                                        {{ html()->text('kw_area', $member->kw_area)->class('form-control')->placeholder('Area') }}
                                        @error('kw_area')
                                        <small class="text-danger">{{ $errors->first('kw_area') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <label class="col-form-label pt-0 " for="governorate">Governorate </label>
                                        {{ html()->text('governorate', $member->governorate)->class('form-control')->placeholder('Governorate') }}
                                    </div>
                                    <h4 class="mt-3">Address in India</h4>
                                    <div class="col-md-2">
                                        <label class="col-form-label pt-0 req" for="in_house_name">House Name </label>
                                        {{ html()->text('in_house_name', $member->in_house_name)->class('form-control')->placeholder('House Name') }}
                                        @error('in_house_name')
                                        <small class="text-danger">{{ $errors->first('in_house_name') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <label class="col-form-label pt-0 req" for="in_ward_area">Ward / Area </label>
                                        {{ html()->text('in_ward_area', $member->in_ward_area)->class('form-control')->placeholder('Ward / Area') }}
                                        @error('in_ward_area')
                                        <small class="text-danger">{{ $errors->first('in_ward_area') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <label class="col-form-label pt-0 req" for="in_taluk">Taluk </label>
                                        {{ html()->text('in_taluk', $member->in_taluk)->class('form-control')->placeholder('Taluk') }}
                                        @error('in_taluk')
                                        <small class="text-danger">{{ $errors->first('in_taluk') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <label class="col-form-label pt-0 req" for="in_post_office">Post Office </label>
                                        {{ html()->text('in_post_office', $member->in_post_office)->class('form-control')->placeholder('Post Office') }}
                                        @error('in_post_office')
                                        <small class="text-danger">{{ $errors->first('in_post_office') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <label class="col-form-label pt-0 req" for="in_district">District </label>
                                        {{ html()->text('in_district', $member->in_district)->class('form-control')->placeholder('District') }}
                                        @error('in_district')
                                        <small class="text-danger">{{ $errors->first('in_district') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <label class="col-form-label pt-0 req" for="in_state">State </label>
                                        {{ html()->text('in_state', $member->in_state)->class('form-control')->placeholder('State') }}
                                        @error('in_state')
                                        <small class="text-danger">{{ $errors->first('in_state') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <label class="col-form-label pt-0 req" for="in_pincode">Pincode </label>
                                        {{ html()->text('in_pincode', $member->in_pincode)->class('form-control')->placeholder('Pincode') }}
                                        @error('in_pincode')
                                        <small class="text-danger">{{ $errors->first('in_pincode') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <label class="col-form-label pt-0" for="mentor">Mentor </label>
                                        {{ html()->text('mentor', $member->mentor)->class('form-control')->placeholder('Mentor') }}
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-form-label pt-0 req" for="in_primary_contact_number">Primary Contact Number </label>
                                        {{ html()->text('in_primary_contact_number', $member->in_primary_contact_number)->class('form-control')->placeholder('Primary Contact Number') }}
                                        @error('in_primary_contact_number')
                                        <small class="text-danger">{{ $errors->first('in_primary_contact_number') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-form-label pt-0 req" for="in_secondary_contact_number">Secondary Contact Number </label>
                                        {{ html()->text('in_secondary_contact_number', $member->in_secondary_contact_number)->class('form-control')->placeholder('Secondary Contact Number') }}
                                        @error('in_secondary_contact_number')
                                        <small class="text-danger">{{ $errors->first('in_secondary_contact_number') }}</small>
                                        @enderror
                                    </div>
                                    <h4 class="mt-3">Family Details</h4>
                                    <div class="col-md-2">
                                        <label class="col-form-label pt-0 req" for="marital_status">Marital Status </label>
                                        {{ html()->select('marital_status', maritalStatus(), $member->marital_status)->class('form-control')->placeholder('Select') }}
                                        @error('marital_status')
                                        <small class="text-danger">{{ $errors->first('marital_status') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <label class="col-form-label pt-0 req" for="family_in_kuwait">Family in Kuwait </label>
                                        {{ html()->select('family_in_kuwait', booleanStatus(), $member->family_in_kuwait)->class('form-control')->placeholder('Select') }}
                                        @error('family_in_kuwait')
                                        <small class="text-danger">{{ $errors->first('family_in_kuwait') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label pt-0" for="spouse_name">Spouse Name </label>
                                        {{ html()->text('spouse_name', $member->spouse_name)->class('form-control')->placeholder('Spouse Name') }}
                                    </div>
                                    <div class="col-md-2">
                                        <label class="col-form-label pt-0" for="child1_name">Child1 Name </label>
                                        {{ html()->text('child1_name', $member->child1_name)->class('form-control')->placeholder('Child1 Name') }}
                                    </div>
                                    <div class="col-md-2">
                                        <label class="col-form-label pt-0" for="child2_name">Child2 Name </label>
                                        {{ html()->text('child2_name', $member->child2_name)->class('form-control')->placeholder('Child2 Name') }}
                                    </div>
                                    <div class="col-md-2">
                                        <label class="col-form-label pt-0" for="child3_name">Child3 Name </label>
                                        {{ html()->text('child3_name', $member->child3_name)->class('form-control')->placeholder('Child3 Name') }}
                                    </div>
                                    <div class="col-md-2">
                                        <label class="col-form-label pt-0" for="child4_name">Child4 Name </label>
                                        {{ html()->text('child4_name', $member->child4_name)->class('form-control')->placeholder('Child4 Name') }}
                                    </div>
                                    <h4 class="mt-3">Other Details</h4>
                                    <div class="col-md-2">
                                        <label class="col-form-label pt-0 req" for="renewal_status">Renewal Status </label>
                                        {{ html()->select('renewal_status', renewalStatus(), $member->renewal_status)->class('form-control')->placeholder('Select') }}
                                        @error('renewal_status')
                                        <small class="text-danger">{{ $errors->first('renewal_status') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <label class="col-form-label pt-0 req" for="membership_fee_collected">Membership Fee Collected </label>
                                        {{ html()->select('membership_fee_collected', booleanStatus(), $member->membership_fee_collected)->class('form-control')->placeholder('Select') }}
                                        @error('membership_fee_collected')
                                        <small class="text-danger">{{ $errors->first('membership_fee_collected') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <label class="col-form-label pt-0" for="approved_date">Approved Date </label>
                                        {{ html()->date('approved_date', $member->approved_date?->format('Y-m-d') ?? date('Y-m-d'))->class('form-control') }}
                                    </div>
                                    <div class="col-md-2">
                                        <label class="col-form-label pt-0" for="next_renewal_date">Next Renewal Date </label>
                                        {{ html()->date('next_renewal_date', $member->next_renewal_date?->format('Y-m-d') ?? date('Y-m-d', strtotime('+1 year')))->class('form-control') }}
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