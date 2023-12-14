<nav class="fixed z-30 w-full bg-white dark:bg-gray-800 dark:border-gray-700">
    <div class="px-3 py-1 flex items-center justify-between lg:px-5 lg:pl-3">
        <div class="flex items-center justify-start">
            @auth
            <button id="toggleSidebar" aria-expanded="true" aria-controls="sideBar"
                class="p-2 text-gray-600 rounded cursor-pointer sm:hidden hover:text-gray-900 dark:text-gray-400 dark:hover:text-white"
                x-on:click="sidebar = !sidebar">
                <svg id="toggleSidebarMobileHamburger" class="w-6 h-6" x-show="!sidebar" fill="currentColor"
                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
                <svg id="toggleSidebarMobileClose" class="w-6 h-6" x-show="sidebar" fill="currentColor"
                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
            @endif
            <!-- Logo -->
            <a @auth href="{{ route(Auth::user()->role.'.dashboard') }}" @endauth class="flex items-center">
                <x-application-logo class="w-10 h-10" />
                <span class="ml-1 font-bold text-3xl lg:text-4xl text-emerald-500">VSSCP</span>
            </a>
        </div>

        <div class="flex items-center justify-start">
            <x-light-dark-switch />

            @auth
            <!-- User Dropdown -->
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button
                        class="inline-flex items-center px-3 py-1 text-lg font-medium rounded-md text-gray-500 hover:text-gray-700 dark:hover:text-white">
                        {{ Auth::user()->name }}

                        <div class="ms-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-dropdown-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
            @else
            <a href="{{ route('login') }}"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-bold rounded-lg text-sm px-5 py-2 dark:hover:bg-blue-500 focus:outline-none dark:focus:ring-blue-800">Log
                in</a>
            <a href="{{ route('register') }}"
                class="ml-4 text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2 text-center ">Register</a>
            @endif
        </div>

    </div>
</nav>
