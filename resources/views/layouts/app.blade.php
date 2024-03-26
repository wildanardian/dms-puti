<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Test</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('src/assets/img/favicon.ico') }}" />
    <link href="{{ asset('layouts/modern-light-menu/css/light/loader.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('layouts/modern-light-menu/loader.js') }}"></script>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{ asset('src/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('modern-light-menu/css/light/plugins.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="{{ asset('src/assets/css/light/elements/alert.css') }}" rel="stylesheet" type="text/css" >

    <link href="{{ asset('src/plugins/css/light/tomSelect/custom-tomSelect.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('src/plugins/src/tomSelect/tom-select.default.min.css') }}" rel="stylesheet" type="text/css" rel="stylesheet">

    <link href="{{ asset('src/assets/css/light/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('src/plugins/src/table/datatable/datatables.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('src/plugins/css/light/table/datatable/dt-global_style.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('src/plugins/css/light/sweetalerts2/custom-sweetalert.css') }}" rel="stylesheet" type="text/css" />

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

    @stack('style')

    <style>
        body.dark .layout-px-spacing,
        .layout-px-spacing {
            min-height: calc(100vh - 155px) !important;
        }
    </style>

</head>

<body class="layout-boxed" page="starter-pack">

    @include('layouts.navbar')

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container sbar-open" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

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
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Starter Kit</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Empty Page</li>
                            </ol>
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
                            href="https://designreset.com/cork-admin/">DesignReset</a>, All rights reserved.</p>
                </div>
                <div class="footer-section f-section-2">
                    <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
                            <path
                                d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                            </path>
                        </svg></p>
                </div>
            </div>

        </div>
    </div>

    <script src="{{ asset('src/plugins/src/global/vendors.min.js') }}"></script>
    <script src="{{ asset('src/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>

    <script src="{{ asset('layouts/modern-light-menu/app.js') }}"></script>

    <script src="{{ asset('src/assets/js/custom.js') }}"></script>
    <script src="{{ asset('src/assets/js/dashboard/dash_1.js') }}"></script>

    <script src="{{ asset('src/plugins/src/table/datatable/datatables.js') }}"></script>

    <script src="{{ asset('src/plugins/src/tomSelect/tom-select.base.js') }}"></script>
    <script src="{{ asset('src/plugins/src/tomSelect/custom-tom-select.js') }}"></script>

    <script src="{{ asset('src/assets/js/scrollspyNav.js') }}"></script>
    <script src="{{ asset('src/plugins/src/sweetalerts2/sweetalerts2.min.js') }}"></script>
    <script src="{{ asset('src/plugins/src/sweetalerts2/custom-sweetalert.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="{{ mix('js/app.js') }}"></script>
    @stack('script')

</body>

</html>
