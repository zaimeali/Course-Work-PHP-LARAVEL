<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('title')</title>
    </head>
    <body>
        <ul>
            <li>
                <a href="{{ route('Home') }}">Home</a>
            </li>
            <li>
                <a href="/contact">Contact</a>
            </li>
            <li>
                <a href="{{ route('Blog-Post', ['id' => 1]) }}">Blog Post 1</a>
            </li>
            <li>
                <a href="{{ route('Blog-Post', ['id' => 2]) }}">Blog Post 2</a>
            </li>
        </ul>
        @yield('content')
    </body>
</html>