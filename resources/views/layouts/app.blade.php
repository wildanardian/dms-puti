<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>NEW PUTI DMS</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('src/assets/img/favicon.ico') }}" />
    <link href="{{ asset('modern-light-menu/css/light/loader.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('modern-light-menu/loader.js') }}"></script>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{ asset('src/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('modern-light-menu/css/light/plugins.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('src/assets/css/light/elements/alert.css') }}" rel="stylesheet" type="text/css">

    <!-- Scroll Spy Nav-->
    <link href="{{ asset('src/assets/css/light/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />

    <!-- Data Table -->
    <link href="{{ asset('src/plugins/src/table/datatable/datatables.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('src/plugins/css/light/table/datatable/dt-global_style.css') }}" rel="stylesheet"
        type="text/css">

    @stack('style')

    <script src="https://unpkg.com/feather-icons"></script>
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

    <style>
        body.dark .layout-px-spacing,
        .layout-px-spacing {
            min-height: calc(100vh - 155px) !important;
        }

        .loader-dms {
            width: 100%;
            height: 100%;
            position: fixed;
            display: flex;
            background-color: rgba(0, 0, 0, 0.8);
            z-index: 9999;
            align-items: center;
            justify-content: center;
            display: none;
        }

        .loader-logo {
            background-color: rgba(255, 255, 255, 0.9);
            width: 100px;
            height: 100px;
            display: flex;
            position: relative;
            border-radius: 50%;
            justify-content: center;
        }

        .loader-logo img {
            width: 100%;
        }

        .spinner {
            position: absolute;
            left: -15px;
            top: -15px;
            width: 130px;
            height: 130px;
            border-radius: 50%;
            border: 10px solid;
            border-color: rgba(255, 255, 255, 0.8);
            border-right-color: #9f1521;
            animation: spinner-d3wgkg 1s infinite linear;
        }

        @keyframes spinner-d3wgkg {
            to {
                transform: rotate(1turn);
            }
        }
    </style>

</head>

<body class="layout-boxed" page="starter-pack">

    @include('layouts.navbar')

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container sbar-open" id="container">

        <div class="loader-dms">
            <div class="loader-logo">
                <img src="{{ asset('images/puti-logo.png') }}" />
                <div class="spinner"></div>
            </div>
        </div>

        <!--  BEGIN SIDEBAR  -->
        @include('layouts.sidebar')
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="middle-content container-xxl p-0">

                    <!-- BREADCRUMB -->
                    <div class="page-meta d-flex justify-content-between align-items-center">
                        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                            @yield('breadcrumb')
                        </nav>
                        <div class="d-flex">
                            @yield('button')
                        </div>
                    </div>
                    <!-- /BREADCRUMB -->

                    <!-- CONTENT AREA -->
                    <div class="row layout-top-spacing">

                        <div class="col-md-12">
                            @yield('content')
                        </div>

                    </div>
                    <!-- CONTENT AREA -->

                </div>

            </div>

            <div class="footer-wrapper">
                <div class="footer-section f-section-1">
                    <p class="">Copyright © <span class="dynamic-year">2022</span> <a target="_blank"
                            href="#">Universitas Telkom</a>, All rights reserved.</p>
                </div>
                <div class="footer-section f-section-2">
                    <p class="">Direktorat Pusat Teknologi Informasi</p>
                </div>
            </div>

        </div>
    </div>

    <script src="{{ asset('src/plugins/src/global/vendors.min.js') }}"></script>
    <script src="{{ asset('src/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>

    <script src="{{ asset('modern-light-menu/app.js') }}"></script>
    <script src="{{ asset('src/plugins/src/waves/waves.min.js') }}"></script>

    <script src="{{ asset('src/plugins/src/table/datatable/datatables.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

    @stack('script')

</body>

</html>
