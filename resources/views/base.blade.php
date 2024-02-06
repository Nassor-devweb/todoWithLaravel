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
    <script src="https://kit.fontawesome.com/245b35fcab.js" crossorigin="anonymous"></script>
    <script type="module" src="./js/app.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="antialiased">
    <div class="navigation">
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
    </div>
    <main>
        @yield('content')
    </main>
</body>

</html>
