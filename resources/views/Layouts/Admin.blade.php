<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ADMIN | {{config('app.name')}}</title>

        <!-- Fonts -->

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
        <style>
            body {
                font-family: 'Nunito', sans-serif;
                padding: 10px;
            }
        </style>
        @stack('styles')
    </head>
<body>
    @yield('content')
</body>
@stack('scripts')
</html>
