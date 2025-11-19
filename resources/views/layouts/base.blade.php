<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="{{asset("logos/logo.png")}}">
        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
        <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
    </head>
    <body class="min-h-screen bg-gray-100">
        @include("layouts/navbar")
        <div class="min-h-screen">
            @yield("content")
        </div>
        
        @include("layouts/footer")
    </body>
</html>
