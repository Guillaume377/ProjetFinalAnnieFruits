@extends ('layouts.app')

@section('title')
    {{ $article->nom }} - Annie fruits
@endsection

@section('content')
    <h1 class="text-center py-5"> {{ $article->nom }}</h1>

    <div class="container mb-3">
        <div class="row">

            <div class="col-xl-6 d-flex justify-content-center pe-5">
                <img class="img-article" src="{{ asset("images/$article->image") }} " alt={{ $article->nom }}>
            </div>
            


            <!-- =============================================== card description article ============================================= -->
            <div class="col-xl-6 d-flex justify-content-center ps-5 mt-2">
                <div class="img-article">

                    <div class="text-center m-2">
                        <h5>{{ $article->titre }}</h5>
                    </div>

                    <div class="text-justify m-2">
                        <td> {{ $article->description }}</td>
                    </div>

                    <div class="text-center m-5 fs-5">
                        <td>{{ $article['prix'] }} €</td>
                    </div>


                    <!-- =================================== Champ quantité + bouton Ajouter au panier =================================== -->

                    <form method="POST" action="{{ route('panier.add', $article->id) }}"
                        class="form-inline d-inline-block d-flex justify-content-center">
                        {{ csrf_field() }}
                        <div class="row w-25 ">
                            <input type="number" min="1" max="5" name="quantite" placeholder="Quantité ?"
                                class="form-control m-2">

                            <button type="submit" class="btn btn-ajout"><i class="img-btn-ajout fa-solid fa-cart-plus"></i></button>
                        </div>

                    </form>



                    <!-- ==================================== Je fais apparaitre les avis pour cet article ============================== -->

                    <h3 class="text-center mt-5">Notes et avis sur ce produit</h3>

                    @if (count($article->avis) == 0)
                        <p class="text-center m-5">Pas d'avis pour cet article</p>
                    @else(isset($article->avis) && $article->avis !== null)
                        @foreach ($article->avis as $avis)
                            <p class="mt-5 fw-bold">Note : {{ $avis->note }}/5</p>
                            <p>{{ $avis->commentaire }}</p>
                        @endforeach
                    @endif

                </div>
            </div>
        </div>
    @endsection
