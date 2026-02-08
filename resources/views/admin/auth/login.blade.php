<!doctype html>
<html lang="en" data-layout="horizontal" data-topbar="dark" data-sidebar-size="lg" data-sidebar="light"
    data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>Sign In | Ecommerce - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- Layout config Js -->
    <script src="{{ asset('assets/js/layout.js') }}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('assets/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
    <script>
        APP_URL = `{{ env('APP_URL') }}`;
    </script>
<meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>

    <!-- auth-page wrapper -->
    <div class="auth-page-wrapper auth-bg-cover py-5 d-flex justify-content-center align-items-center min-vh-100">
        <div class="bg-overlay"></div>
        <!-- auth-page content -->
        <div class="auth-page-content overflow-hidden pt-lg-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card overflow-hidden">
                            <div class="row g-0">
                                <div class="col-lg-6">
                                    <div class="p-lg-5 p-4 auth-one-bg h-100">
                                        <div class="bg-overlay"></div>
                                        <div class="position-relative h-100 d-flex flex-column">
                                            <div class="mt-auto">
                                                <div class="mb-3">
                                                    <i class="ri-double-quotes-l display-4 text-success"></i>
                                                </div>

                                                <div id="qoutescarouselIndicators" class="carousel slide"
                                                    data-bs-ride="carousel">
                                                    <div class="carousel-indicators">
                                                        <button type="button"
                                                            data-bs-target="#qoutescarouselIndicators"
                                                            data-bs-slide-to="0" class="active" aria-current="true"
                                                            aria-label="Slide 1"></button>
                                                        <button type="button"
                                                            data-bs-target="#qoutescarouselIndicators"
                                                            data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                        <button type="button"
                                                            data-bs-target="#qoutescarouselIndicators"
                                                            data-bs-slide-to="2" aria-label="Slide 3"></button>
                                                    </div>
                                                    <div class="carousel-inner text-center text-white pb-5">
                                                        <div class="carousel-item active">
                                                            <p class="fs-15 fst-italic">" Great! Clean code, clean
                                                                design, easy for customization. Thanks very much! "</p>
                                                        </div>
                                                        <div class="carousel-item">
                                                            <p class="fs-15 fst-italic">" The theme is really great with
                                                                an amazing customer support."</p>
                                                        </div>
                                                        <div class="carousel-item">
                                                            <p class="fs-15 fst-italic">" Great! Clean code, clean
                                                                design, easy for customization. Thanks very much! "</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end carousel -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->

                                <div class="col-lg-6">
                                    <div class="p-lg-5 p-4">
                                        <div>
                                            <h5 class="text-primary">Welcome Back !</h5>
                                            <p class="text-muted">Sign in to continue to {{ env('APP_NAME') }}.</p>
                                        </div>

                                        <div class="mt-4">
                                            <form id="otpLoginForm" action="{{ route('admin.adminLoginPost') }}">
                                                <div class="mb-3" id="email-input-group">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="text" class="form-control" name="email"
                                                        id="email" placeholder="Enter Email">
                                                </div>
                                                <div class="mb-3" id="otp-input-group" style="display: none;">
                                                    <label for="otp" class="form-label">OTP</label>
                                                    <input type="text" class="form-control" name="otp"
                                                        id="otp" placeholder="Enter OTP">
                                                </div>
                                                <div class="mt-4">
                                                    <p id="error_msg"></p>
                                                    <button type="button" id="resendOTP" class="btn btn-link" style="display: none">resend otp</button>
                                                    <button class="btn color-primary-3 btn-success w-100"
                                                        type="submit" id="submitButton">Send OTP</button>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->

                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0">&copy;
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> {{ env('APP_NAME') }}. Crafted with <i
                                    class="mdi mdi-heart text-danger"></i> by {{ env('PARENT_COMPANY') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ asset('assets/libs/choices/choices.js') }}"></script>
    <script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <!-- password-addon init -->
    <script src="{{ asset('assets/js/pages/password-addon.init.js') }}"></script>
    <script>
    // Resend OTP button click handler
    let resendCountdownInterval;
    function startResendCountdown() {
        let timeLeft = 30;
        const resendButton = $('#resendOTP');
        resendButton.prop('disabled', true);
        
        // Clear any existing countdown
        if (resendCountdownInterval) {
            clearInterval(resendCountdownInterval);
        }
        
        // Update immediately
        resendButton.text(`Resend OTP (${timeLeft}s)`);
        
        resendCountdownInterval = setInterval(function() {
            timeLeft--;
            
            if (timeLeft <= 0) {
                clearInterval(resendCountdownInterval);
                resendButton.text('Resend OTP');
                resendButton.prop('disabled', false);
            } else {
                resendButton.text(`Resend OTP (${timeLeft}s)`);
            }
        }, 1000);
    }

    function sendOTP(email, csrfToken) {
        $.ajax({
            url: "{{ route('admin.adminLoginPost') }}",
            method: "POST",
            data: {
                email: email,
                _token: csrfToken
            },
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            success: function(response) {
                $('#otp-input-group').show();
                $('#submitButton').text('Verify OTP & Login');
                $('#resendOTP').show();
                $('#otpLoginForm').attr('action', "{{ route('admin.verifyOTP') }}");
                $('#email').prop('readonly', true);
                $('#error_msg').html('New OTP sent successfully!');
                
                startResendCountdown();
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                var response = JSON.parse(xhr.responseText);
                $('#error_msg').html(response.message);
                $('#resendOTP').prop('disabled', false);
            }
        });
    }

    function verifyOTP(email, otp, csrfToken) {
        $.ajax({
            url: "{{ route('admin.verifyOTP') }}",
            method: "POST",
            data: {
                email: email,
                otp: otp,
                _token: csrfToken
            },
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            success: function(response) {
                if (response.type == 'success') {
                    window.location.href = "{{ route('admin.dashboard') }}";
                } else {
                    $('#error_msg').html(response.message || 'OTP verification failed. Please try again.');
                }               
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                var response = JSON.parse(xhr.responseText);
                $('#error_msg').html(response.message);
            }
        });
    }

    $('#resendOTP').on('click', function() {
        const csrfToken = $('meta[name="csrf-token"]').attr('content');
        var email = $('#email').val().trim();
        
        if (email === '') {
            alert('Email is required to resend OTP.');
            return;
        }
        
        // Disable the resend button temporarily to prevent spamming
        $(this).prop('disabled', true);
        $('#error_msg').html('Sending OTP...');
        
        sendOTP(email, csrfToken, function() {
            // Re-enable the button after 30 seconds
            setTimeout(function() {
                $('#resendOTP').prop('disabled', false);
            }, 30000);
        });
    });

    $('#otpLoginForm').on('submit', function(e) {
        e.preventDefault();
        var currentAction = $(this).attr('action');
        const csrfToken = $('meta[name="csrf-token"]').attr('content');
        
        if (currentAction === "{{ route('admin.adminLoginPost') }}") {
            // Email submission case
            var email = $('#email').val().trim();
            
            if (email === '') {
                alert('Please enter your email.');
                return;
            }
            sendOTP(email, csrfToken);
        } else {
            // OTP verification case
            var otp = $('#otp').val().trim();
            var email = $('#email').val().trim();
            
            if (otp === '') {
                alert('Please enter the OTP.');
                return;
            }
            verifyOTP(email, otp, csrfToken);
        }
    });
    </script>
    @include('display_errors')
</body>

</html>
