<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ===== icon ===== -->

    <script src="https://kit.fontawesome.com/826eec2b4c.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/jpg" href="images/icone-fraise.jpg">


    <!-- ===== CSRF Token ===== -->

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- ===== Title ===== -->

    <title>Annie fruits</title>


    <!-- ===== Fonts ===== -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Paprika&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@500&display=swap" rel="stylesheet">


    <!-- ===== Scripts ===== -->

    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])


    <!-- ===== Icone ===== -->

    <script src="https://kit.fontawesome.com/1dd6859436.js" crossorigin="anonymous"></script>
</head>

<body>
    <div id="app">

        <!-- ===== NAVBAR ===== -->

        <nav class="navbar navbar-expand-md pb-2 fixed-top">
            <div class="container-fluid">


                <!-- ===== NAVBAR TOGGLER ===== -->

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>


                <!-- ===== LIENS/BOUTONS NAVBAR ===== -->

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="navbar-nav py-4">


                        <!-- ===== LOGO ANNIE FRUITS / LIEN PAGE ACCUEIL ===== -->

                        <a class="navbar-brand" href="{{ route('home') }}">
                            <img class="logo_navbar" src="{{ asset('images/logo-annie-fruits.png') }}" alt="Logo">
                        </a>


                        <!-- ===== BOUTON NOS PRODUITS / LIEN PAGE NOS PRODUITS ===== -->

                        <a class="btn btn-ghost pt-3 mx-3" aria-current="articles" href="{{ route('gammes.index') }}">
                            Nos produits
                        </a>


                        <!-- ===== BOUTON NOUS CONTACTER / LIEN PAGE NOUS CONTACTER ===== -->

                        <a class="btn btn-ghost pt-3 mx-3" href="{{ route('contact') }}">
                            Nous contacter
                        </a>


                         <!-- Authentication Links -->

                        <ul class="navbar-nav ms-auto">
                           


                            <!-- ========================= LIENS ACCESSIBLES AUX INVITES UNIQUEMENT ====================== -->

                            @guest

                                <!-- ===== BOUTON CONNEXION / LIEN PAGE CONNEXION ===== -->

                                @if (Route::has('login'))
                                    
                                        <a class="btn btn-ghost pt-3 mx-3 nav-link"
                                            href="{{ route('login') }}">{{ __('Connexion') }}</a>
                                    
                                @endif

                                <!-- ===== BOUTON INSCRIPTION / LIEN PAGE INSCRIPTION ===== -->

                                @if (Route::has('register'))
                                    
                                        <a class="btn btn-ghost pt-3 mx-3 nav-link"
                                            href="{{ route('register') }}">{{ __('Inscription') }}</a>
                                    
                                @endif

                               
                               <!-- ========================= LIENS ACCESSIBLES AUX CONNECTES UNIQUEMENT ====================== -->

                               @else
                               
                               <!-- ===== BOUTON MON COMPTE ===== -->

                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="prenom nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{-- {{ Auth::user()->prenom }} --}}
                                        <i class="person fa-solid fa-person mx-3"></i>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">


                                        <!-- ===== LIEN VERS "MON COMPTE" ===== -->

                                        <a class="dropdown-item" href="{{ route('user.edit', $user = Auth::user()) }}">Mon
                                            compte</a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>

                                        @if (Auth::user()->role_id == 2)
                                            <a class="dropdown-item" href="{{ route('backoffice') }}">
                                                Back-office
                                            </a>
                                        @endif

                                        <!-------------------------------- favoris : uniquement si connecté --------------------------------->

                                        <a class="dropdown-item" aria-current="panier"
                                            href="{{ route('favoris.index') }}">Favoris</a>


                                        <!-- ===== LIEN VERS "COMMANDES" ===== -->

                                        <a class="dropdown-item" aria-current="commande"
                                            href="{{ route('commandes.index') }}">Commandes</a>


                                        <!-- ===== LIEN VERS "DECONNEXION" ===== -->

                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                            {{ __('Déconnexion') }}
                                        </a>

                                    </div>
                                </li>
                            @endguest


                            <!-- ===== BOUTON PANIER / LIEN VERS "PANIER" ===== -->

                            <a class="navbar-brand" aria-current="panier" href="{{ route('panier.show') }}">
                                <i class="cart fa-solid fa-cart-shopping pt-2 mx-4"></i>
                            </a>

                        </ul>

                    </div>
                </div>
            </div>
        </nav>
    </div>



<!-- ===== MESSAGEs SUCCES / ERROR ===== -->

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

    

<!-- =================================== FOOTER ========================================== -->

    <footer class="py-3 mx-auto">

        <div class="row mx-auto text-center">


            <!-- ===== LOGO ANNIE FRUITS / LIEN PAGE ACCUEIL ===== -->

            <div class="col-md-3">
                <a class="navbar-brand" href="home#">
                    <img class="logo_footer text-center" src="{{ asset('images/logo-annie-fruits.png') }}"
                        alt="Logo">
                </a>
            </div>


            <!-- ===== LIEN PAGE NOS PRODUITS ===== -->

            <div class="lien col-md-3 fs-5 pt-2">
                <a class="footer-lien navbar-brand" href="{{ route('gammes.index') }}">
                    <p>Nos produits</p>
                </a>
            </div>


            <!-- ===== LIEN PAGE NOUS CONTACTER ===== -->

            <div class="col-md-3 fs-5 pt-2">
                <a class="footer-lien navbar-brand" href="{{ route('contact') }}">
                    <p>Nous contacter</p>
                </a>
            </div>


            <!-- ===== LIEN COMPTE FACEBOOK ANNIE FRUITS ===== -->

            <div class="col-md-3">
                <a class="navbar-brand"
                    href="https://www.facebook.com/people/annie-fruits/100067000605161/?locale=fr_FR">
                    <i class="logo-facebook fa-brands fa-square-facebook"></i>
                </a>
            </div>

        </div>


        <!-- ===== COPYRIGHT ===== -->

        <h5 class="copyright mx-auto mt-3 text-center">© Copyright - 2023</h5>
    </footer>
</body>

</html>
