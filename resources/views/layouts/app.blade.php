<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="icon" type="image/x-icon" href="{{asset('/vsscp_logo.png')}}">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div x-data="{ isOpen: false }" class="min-h-screen bg-gray-100"
        @keydown.escape.window="isOpen = false" >
            @include('layouts.navbar')

            @auth
                @include('layouts.sidebar')
            @endauth
            <!-- Page Content -->
            <main class="sm:ml-48 flex justify-center"
            :class="{'max-sm:ml-48':isOpen === true}">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
