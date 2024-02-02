<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>
        <meta name="description" content="@yield('meta_description')">
        <meta name="keyword" content="@yield('meta_keyword')">
        <meta name="author" content="Asma Thowfeek">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- CSS -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
        <!-- Default theme -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>

        <!-- Include custom styles -->
        <link rel="stylesheet" href="{{ asset('frontend/css/slider.css') }}">

        <!-- Owl Carousel styles -->
        <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}">

        <!-- Exzoom Product Image Jquery styles -->
        <link rel="stylesheet" href="{{ asset('assets/exzoom/jquery.exzoom.css') }}">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">

        <div>
            <!-- Header -->
            @include('layouts.inc.frontend.navbar') <br>
            <!-- Page Content -->
            <main>
                @yield('content')
            </main><br>
            <!-- Footer -->
            @include('layouts.inc.frontend.footer')
        </div>

        <!-- Add these lines to include Bootstrap JS and Popper.js -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.7.0/dist/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

         <!-- Owl Carousel Scripts -->
         <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
         @yield('script')

         <!-- Exzoom Scripts -->
         <script src="{{ asset('assets/exzoom/jquery.exzoom.js') }}"></script>

        <script>
            window.addEventListener('message', event => {
                if(event.detail){
                    alertify.set('notifier','position', 'top-right');
                    alertify.notify(event.detail.text,event.detail.type,3);
                }

            });
        </script>

        @stack('modals')
        @livewireScripts
        @stack('scripts')

</body>
</html>


