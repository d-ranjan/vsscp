<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="icon" type="image/x-icon" href="{{asset('/vsscp_logo.png')}}">

        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            <div class="bg-white sm:fixed w-full flex items-center z-50 sm:top-0 sm:right-0 px-5 py-1">
                <a href="#" class="flex items-center">
                    <img width="50px" height="50px" src="./vsscp_logo.png">
                    <span class="ml-1 font-bold text-3xl lg:text-4xl text-emerald-500">VSSCP</span>
                </a>
                <div class="flex-grow"></div>
                @guest
                    <a href="{{ route('login') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Register</a>
                    @endif
                @endauth
            </div>

            <div class="mx-auto">
                
                <!-- Carousel -->
                <div class="mt-14 w-full mx-auto h-96 md:h-[32rem]">
                    <div id="default-carousel" class="relative w-full h-full" data-carousel="slide">
                        <!-- Carousel wrapper -->
                        <div class="relative overflow-hidden rounded-lg h-full">
                            <!-- Item 1 -->
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <img src="./carousel/carousel-1.svg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                            </div>
                            <!-- Item 2 -->
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <img src="./carousel/carousel-2.svg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                            </div>
                            <!-- Item 3 -->
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <img src="./carousel/carousel-3.svg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                            </div>
                            <!-- Item 4 -->
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <img src="./carousel/carousel-4.svg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                            </div>
                            <!-- Item 5 -->
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <img src="./carousel/carousel-5.svg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                            </div>
                        </div>
                        <!-- Slider indicators -->
                        <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                            <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
                            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
                        </div>
                        <!-- Slider Control Left Button -->
                        <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
                                </svg>
                                <span class="sr-only">Previous</span>
                            </span>
                        </button>
                        <!-- Slider Control Right Button -->
                        <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <span class="sr-only">Next</span>
                            </span>
                        </button>
                    </div>
                </div>
            
                <!-- Organisation Info -->
                <div class="mt-2 bg-gradient-to-r from-rose-400 to-orange-400 py-8 px-3 rounded-lg w-full flex flex-col items-center font-bold">
                    <h1 class="mb-0 w-full text-center text-emerald-400 text-5xl md:text-5xl">विद्या संकल्प संस्थान कैरियर
                        पथ</h1>
                    <h1 class="py-2 text-white text-center text-2xl md:text-3xl">
                        सपने आप देखो, साकार हम करेंगे
                    </h1>
                    <p class="text-md text-white text-center">
                        हमारा उदेश्य शिक्षा एवं संस्कार
                    </p>
                    <button class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full mt-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                        Explore Classes
                    </button>
                </div>

                <!-- Teachers -->
                <section class="bg-white border-b py-8">
                    <div class="container max-w-5xl mx-auto">
                        <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800 underline">
                            Know Your Teachers
                        </h2>
                        <div class="w-full mb-4">
                            <div class="h-1 mx-auto gradient w-96 opacity-25 my-0 py-0 rounded-t"></div>
                        </div>
                        <!-- Teachers -->
                        
                    @foreach ($teachers as $teacher)
                        @if ($loop->odd)
                        <div class="flex flex-wrap items-center justify-center">
                            <div class="w-5/6 sm:w-1/2 p-6">
                                <h3 class="text-3xl text-gray-800 font-bold leading-none mb-3">
                                {{ $teacher->name }}
                                </h3>
                                <p class="text-gray-600 mb-8">
                                {{ $teacher->qualifications }}
                                </p>
                            </div>
                            <div class="w-full sm:w-1/2 p-6">
                                <img class="h-72 w-54" src={{ asset(__('/teachers/'. $teacher->photo_right)) }}>
                            </div>
                        </div>
                        @else
                        <div class="flex flex-wrap items-center justify-center flex-col-reverse sm:flex-row">
                            <div class="w-full sm:w-1/2 p-6 mt-3">                    
                                <img class="h-72 w-54" src={{ asset(__('/teachers/'. $teacher->photo_left)) }}>
                            </div>
                            <div class="w-full sm:w-1/2 p-6 mt-6">
                                <div class="align-middle">
                                    <h3 class="text-3xl text-gray-800 font-bold leading-none mb-3">
                                    {{$teacher->name}}
                                    </h3>
                                    <p class="text-gray-600 mb-8">
                                    {{$teacher->qualifications}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                    </div>
                </section>
            </div>
        </div>
    </body>
</html>
