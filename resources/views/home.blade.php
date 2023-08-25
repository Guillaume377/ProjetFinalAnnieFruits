@extends('layouts.app')

@section('content')
    {{-- <div class="base_line">
        <h1 class="base_line_h1 text-center">Bienvenue chez Annie fruits!</h1>
        <h2 class="text-center pb-5">Votre magasin de proximité à Rochefort.</h2>
    </div> --}}



    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3"
                aria-label="Slide 4"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/entree.jpg') }}" class="d-block w-100" alt="entrée du magasin">
                <div class="carousel-caption d-none d-md-block">
                    <h1>Bienvenue chez Annie fruits !</h1>
                    <h3>Votre magasin de proximité à Rochefort.</h3>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/fraise2.jpg') }}" class="d-block w-100" alt="barquettes de fraises">
                <div class="carousel-caption d-none d-md-block">
                    <h1>Bienvenue chez Annie fruits !</h1>
                    <h3>Votre magasin de proximité à Rochefort.</h3>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/rayon.jpg') }}" class="d-block w-100" alt="rayon fruits et légumes">
                <div class="carousel-caption d-none d-md-block">
                    <h1>Bienvenue chez Annie fruits !</h1>
                    <h3>Votre magasin de proximité à Rochefort.</h3>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/corbeille.jpg') }}" class="d-block w-100" alt="corbeille de fruits">
                <div class="carousel-caption d-none d-md-block">
                    <h1>Bienvenue chez Annie fruits !</h1>
                    <h3>Votre magasin de proximité à Rochefort.</h3>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container-fluid bandeau-accueil ">
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

    <div class="container p-5">
        <div class="row">

            <div class="col-md-6 pt-3 pe-5">
                <img src="{{ asset('images/entree.jpg') }}" class="entree d-block w-100" alt="entrée du magasin">
            </div>

            <div class="col-md-6 ps-5">
                <h3 class="histoire text-center">Un peu d'histoire...</h3>

                <div class=" text_histoire pt-3">
                    <p class="text-justify"> L'entreprise Annie fruits a été créé le 10 juin 2009 par M. Villate. Son activité est la vente de
                        fruits et légumes.
                    </p>
                    <p class="text-justify">Il se situe au 50 avenue du 11 novembre 1918 17300 ROCHEFORT (entre les magasins BUT et BRICORAMA).
                    </p>
                    <p class="text-justify">Il a été repris par M. Claude DELMOTTE au 01 octobre 2015.</p>
                    <p class="text-justify">L'équipe est constituée de 3 personnes : le gérant M.DELMOTTE ainsi que 2 salariés.</p>
                    <p class="text-justify">Depuis le magasin s'est aussi diversifié en proposant la vente de fromages.</p>
                </div>

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
    </div> --}}
    @endsection
