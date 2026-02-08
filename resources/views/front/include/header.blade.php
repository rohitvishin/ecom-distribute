<div class="container">
                <div class="row wrapper-header align-items-center">
                    <div class="col-xxl-5 col-xl-6 d-none d-xl-block">
                        <nav class="box-navigation text-center style-space">
                            <ul class="box-nav-menu justify-content-start">
                                <li class="menu-item">
                                    <a href="{{route('index')}}" class="item-link">Home</a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{route('about')}}" class="item-link">About</a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{route('contact')}}" class="item-link">Contact</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-xl-2 col-md-4 col-6 text-xxl-center">
                        <a href="{{route('index')}}" class="logo-header">
                            <img src="{{asset_front('images/logo_only.png')}}" alt="logo" class="logo">
                        </a>
                    </div>
                    <div class="col-xxl-5 col-xl-4 col-md-4 col-3">
                        <ul class="nav-icon d-flex justify-content-end align-items-center">
                            <li class="nav-account">
                                <a href="#login" id="account-icon" data-bs-toggle="offcanvas" class="nav-icon-item">
                                    <i class="icon icon-user"></i>
                                </a>
                            </li>
                          @if(@auth()->check())
                            <li class="nav-cart pl">
                                <a href="#shoppingCart" data-bs-toggle="offcanvas" class="nav-icon-item">
                                    <i class="icon icon-cart"></i>
                                    <!-- <span class="count-box">0</span> -->
                                </a>
                            </li>
                          @endif
                        </ul>
                    </div>
                </div>
            </div>