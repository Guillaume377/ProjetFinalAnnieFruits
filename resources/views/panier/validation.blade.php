@extends('layouts.app')
@section('content')
    <div class="container">

        @if (session()->has('message'))
            <div class="alert alert-info">{{ session('message') }}</div>
        @endif

        @if (session()->has('panier'))
            <h1 class="text-center m-5">Valider ma commande</h1>
            <div class="table-responsive shadow mb-3">
                <table class="table table-bordered table-hover bg-white mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th style="background-color: #3F3028;color: white">#</th>
                            <th style="background-color: #3F3028;color: white">Produit</th>
                            <th style="background-color: #3F3028;color: white">Prix</th>
                            <th style="background-color: #3F3028;color: white">Quantité</th>
                            <th style="background-color: #3F3028;color: white">Total</th>
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
                                <td>{{ $article['quantite'] }}</td>

                                <!-- Le total du montant du produit = prix * quantité -->
                                <td>{{ number_format($article['prix'] * $article['quantite'], 2, ',', ' ') }}€

                                <!-- On incrémente le total général par le total de chaque produit du panier -->
                                    @php $total += $article['prix'] * $article['quantite'] @endphp 

                                </td>
                            </tr>
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


            <!-- Section MODIF/VALID INFOS
                                                        ============================================================ -->
            <div class="container-fluid m-5">
                <div class="row justify-content-center">
                    <div class="col-md-10">


                        <!-- Card
                                                             ============================================================ -->
                        <div class="card my-4">


                            <!-- Card header "S'inscrire"
                                                                    ============================================================ -->
                            <div class="card-header"><small>{{ __('Informations personnelles') }}</small></div>


                            <!-- Card body
                                                                ============================================================ -->
                            <div class="card-body">


                                <!-- Formulaire modif infos
                                                                         ============================================================ -->
                                <form method="POST" action="{{ route('user.update', $user) }}">
                                    @csrf
                                    @method('PUT')


                                    <!-- Section nom + prenom
                                                                        ============================================================ -->
                                    <div class="d-flex justify-content-center gap-2">


                                        <!-- Nom
                                                                         ============================================================ -->
                                        <div class="col mb-3">
                                            <label for="nom"
                                                class="col-form-label ms-1"><small>{{ __('Nom') }}</small></label>

                                            <div class="col-md-12">
                                                <input id="nom" type="text" placeholder="Nom"
                                                    class="form-control @error('nom') is-invalid @enderror" name="nom"
                                                    value="{{ $user->nom }}" required autocomplete="nom" autofocus>

                                                @error('nom')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>


                                        <!-- Prenom
                                                                        ============================================================ -->
                                        <div class="col mb-3">
                                            <label for="prenom"
                                                class="col-form-label ms-1"><small>{{ __('Prénom') }}</small></label>

                                            <div class="col-md-12">
                                                <input id="prenom" type="text" placeholder="Prénom"
                                                    class="form-control @error('prenom') is-invalid @enderror"
                                                    name="prenom" value="{{ $user->prenom }}" required
                                                    autocomplete="prenom" autofocus>

                                                @error('prenom')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>


                                    </div>


                                    <!-- Email
                                                                        ============================================================ -->
                                    <div class="col mb-3">
                                        <label for="email"
                                            class="col-form-label ms-1"><small>{{ __('E-mail') }}</small></label>

                                        <div class="col-md-12">
                                            <input id="email" type="email" placeholder="E-mail"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ $user->email }}" required autocomplete="email">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <!-- Bouton validation modification
                                                                                    ============================================================ -->
                                    <div class="row mb-0 mt-2">
                                        <div class="col-md-12">
                                            <button type="submit"
                                                class="btn ajoutValider col-12"><small>{{ __('Valider mes informations') }}</small></button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


          
            <!-- ============================================================== TOTAL A PAYER ============================================================ -->

            <!-- On incrémente le total à payer -->
            @php$totalapayer = $total + session('fraisdeport');
            session()->put('totalapayer', $totalapayer); @endphp

            <td>
                <!-- On affiche le total à payer avec un arrondi de 2 chiffres après la virgule -->
                <div class="text-center m-5">Total à payer :<strong>{{ number_format($totalapayer, 2, ',', ' ') }}
                        €</strong></div>

            </td>


            <!-- ===================================================== BOUTON VALIDER LA COMMANDE ===================================================== -->

            <div class="d-flex justify-content-center">

                <!-- Button trigger modal -->
                @if (session('adresseLivraison') !== null && session('adresseFacturation') !== null && session('fraisdeport') !== null)
                    <button type="submit" name="clearCart" class="btn validerCommande m-3" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        Valider la commande
                    </button>
                @endif

            </div>


            <!-- =========================================================== MODAL =========================================================== -->

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content text-center">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">Félicitations !</h1>
                            <button type="button" class="btn-close m-0" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Votre commande a été validée.</p>

                            <!-- ================= Afficher le montant total du panier ===================== -->

                            <p>Le montant total est de <strong>{{ number_format($totalapayer, 2, ',', ' ') }} €</strong>
                            </p>
                            <p>Vous pouvez récupérer votre commande à partir de <?php
                            
                            // ===================  obtenir et afficher la date du jour formatée ===============
                            
                            // $dateJour = date('d-m-Y');
                            // echo $dateJour;
                            ?> </p>
                            <p>La commande sera prête à partir de
                                <?php
                                
                                // ========================== calcul : date du jour + 2 jours ==================
                                
                                // je récupère la date du jour en format DateTime (exigé par la fonction date_add)
                                $date = new DateTime('now');
                                
                                // on utilise date_add pour ajouter 2 jours
                                // date_interval... => permet d'obtenir l'intervalle de temps souhaité pour l'ajouter
                                date_add($date, date_interval_create_from_date_string('2 days'));
                                
                                // à ce stade, $date est directement modifiée
                                // je l'affiche en la formatant : jour mois année => 09-06-2023
                                echo date_format($date, 'd-m-Y');
                                ?>
                            </p>
                            <p>Merci de votre confiance.</p>
                        </div>


                        <!-- ========================================== BOUTON RETOUR A L'ACCUEIL =============================================== -->

                        <div class="modal-footer d-flex justify-content-center">
                            <a href="{{ route('commandes.store') }}">
                                <button class="btn validerCommande m-3">
                                    Retour à l'accueil
                                </button>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
