@extends('layouts.app')
@section('content')


    <h1 class="h1_panier text-center text center mx-auto">Mon panier</h1>
    <div class="container">

        @if (session()->has('panier'))
            <div class="table-responsive shadow my-5">
                <table class="table table-bordered table-hover bg-white mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th style="background-color: limegreen;color: white">#</th>
                            <th style="background-color: limegreen;color: white">Produit</th>
                            <th style="background-color: limegreen;color: white">Prix</th>
                            <th style="background-color: limegreen;color: white">Quantité</th>
                            <th style="background-color: limegreen;color: white">Unité</th>
                            <th style="background-color: limegreen;color: white">Total</th>
                            <th style="background-color: limegreen;color: white">Opérations</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Initialisation du total général à 0 -->
                        @php $total = 0 @endphp

                        <!-- On parcourt les produits du panier en session : session('panier') -->
                        @foreach (session('panier') as $position => $article)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $article['nom'] }}</td>
                                <td>{{ $article['prix'] }} € / {{ $article['type_prix'] }}</td>



                                <!-- Le formulaire de mise à jour de la quantité -->

                                <td>
                                    <form method="POST" action="{{ route('panier.add', $article['id']) }}"
                                        class="form-inline d-inline-block d-flex justify-content-center">
                                        @csrf
                                        <div class="row w-50 ">
                                            @if ($article['type_prix'] == 'pièce')
                                                <input type="number" min="1" max="10" name="quantite"
                                                    value="{{ $article['quantite'] }}" class="form-control mb-3">
                                            @else
                                                <input type='number' min="100" max="5000" step="100"
                                                    name="quantite" value="{{ $article['quantite'] }}"
                                                    class="form-control mb-3">
                                            @endif
                                            <button type="submit" class="btn btn-ajout"><i
                                                    class="img-btn-ajout fa-solid fa-pen"></i> Modifier</button>
                                        </div>
                                    </form>
                                </td>


                                <!-- Type de prix = pièce ou kilo-->
                                @if ($article['type_prix'] == 'kilo')
                                    <td>Grammes</td>
                                @else
                                    <td>Pièce</td>
                                @endif

                                <!-- Le total du produit = prix * quantité -->
                                @php $prixLigne = 0 @endphp

                                <td>

                                    @if ($article['type_prix'] == 'pièce')
                                        @php $prixLigne = $article['prix'] * $article['quantite'];
                                            echo number_format($prixLigne, 2, ',', ' ') . '€';
                                        @endphp
                                    @else
                                        @php $prixLigne = ($article['prix'] * $article['quantite']) / 1000;
                                            echo number_format($prixLigne, 2, ',', ' ') . '€';
                                        @endphp
                                    @endif

                                </td>

                                <!-- Le lien pour retirer un produit du panier -->
                                <td>
                                    <a href="{{ route('panier.remove', $position) }}" class="btn btn-outline-danger"
                                        title="Retirer le produit du panier">Retirer</a>
                                </td>
                            </tr>

                            <!-- On incrémente le total général par le total de chaque produit du panier -->

                            @php $total +=  $prixLigne @endphp
                        @endforeach

                        <tr colspan="2">
                            <td colspan="5">Total général</td>
                            <td colspan="2">
                                <!-- On affiche total général -->
                                <strong>{{ number_format($total, 2, ',', ' ') }} €</strong>
                            </td>
                        </tr>
                    </tbody>

                </table>
            </div>


            <!-- ==================================================== Boutons VALIDER/VIDER ============================================== -->

            <div class="d-flex justify-content-center pb-5">

                <!-- Lien pour valider le panier -->
                @if (Auth::user())
                    <a class="btn btn-modif my-5 mx-3" href="{{ route('validation') }}"
                        title="Valider le panier">Valider</a>
                @endif

                <!-- Lien pour vider le panier -->
                <a class="btn btn-suppr my-5 mx-3" href="{{ route('panier.empty') }}"
                    title="Retirer tous les produits du panier">Vider le panier</a>
            @else
                <h3 class="h3_panier_vide mx-auto text-center">Aucun produit dans le panier</h3>

            </div>
        @endif
    </div>
@endsection
