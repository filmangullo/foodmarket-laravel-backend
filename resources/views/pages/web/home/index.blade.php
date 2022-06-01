@extends('layouts.web')

@section('content')
<div class="pt-10 pb-10 bg-secondary sm:pt-16 lg:pt-8 lg:pb-14 lg:overflow-hidden">
    <div class="mx-auto max-w-7xl lg:px-8">
        <div class="lg:grid lg:grid-cols-2 lg:gap-8">
            <div
                class="max-w-md px-4 mx-auto sm:max-w-2xl sm:px-6 sm:text-center lg:px-0 lg:text-left lg:flex lg:items-center">
                <div class="lg:py-24">
                    <a href="#"
                        class="inline-flex items-center p-1 pr-2 rounded-full text-dark bg-primary sm:text-base lg:text-sm xl:text-base hover:text-gray-200">
                        <span
                            class="px-3 py-0.5 text-white text-xs font-semibold leading-5 uppercase tracking-wide bg-gradient-to-r from-yellow-500 to-cyan-600 rounded-full">Ouch!
                            Hungry</span>
                        <span class="ml-4 text-sm">Visit our market</span>
                        <!-- Heroicon name: solid/chevron-right -->
                        <svg class="w-5 h-5 ml-2 text-gray-500" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                    <h1
                        class="mt-4 text-4xl font-extrabold tracking-tight text-dark sm:mt-5 sm:text-6xl lg:mt-6 xl:text-6xl">
                        <span
                            class="block pb-3 text-transparent bg-clip-text bg-gradient-to-r from-gray-700 to-gray-900 sm:pb-5">Seems
                            like you have not ordered any food yet</span>
                    </h1>
                    <p class="text-base font-bold text-gray-300 sm:text-xl lg:text-lg xl:text-xl">Just stay
                        at home while we are preparing your best foods.</p>
                    <div class="mt-10 sm:mt-12">
                        <form action="#" class="sm:max-w-xl sm:mx-auto lg:mx-0">
                            <div class="sm:flex">
                                <div class="flex-1 min-w-0">
                                    <label for="email" class="sr-only">Email address</label>
                                    <input id="email" type="email" placeholder="Enter your email"
                                        class="block w-full px-4 py-3 text-base text-gray-900 placeholder-gray-500 border-0 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-400 focus:ring-offset-gray-900">
                                </div>
                                <div class="mt-3 sm:mt-0 sm:ml-3">
                                    <button type="submit"
                                        class="block w-full px-6 py-3 font-medium text-white rounded-md shadow bg-gradient-to-r from-danger to-danger hover:from-danger hover:to-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-400 focus:ring-offset-gray-900">Subscribe</button>
                                </div>
                            </div>
                            <p class="mt-3 text-sm font-bold text-gray-300 sm:mt-4">
                                Subscribe to get catalog information and other interesting promotions. <a href="#"
                                    class="font-medium text-white">terms of service</a>.</p>
                        </form>
                    </div>
                </div>
            </div>
            <div class="hidden mt-12 -mb-16 lg:content-center lg:items-center sm:-mb-48 lg:m-0 lg:relative lg:flex">


                    <img class="w-full mx-auto"
                        src="{{ asset('img/banner.svg') }}"
                        alt="">

            </div>
        </div>
    </div>
</div>

<!-- Blog section -->
<div class="relative py-16 bg-gray-50 sm:py-24 lg:py-32">
    <div class="relative">
        <div class="max-w-md px-4 mx-auto text-center sm:max-w-3xl sm:px-6 lg:px-8 lg:max-w-7xl">
            <h2 class="text-base font-semibold tracking-wider uppercase text-cyan-600">Learn</h2>
            <p class="mt-2 text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">Helpful
                Resources</p>
            <p class="mx-auto mt-5 text-xl text-gray-500 max-w-prose">Phasellus lorem quam molestie id
                quisque diam aenean nulla in. Accumsan in quis quis nunc, ullamcorper malesuada. Eleifend
                condimentum id viverra nulla.</p>
        </div>
        <div
            class="grid max-w-md gap-8 px-4 mx-auto mt-12 sm:max-w-lg sm:px-6 lg:px-8 lg:grid-cols-3 lg:max-w-7xl">
            <div class="flex flex-col overflow-hidden rounded-lg shadow-lg">
                <div class="flex-shrink-0">
                    <img class="object-cover w-full h-48"
                        src="https://images.unsplash.com/photo-1496128858413-b36217c2ce36?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1679&q=80"
                        alt="">
                </div>
                <div class="flex flex-col justify-between flex-1 p-6 bg-white">
                    <div class="flex-1">
                        <p class="text-sm font-medium text-cyan-600">
                            <a href="#" class="hover:underline"> Article </a>
                        </p>
                        <a href="#" class="block mt-2">
                            <p class="text-xl font-semibold text-gray-900">Boost your conversion rate</p>
                            <p class="mt-3 text-base text-gray-500">Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Architecto accusantium praesentium eius, ut atque fuga
                                culpa, similique sequi cum eos quis dolorum.</p>
                        </a>
                    </div>
                    <div class="flex items-center mt-6">
                        <div class="flex-shrink-0">
                            <a href="#">
                                <img class="w-10 h-10 rounded-full"
                                    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                    alt="Roel Aufderehar">
                            </a>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900">
                                <a href="#" class="hover:underline"> Roel Aufderehar </a>
                            </p>
                            <div class="flex space-x-1 text-sm text-gray-500">
                                <time datetime="2020-03-16"> Mar 16, 2020 </time>
                                <span aria-hidden="true"> &middot; </span>
                                <span> 6 min read </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col overflow-hidden rounded-lg shadow-lg">
                <div class="flex-shrink-0">
                    <img class="object-cover w-full h-48"
                        src="https://images.unsplash.com/photo-1547586696-ea22b4d4235d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1679&q=80"
                        alt="">
                </div>
                <div class="flex flex-col justify-between flex-1 p-6 bg-white">
                    <div class="flex-1">
                        <p class="text-sm font-medium text-cyan-600">
                            <a href="#" class="hover:underline"> Video </a>
                        </p>
                        <a href="#" class="block mt-2">
                            <p class="text-xl font-semibold text-gray-900">How to use search engine
                                optimization to drive sales</p>
                            <p class="mt-3 text-base text-gray-500">Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Velit facilis asperiores porro quaerat doloribus, eveniet
                                dolore. Adipisci tempora aut inventore optio animi., tempore temporibus quo
                                laudantium.</p>
                        </a>
                    </div>
                    <div class="flex items-center mt-6">
                        <div class="flex-shrink-0">
                            <a href="#">
                                <img class="w-10 h-10 rounded-full"
                                    src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                    alt="Brenna Goyette">
                            </a>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900">
                                <a href="#" class="hover:underline"> Brenna Goyette </a>
                            </p>
                            <div class="flex space-x-1 text-sm text-gray-500">
                                <time datetime="2020-03-10"> Mar 10, 2020 </time>
                                <span aria-hidden="true"> &middot; </span>
                                <span> 4 min read </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col overflow-hidden rounded-lg shadow-lg">
                <div class="flex-shrink-0">
                    <img class="object-cover w-full h-48"
                        src="https://images.unsplash.com/photo-1492724441997-5dc865305da7?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1679&q=80"
                        alt="">
                </div>
                <div class="flex flex-col justify-between flex-1 p-6 bg-white">
                    <div class="flex-1">
                        <p class="text-sm font-medium text-cyan-600">
                            <a href="#" class="hover:underline"> Case Study </a>
                        </p>
                        <a href="#" class="block mt-2">
                            <p class="text-xl font-semibold text-gray-900">Improve your customer experience
                            </p>
                            <p class="mt-3 text-base text-gray-500">Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Sint harum rerum voluptatem quo recusandae magni placeat
                                saepe molestiae, sed excepturi cumque corporis perferendis hic.</p>
                        </a>
                    </div>
                    <div class="flex items-center mt-6">
                        <div class="flex-shrink-0">
                            <a href="#">
                                <img class="w-10 h-10 rounded-full"
                                    src="https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                    alt="Daniela Metz">
                            </a>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900">
                                <a href="#" class="hover:underline"> Daniela Metz </a>
                            </p>
                            <div class="flex space-x-1 text-sm text-gray-500">
                                <time datetime="2020-02-12"> Feb 12, 2020 </time>
                                <span aria-hidden="true"> &middot; </span>
                                <span> 11 min read </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="relative bg-gray-900">
    <div class="relative h-56 bg-indigo-600 sm:h-72 md:absolute md:left-0 md:h-full md:w-1/2">
        <img class="object-cover w-full h-full"
            src="https://images.unsplash.com/photo-1525130413817-d45c1d127c42?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1920&q=60&sat=-100"
            alt="">
        <div aria-hidden="true"
            class="absolute inset-0 bg-gradient-to-r from-teal-500 to-cyan-600 mix-blend-multiply"></div>
    </div>
    <div
        class="relative max-w-md px-4 py-12 mx-auto sm:max-w-7xl sm:px-6 sm:py-20 md:py-28 lg:px-8 lg:py-32">
        <div class="md:ml-auto md:w-1/2 md:pl-10">
            <h2 class="text-base font-semibold tracking-wider text-gray-300 uppercase">Award winning support
            </h2>
            <p class="mt-2 text-3xl font-extrabold tracking-tight text-white sm:text-4xl">We’re here to help
            </p>
            <p class="mt-3 text-lg text-gray-300">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Et, egestas tempus tellus etiam sed. Quam a scelerisque amet ullamcorper eu enim et
                fermentum, augue. Aliquet amet volutpat quisque ut interdum tincidunt duis.</p>
            <div class="mt-8">
                <div class="inline-flex rounded-md shadow">
                    <a href="#"
                        class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-gray-900 bg-white border border-transparent rounded-md hover:bg-gray-50">
                        Visit the help center
                        <!-- Heroicon name: solid/external-link -->
                        <svg class="w-5 h-5 ml-3 -mr-1 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path
                                d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z" />
                            <path
                                d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
