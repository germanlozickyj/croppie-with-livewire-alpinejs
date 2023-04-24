<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Croppie</title>

        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
        @livewireScripts
        @livewireStyles
        <style>
            [x-cloak] {
                visibility: hidden;
                overflow: hidden;
            }
        </style>
    </head>
    <body class="bg-gray-900">
        @yield('content')
    </body>
</html>
