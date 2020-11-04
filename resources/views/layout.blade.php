<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('title')</title>

        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    </head>
    <body>
        <div style="justify-content: space-between; align-item: center;" class="d-flex flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
            <h5 class="my-0 mr-md-auto font-weight-normal">Laravel Blog</h5>
            <nav class="my-2 my-md-0 mr-md-3">
                <a class="p-2 text-dark" href="{{ route('Home') }}">Home</a>
                <a class="p-2 text-dark" href="{{ route('Contact') }}">Contact</a>
                <a class="p-2 text-dark" href="{{ route('posts.index') }}">Blog Posts</a>
                <a class="p-2 text-dark" href="{{ route('posts.create') }}">Add Blog Post</a>
                @auth
                    <a class="p-2 text-dark" href="{{ route('dashboard') }}">Dashboard</a>
                    <!-- Authentication -->
                    <form style="display: inline;" method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="p-2 text-dark">Log out</button>
                    </form>
                @endauth
                @unless (Auth::check())
                    <a class="p-2 text-dark" href="{{ route('register') }}">Register</a>
                    <a class="p-2 text-dark" href="{{ route('login') }}">Login</a>
                @endunless
            </nav>
        </div>
        {{-- <ul> --}}
                {{-- <li>
                    <a href="{{ route('Home') }}">Home</a>
                </li> --}}
            {{-- <li>
                <a href="{{ route('Home') }}">Home</a>
            </li>
            <li>
                <a href="{{ route('Contact') }}">Contact</a>
            </li>
            <li>
                <a href="{{ route('posts.index') }}">Blog Post</a>
            </li>
            <li>
                <a href="{{ route('posts.create') }}">Create Post</a>
            </li> --}}
                {{-- <li>
                    <a href="/contact">Contact</a>
                </li> --}}
                {{-- <li>
                    <a href="{{ route('Blog-Post', ['id' => 1]) }}">Blog Post 1</a>
                </li>
                <li>
                    <a href="{{ route('Blog-Post', ['id' => 2]) }}">Blog Post 2</a>
                </li> --}}
        {{-- </ul> --}}

        <div class="container">
            @if (session()->has('status'))
                <p style="color: green;">
                    {{ session()->get('status') }}
                </p>
            @endif

            @yield('content')
        </div>

        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>