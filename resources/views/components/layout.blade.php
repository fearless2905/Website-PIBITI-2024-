<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Hiker\'s Haven' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            background: url('https://img.freepik.com/free-photo/beautiful-mountains-landscape_23-2150787886.jpg?t=st=1721834745~exp=1721838345~hmac=c7fa9d0c7ce7ffeec593355a52bd6fef6b3988536ccbcc7adf2a6d35165125f8&w=1380') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            overflow: hidden;
        }

        .navbar {
            background: rgba(0, 0, 0, 0.7);
        }

        .title-box {
            background: rgba(0, 0, 0, 0.5);
            border-radius: 8px;
            padding: 10px;
            margin-bottom: 20px;
        }

        .title-box h4 {
            margin: 0;
            color: #fff;
        }

        .animate__animated {
            animation-duration: 0.1s;
            /* Set animation duration to 0.1 second for quick animations */
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Hiker's Haven</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                        href="{{ route('dashboard') }}">
                        Dashboard
                    </a>
                    <a class="nav-link {{ request()->routeIs('orders.index') ? 'active' : '' }}"
                        href="{{ route('orders.index') }}">
                        Orders
                    </a>
                    <a class="nav-link {{ request()->routeIs('categories.index') ? 'active' : '' }}"
                        href="{{ route('categories.index') }}">
                        Categories
                    </a>
                    <a class="nav-link {{ request()->routeIs('products.index') ? 'active' : '' }}"
                        href="{{ route('products.index') }}">
                        Products
                    </a>
                    <a class="nav-link {{ request()->routeIs('users.index') ? 'active' : '' }}"
                        href="{{ route('users.index') }}">
                        Users
                    </a>
                </div>
            </div>

            <div class="text-white me-4">{{ auth()->user()->name }}</div>
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>
    </nav>

    @isset($title)
        <div class="container title-box animate__animated animate__fadeIn animate__fast">
            <h4>{{ $title }}</h4>
        </div>
    @endisset

    {{ $slot }}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
