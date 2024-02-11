<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/app.css">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/245b35fcab.js" crossorigin="anonymous"></script>
    <script type="module" src="/js/app.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="antialiased">
    <div class="modal-contenaire activeModal">
        <div class="content-confirm">
            <p>Êtes-vous sûr de vouloir supprimer ?</p>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="cancelModalbtn">Annuler</button>
                <form action="{{ route('todo.delete') }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-primary" id="deleteBtnModal" name="id">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
    <div class="navigation">
        @auth
            <h1>Nas-Todo</h1>
            <div class="navContenaire">
                <div class="navContenaire__account">
                    <div class="notificationContener">
                        <div class="notificationContener__icone">
                            <i class="fa-solid fa-bell"></i>
                            <span class="notificationContener__number">{{ count(Auth::user()->unreadNotifications) }}</span>
                        </div>
                    </div>

                    <div class="userInfo">
                        <div class="contentImg">
                            <img src="./images/nas.jpg" alt="">
                            <i class="fa-solid fa-caret-down"></i>
                        </div>
                        <ul class="nav__list login">
                            <li><a href="{{ route('accueil') }}"><i class="fa-regular fa-user"></i>Mon compte</a></li>
                            <li><a href=""><i class="fa-solid fa-arrow-right-arrow-left"></i>Mes affectations</a>
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button type="submit"><i class="fa-solid fa-power-off"></i>Déconnexion</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        @else
            <h1>Nas-Todo</h1>
            <ul class="nav__list logout">
                <li><a href="{{ route('login') }}" class="">Connexion</a></li>
                <li><a href="{{ route('register') }}">S'inscrire</a></li>
            </ul>
        @endauth
    </div>
    <main>
        @auth
            @yield('content')
        @else
        @endauth
    </main>
</body>

</html>
