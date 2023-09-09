@extends('layouts.app')


@section('content')
    <!-- ===== TITRE ===== -->

    <h1 class="title_h1 text-center mx-auto">Mes favoris</h1>


    <div class="container">

        @if (session()->has('favori'))


            <!-- ===== TABLEAU ===== -->

            <div class="tableau table-responsive my-5">
                <table class="table table-bordered table-hover bg-white mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Produit</th>
                            <th>Image</th>
                            <th>Prix</th>
                            <th>Quantité</th>
                            <th>Unité</th>
                            <th>Favoris</th>
                            {{-- <th>Panier</th> --}}
                        </tr>
                    </thead>

                    <tbody class="text-center">


                        <!-- ===== On parcourt les produits en favori ===== -->

                        @foreach ($user->favoris as $favori)
                            <tr>


                                <!-- ===== NOM PRODUIT + DETAIL PRODUIT ===== -->
                                <td>
                                    <div class="d-flex flex-column">


                                        <!-- ===== Nom produit ===== -->

                                        {{ $favori['nom'] }}


                                        <!-- ===== Bouton détail produit ===== -->

                                        <a href="{{ route('articles.show', $favori) }}" class="card-link my-3">
                                            <button type="button" class="btn btn-ajout">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </button>
                                        </a>

                                    </div>
                                </td>


                                <!-- ===== IMAGE ===== -->

                                <td><img src="{{ asset('images/' . $favori->image) }}" class="rounded-top"
                                        alt="{{ $favori->nom }}" style="width: 7rem"></td>


                                <!-- ===== PRIX ===== -->

                                <td>{{ $favori['prix'] }} € / {{ $favori['type_prix'] }}</td>


                                <!-- ===== CHAMP QUANTITE + BOUTON AJOUT PANIER ===== -->

                                <td>
                                    <form method="POST" action="{{ route('panier.add', $favori->id) }}"
                                        class="form-inline d-inline-block d-flex justify-content-center">
                                        {{ csrf_field() }}
                                        <div class="row w-50 ">


                                            <!-- ===== Condition si quantité en stock + si pièce ou Kilo ===== -->

                                            @if ($favori->stock > 0)
                                                @if ($favori['type_prix'] == 'pièce')
                                                    @php
                                                        $maxValue = $favori->stock >= 10 ? 10 : $favori->stock;
                                                    @endphp

                                                    <input type="number" min="1" max="{{ $maxValue }}"
                                                        name="quantite" placeholder="Quantité ?" class="form-control mb-3">
                                                @elseif ($favori['type_prix'] == 'kilo')
                                                    @php
                                                        $maxValue = $favori->stock >= 5 ? 5000 : $favori->stock * 1000;
                                                    @endphp
                                                    <input type='number' min="100" max="{{ $maxValue }}"
                                                        step="100" name="quantite" placeholder="Poids en grammes"
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
                                </td>


                                <!-- ===== TYPE DE PRIX = pièce ou kilo ===== -->

                                @if ($favori['type_prix'] == 'kilo')
                                    <td>Grammes</td>
                                @else
                                    <td>Pièce</td>
                                @endif


                                <!--affichage du bouton de retrait des favoris pour le user connecté-->
                                <td>
                                    @if (Auth::user())
                                        <!-- si le produit est déjà dans les favoris-->
                                        @if (Auth::user()->isInFavorites($favori))
                                            <!-- si dans les favoris-->
                                            <form method="post" action="{{ route('favoris.destroy', $favori->id) }}">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-suppr"><i
                                                        class="fa-solid fa-trash"></i></button>
                                            </form>
                                        @endif
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

        @else
            <h3 class="h3_panier_vide mx-auto text-center">Aucun produit dans vos favoris</h3>
        @endif
    </div>
@endsection







        <!--bouton d'ajout au panier-->
                                {{-- <td>
                                <div class="col">

                                    <form method="POST" action="{{ route('panier.add', 1) }}"
                                        class="form-inline d-inline-block">
                                        {{ csrf_field() }}

                                        <button type="submit" class="ajoutValider btn">Ajouter au panier</button>

                                    </form>

                                </div>
                            </td> --}}