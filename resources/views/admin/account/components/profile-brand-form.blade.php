<form action="{{ route('admin.update-brand-details') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @php
        $support_days_arr = isset($company_profile->support_days) ? $company_profile->support_days : old('support_days');
        
        $support_hour_from = isset($company_profile->support_hour_from) ? date('H:i', strtotime($company_profile->support_hour_from)) : '9:30';
        $support_hour_to = isset($company_profile->support_hour_to) ? date('H:i', strtotime($company_profile->support_hour_to)) : strtotime($support_hour_from . ' +9 hours');
    @endphp
    <div class="row">
        <div class="col-lg-4">
            <div class="mb-3 pb-2">
                <label for="company_name" class="form-label">Brand Favicon <p class="fs-10 text-danger">(Upload a 32x32 pixel favicon (PNG/ICO))</p></label>
                <input type="file" class="form-control" id="favicon-img-file-input" name="favicon">
            </div>
        </div>
        <div class="col-lg-8">
            <div class="mb-3 pb-2">
                <label for="company_name" class="form-label">Preview <p class="fs-10 text-danger">(32x32 Pixels)</p></label>
                <div class="browser-tab-preview" style="width: auto; font-family: system-ui, sans-serif; border-radius: 8px 8px 0 0; overflow: hidden; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                    <div style="background-color: #999999; padding: 6px 12px; display: flex; align-items: center; gap: 8px;">
                        <img id="favicon-img-preview" src="{{ isset($company_profile->favicon) ? asset($company_profile->favicon) : asset('assets/images/default-logo.png') }}" width="16" height="16" style="border-radius: 2px;">
                        <span style="font-size: 14px; color: #ffffff;" id="siteTitle">My Store - Tag line</span>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="mb-3 pb-2">
                <label for="company_name" class="form-label">Brand Name</label>
                <input class="form-control" id="company_name" name="company_name" placeholder="Enter Brand Name" value="{{ check_isset_or_null($company_profile, 'company_name', '') }}">
            </div>
        </div>

        <div class="col-lg-8">
            <div class="mb-3 pb-2">
                <label for="company_name" class="form-label">Brand Tag Line</label>
                <input class="form-control" id="brand_tag_line" name="brand_tag_line" placeholder="Enter Brand Tag Line" value="{{ check_isset_or_null($company_profile, 'brand_tag_line', '') }}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="mb-3 pb-2">
                <label for="exampleFormControlTextarea" class="form-label">Support Contact Number</label>
                <input class="form-control" id="NumberFormControlTextarea" name="support_phone" placeholder="Enter Support Contact Number" value="{{ check_isset_or_null($company_profile, 'support_phone', '') }}">
            </div>
        </div>

        <div class="col-lg-4">
            <div class="mb-3 pb-2">
                <label for="exampleFormControlTextarea" class="form-label">Support Whatsapp Number</label>
                <input class="form-control" id="NumberFormControlTextarea" name="whatsapp_number" placeholder="Enter Support Whatsapp Number" value="{{ check_isset_or_null($company_profile, 'whatsapp_number', '') }}">
            </div>
        </div>

        <div class="col-lg-4">
            <div class="mb-3 pb-2">
                <label for="exampleFormControlTextarea" class="form-label">Support Contact Email</label>
                <input class="form-control" id="EmailFormControlTextarea" name="support_email" placeholder="Enter Support Email ID" value="{{ check_isset_or_null($company_profile, 'support_email', '') }}">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="skillsInput" class="form-label">Support Days</label>
                <select class="form-control" name="support_days[]" data-choices data-choices-sorting-false
                    data-choices-removeItem data-choices-text-unique-true multiple id="support_days">
                    <option value="monday" {{ !empty($support_days_arr) && in_array('monday', $support_days_arr) ? 'selected' : '' }}>Monday
                    </option>
                    <option value="tuesday" {{ !empty($support_days_arr) && in_array('tuesday', $support_days_arr) ? 'selected' : '' }}>Tuesday
                    </option>
                    <option value="wednesday" {{ !empty($support_days_arr) && in_array('wednesday', $support_days_arr) ? 'selected' : '' }}>
                        Wednesday</option>
                    <option value="thrusday" {{ !empty($support_days_arr) && in_array('thrusday', $support_days_arr) ? 'selected' : '' }}>Thrusday
                    </option>
                    <option value="friday" {{ !empty($support_days_arr) && in_array('friday', $support_days_arr) ? 'selected' : '' }}>Friday
                    </option>
                    <option value="saturday" {{ !empty($support_days_arr) && in_array('saturday', $support_days_arr) ? 'selected' : '' }}>Saturday
                    </option>
                    <option value="sunday" {{ !empty($support_days_arr) && in_array('sunday', $support_days_arr)? 'selected' : '' }}>Sunday
                    </option>
                </select>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="mb-3">
                <label for="skillsInput" class="form-label">Support Opening From</label>
                <input type="time" class="form-control" id="support_hour_from" name="support_hour_from"
                    data-provider="timepickr"
                    data-default-time="{{ old('support_hour_from', $support_hour_from ) }}"
                    value="{{ old('support_hour_from', $support_hour_from) }}">
            </div>
        </div>

        <div class="col-lg-3">
            <div class="mb-3">
                <label for="skillsInput" class="form-label">Support Closing Time</label>
                <input type="time" class="form-control" id="support_hour_to" name="support_hour_to"
                    data-provider="timepickr"
                    data-default-time="{{ old('support_hour_to', $support_hour_to) }}"
                    value="{{ old('support_hour_to', $support_hour_to) }}">
            </div>
        </div>

        

        <div class="col-lg-12">
            <div class="mb-3 pb-2">
                <label for="exampleFormControlTextarea" class="form-label">Full Adrress</label>
                <textarea class="form-control" id="AddressFormControlTextarea" name="fulladdress" placeholder="Enter your Full Address"
                    rows="3" value="{{ check_isset_or_null($company_profile, 'fulladdress', '') }}">{{ check_isset_or_null($company_profile, 'fulladdress', '') }}</textarea>
            </div>
        </div>
    </div>
    
    <div class="col-lg-12">
        <div class="hstack gap-2 justify-content-start">
            <button type="submit" class="btn btn-primary">Updates</button>
        </div>
    </div>
</form>
