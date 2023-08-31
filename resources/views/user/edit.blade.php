@extends('layouts.app')

@section('title')
    Mon compte
@endsection

@section('content')
    <h1 class="title_h1 text-center mx-auto">Informations personnelles</h1>

    <!-- FORMULAIRE MODIF INFO + MODIF PASSWORD
            ============================================================ -->
    <div class="d-flex align-items-center" id="edit_blade_formulaire_infos_mdp">


        <!-- Section modif info
                ============================================================ -->
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-10">


                    <!-- Card
                            ============================================================ -->
                    <div class="tableau table-responsive card my-4 my-5">


                        <!-- Card header "S'inscrire"
                                ============================================================ -->
                        <div class="card-header"><small>{{ __('Modification des informations personnelles') }}</small>
                        </div>


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
                                            class="col-form-label ms-1"><small>{{ __('Nouveau nom') }}</small></label>

                                        <div class="col-md-12">
                                            <input id="nom" type="text" placeholder="Nouveau nom"
                                                class="form-control @error('name') is-invalid @enderror" name="nom"
                                                value="{{ $user->nom }}" required autocomplete="on" autofocus>

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
                                            class="col-form-label ms-1"><small>{{ __('Nouveau prénom') }}</small></label>

                                        <div class="col-md-12">
                                            <input id="prenom" type="text" placeholder="Nouveau prénom"
                                                class="form-control @error('prenom') is-invalid @enderror" name="prenom"
                                                value="{{ $user->prenom }}" required autocomplete="prenom" autofocus>

                                            @error('prenom')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <!-- Telephone
                                            ============================================================ -->
                                    <div class="col mb-3">
                                        <label for="telephone"
                                            class="col-form-label ms-1"><small>{{ __('Nouveau téléphone') }}</small></label>

                                        <div class="col-md-12">
                                            <input id="telephone" type="text" placeholder="Nouveau téléphone"
                                                class="form-control @error('telephone') is-invalid @enderror"
                                                name="telephone" value="{{ $user->telephone }}" required
                                                autocomplete="telephone" autofocus>

                                            @error('telephone')
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
                                        class="col-form-label ms-1"><small>{{ __('Nouvelle adresse e-mail') }}</small></label>

                                    <div class="col-md-12">
                                        <input id="email" type="email" placeholder="Nouvelle adresse e-mail"
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
                                    <div class="col-md-12 d-flex justify-content-center">
                                        <button type="submit"
                                            class="btn btn-ajout"><small>{{ __('Modifier mes informations') }}</small></button>
                                    </div>
                                </div>

                            </form>


                            <!-- Bouton supression compte
                                    ============================================================ -->
                            <div class="row mb-0 mt-2">
                                <div class="col-md-12 d-flex justify-content-center">
                                    <form action="{{ route('user.destroy', $user) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-suppr"><small>Supprimer le
                                                compte</small></button>
                                    </form>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>




        <!-- Section MODIF MOT DE PASSE
                    ============================================================ -->
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-10">


                    <!-- Card
                                ============================================================ -->
                    <div class="tableau table-responsive card mt-4">


                        <!-- Card header "S'inscrire"
                                    ============================================================ -->
                        <div class="card-header"><small>{{ __('Modification mot de passe') }}</small></div>


                        <!-- Card body
                                    ============================================================ -->
                        <div class="card-body">


                            <!-- Formulaire modif infos
                                        ============================================================ -->
                            <form method="POST" action="{{ route('updatepassword', $user) }}">
                                @csrf
                                @method('PUT')


                                <!-- Section nom + prenom
                                            ============================================================ -->
                                <div class="d-flex justify-content-center gap-2">


                                    <!-- Mot de passe actuel
                                                ============================================================ -->
                                    <div class="col mb-3">
                                        <label for="password"
                                            class="col-form-label ms-1"><small>{{ __('Mot de passe actuel') }}</small></label>

                                        <div class="col-md-12">
                                            <input id="password" type="password" placeholder="Mot de passe actuel"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="actuel_password" value="{{ old('password') }}" required
                                                autocomplete="password" autofocus>

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <!-- Nouveau mot de passe
                                                ============================================================ -->
                                    <div class="col mb-3">
                                        <label for="password"
                                            class="col-form-label ms-1"><small>{{ __('Nouveau mot de passe') }}</small></label>

                                        <div class="col-md-12">
                                            <input id="password" type="password" placeholder="Nouveau mot de passe"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="nouveau_password" value="{{ old('password') }}" required
                                                autocomplete="password" autofocus>
                                            <div id="emailHelp" class="form-text ms-1">minimum 8 caractères dont au
                                                moins 1 lettre avec minimum 1 majuscule, 1 chiffre et 1 caractère
                                                spécial</div>

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <!-- Confirmation mot de passe
                                                ============================================================ -->
                                    <div class="col mb-3">
                                        <label for="password"
                                            class="col-form-label ms-1"><small>{{ __('Confirmer nouveau mot de passe') }}</small></label>

                                        <div class="col-md-12">
                                            <input id="password" type="password" placeholder="Nouveau mot de passe"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="nouveau_password_confirmation" value="{{ old('password') }}"
                                                required autocomplete="password" autofocus>

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                </div>


                                <!-- Bouton validation modification
                                            ============================================================ -->
                                <div class="row mb-0 mt-2">
                                    <div class="col-md-12 d-flex justify-content-center">
                                        <button type="submit"
                                            class="btn btn-ajout"><small>{{ __('Modifier le mot de passe') }}</small></button>
                                    </div>
                                </div>

                            </form>

                        </div>

                    </div>

                </div>

            </div>
        </div>

    </div>
@endsection
