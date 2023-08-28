<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- icon -->
    <script src="https://kit.fontawesome.com/826eec2b4c.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/jpg" href="images/icone-fraise.jpg">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Annie fruits</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Paprika&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@500&display=swap" rel="stylesheet">
    <!--************ Scripts ************-->
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])

    <!--************ Icone ************-->
    <script src="https://kit.fontawesome.com/1dd6859436.js" crossorigin="anonymous"></script>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md fixed-top">
            <div class="container-fluid">

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



                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav pt-3">

                            <a class="navbar-brand" href="{{ route('home') }}">
                                <img class="logo_navbar" src="{{ asset('images/logo-annie-fruits.png') }}"
                                    alt="Logo">
                            </a>

                            <a class="btn btn-ghost p-3 mb-5" aria-current="articles" href="{{ route('gammes.index') }}">
                                Nos produits
                            </a>

                            <a class="btn btn-ghost p-3 mb-5" href="#">
                                Nous contacter
                            </a>

                            <a class="navbar-brand" aria-current="panier" href="{{ route('panier.show') }}">
                                <i class="cart fa-solid fa-cart-shopping mt-3"></i>
                            </a>


                            <ul class="navbar-nav ms-auto">
                                <!-- Authentication Links -->

                                {{-- <!-------------------------------- liens accessibles aux invités uniquement ---------------------------------> --}}
                                @guest
                                    @if (Route::has('login'))
                                        <li class="nav-item">
                                            <a class="btn btn-ghost px-3 nav-link"
                                                href="{{ route('login') }}">{{ __('Connexion') }}</a>
                                        </li>
                                    @endif

                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="btn btn-ghost px-3 nav-link"
                                                href="{{ route('register') }}">{{ __('Inscription') }}</a>
                                        </li>
                                    @endif

                                    <!-------------------------------- liens accessibles aux connectés uniquement --------------------------------->
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
                                            role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">


                                            <!-- Lien vers "MON COMPTE" -->
                                            <a class="dropdown-item"
                                                href="{{ route('user.edit', $user = Auth::user()) }}">Mon
                                                compte</a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>

                                            @if (Auth::user()->role_id == 2)
                                                <a class="dropdown-item" href="{{ route('admin') }}">
                                                    Back-office
                                                </a>
                                            @endif

                                            <!-------------------------------- favoris : uniquement si connecté --------------------------------->

                                            <a class="dropdown-item" aria-current="panier"
                                                href="{{ route('favoris.index') }}">Favoris</a>
                                            <a class="dropdown-item" aria-current="commande"
                                                href="{{ route('commandes.index') }}">Commandes</a>

                                            <!-- Lien vers "DECONNEXION" -->
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                                {{ __('Déconnexion') }}
                                            </a>

                                        </div>
                                    </li>
                                @endguest

                            </ul>


                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>




    <main>
        <div class="container-fluid text-center mt-5">
            @if (session()->has('message'))
                <p class="alert alert-success">{{ session()->get('message') }}</p>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        @yield('content')
    </main>

    </div>


    <footer class="pt-5 mx-auto">

        <div class="row mx-auto text-center">

            <div class="col-md-3">
                <a class="navbar-brand" href="home#">
                    <img class="logo_footer text-center" src="{{ asset('images/logo-annie-fruits.png') }}"
                        alt="Logo">
                </a>
            </div>

            <div class="col-md-3 pt-2">
                <a class="footer-lien navbar-brand" href="#">
                    <p>Nos produits</p>
                </a>
            </div>

            <div class="col-md-3 pt-2">
                <a class="footer-lien navbar-brand" href="#">
                    <p>Nous contacter</p>
                </a>
            </div>

            <div class="col-md-3">
                <a class="navbar-brand"
                    href="https://www.facebook.com/people/annie-fruits/100067000605161/?locale=fr_FR">
                    <i class="logo-facebook fa-brands fa-square-facebook"></i>
                    {{-- <img class="logo_facebook text-center" src="{{ asset('images/icone-facebook-rouge.png') }}"
                        alt="Logo"> --}}
                </a>
            </div>

        </div>

        <h5 class="copyright mx-auto text-center">© - 2023 - <b>Annie fruits</h5>
    </footer>
</body>

</html>
