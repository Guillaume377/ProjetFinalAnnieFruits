@extends ('layouts.app')

@section('title')
    {{ $article->nom }} - Annie fruits
@endsection

@section('content')

    <!-- ===== TITRE ===== -->

    <h1 class="fw-bold text-center py-5"> {{ $article->nom }}</h1>

    <div class="container mb-3">
        <div class="row">

            <div class="col-xl-6 d-flex justify-content-center pe-5 pb-5">
                <img class="img-article" style="object-fit: cover" src="{{ asset("images/$article->image") }} "
                    alt={{ $article->nom }}>
            </div>


            <!-- ===== card description article ===== -->

            <div class="col-xl-6 d-flex justify-content-center ps-5 pb-5">
                <div class="img-article">


                    <!-- ===== titre ===== -->

                    <div class="text-center py-5">
                        <h5>{{ $article->titre }}</h5>
                    </div>


                    <!-- ===== description produit ===== -->

                    <div class="description-article px-5">
                        <td> {{ $article->description }}</td>
                    </div>


                    <!-- ===== prix ===== -->

                    <div class="prix_article text-center  my-5">
                        <td class="mx-auto">{{ $article['prix'] }} € / {{ $article['type_prix'] }}</td>
                    </div>


                    <!-- ===== Stock ===== -->

                    <div class="d-flex flex-nowrap justify-content-center">
                        <div class="my-3 ms-2">
                            <i class="fas fa-box-open fa-2x mx-3"></i>@php displayStock($article->type_prix, $article->stock) @endphp
                        </div>

                        <!--affichage du bouton de retrait des favoris pour le user connecté-->
                        <div class="mt-3 mx-4">
                            
                        @if (Auth::user())
                        
                            <!-- si le produit est déjà dans les favoris-->
                            @if (Auth::user()->isInFavorites($article))
                                <!-- si dans les favoris-->
                                <form method="get" action="{{ route('favori.destroy', $article->id) }}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-suppr"><i class="fa-solid fa-star fa-xl px-1"></i></button>
                                </form>
                            @else
                                <form method="post" action="{{ route('favori.store') }}">
                                    @csrf
                                   <input type=hidden name="articleId" value="{{$article->id}}"> <!-- type, name et value indispensable-->
                                    <button type="submit" class="btn btn-ajout"><i class="fa-regular fa-star fa-xl px-1"></i></button>
                                </form>
                            @endif
                        @endif
                        </div>

                    </div>


                    <!-- ===== Champ quantité + bouton Ajouter au panier ===== -->

                    <form method="POST" action="{{ route('panier.add', $article->id) }}"
                        class="form-inline d-inline-block d-flex justify-content-center">
                        {{ csrf_field() }}
                        <div class="row w-50 ">


                            <!-- ===== Condition si quantité en stock + si pièce ou Kilo ===== -->

                            @if ($article->stock > 0)
                                @if ($article['type_prix'] == 'pièce')
                                    @php
                                        $maxValue = $article->stock >= 10 ? 10 : $article->stock;
                                    @endphp

                                    <input type="number" min="1" max="{{ $maxValue }}" name="quantite"
                                        placeholder="Quantité ?" class="form-control mb-3">
                                @elseif ($article['type_prix'] == 'kilo')
                                    @php
                                        $maxValue = $article->stock >= 5 ? 5000 : $article->stock * 1000;
                                    @endphp
                                    <input type='number' min="100" max="{{ $maxValue }}" step="100"
                                        name="quantite" placeholder="Indiquez le poids en grammes"
                                        class="form-control mb-3">
                                @endif


                                <!-- ===== BOUTON PANIER ===== -->

                                <div class="text-center mx-auto">
                                    <button type="submit" class="btn btn-ajout px-4"><i
                                            class="img-btn-ajout fa-solid fa-cart-plus"></i>
                                    </button>
                                </div>
                            @else
                            @endif

                        </div>

                    </form>



                    <!-- ===== Je fais apparaitre les avis pour cet article ===== -->

                    <div class="container border-top p-2 mt-3 mb-3">
                        <h3 class="text-center mt-5">Notes et avis sur ce produit</h3>

                        <p class="mt-5 fw-bold text-center">Note moyenne : <span class="px-3">{{ $article->note }}</span>
                        </p>

                        @if (count($article->avis) == 0)
                            <p class="text-center m-5">Pas d'avis pour cet article</p>
                        @else(isset($article->avis) && $article->avis !== null)
                            @foreach ($article->avis as $avis)
                                <div class="container">
                                    <div class="d-flex flex-nowrap justify-content-between">
                                        <p class="mt-5 fw-bold ps-5">Note : {{ $avis->note }}/5</p>
                                        <p class="mt-5 fw-bold pe-5">{{ $avis->user->prenom }}</p>
                                    </div>
                                </div>

                                <p class="description-article px-5">{{ $avis->commentaire }}</p>
                            @endforeach
                        @endif
                    </div>


                    <!-- ===== Possibilité de laisser une note et un commentaire ===== -->

                    <div class="container border-top p-2 mt-3 mb-3">
                        <h5 class="py-4 mx-auto text-center">Vous avez goûté ce produit ? Notez-le !</h5>
                        <form method="post" action="{{ route('avis.store') }}" class="w-50 m-auto">
                            @csrf

                            @if (auth()->check())
                                <!-- ===== NOTE ===== -->

                                <div class="form-group">
                                    <label for="note">Note sur 5</label>
                                    <input required type="number" class="form-control" name="note" id="note"
                                        min="1" max="5">
                                </div>


                                <!-- ===== COMMENTAIRES ===== -->

                                <div class="form-group">
                                    <label for="commentaire">Commentaire (facultatif)</label>
                                    <textarea type="textarea" class="form-control" name="commentaire" rows="4" cols="33" id="commentaire"
                                        placeholder="Un super produit, etc"></textarea>
                                </div>
                                <input type="hidden" name="articleId" value="{{ $article->id }}">


                                <!-- ===== BOUTON ENVOYER ===== -->

                                <div class="text-center my-2">
                                    <button type="submit" class="btn btn-ajout">Envoyer</button>
                                </div>
                            @else
                                <p class="py-3 fw-bolder text-center">Pour mettre une note et envoyer un commentaire,
                                    veuillez vous connecter.</p>
                            @endif
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
