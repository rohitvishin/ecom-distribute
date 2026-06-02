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
            {{-- Dashboard Statistics Cards --}}
            <div class="row">
                <!-- Total Orders -->
                <div class="col-md-6 col-lg-4 col-xl-2">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">Total Orders</p>
                                    <h4 class="mb-0">{{ $total_orders ?? 0 }}</h4>
                                </div>
                                <div class="flex-shrink-0">
                                    <div class="text-primary" style="font-size: 32px;">
                                        <i class="bx bxs-shopping-bag"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-transparent border-top pt-3">
                            <a href="{{ route('admin.manage-orders') }}" class="text-decoration-none text-primary small">View Orders <i class="bx bx-right-arrow-alt"></i></a>
                        </div>
                    </div>
                </div>

                <!-- New Orders (Pending) -->
                <div class="col-md-6 col-lg-4 col-xl-2">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">New Orders</p>
                                    <h4 class="mb-0">{{ $new_orders ?? 0 }}</h4>
                                </div>
                                <div class="flex-shrink-0">
                                    <div class="text-warning" style="font-size: 32px;">
                                        <i class="bx bxs-inbox"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-transparent border-top pt-3">
                            <a href="{{ route('admin.manage-orders') }}" class="text-decoration-none text-primary small">View Orders <i class="bx bx-right-arrow-alt"></i></a>
                        </div>
                    </div>
                </div>

                <!-- In Processing -->
                <div class="col-md-6 col-lg-4 col-xl-2">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">Processing</p>
                                    <h4 class="mb-0">{{ $processing_orders ?? 0 }}</h4>
                                </div>
                                <div class="flex-shrink-0">
                                    <div class="text-info" style="font-size: 32px;">
                                        <i class="bx bxs-cog"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-transparent border-top pt-3">
                            <a href="{{ route('admin.manage-orders') }}" class="text-decoration-none text-primary small">View Orders <i class="bx bx-right-arrow-alt"></i></a>
                        </div>
                    </div>
                </div>

                <!-- In Shipping -->
                <div class="col-md-6 col-lg-4 col-xl-2">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">Shipping</p>
                                    <h4 class="mb-0">{{ $shipping_orders ?? 0 }}</h4>
                                </div>
                                <div class="flex-shrink-0">
                                    <div class="text-primary" style="font-size: 32px;">
                                        <i class="bx bxs-truck"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-transparent border-top pt-3">
                            <a href="{{ route('admin.manage-orders') }}" class="text-decoration-none text-primary small">View Orders <i class="bx bx-right-arrow-alt"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Delivered -->
                <div class="col-md-6 col-lg-4 col-xl-2">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">Delivered</p>
                                    <h4 class="mb-0">{{ $delivered_orders ?? 0 }}</h4>
                                </div>
                                <div class="flex-shrink-0">
                                    <div class="text-success" style="font-size: 32px;">
                                        <i class="bx bxs-check-circle"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-transparent border-top pt-3">
                            <a href="{{ route('admin.manage-orders') }}" class="text-decoration-none text-primary small">View Orders <i class="bx bx-right-arrow-alt"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Total Users -->
                <div class="col-md-6 col-lg-4 col-xl-2">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">Total Users</p>
                                    <h4 class="mb-0">{{ $total_users ?? 0 }}</h4>
                                </div>
                                <div class="flex-shrink-0">
                                    <div class="text-secondary" style="font-size: 32px;">
                                        <i class="bx bxs-user-circle"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-transparent border-top pt-3">
                            <a href="javascript: void(0);" class="text-decoration-none text-primary small">View Users <i class="bx bx-right-arrow-alt"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
