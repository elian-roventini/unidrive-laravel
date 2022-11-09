<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>UniDrive - @yield('title')</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="text-white bg-blue-dark">
        <header class="mx-auto px-10">
            @include('layouts.navigation')
        </header>

        @yield('content')

        <footer class="mx-auto px-10 flex justify-center py-4">
            <p class="text-sm">Copyright ©UniDrive Inc. {{ date("Y") }}. All right reserved.</p>
        </footer>
    </body>
</html>
