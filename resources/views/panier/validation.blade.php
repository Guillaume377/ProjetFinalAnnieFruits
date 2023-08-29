@extends('layouts.app')
@section('content')
    <h1 class="title_h1 text-center mx-auto">Valider ma commande</h1>

    <div class="container">


        <!-- Section MODIF/VALID INFOS -->

        <div class="container-fluid my-5">
            <div class="row d-flex justify-content-center">
                <div class="col-md-10">

                    <!-- Card -->

                    <div class="table-responsive card my-4">

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


        <!-- Réserver un créneau -->

        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6">
                    <h3 class="text-center">Réserver un créneau</h3>

                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form method="post" action="/reservation">
                        @csrf
                        <div class="row d-flex justify-content-center">
                            <label for="date_time">Jour</label>
                            <input type='date' min="{{date('Y-m-d', strtotime('+1 days'))}}" name="date_retrait" class="jour-heure form-control mb-3" required>

                            <label for="start_time">Heure</label>
                            <input type="time" min="09:00" max="19:00" name="heure_retrait" class="jour-heure form-control mb-3" required>

                            <p class="text-center">Heure de retrait possible : 9h00 - 12h45 et 15h00 - 18h45</p>

                            <!-- Bouton validation le créneau -->

                            <div class="row mb-0 mt-2">
                                <div class="col-md-12 d-flex justify-content-center">
                                    <button type="submit" class="btn btn-ajout"><small>Valider le créneau</small></button>
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
            <div class="totalapayer text-center my-5"><span>Total à payer :</span>
                <strong>{{ number_format(session()->get('totalCommande'), 2, ',', ' ') }}€</strong>
            </div>
        </td>


        <!-- ===================================================== BOUTON VALIDER LA COMMANDE ===================================================== -->

        <div class="d-flex justify-content-center">

            <!-- Button trigger modal -->

            {{-- @if (session('reservation') !== null) --}}
                <button type="submit" name="clearCart" class="btn btn-ajout fs-5 mb-5" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    Valider la commande
                </button>
            {{-- @endif --}}

        </div>


        <!-- =========================================================== MODAL =========================================================== -->

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

    </div>
@endsection
