<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">

        @include('layouts.temp')

        @stack('modals')

        @livewireScripts

        <script class="text/javascript">
            window.onscroll = function() {myFunction()};

            var header = document.querySelector('header');
            var sticky = header.offsetTop;

            function myFunction() {
                if (window.pageYOffset > sticky) {
                    header.classList.remove("relative");
                    header.classList.add("fixed");
                    header.classList.add("shadow-md");
                } else {
                    header.classList.remove("fixed");
                    header.classList.remove("shadow-md");
                    header.classList.add("relative");
                }
            }
        </script>
    </body>
</html>
