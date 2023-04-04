<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="csrf-param" content="_token" />
        <title>Laravel</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body>
        <div class="container mt-4">
            <a href="/">Home</a>
            <a href="/about">About</a>
            <a href={{ route('articles.index') }}>Articles</a>
            <a href={{ route('articles.create') }}>Create Article</a>
            <h1>@yield('header')</h1>
            <div>@yield('content')</div>
        </div>
    </body>
</html>
