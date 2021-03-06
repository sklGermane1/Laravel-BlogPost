<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="https://bootswatch.com/4/cosmo/bootstrap.min.css" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Project</title>
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        @auth
        <a class="navbar-brand" href="{{ route('home') }}">Home</a>
        <ul class="navbar-nav">
            <li class="nav-item">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                        <button type="submit" class="btn btn-outline-dark nav-link">Logout</button>
                </form>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{ route('create-post') }}">Create Post</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('profile',["user"=>auth()->user()]) }}">Profile</a>
            </li>
        </ul>
        @endauth
            <ul class="navbar-nav">
                @guest
                <li class="nav-item">
                <a class="nav-link" href="{{ route('about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                @endguest
            </ul>
    </nav>
    @yield("content")
</body>
</html>