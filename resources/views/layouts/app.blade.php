<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BirthRecordsMIS') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/dashlitee1e3.css?ver=3.2.4') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('assets/css/themee1e3.css?ver=3.2.4') }}">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body class="nk-body bg-lighter npc-general has-sidebar ">
    <div class="nk-app-root">
        <div class="nk-main ">
            @include('layouts.sidebar')
            <div class="nk-wrap ">
                @include('layouts.navigation')
                <div class="nk-content ">
                    @yield('content')
                </div>
                <div class="nk-footer">
                    <div class="container-fluid">
                        <div class="nk-footer-wrap text-center">
                            <div class="nk-footer-copyright"> © 2025 {{ config('app.name', 'Village MIS') }}. All Rights Reserved.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="{{ asset('assets/js/bundlee1e3.js?ver=3.2.4') }}"></script>
    <script src="{{ asset('assets/js/scriptse1e3.js?ver=3.2.4') }}"></script>
    <script src="{{ asset('assets/js/demo-settingse1e3.js?ver=3.2.4') }}"></script>
    <script src="{{ asset('assets/js/charts/gd-defaulte1e3.js?ver=3.2.4') }}"></script>
</body>

</html>