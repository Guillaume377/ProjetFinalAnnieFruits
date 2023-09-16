@extends('layouts.app')
@section('content')


    <!-- ===== TITRE ===== -->

    <h1 class="title_h1 text-center mx-auto">Mon panier</h1>


    <div class="container">

        @if (session()->has('panier'))


            <!-- ===== TABLEAU ===== -->

            <div class="tableau table-responsive my-5">
                <table class="table table-bordered table-hover bg-white mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Produit</th>
                            <th>Prix</th>
                            <th>Quantité</th>
                            <th>Unité</th>
                            <th>Total</th>
                            <th>Opérations</th>
                        </tr>
                    </thead>
                    <tbody>

                        <!-- ===== Initialisation du total général à 0 ===== -->

                        @php $total = 0 @endphp

                        <!-- ===== On parcourt les produits du panier en session : session('panier') ===== -->

                        @foreach (session('panier') as $position => $article)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $article['nom'] }}</td>
                                <td>{{ $article['prix'] }} € / {{ $article['type_prix'] }}</td>



                                <!-- ===== Le formulaire de mise à jour de la quantité ===== -->

                                <td>
                                    <form method="POST" action="{{ route('panier.add', $article['id']) }}"
                                        class="form-inline d-inline-block d-flex justify-content-center">
                                        @csrf
                                        <div class="row">
                                            <div class="w-75 mx-auto">
                                                
                                            <!-- si type prix : pièce -->

                                            @if ($article['type_prix'] == 'pièce')
                                                <input type="number" min="1" max="10" name="quantite"
                                                    value="{{ $article['quantite'] }}" class="input_quantite form-control mb-3">

                                            <!-- si type prix : kilo -->

                                            @else
                                                <input type='number' min="100" max="5000" step="100"
                                                    name="quantite" value="{{ $article['quantite'] }}"
                                                    class="form-control mb-3">
                                            @endif
                                            </div>
                                            
                                            <!-- bouton Modifier -->

                                            <div class="text-center mx-auto">
                                            <button type="submit" class="btn btn-ajout px-2"><i
                                                    class="img-btn-ajout fa-solid fa-pen"></i> Modifier</button>
                                            </div>
                                        </div>
                                    </form>
                                </td>


                                <!-- ===== Type de prix = pièce ou kilo ===== -->
                                
                                @if ($article['type_prix'] == 'kilo')
                                    <td>Grammes</td>
                                @else
                                    <td>Pièce</td>
                                @endif


                                <!-- ===== Le total du produit = prix * quantité ===== -->

                                @php $prixLigne = 0 @endphp

                                <td>

                                    @if ($article['type_prix'] == 'pièce')
                                        @php $prixLigne = $article['prix'] * $article['quantite'];
                                            echo number_format($prixLigne, 2, ',', ' ') . '€';
                                            // 2 : le nombre de décimales, ',' : C'est le séparateur décimal, ' ' (un espace) : C'est le séparateur des milliers

                                        @endphp
                                    @else

                                    <!-- ===== Si type prix : kilo, on convertit les kilos en grammes = (prix * quantité) / 1000 ===== -->

                                        @php $prixLigne = ($article['prix'] * $article['quantite']) / 1000;
                                            echo number_format($prixLigne, 2, ',', ' ') . '€';
                                        @endphp
                                    @endif

                                </td>

                                <!-- ===== Le lien pour retirer un produit du panier ===== -->

                                <td>
                                    <a href="{{ route('panier.remove', $position) }}" class="btn btn-suppr"
                                        title="Retirer le produit du panier">Retirer</a>
                                </td>
                            </tr>

                            <!-- ===== On incrémente le total général par le total de chaque produit du panier ===== -->

                            @php $total +=  $prixLigne @endphp
                        @endforeach

                        
                            <th colspan="5" class="totalGeneral">Total général<i class="fa-solid fa-arrow-right"></i></th>
                            <td colspan="2">

                                <!-- ===== On affiche total général ===== -->

                                @php session()->put("totalCommande", $total); @endphp <!-- je stocke le total dans la session -->
                                <strong>{{ number_format($total, 2, ',', ' ') }} €</strong>
                            </td>
                       
                    </tbody>

                </table>
            </div>


            <!-- ============================ BOUTONS VALIDER/VIDER ============================= -->

            <div class="d-flex justify-content-center pb-5">

                <!-- ===== Lien pour valider le panier ===== -->

                @if (Auth::user())
                    <a class="btn btn-ajout my-5 mx-3" href="{{ route('validation') }}"
                        title="Valider le panier">Valider</a>
                @endif

                <!-- ====== Lien pour vider le panier ===== -->
                
                <a class="btn btn-suppr my-5 mx-3" href="{{ route('panier.empty') }}"
                    title="Retirer tous les produits du panier">Vider le panier</a>
            @else
                <h3 class="h3_panier_vide mx-auto text-center">Aucun produit dans le panier</h3>

            </div>
        @endif
    </div>
@endsection
