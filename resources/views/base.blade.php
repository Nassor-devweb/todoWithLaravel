<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link rel="stylesheet" href="./css/app.css">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
</head>

<body class="antialiased">
    <nav class="">
        @auth
            <h1>Nas-Todo</h1>
            <div>
                <img src="" alt="">
            </div>
            <a href="{{ url('/dashboard') }}" class="">Mon Compte</a>
        @else
            <h1>Nas-Todo</h1>
            <ul class="nav__list">
                <li><a href="{{ route('login') }}" class="">Connexion</a></li>
                <li><a href="{{ route('register') }}">S'inscrire</a></li>
            </ul>
        @endauth
    </nav>
    <main>
        @yield('content')
    </main>
</body>

</html>
