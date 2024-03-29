<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'DT') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'DT') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @if (Auth::check() && Auth::user()->type == 'Admin')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('auth.home') }}">
                                    <i class="fas fa-home me-2"></i> Home
                                </a>
                            </li>
                        @elseif (Auth::check() && Auth::user()->type == 'Agent')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.home') }}">
                                    <i class="fas fa-home me-2"></i> Home
                                </a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/') }}">
                                    <i class="fas fa-home me-2"></i> Home
                                </a>
                            </li>
                        @endif
                        @if (Auth::check() && Auth::user()->id)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('users.show', [Auth::user()->id]) }}">
                                    <i class="fas fa-user me-2"></i> Profile
                                </a>
                            </li>
                            @if (Auth::user()->type == 'Admin')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('users.index', [Auth::user()->id]) }}">
                                        <i class="fa-solid fa-users me-2"></i> Agent's
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('traders.index', [Auth::user()->id]) }}">
                                        <i class="fa-solid fa-building"></i> Trader's
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('comments.index', [Auth::user()->id]) }}">
                                        <i class="fa-solid fa-comments"></i> Comment's
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('settings.index', [Auth::user()->id]) }}">
                                        <i class="fa-solid fa-sliders"></i> Setting's
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('statistics.index', [Auth::user()->id]) }}">
                                        <i class="fa-solid fa-square-poll-vertical"></i> Statistic's
                                    </a>
                                </li>
                            @endif
                        @endif

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
