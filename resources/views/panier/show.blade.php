@extends('layout.app')
@section('content')
<h1 class="h1_panier text-center m-5">Mon panier</h1>
    <div class="container">

        @if (session()->has('message'))
            <div class="alert alert-info">{{ session('message') }}</div>
        @endif

        @if (session()->has('panier'))
            <div class="table-responsive shadow mb-3">
                <table class="table table-bordered table-hover bg-white mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th style="background-color: #3F3028;color: white">#</th>
                            <th style="background-color: #3F3028;color: white">Produit</th>
                            <th style="background-color: #3F3028;color: white">Prix</th>
                            <th style="background-color: #3F3028;color: white">Quantité</th>
                            <th style="background-color: #3F3028;color: white">Total</th>
                            <th style="background-color: #3F3028;color: white">Opérations</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Initialisation du total général à 0 -->
                        @php $total = 0 @endphp

                        <!-- On parcourt les produits du panier en session : session('panier') -->
                        @foreach (session('panier') as $position => $article)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    {{ $article['nom'] }}
                                </td>

                                <!--  PRIX = si la clé campagne existe pour cet article, j'affiche le nom de la promo + % réduction + prix barré + prix promo -->

                                @if (isset($article['campagne']))
                                    <td><span>{{ $article['campagne']->nom }} :
                                            -{{ $article['campagne']->reduction }}%</span>
                                        <del>{{ $article['prix'] }} €</del>
                                        @php $prixremise = $article['prix']- ($article['prix'] * $article['campagne']->reduction / 100)@endphp
                                        <span> {{ number_format($prixremise, 2, ',', ' ') }}€</span>
                                    </td>
                                @else
                                    <td>{{ $article['prix'] }} €</td>
                                @endif

                                <td>
                                    <!-- Le formulaire de mise à jour de la quantité -->
                                    <form method="POST" action="{{ route('panier.add', $position) }}"
                                        class="form-inline d-inline-block">
                                        {{ csrf_field() }}
                                        <input type="number" name="quantite" placeholder="Quantité ?"
                                            value="{{ $article['quantite'] }}" class="form-control pl-3"
                                            style="width: 80px">
                                        <input type="submit" class="btn ajoutValider" value="Actualiser" />
                                    </form>
                                </td>

                                <td>
                                    <!-- Le total du produit = prix * quantité -->
                                    @if (isset($article['campagne']))
                                        {{ number_format($prixremise * $article['quantite'], 2, ',', ' ') }}€
                                    @else
                                        {{ number_format($article['prix'] * $article['quantite'], 2, ',', ' ') }}€
                                    @endif
                                </td>

                                <td>
                                    <!-- Le lien pour retirer un produit du panier -->
                                    <a href="{{ route('panier.remove', $position) }}" class="btn btn-outline-danger"
                                        title="Retirer le produit du panier">Retirer</a>
                                </td>
                            </tr>

                            <!-- On incrémente le total général par le total de chaque produit du panier -->
                            @if (isset($article['campagne']))
                                @php $total += $prixremise* $article['quantite'] @endphp
                            @else
                                @php $total += $article['prix'] * $article['quantite'] @endphp
                            @endif
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
                <a class="btn btn-danger mx-3" href="{{ route('panier.empty') }}"
                    title="Retirer tous les produits du panier">Vider
                    le panier</a>
            @else
                <h1 class="h1_panier mx-auto text-center">Aucun produit au panier</h1>

            </div>
        @endif
    </div>
@endsection
