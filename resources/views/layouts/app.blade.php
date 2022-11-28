<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>UniDrive - @yield('title')</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://unpkg.com/jquery@3.6.1/dist/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @stack('scripts')
    </head>
    <body class="text-white bg-blue-dark">
        <header class="mx-auto px-10">
            @include('layouts.navigation')
        </header>

        @yield('content')

        <footer class="mx-auto px-10 flex justify-center py-4">
            <p class="text-sm">{{ trans('pages.app.copyright', ['date' => date("Y")]) }}</p>
        </footer>
    </body>
</html>
