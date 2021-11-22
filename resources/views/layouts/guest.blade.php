<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="theme-color" content="#000000" />
        <title>{{ config('settings.site_title') }}</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @livewireStyles
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="text-blueGray-800 antialiased">
    
        <div id="app">
    
            <div class="relative bg-gray-100 min-h-screen">
                <div class="relative mx-auto w-full min-h-full">
                    @yield('content')
                </div>
            </div>
    
        </div>
    
        <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    
        @livewireScripts
    </body>
    
</html>