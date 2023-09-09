@extends('layouts.app')

@section('title')
    Catalogue - Annie fruits
@endsection


<h1 class="text-center mx-auto">{{$article->nom}}</h1>




{{-- * * * Titre * * * --}}

<div class="row w-75 mx-auto pt-5">
    @foreach ($articles as $article)
        <div class="col-md-4">
            <div class="card_promo card p-3 mb-5 rounded-4">
                <img class="rounded-1" src="{{ asset('images/' . $article->image) }}">
                <div class="card-body">
                    <h3 class="card-title text-center mb-3">{{ $article->nom }}</h3>
                    <div class="row">
                        <div class="col-md-9">
                            <p class="card-text">{{ $article->description }}</p>
                        </div>

                        <div class="col">

                                <p>{{ $article->prix }} €</p>
                          
                        </div>

                    </div>
                </div>


                <!-- bouton ajout au panier -->


                <div class="container text-center">
                    <div class="row text-center mt-1">
                        <div class="col-md-12">
                            <form method="POST" action="{{ route('panier.add', 1) }}"
                                class="form-inline d-inline-block">
                                {{ csrf_field() }}

                                <input value="1" type="number" name="quantite" placeholder="Quantité ?"
                                    class="form-control mr-2">
                            </form>
                        </div>

                        <div class="col-md-12">
                            @if (Auth::user())


                                <!-- si le produit est déjà dans les favoris-->


                                @if (Auth::user()->isInFavorites($article))


                                    <!-- si dans les favoris-->

                                    <form method="post" action="{{ route('favoris.destroy', $article->id) }}">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-outline-danger m-2">Retirer
                                            des
                                            favoris</button>

                                    </form>
                                @else

                                    <!-- si le produit n'est pas dans les favoris-->

                                    <form method="post" action="{{ route('favoris.store') }}">
                                        @csrf
                                        <input type="hidden" value="{{ $article->id }}" name="articleId">
                                        <button type="submit" class="btn btn-outline-secondary m-2">Ajouter aux
                                            favoris</button>
                                    </form>
                                @endif

                            @endif
                        </div>


                        <!-- ====== BOUTON AJOUT PANIER ===== -->
                        
                        <div class="col">

                            <form method="POST" action="{{ route('panier.add', 1) }}"
                                class="form-inline d-inline-block">
                                {{ csrf_field() }}

                                <button type="submit" class="ajoutValider btn">Ajouter au panier</button>

                            </form>

                        </div>

                        <div class="col">
                            <a href="{{ route('articles.show', $article) }}" class="m-1">
                                <button class="btn validerCommande">Détails produit</button>
                            </a>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    @endforeach
</div>