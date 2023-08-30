@extends('layouts.app')
@section('content')
    <h1 class="title_h1 text-center mx-auto">Valider ma commande</h1>

    <div class="container">


        <!-- Section MODIF/VALID INFOS -->

        <div class="container-fluid my-5">
            <div class="row d-flex justify-content-center">
                <div class="col-md-10">

                    <!-- Card -->
                    <div class="tableau table-responsive card my-4">

                        <!-- Card header "S'inscrire" -->
                        <div class="card-header"><small>{{ __('Informations personnelles') }}</small></div>

                        <!-- Card body -->
                        <div class="card-body">

                            <!-- Formulaire modif infos -->
                            <form method="POST" action="{{ route('user.update', $user) }}">
                                @csrf
                                @method('PUT')


                                <!-- Section nom + prenom -->
                                <div class="d-flex justify-content-center gap-2">

                                    <!-- Nom -->

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


                                    <!-- Prenom -->

                                    <div class="col mb-3">
                                        <label for="prenom"
                                            class="col-form-label ms-1"><small>{{ __('Prénom') }}</small></label>

                                        <div class="col-md-12">
                                            <input id="prenom" type="text" placeholder="Prénom"
                                                class="form-control @error('prenom') is-invalid @enderror" name="prenom"
                                                value="{{ $user->prenom }}" required autocomplete="prenom" autofocus>

                                            @error('prenom')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <!-- Section email + telephone -->

                                <div class="d-flex justify-content-center gap-2">

                                    <!-- Email -->
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


                                    <!-- Téléphone -->
                                    <div class="col mb-3">
                                        <label for="telephone"
                                            class="col-form-label ms-1"><small>{{ __('Téléphone') }}</small></label>

                                        <div class="col-md-12">
                                            <input id="telephone" type="telephone" placeholder="N° de téléphone"
                                                class="form-control @error('telephone') is-invalid @enderror"
                                                name="telephone" value="{{ $user->telephone }}" required
                                                autocomplete="telephone">

                                            @error('telephone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <!-- Bouton validation modification -->

                                <div class="row mb-0 mt-2">
                                    <div class="col-md-12 d-flex justify-content-center">
                                        <button type="submit"
                                            class="btn btn-ajout"><small>{{ __('Valider mes informations') }}</small></button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- ============== Réserver un créneau ==================== -->

        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6">
                    <h3 class="text-center">Réserver un créneau</h3>

                    <!-- ==== Message succès ==== -->
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <!-- ==== Réserver un créneau de retrait ==== -->
                    <form action="{{ route('reservation') }}" method="post">
                        @csrf

                        
                        <div class="row d-flex justify-content-center">

                            <!-- Jour de retrait -->
                            <label for="date_time">Jour</label>
                            <input type='date' min="{{ date('Y-m-d', strtotime('+1 days')) }}" name="date_retrait"
                                class="jour-heure form-control mb-3" required>

                            <!-- Heure de retrait -->
                            <label for="start_time">Heure</label>
                            <input type="time" min="09:00" max="19:00" name="heure_retrait"
                                class="jour-heure form-control mb-3" required>

                            <p class="text-center">Heure de retrait possible pendant les horaires d'ouvertures du magasin
                            </p>


                            <!-- ==== Tableau horaires d'ouverture du magasin ==== -->

                            <div class="col-md-6">
                                <div class="my-5">
                                    <table class="horaire-coordos table table-success table-striped mx-auto">
                                        <thead class="thead-dark">

                                            <tr>
                                                <th style="background-color: limegreen;color: white" scope="col">Jour
                                                </th>
                                                <th style="background-color: limegreen;color: white" scope="col">Matin
                                                </th>
                                                <th style="background-color: limegreen;color: white" scope="col">
                                                    Après-midi</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr class="text-center">
                                                <td>Lundi</td>
                                                <td class="fw-bolder text-danger">Fermé</td>
                                                <td>15:00 - 19:00</td>
                                            </tr>

                                            <tr class="text-center">
                                                <td>Mardi</td>
                                                <td>09:00–13:00</td>
                                                <td>15:00–19:00</td>
                                            </tr>

                                            <tr class="text-center">
                                                <td>Mercredi</td>
                                                <td>09:00–13:00</td>
                                                <td>15:00–19:00</td>
                                            </tr>

                                            <tr class="text-center">
                                                <td>Jeudi</td>
                                                <td>09:00–13:00</td>
                                                <td>15:00–19:00</td>
                                            </tr>

                                            <tr class="text-center">
                                                <td>Vendredi</td>
                                                <td>09:00–13:00</td>
                                                <td>15:00–19:00</td>
                                            </tr>

                                            <tr class="text-center">
                                                <td>Samedi</td>
                                                <td>09:00–13:00</td>
                                                <td>15:00–19:00</td>
                                            </tr>

                                            <tr class="text-center">
                                                <td>Dimanche</td>
                                                <td class="fw-bolder text-danger">Fermé</td>
                                                <td class="fw-bolder text-danger">Fermé</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- ==== Bouton validation le créneau ==== -->

                            <div class="row mb-0 mt-2">
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-ajout"><small>Valider le
                                            créneau</small></button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>




        <!-- ============================================================== TOTAL A PAYER ============================================================ -->

        <td>
            <!-- On affiche le total à payer avec un arrondi de 2 chiffres après la virgule -->
            <div class="prix_total text-center my-5">Total à payer en magasin :
                <div class="pt-3">
                {{ number_format(session()->get('totalCommande'), 2, ',', ' ') }}€
            </div>
            </div>
        </td>


        <!-- ===================================================== BOUTON VALIDER LA COMMANDE ===================================================== -->

        <div class="d-flex justify-content-center">

            <!-- Button trigger modal -->

            @if (session()->get('date_retrait') && session()->get('heure_retrait'))
                <button type="submit" name="clearCart" class="btn btn-ajout fs-5 mb-5" data-bs-toggle="modal"
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

                        <p>Le montant total est de
                            <strong>{{ number_format(session()->get('totalCommande'), 2, ',', ' ') }} €</strong>
                        </p>


                        <p>Vous pouvez récupérer votre commande le

                            <!-- fonction pour changer le format de la date (Jour-Mois-Année)-->
                            <?php
                            $date = new DateTimeImmutable(session()->get('date_retrait'));
                            echo $date->format('d-m-Y');
                            ?>

                            à {{ session()->get('heure_retrait') }}.
                        </p>

                        <p>Merci de votre confiance.</p>
                    </div>


                    <!-- ========================================== BOUTON RETOUR A L'ACCUEIL =============================================== -->

                    <div class="modal-footer d-flex justify-content-center">
                        <a href="{{ route('commandes.store') }}">
                            <button class="btn btn-suppr m-3">
                                Retour à l'accueil
                            </button>
                        </a>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
