@extends("base")
@section("content")
<div class="page_header_default style_one ">
    <div class="parallax_cover">
        <img src="{{ asset('/frontend/assets/images/page-header-default.jpg') }}" alt="bg_image" class="cover-parallax">
    </div>
    <div class="page_header_content">
        <div class="auto-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner_title_inner">
                        <div class="title_page">
                            Member Registration
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="breadcrumbs creote">
                        <ul class="breadcrumb m-auto">
                            <li><a href="/">Home</a> </li>
                            <li class="active">Member Registration</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="content" class="site-content ">
    <div class="container">
        <div class="row default_row">
            <div class="full_width_box">
                <div class="pd_top_80"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        {{ html()->form('POST', route('apply.membership'))->open() }}
                        <input type="hidden" name="type" value="{{ $type }}" />
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="req">Membership Type</label>
                                {{ html()->select('type', membershipTypes(), $type)->class('form-control')->attribute('disabled', 'true')->placeholder('Select') }}
                                @error('type')
                                <small class="text-danger">{{ $errors->first('type') }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="">Passport Number</label>
                                {{ html()->text('passport_number', old('passport_number'))->class('form-control')->placeholder('Passport Number') }}
                                @error('passport_number')
                                <small class="text-danger">{{ $errors->first('passport_number') }}</small>
                                @enderror
                            </div>
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
                                <label class="">Civil ID Number</label>
                                {{ html()->text('civil_id', old('civil_id'))->class('form-control')->maxlength('20')->placeholder('Civil ID Number') }}
                                @error('civil_id')
                                <small class="text-danger">{{ $errors->first('civil_id') }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="">Qualification</label>
                                {{ html()->text('qualification', old('qualification'))->class('form-control')->placeholder('Qualification') }}
                                @error('qualification')
                                <small class="text-danger">{{ $errors->first('qualification') }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="">Profession</label>
                                {{ html()->text('profession', old('profession'))->class('form-control')->placeholder('Profession') }}
                                @error('profession')
                                <small class="text-danger">{{ $errors->first('profession') }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="">Institute</label>
                                {{ html()->text('institute', old('institute'))->class('form-control')->placeholder('Institute') }}
                                @error('institute')
                                <small class="text-danger">{{ $errors->first('institute') }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="">Organization</label>
                                {{ html()->text('organization', old('organization'))->class('form-control')->placeholder('Organization') }}
                                @error('organization')
                                <small class="text-danger">{{ $errors->first('organization') }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-md-2 col-5">
                                <label class="req">Country Code</label>
                                {{ html()->select('kw_primary_contact_number_country', countrycodes())->class('form-control')->placeholder('Select') }}
                                @error('kw_primary_contact_number_country')
                                <small class="text-danger">{{ $errors->first('kw_primary_contact_number_country') }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-md-4 col-7">
                                <label class="req">Primary Contact Number</label>
                                {{ html()->text('kw_primary_contact_number', old('kw_primary_contact_number'))->class('form-control')->maxlength(15)->placeholder('+965 xxxx xxxx') }}
                                @error('kw_primary_contact_number')
                                <small class="text-danger">{{ $errors->first('kw_primary_contact_number') }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-md-2 col-4">
                                <label class="">Country Code</label>
                                {{ html()->select('kw_secondary_contact_number_country', countrycodes())->class('form-control')->placeholder('Select') }}
                                @error('kw_secondary_contact_number_country')
                                <small class="text-danger">{{ $errors->first('kw_secondary_contact_number_country') }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-md-4 col-8">
                                <label class="">Secondary Contact Number</label>
                                {{ html()->text('kw_secondary_contact_number', old('kw_secondary_contact_number'))->class('form-control')->maxlength('15')->placeholder('+965 xxxx xxxx') }}
                                @error('kw_secondary_contact_number')
                                <small class="text-danger">{{ $errors->first('kw_secondary_contact_number') }}</small>
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