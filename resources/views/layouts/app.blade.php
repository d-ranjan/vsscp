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

<body class="font-sans antialiased" x-data="{ darkMode: window.matchMedia('(prefers-color-scheme: dark)').matches}"
    :class="{'dark': darkMode == true}">
    <div x-data="{ sidebar: false }"
        class="min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-slate-800">
        <x-navbar-layout />
        @auth
        <x-sidebar-layout />
        @endauth
        <!-- Page Content -->
        <main class="sm:ml-48 h-full flex justify-center dark:bg-gray-700 pt-12"
            :class="{'max-sm:ml-48':sidebar == true}">
            {{ $slot }}
        </main>
    </div>
</body>

</html>