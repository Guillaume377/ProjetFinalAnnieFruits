@extends('layouts.app')
@section('content')
<h1 class="text-center py-5 m-5">Mon panier</h1>
    <div class="container">

        @if (session()->has('message'))
            <div class="alert alert-info">{{ session('message') }}</div>
        @endif

        @if (session()->has('panier'))
            <div class="table-responsive shadow mb-3">
                <table class="table table-bordered table-hover bg-white mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th style="background-color: limegreen;color: white">#</th>
                            <th style="background-color: limegreen;color: white">Produit</th>
                            <th style="background-color: limegreen;color: white">Prix</th>
                            <th style="background-color: limegreen;color: white">Quantité</th>
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
                                <td>{{ $article['prix'] }} €</td>
                               
                               <!-- Le formulaire de mise à jour de la quantité -->
                               
                                <td> 
                                    <form method="POST" action="{{ route('panier.add', $position) }}"
                                        class="form-inline d-inline-block">
                                        {{ csrf_field() }}
                                        <input type="number" name="quantite" placeholder="Quantité ?"
                                            value="{{ $article['quantite'] }}" class="form-control pl-3"
                                            style="width: 80px">
                                        <input type="submit" class="btn ajoutValider" value="Actualiser" />
                                    </form>
                                </td>

                                <!-- Le total du produit = prix * quantité -->
                                <td>
                                    {{ number_format($article['prix'] * $article['quantite'], 2, ',', ' ') }}€
                                </td>

                                <!-- Le lien pour retirer un produit du panier -->
                                <td>
                                    <a href="{{ route('panier.remove', $position) }}" class="btn btn-outline-danger"
                                        title="Retirer le produit du panier">Retirer</a>
                                </td>
                            </tr>

                            <!-- On incrémente le total général par le total de chaque produit du panier -->
                        
                                @php $total += $article['prix'] * $article['quantite'] @endphp
                            
                        @endforeach

                        <tr colspan="2">
                            <td colspan="4">Total général</td>
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
                    <a class="btn ajoutValider mx-3" href="{{ route('validation') }}" title="Valider le panier">Valider</a>
                @endif

                <!-- Lien pour vider le panier -->
                <a class="btn btn-danger my-5 mx-3" href="{{ route('panier.empty') }}"
                    title="Retirer tous les produits du panier">Vider
                    le panier</a>
            @else
                <h1 class="h1_panier mx-auto text-center">Aucun produit au panier</h1>

            </div>
        @endif
    </div>
@endsection
