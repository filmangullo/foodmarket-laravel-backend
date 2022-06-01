<header class="z-50 w-full">
    <div x-data="{ navMobile : false }" x-cloak class="w-full">
        <div class="pt-6 pb-4 bg-primary">
            <nav class="relative flex items-center justify-between px-4 mx-auto max-w-7xl sm:px-6"
                aria-label="Global">
                <div class="flex items-center flex-1">
                    <div class="flex items-center justify-between w-full md:w-auto">
                        <a href="{{ route('web.home') }}">
                            <span class="sr-only">Food Market</span>
                            <img class="w-auto h-8 sm:h-10" src="{{ asset('logo.png') }}" alt="">
                        </a>
                        <div class="flex items-center -mr-2 md:hidden">
                            <button x-on:click="navMobile = ! navMobile" type="button"
                                class="inline-flex items-center justify-center p-2 text-gray-400 bg-gray-900 rounded-md hover:bg-gray-800 focus:outline-none focus:ring-2 focus-ring-inset focus:ring-white"
                                aria-expanded="false">
                                <span class="sr-only">Open Main Menu</span>
                                <!-- Heroicon name: outline/menu -->
                                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="hidden space-x-8 md:flex md:ml-10">
                        <a href="{{ route('web.home') }}" class="text-base font-medium text-dark hover:text-primary">Home</a>

                        <a href="#" class="text-base font-medium text-dark hover:text-primary">Market</a>

                        <a href="#" class="text-base font-medium text-dark hover:text-primary">Blog</a>

                        <a href="#" class="text-base font-medium text-dark hover:text-primary">About</a>
                    </div>
                </div>
                @if (Route::has('login'))
                    <div class="hidden md:flex md:items-center md:space-x-6">
                        @auth
                        @else
                            <a href="{{ route('login') }}"
                                class="inline-flex items-center px-6 py-2 text-base font-medium text-white border border-transparent rounded-md bg-danger hover:bg-red-900">
                                Log in </a>
                            <a href="{{ route('register') }}"
                                class="inline-flex items-center px-4 py-2 text-base font-medium text-white border border-transparent rounded-md bg-danger hover:bg-red-900">
                                Sign Up </a>
                            @endauth
                    </div>
                @endif
            </nav>
        </div>

        <div x-show="navMobile" x-transition
            class="absolute inset-x-0 top-0 p-2 transition origin-top transform md:hidden">
            <div class="overflow-hidden bg-white rounded-lg shadow-md ring-1 ring-black ring-opacity-5">
                <div class="flex items-center justify-between px-5 pt-4">
                    <div>
                        <img class="w-auto h-8"
                            src="https://tailwindui.com/img/logos/workflow-mark-teal-500-cyan-600.svg" alt="">
                    </div>
                    <div class="-mr-2">
                        <button x-on:click="navMobile = ! navMobile" type="button"
                            class="inline-flex items-center justify-center p-2 text-gray-400 bg-white rounded-md hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-cyan-600">
                            <span class="sr-only">Close Main Menu</span>
                            <!-- Heroicon name: outline/x -->
                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="pt-5 pb-6">
                    <div class="px-2 space-y-1">
                        <a href="#"
                            class="block px-3 py-2 text-base font-medium text-gray-900 rounded-md hover:bg-gray-50">Home</a>

                        <a href="#"
                            class="block px-3 py-2 text-base font-medium text-gray-900 rounded-md hover:bg-gray-50">Market</a>

                        <a href="#"
                            class="block px-3 py-2 text-base font-medium text-gray-900 rounded-md hover:bg-gray-50">Blog</a>

                        <a href="#"
                            class="block px-3 py-2 text-base font-medium text-gray-900 rounded-md hover:bg-gray-50">About</a>
                    </div>
                    <div class="px-5 mt-6">
                        <a href="#"
                            class="block w-full px-4 py-3 font-medium text-center text-white rounded-md shadow bg-gradient-to-r from-teal-500 to-cyan-600 hover:from-teal-600 hover:to-cyan-700">Start
                            free trial</a>
                    </div>
                    <div class="px-5 mt-6">
                        <p class="text-base font-medium text-center text-gray-500">Existing customer? <a
                                href="#" class="text-gray-900 hover:underline">Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
