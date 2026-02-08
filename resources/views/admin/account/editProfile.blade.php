@extends('admin.layout')

@section('content')

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <div class="page-title-left">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.profile') }}">Profile</a></li>
                                <li class="breadcrumb-item active">Edit Profile</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="position-relative mx-n4 mt-n4">
                <div class="profile-wid-bg profile-setting-img">
                    <img src="{{ asset('assets/images/default-banner.jpg') }}"
                        class="profile-wid-img" alt="">
                </div>
            </div>

            <div class="row">
                <div class="col-xxl-3">
                    <div class="card mt-n5">
                        <div class="card-body p-4">
                            <div class="text-center">
                                <div class="profile-user position-relative d-inline-block mx-auto mb-0">
                                    <img src="{{ isset($company_profile->logo) ? asset($company_profile->logo) : asset('assets/images/default-logo.png') }}"
                                        class="rounded-circle avatar-xl img-thumbnail user-profile-image"
                                        alt="user-profile-image">
                                    <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                        <form id="upload-logo-form">
                                            @csrf
                                            <input id="profile-img-file-input" type="file" name="logo" class="profile-img-file-input">
                                            <label for="profile-img-file-input" class="profile-photo-edit upload-logo-photo-btn avatar-xs">
                                                <span class="avatar-title rounded-circle bg-light text-body">
                                                    <i class="ri-camera-fill"></i>
                                                </span>
                                            </label>
                                        </form>
                                    </div>
                                    
                                </div>
                                <div class="p-0 ms-auto rounded-circle profile-photo-edit update-logo-photo-btn mt-2 d-none">
                                    <button type="button" id="upload-logo"
                                        class="btn btn-success btn-icon waves-effect waves-light"><i
                                            class="ri-check-fill"></i></button>
                                    <button type="button" id="cancel-logo-upload"
                                        data-default-logo="{{ isset($company_profile->logo) ? asset($company_profile->logo) : asset('assets/images/default-logo.png') }}"
                                        class="btn btn-danger btn-icon waves-effect waves-light"><i
                                            class="ri-close-fill"></i></button>
                                </div>
                                <h5 class="fs-16 mt-2 mb-1">{{ $admin_details->name ?: '#Admin Name' }}</h5>
                                <p class="text-muted mb-0">(Admin)</p>
                            </div>
                        </div>
                    </div>
                    <!--end card-->
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-4">
                                <div class="flex-grow-1">
                                    <h5 class="card-title mb-0">Social Media Links</h5>
                                </div>
                            </div>
                            @php 
                                $links_count = -1;
                            @endphp
                            @if (!empty($company_profile->social_media_links))
                            @php
                                $all_links = $company_profile->social_media_links;
                            @endphp
                                <div class="row" id="social-media-div">
                                    @foreach ($all_links as $index => $single_sc)
                                    <div class="mb-3 d-flex">
                                        <div class="avatar-xs d-block flex-shrink-0 me-3">
                                            <span class="avatar-title rounded-circle fs-16 bg-dark text-light">
                                                <i class="ri-{{ $single_sc['type'] }}-fill"></i>
                                            </span>
                                        </div>
                                        <input type="text" disabled class="form-control" id="{{ $single_sc['type'] }}-link" placeholder="Your Link" value="{{ $single_sc['link'] }}">
                                    </div>
                                    @endforeach
                                </div>
                                <form class="form-group d-none" id="social_media_links_form">
                                    @csrf
                                    @foreach ($all_links as $index => $single_sc)
                                    @php 
                                        $links_count++;
                                    @endphp
                                        <div id="social-media-link-{{ $index }}" class="mb-3 d-flex">
                                            <div class="input-group">
                                                <select class="form-control" name="social_media_links[{{ $index }}][type]">
                                                    <option value="instagram" {{ $single_sc['type'] == 'instagram' ? 'selected' : '' }}>Instagram</option>
                                                    <option value="facebook" {{ $single_sc['type'] == 'facebook' ? 'selected' : '' }}>Facebook</option>
                                                    <option value="youtube" {{ $single_sc['type'] == 'youtube' ? 'selected' : '' }}>Youtube</option>
                                                    <option value="tiktok" {{ $single_sc['type'] == 'tiktok' ? 'selected' : '' }}>Tiktok</option>
                                                    <option value="global" {{ $single_sc['type'] == 'other' ? 'selected' : '' }}>Other</option>
                                                </select>
                                                <input type="text" name="social_media_links[{{ $index }}][link]" class="form-control" id="{{ $single_sc['type'] }}-edit-link" placeholder="link"
                                                    value="{{ $single_sc['link'] }}">
                                                <button type="button" class="btn btn-danger" onclick="deleteLink({{ $index }})"><i class="ri-delete-bin-fill"></i></button>
                                            </div>
                                        </div>
                                    @endforeach
                                    
                                    {{-- Dynamic Add Form --}}
                                </form>
                            @else
                            <div class="row" id="social-media-div"></div>
                            <form class="form-group" id="social_media_links_form"></form>
                            @endif
                        </div>
                        <div class="card-footer">
                            <div class="flex-shrink-0 d-none" id="social-media-action-btn-div">
                                <button type="button" id="add_new_social_media_link" value="{{ $links_count }}" class="badge border-0 bg-light text-primary fs-16"><i class="ri-add-fill align-bottom me-1"></i> Add New</button>
                                <button type="button" id="save_social_media_links" class="badge bg-light text-success fs-16 border-0 {{ $links_count > 0 ? '' : 'd-none' }}"><i class="ri-check-fill align-bottom me-1"></i> Save</button>
                            </div>
                            <div class="flex-shrink-0" id="social-media-edit-btn-div">
                                <button type="button" id="social-media-edit-btn" value="{{ $links_count }}" class="badge border-0 bg-light text-primary fs-16"><i class="ri-pencil-fill align-bottom me-1"></i> Edit</button>
                            </div>
                        </div>
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->
                @php 
                $show_active_tab = isset($tab) && !empty($tab) ? $tab : 'basicDetails';
                @endphp
                <div class="col-xxl-9">
                    <div class="card mt-xxl-n5">
                        <div class="card-header">
                            <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link text-body {{ $show_active_tab == 'basicDetails' ? 'active' : '' }}" data-bs-toggle="tab" href="#basicDetails"
                                        role="tab">
                                        <i class="fas fa-home"></i>
                                        Basic Details
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-body {{ $show_active_tab == 'brandSupportDetails' ? 'active' : '' }}" data-bs-toggle="tab" href="#brandSupportDetails"
                                        role="tab">
                                        <i class="far fa-envelope"></i>
                                        Brand & Support Details
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-body {{ $show_active_tab == 'generalSettings' ? 'active' : '' }}" data-bs-toggle="tab" href="#generalSettings"
                                        role="tab">
                                        <i class="far fa-setting"></i>
                                        General Settings
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body p-4">
                            <div class="tab-content">
                                <div class="tab-pane  {{ $show_active_tab == 'basicDetails' ? 'active' : '' }}" id="basicDetails" role="tabpanel">
                                    @include('admin.account.components.profile-basic-details-form')
                                </div>
                                <!--end tab-pane-->
                                <div class="tab-pane  {{ $show_active_tab == 'brandSupportDetails' ? 'active' : '' }}" id="brandSupportDetails" role="tabpanel">
                                    @include('admin.account.components.profile-brand-form')
                                </div>

                                <!--end tab-pane-->
                                <div class="tab-pane  {{ $show_active_tab == 'generalSettings' ? 'active' : '' }}" id="generalSettings" role="tabpanel">
                                    @include('admin.account.components.profile-general-settings-form')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->

        </div>
        <!-- container-fluid -->
    </div><!-- End Page-content -->

<script src="{{ asset('assets/js/profile.js') }}" defer></script>
@stop
