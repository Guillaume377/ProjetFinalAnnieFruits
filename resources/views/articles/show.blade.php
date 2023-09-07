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

                    <div class="text-center py-5">
                        <h5>{{ $article->titre }}</h5>
                    </div>

                    <div class="description-article px-5">
                        <td> {{ $article->description }}</td>
                    </div>

                    <div class="prix_article text-center  my-5">
                        <td class="mx-auto">{{ $article['prix'] }} € / {{ $article['type_prix'] }}</td>
                    </div>

                    {{-- <i class="fas fa-box-open fa-2x mr-2"></i>@php displayStock($stock) @endphp --}}



                    <!-- ===== Champ quantité + bouton Ajouter au panier ===== -->

                    <form method="POST" action="{{ route('panier.add', $article->id) }}"
                        class="form-inline d-inline-block d-flex justify-content-center">
                        {{ csrf_field() }}
                        <div class="row w-50 ">

                            @if ($article->stock > 0)
                                @if ($article['type_prix'] == 'pièce')
                                    @php
                                        $maxValue = $article->stock >= 10 ? 10 : $article->stock;
                                    @endphp

                                    <input type="number" min="1" max="{{ $maxValue }}" name="quantite"
                                        placeholder="Quantité ?" class="form-control mb-3">
                                @else
                                    <input type='number' min="100" max="5000" step="100" name="quantite"
                                        placeholder="Indiquez le poids en grammes" class="form-control mb-3">
                                @endif

                                <div class="text-center mx-auto">
                                    <button type="submit" class="btn btn-ajout px-4"><i
                                            class="img-btn-ajout fa-solid fa-cart-plus"></i></button>
                                </div>
                            @else
                                <p class="text-center">Produit en cours de réapprovisionnement</p>
                            @endif




                        </div>

                    </form>



                    <!-- ===== Je fais apparaitre les avis pour cet article ===== -->

                    <h3 class="text-center mt-5">Notes et avis sur ce produit</h3>

                    @if (count($article->avis) == 0)
                        <p class="text-center m-5">Pas d'avis pour cet article</p>
                    @else(isset($article->avis) && $article->avis !== null)
                        @foreach ($article->avis as $avis)
                            <p class="mt-5 fw-bold ps-5">Note : {{ $avis->note }}/5</p>
                            <p class="px-5">{{ $avis->commentaire }}</p>
                        @endforeach
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
