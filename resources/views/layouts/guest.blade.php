<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BirthRecordsMIS') }}</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/" rel="preconnect">
    <link href="https://fonts.gstatic.com/" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&amp;family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="https://bootstrapmade.com/content/vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://bootstrapmade.com/content/vendors/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="https://bootstrapmade.com/content/vendors/aos/aos.css" rel="stylesheet">
    <link href="https://bootstrapmade.com/content/vendors/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="https://bootstrapmade.com/content/vendors/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="https://bootstrapmade.com/content/demo/Landify/assets/css/main.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Figtree', sans-serif;
            color: #212529;
        }

        .bg-custom {
            background: linear-gradient(135deg, #ffffff 0%,
                    color-mix(in srgb, #00a19e, transparent 95%) 100%);
        }
    </style>
</head>

<body class="antialiased">

    <div class="min-vh-100 d-flex flex-column justify-content-center align-items-center pt-5 bg-custom">
        <div class="card shadow-sm mt-4 w-100" style="max-width: 420px;">
            <div class="card-header text-center bg-white border-0 py-4">
                <a href="/" class="text-decoration-none fw-bold fs-4 text-dark">
                    {{ config('app.name', 'BirthRecordsMIS') }}
                </a>
            </div>


            <div class="card-body p-4">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Vendor JS Files -->
    <script data-cfasync="false" src="https://bootstrapmade.com/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://bootstrapmade.com/content/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://bootstrapmade.com/content/vendors/php-email-form/validate.js"></script>
    <script src="https://bootstrapmade.com/content/vendors/aos/aos.js"></script>
    <script src="https://bootstrapmade.com/content/vendors/glightbox/js/glightbox.min.js"></script>
    <script src="https://bootstrapmade.com/content/vendors/swiper/swiper-bundle.min.js"></script>
    <script src="https://bootstrapmade.com/content/vendors/purecounter/purecounter_vanilla.js"></script>

    <!-- Main JS File -->
    <script src="https://bootstrapmade.com/content/demo/Landify/assets/js/main.js"></script>
</body>

</html>