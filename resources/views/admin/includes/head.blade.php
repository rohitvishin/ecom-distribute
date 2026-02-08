<meta charset="utf-8" />
<title>Dashboard | Ecommerce - Admin & Dashboard Template</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
<meta content="Themesbrand" name="author" />
<!-- App favicon -->
<link rel="shortcut icon" href="{{ asset('msg/main-favicon.ico') }}">

<!-- jsvectormap css -->
<link href="{{ asset('assets/libs/jsvectormap/css/jsvectormap.min.html') }}" rel="stylesheet" type="text/css" />

<!--Swiper slider css-->
<link href="{{ asset('assets/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css" />

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
    ASSET_URL = `{{ env('ASSET_URL') }}`;
</script>
<style>
    /* Default to extra-large for smaller screens (mobile-first) */
    .modal-dialog {
        max-width: 1140px; /* Equivalent to modal-xl */
        margin: var(--bs-modal-margin);
        
    }

    /* Medium screens and up (web) */
    @media (min-width: 768px) {
        .modal-dialog {
            max-width: 800px; /* Equivalent to modal-md */
            margin: 1.75rem auto; /* Adjust margin as needed */
        }
    }
</style>