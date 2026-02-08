@extends('admin.layout')

@section('content')

@php 
    $maintenance_mode = check_isset_or_null($general_settings, 'maintenance_mode', false);
    $statusClass = $maintenance_mode == 1 ? 'form-switch-success' : ''; 
    $statusAttr = $maintenance_mode == 1 ? 'checked' : '';
@endphp

    <div class="page-content">
        <div class="container-fluid">
            
            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="flex-grow-1 d-flex align-items-center justify-content-between">
                        <h4 class="fs-16 mb-1">Hello, {{ check_isset_or_null($company_profile, 'company_name', '#Name') }}!</h4>                        
                    </div>
                </div>
            </div>
            {{-- Update Account Details. --}}
            <div class="row">
                <div class="col-4">
                    <div class="d-flex flex-column h-100">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-3">Account Details</h5>
                                <p class="card-text">Update your account details and settings.</p>
                                <a href="{{ url('/admin/profile') }}" class="btn btn-primary btn-sm mt-2">Update Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="d-flex flex-column h-100">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-3">Account Details</h5>
                                <p class="card-text">Update your account details and settings.</p>
                                <a href="{{ url('/admin/profile') }}" class="btn btn-primary btn-sm mt-2">Update Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="d-flex flex-column h-100">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-3">Account Details</h5>
                                <p class="card-text">Update your account details and settings.</p>
                                <a href="{{ url('/admin/profile') }}" class="btn btn-primary btn-sm mt-2">Update Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
