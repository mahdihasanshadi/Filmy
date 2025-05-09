<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Filmy') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #e74c3c;
            --accent-color: #3498db;
            --text-color: #2c3e50;
            --light-bg: #f8f9fa;
            --dark-bg: #2c3e50;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--light-bg);
            color: var(--text-color);
        }

        .navbar {
            background-color: var(--primary-color) !important;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .navbar-brand {
            font-size: 1.8rem;
            font-weight: 700;
            color: white !important;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .navbar-brand span {
            color: var(--secondary-color);
        }

        .nav-link {
            color: rgba(255,255,255,0.9) !important;
            font-weight: 500;
        }

        .nav-link:hover {
            color: var(--secondary-color) !important;
        }

        .card {
            border: none;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            transition: transform 0.2s;
        }

        .card:hover {
            transform: translateY(-2px);
        }

        .card-header {
            background-color: var(--primary-color);
            color: white;
            font-weight: 600;
        }

        .list-group-item {
            border: none;
            padding: 1rem;
            transition: background-color 0.2s;
        }

        .list-group-item:hover {
            background-color: rgba(44, 62, 80, 0.05);
        }

        .list-group-item i {
            color: var(--primary-color);
            width: 24px;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }

        .btn-success {
            background-color: var(--accent-color);
            border-color: var(--accent-color);
        }

        .btn-success:hover {
            background-color: #2980b9;
            border-color: #2980b9;
        }

        .table th {
            background-color: var(--primary-color);
            color: white;
        }

        .badge {
            padding: 0.5em 0.8em;
            font-weight: 500;
        }

        .badge.bg-success {
            background-color: var(--accent-color) !important;
        }

        .badge.bg-warning {
            background-color: var(--secondary-color) !important;
        }

        .alert {
            border: none;
            border-radius: 8px;
        }

        .pagination .page-link {
            color: var(--primary-color);
        }

        .pagination .page-item.active .page-link {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
    </style>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <span>F</span>ilmy
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('login') }}">{{ __('Login') }}</a>
                            </li>

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
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
            <div class="container">
                @auth
                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">
                                    <i class="fas fa-bars me-2"></i>Menu
                                </h5>
                            </div>
                            <div class="list-group list-group-flush">
                                <a href="{{ route('home') }}" class="list-group-item list-group-item-action d-flex align-items-center">
                                    <i class="fas fa-home me-3"></i>
                                    <span>Home</span>
                                </a>
                                <a href="{{ route('movies.index') }}" class="list-group-item list-group-item-action d-flex align-items-center">
                                    <i class="fas fa-film me-3"></i>
                                    <span>Movies</span>
                                </a>
                                <a href="{{ route('series.index') }}" class="list-group-item list-group-item-action d-flex align-items-center">
                                    <i class="fas fa-tv me-3"></i>
                                    <span>Series</span>
                                </a>
                                <a href="{{ route('genres.index') }}" class="list-group-item list-group-item-action d-flex align-items-center">
                                    <i class="fas fa-theater-masks me-3"></i>
                                    <span>Genre</span>
                                </a>
                                <a href="{{ route('favorites.index') }}" class="list-group-item list-group-item-action d-flex align-items-center">
                                    <i class="fas fa-heart me-3"></i>
                                    <span>Favorites</span>
                                </a>
                                <a href="{{ route('friends.index') }}" class="list-group-item list-group-item-action d-flex align-items-center">
                                    <i class="fas fa-user-friends me-3"></i>
                                    <span>Friends</span>
                                </a>
                                <a href="{{ route('actors.index') }}" class="list-group-item list-group-item-action d-flex align-items-center">
                                    <i class="fas fa-user-tie me-3"></i>
                                    <span>Actor</span>
                                </a>
                                <a href="{{ route('directors.index') }}" class="list-group-item list-group-item-action d-flex align-items-center">
                                    <i class="fas fa-user-tie me-3"></i>
                                    <span>Directors</span>
                                </a>
                                <a href="{{ route('users.index') }}" class="list-group-item list-group-item-action d-flex align-items-center">
                                    <i class="fas fa-users me-3"></i>
                                    <span>All Users</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        @yield('content')
                    </div>
                </div>
                @else
                <div class="row justify-content-center">
                    <div class="col-md-9">
                        @yield('content')
                    </div>
                </div>
                @endauth
            </div>
        </main>
    </div>
    @stack('scripts')
</body>

</html>
