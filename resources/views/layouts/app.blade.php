<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>UniDrive - @yield('title')</title>
        
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-white min-h-screen">
            <header class="bg-blue-dark mx-auto px-10">
                @include('layouts.navigation')
            </header>

            <main>
                @yield('content')
            </main>

            <footer class="bg-blue-dark mx-auto px-10 flex justify-center py-4">
                <p class="text-sm">Copyright ©UniDrive Inc. {{ date("Y") }}. All right reserved.</p>
            </footer>
        </div>
    </body>
</html>
