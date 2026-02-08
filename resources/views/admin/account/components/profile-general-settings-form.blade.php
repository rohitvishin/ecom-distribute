<form action="{{ route('admin.update-general-settings') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-lg-4">
            <div class="mb-3 pb-2">
                <label for="company_name" class="form-label">Currency</label>
                <input class="form-control" id="currency" name="currency" placeholder="Enter Currency" value="{{ check_isset_or_null($general_settings, 'currency', 'INR') }}">
            </div>
        </div>
        
        <div class="col-lg-4">
            <div class="mb-3 pb-2">
                <label for="exampleFormControlTextarea" class="form-label">Currency Symbol</label>
                <input class="form-control" id="currency_symbol" name="currency_symbol" placeholder="Enter Support Contact Number" value="{{ check_isset_or_null($general_settings, 'currency_symbol', '₹') }}">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="mb-3 pb-2">
                <label for="company_name" class="form-label">Cloudinary Key Name</label>
                <input class="form-control" id="cloudinary_key_name" name="cloudinary_key_name" placeholder="Enter Cloudinary Key Name" value="{{ check_isset_or_null($general_settings, 'cloudinary_key_name', '') }}">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="mb-3 pb-2">
                <label for="company_name" class="form-label">Cloudinary Api Key</label>
                <input class="form-control" id="cloudinary_api_key" name="cloudinary_api_key" placeholder="Enter Cloudinary Api Key" value="{{ check_isset_or_null($general_settings, 'cloudinary_api_key', '') }}">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="mb-3 pb-2">
                <label for="company_name" class="form-label">Cloudinary Secret Key</label>
                <input class="form-control" id="cloudinary_secret_key" name="cloudinary_secret_key" placeholder="Enter Cloudinary Secret Key" value="{{ check_isset_or_null($general_settings, 'cloudinary_secret_key', '') }}">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="mb-3">
                <label for="skillsInput" class="form-label">Default Seo Title</label>
                <textarea rows="2" class="form-control" id="default_meta_title" name="default_meta_title" placeholder="Enter Default Seo Title" value="{{ check_isset_or_null($general_settings, 'default_meta_title', '') }}">{{ check_isset_or_null($general_settings, 'default_meta_title', '') }}</textarea>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="mb-3">
                <label for="skillsInput" class="form-label">Default Seo Description</label>
                <textarea rows="3" class="form-control" id="default_meta_description" name="default_meta_description" placeholder="Enter Default Seo Description" value="{{ check_isset_or_null($general_settings, 'default_meta_description', '') }}">{{ check_isset_or_null($general_settings, 'default_meta_description', '') }}</textarea>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="mb-3 pb-2">
                <label for="exampleFormControlTextarea" class="form-label">Default Schemas</label>
                <textarea class="form-control" id="DefaultSchemaFormControlTextarea" name="default_schema" placeholder="Enter your Full Address"
                    rows="6" value="{{ check_isset_or_null($general_settings, 'default_schema', '') }}">{{ check_isset_or_null($general_settings, 'default_schema', '') }}</textarea>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="mb-3 pb-2">
                <label for="exampleFormControlTextarea" class="form-label">Custom Header Code</label>
                <textarea class="form-control" id="CustomHeaderFormControlTextarea" name="custom_header" placeholder="Enter Custom Header code eg: Site identity"
                    rows="6" value="{{ check_isset_or_null($general_settings, 'custom_header', '') }}">{{ check_isset_or_null($general_settings, 'custom_header', '') }}</textarea>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="mb-3 pb-2">
                <label for="exampleFormControlTextarea" class="form-label">Custom Footer Code</label>
                <textarea class="form-control" id="customFooterFormControlTextarea" name="custom_footer" placeholder="Enter Custom Footer Code eg: Analytics etc"
                    rows="6" value="{{ check_isset_or_null($general_settings, 'custom_footer', '') }}">{{ check_isset_or_null($general_settings, 'custom_footer', '') }}</textarea>
            </div>
        </div>
    </div>
    
    <div class="col-lg-12">
        <div class="hstack gap-2 justify-content-start">
            <button type="submit" class="btn btn-primary">Updates</button>
        </div>
    </div>
</form>
