<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ isset($company_profile->logo) ? asset($company_profile->logo) : asset('assets/images/default-logo.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ isset($company_profile->logo) ? asset($company_profile->logo) : asset('assets/images/default-logo.png') }}" alt="" height="100">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index.html" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ isset($company_profile->logo) ? asset($company_profile->logo) : asset('assets/images/default-logo.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ isset($company_profile->logo) ? asset($company_profile->logo) : asset('assets/images/default-logo.png') }}" alt="" height="100">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{url('/admin/dashboard')}}" >
                        <i class="bx bxs-dashboard"></i> <span data-key="t-dashboards">Dashboards</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{url('/admin/category/manage')}}" >
                        <i class="bx bxs-dashboard"></i> <span data-key="t-dashboards">Category</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarLanding" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarLanding">
                        <i class="ri-rocket-line"></i> <span data-key="t-landing">Products</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarLanding">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{url('/admin/product/add')}}" class="nav-link" data-key="t-one-page"> Add Products </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('/admin/product/manage')}}" class="nav-link" data-key="t-nft-landing"> Manage Product </a>
                            </li>
                        </ul>
                    </div>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>

<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
