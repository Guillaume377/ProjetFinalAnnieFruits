@extends('layouts.app')

@section('content')
    <!-- ========================== CAROUSEL ========================== -->

    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/entree.jpg') }}" class="d-block w-100" alt="entrée du magasin">
                <div class="carousel-caption d-block">
                    <h1 class="h1_carousel">Bienvenue chez Annie fruits !</h1>
                    <h3 class="h3_carousel">Votre magasin de proximité à Rochefort.</h3>
                </div>
            </div>

            <div class="carousel-item">
                <img src="{{ asset('images/fraise2.jpg') }}" class="d-block w-100" alt="barquettes de fraises">
                <div class="carousel-caption d-block">
                    <h1 class="h1_carousel">Bienvenue chez Annie fruits !</h1>
                    <h3 class="h3_carousel">Votre magasin de proximité à Rochefort.</h3>
                </div>
            </div>

            <div class="carousel-item">
                <img src="{{ asset('images/rayon.jpg') }}" class="d-block w-100" alt="rayon fruits et légumes">
                <div class="carousel-caption d-block">
                    <h1 class="h1_carousel">Bienvenue chez Annie fruits !</h1>
                    <h3 class="h3_carousel">Votre magasin de proximité à Rochefort.</h3>
                </div>
            </div>

            <div class="carousel-item">
                <img src="{{ asset('images/corbeille.jpg') }}" class="d-block w-100" alt="corbeille de fruits">
                <div class="carousel-caption d-block">
                    <h1 class="h1_carousel">Bienvenue chez Annie fruits !</h1>
                    <h3 class="h3_carousel">Votre magasin de proximité à Rochefort.</h3>
                </div>
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>

    </div>


    <!-- ========================== BANDEAU ========================== -->

    <div class="container-fluid bandeau-accueil">
        <div class="row mx-auto d-flex align-content-around align-item-center">

            <div class="col-md-4 mt-4 py-3 text-center">
                <i class="logo_bandeau fa-solid fa-house" style="color: #ffffff;"></i>
                <p class="text_bandeau">Produits locaux</p>
            </div>

            <div class="col-md-4 mt-4 py-3 text-center">
                <i class="logo_bandeau fa-solid fa-apple-whole" style="color: #ffffff;"></i>
                <p class="text_bandeau">Fraîcheur garantie</p>
            </div>

            <div class="col-md-4 mt-4 py-3 text-center">
                <i class="logo_bandeau fa-solid fa-cart-shopping" style="color: #ffffff;"></i>
                <p class="text_bandeau">Click & Collect</p>
            </div>
        </div>
    </div>


    <!-- ========================== HISTORIQUE DE l'ENTREPRISE ========================== -->

    <div class="container p-5">
        <div class="row ">
            {{-- <div class="d-flex justify-content-between"> --}}
                <div class="col-lg-6 py-3 pe-0 pe-lg-5">
                    <img src="{{ asset('images/entree.jpg') }}" class="entree d-block w-100" alt="entrée du magasin">
                </div>

                <div class="col-lg-6 py-3 ps-0 ps-lg-5">
                    <h3 class="histoire text-center">Un peu d'histoire...</h3>

                    <div class=" text_histoire pt-3">
                        <p class="text-justify"> L'entreprise Annie fruits a été créé le 10 juin 2009 par M. Villate. Son
                            activité est la vente de
                            fruits et légumes.
                        </p>
                        <p class="text-justify">Il se situe au 56 avenue du 11 novembre 1918 17300 ROCHEFORT (entre les
                            magasins
                            BUT et BRICORAMA).
                        </p>
                        <p class="text-justify">Il a été repris par M. Claude DELMOTTE au 01 octobre 2015.</p>
                        <p class="text-justify">L'équipe est constituée de 3 personnes : le gérant M. DELMOTTE ainsi que 2
                            salariés.</p>
                        <p class="text-justify">Depuis le magasin s'est aussi diversifié en proposant la vente de fromages.
                        </p>
                    </div>
                </div>
            {{-- </div> --}}
        </div>
    </div>










    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Tableau de bord') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('Vous êtes connectés!') }}
                    </div>
                </div>
            </div>
        </div>
     --}}
@endsection
