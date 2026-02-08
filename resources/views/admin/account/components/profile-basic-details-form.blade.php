<form action="{{ route('admin.update-basic-details') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="firstnameInput" class="form-label">Admin Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter your Salon Name"
                    value="{{ old('name', check_isset_or_null($admin_details, 'name', '')) }}">
            </div>
        </div>

        <div class="col-lg-6">
            <div class="mb-3">
                <label for="phonenumberInput" class="form-label">Admin Email id</label>
                <input type="email" class="form-control" name="email" placeholder="Enter your Email"
                    value="{{ old('email', check_isset_or_null($admin_details, 'email', '')) }}">
            </div>
        </div>
        
        <!--end col-->
        <div class="col-lg-12">
            <div class="hstack gap-2 justify-content-start mt-3">
                <button type="submit" class="btn btn-primary">Updates</button>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->
</form>
