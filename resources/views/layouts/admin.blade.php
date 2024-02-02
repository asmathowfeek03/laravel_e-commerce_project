<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- styles/Icons -->
        <link rel="stylesheet" href="{{asset('admin/vendors/mdi/css/materialdesignicons.min.css')}}">
        <link rel="stylesheet" href="{{asset('admin/vendors/base/vendor.bundle.base.css')}}">
        <link rel="stylesheet" href="{{asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
        <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">
        <link rel="shortcut icon" href="{{asset('admin/images/favicon.png')}}" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <style>
            .sidebar .nav .nav-item.active{
                background-color: #e9e9e9;
            }
        </style>
        @livewireStyles

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
        <div class="container-scroller">
            @include('layouts.inc.admin.navbar')  <!-- topnavbar -->

            <div class="container-fluid page-body-wrapper">
                @include('layouts.inc.admin.sidebar')  <!-- sidebar -->

                <div class="main-panel"> <!-- partial right side starts -->
                    <div class="content-wrapper">
                        @yield('content')
                    </div>
                </div> <!-- partial right side ends -->
            </div>
        </div>

        <!-- plugins:js -->
        <script src="{{asset('admin/vendors/base/vendor.bundle.base.js')}}"></script>
        <!-- endinject -->
        <!-- Plugin js for this page-->
        <script src="{{asset('admin/vendors/chart.js/Chart.min.js')}}"></script>
        <script src="{{asset('admin/vendors/datatables.net/jquery.dataTables.js')}}"></script>
        <script src="{{asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
        <!-- End plugin js for this page-->
        <!-- inject:js -->
        <script src="{{asset('admin/js/off-canvas.js')}}"></script>
        <script src="{{asset('admin/js/hoverable-collapse.js')}}"></script>
        <script src="{{asset('admin/js/template.js')}}"></script>
        <!-- endinject -->
        <!-- Custom js for this page-->
        <script src="{{asset('admin/js/dashboard.js')}}"></script>
        <script src="{{asset('admin/js/data-table.js')}}"></script>
        <script src="{{asset('admin/js/jquery.dataTables.js')}}"></script>
        <script src="{{asset('admin/js/dataTables.bootstrap4.js')}}"></script>
        <!-- End custom js for this page-->

        @yield('scripts')
        @stack('modals')
        @livewireScripts
        @stack('script')
</body>
</html>
