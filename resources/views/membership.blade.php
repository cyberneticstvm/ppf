@extends("base")
@section("content")
<div id="content" class="site-content ">
    <div class="container">
        <div class="row default_row">
            <div class="full_width_box">
                <div class="pd_top_80"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="heading mb-3">
                            <h2>Member Registration</h2>
                        </div>
                        {{ html()->form('POST', route('apply.membership'))->open() }}
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="req">Full Name</label>
                                {{ html()->text('name', old('name'))->class('form-control')->placeholder('Full Name') }}
                                @error('name')
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="req">Date of Birth</label>
                                {{ html()->date('dob', old('Y-m-d') ?? date('Y-m-d'))->class('form-control') }}
                                @error('dob')
                                <small class="text-danger">{{ $errors->first('dob') }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="req">Email ID</label>
                                {{ html()->email('email', old('email'))->class('form-control')->placeholder('Email ID') }}
                                @error('email')
                                <small class="text-danger">{{ $errors->first('email') }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="req">Civil ID Number</label>
                                {{ html()->text('civil_id', old('civil_id'))->class('form-control')->placeholder('Civil ID Number') }}
                                @error('civil_id')
                                <small class="text-danger">{{ $errors->first('civil_id') }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="req">Qualification</label>
                                {{ html()->text('qualification', old('qualification'))->class('form-control')->placeholder('Qualification') }}
                                @error('qualification')
                                <small class="text-danger">{{ $errors->first('qualification') }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="req">Profession</label>
                                {{ html()->text('profession', old('profession'))->class('form-control')->placeholder('Profession') }}
                                @error('profession')
                                <small class="text-danger">{{ $errors->first('profession') }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="req">Institute</label>
                                {{ html()->text('institute', old('institute'))->class('form-control')->placeholder('Institute') }}
                                @error('institute')
                                <small class="text-danger">{{ $errors->first('institute') }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="req">Organization</label>
                                {{ html()->text('organization', old('organization'))->class('form-control')->placeholder('Organization') }}
                                @error('organization')
                                <small class="text-danger">{{ $errors->first('organization') }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="req">Primary Contact Number</label> <small>with country code</small>
                                {{ html()->text('kw_primary_contact_number', old('kw_primary_contact_number'))->class('form-control')->placeholder('+965 xxxx xxxx') }}
                                @error('kw_primary_contact_number')
                                <small class="text-danger">{{ $errors->first('kw_primary_contact_number') }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="req">Secondary Contact Number</label> <small>with country code</small>
                                {{ html()->text('kw_secondary_contact_number', old('kw_secondary_contact_number'))->class('form-control')->placeholder('+965 xxxx xxxx') }}
                                @error('kw_secondary_contact_number')
                                <small class="text-danger">{{ $errors->first('kw_secondary_contact_number') }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="req">Membership Type</label>
                                {{ html()->select('type', membershipTypes())->class('form-control')->placeholder('Select') }}
                                @error('type')
                                <small class="text-danger">{{ $errors->first('type') }}</small>
                                @enderror
                            </div>
                            <button type="submit" class="btn-submit theme-btn one">Submit</button>
                        </div>
                        {{ html()->form()->close() }}
                    </div>
                </div>
                <!--===============spacing==============-->
                <div class="pd_bottom_70"></div>
                <!--===============spacing==============-->
            </div>
        </div>
    </div>
</div>
@endsection