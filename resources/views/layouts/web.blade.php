<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('settings.site_title') }} - @yield('title')</title>

    <meta name="title" content="{{ config('settings.seo_meta_title') }}">
    <meta name="description" content="{{ config('settings.seo_meta_description') }}">
    <meta property="og:description" content="{{ config('settings.seo_meta_description') }}">
    <meta property="og:locale" content="{{ app()->getLocale() }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ route('home') }}" />
    <meta property="og:site_name" content="{{ config('settings.company_name') }}" />
    <meta name="author" content="{{ config('settings.company_name') }}">
    <link rel="icon" type="image/png" href="{{ asset('uploads/' .config('settings.site_favicon')) }}" />

    <meta name="robots" content="all,follow">

    <!-- Fonts -->
    
    <!-- Styles -->
    <link type="text/css" rel="stylesheet" href="{{ asset('/css/app.css') }}" media="all">
    
    <!-- Toastr -->
    <link type="text/css" href="{{ asset('assets/css/toastr.min.css') }}" rel="stylesheet" media="all">

    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>

    @livewireStyles
    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('/js/app.js') }}" defer></script>
    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>      
    <!-- Toastr -->
    <script type="text/javascript" src="{{ asset('assets/js/toastr.min.js') }}"></script>
    <!-- Custom JS -->
    <script type="text/javascript"  src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Head Tags -->

    @if (config('settings.head_tags') != null)

    {!! config('settings.head_tags') !!}
    
    @endif

</head>

<body class="font-sans antialiased">

    <!-- Body Tags -->

    @if (config('settings.body_tags') != null)

    {!! config('settings.body_tags') !!}
    
    @endif

    <!-- Page Content -->
    <main>
        @include('partials.header')

        @yield('content')

        {{-- @include('partials.social-home') --}}

        @include('components.home.footer')
    </main>

    <script>
        //Javascript to toggle the menu
        document.getElementById('nav-toggle').onclick = function() {
            document.getElementById("nav-content").classList.toggle("hidden");
        }
    </script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.3.5/dist/alpine.js" defer=""></script>
    @livewireScripts
    <script>
        $(document).ready(function() {
            // Add smooth scrolling to all links
            $("a").on('click', function(event) {

                // Make sure this.hash has a value before overriding default behavior
                if (this.hash !== "") {
                    // Prevent default anchor click behavior
                    event.preventDefault();

                    // Store hash
                    var hash = this.hash;

                    // Using jQuery's animate() method to add smooth page scroll
                    // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                    $('html, body').animate({
                        scrollTop: $(hash).offset().top
                    }, 800, function() {

                        // Add hash (#) to URL when done scrolling (default click behavior)
                        window.location.hash = hash;
                    });
                } // End if
            });
        });

    </script>
</body>

</html>
