@extends('layouts.app')

@section('content')
    <h1 class="title_h1 text-center mx-auto">Inscription</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card-register col-md-8">


                <!-- ===== TABLEAU ===== -->

                <div class="tableau table-responsive card">


                    <!-- ===== CARD HEADER ===== -->

                    <div class="card-header">{{ __('Inscription') }}</div>


                    <!-- ===== CARD BODY ===== -->

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf


                            <!-- ===== NOM ===== -->

                            <div class="row mb-3">
                                <label for="nom"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Nom*') }}</label>

                                <div class="col-md-6">
                                    <input id="nom" type="text"
                                        class="form-control @error('nom') is-invalid @enderror" name="nom"
                                        value="{{ old('nom') }}" required autocomplete="on" autofocus>

                                    @error('nom')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <!-- ===== PRENOM ===== -->

                            <div class="row mb-3">
                                <label for="prenom"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Prénom*') }}</label>

                                <div class="col-md-6">
                                    <input id="prenom" type="text"
                                        class="form-control @error('prenom') is-invalid @enderror" name="prenom"
                                        value="{{ old('prenom') }}" required autocomplete="on" autofocus>

                                    @error('prenom')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <!-- ===== TELEPHONE ===== -->

                            <div class="row mb-3">
                                <label for="telephone"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Téléphone*') }}</label>

                                <div class="col-md-6">
                                    <input id="telephone" type="text"
                                        class="form-control @error('telephone') is-invalid @enderror" name="telephone"
                                        value="{{ old('telephone') }}" required autocomplete="on" autofocus>

                                    @error('telephone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ trans($message) }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <!-- ===== EMAIL ===== -->

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('e-mail*') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="on" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <!-- ===== MOT DE PASSE ===== -->

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Mot de passe*') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="off" autofocus>
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


                            <!-- ===== CONFIRMER MOT DE PASSE ===== -->

                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Confirmez le mot de passe*') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                    <div id="emailHelp" class="form-text ms-1">* = champs obligatoires</div>
                                </div>
                            </div>

                            <!-- ===== CHECKBOX POLITIQUE DE CONFIDENTIALITE et MENTIONS LEGALES ===== -->

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4 d-flex flex-nowrap">


                                    <!-- ===== CHECKBOX ===== -->

                                    <div class="col-md-1">
                                        <input class="mx-auto" type="checkbox" name="politique" id="politique"
                                            onclick="toggleValidationButtonDisplay()">
                                    </div>


                                    <!-- ===== LIEN POL. CONF. et MENT. LEGALES ===== -->

                                    <label for="politique"> J’ai lu et j’accepte les
                                        <a href="{{ route('politique') }}">mentions légales et la politique de
                                            confidentialité</a>
                                    </label>

                                </div>
                            </div>


                            <!-- ===== BOUTON VALIDER ===== -->

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button id="valider" type="submit" class="btn btn-ajout" style="visibility: hidden">
                                        {{ __('Valider') }}
                                    </button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- ===== SCRIPT POUR LE FONCTIONNEMENT DE LA CHECKBOX ===== -->

    <script>
        function toggleValidationButtonDisplay() {
            let checkbox = document.getElementById("politique");
            let boutonValider = document.getElementById("valider");
            checkbox.checked ? boutonValider.style.visibility = "visible" : boutonValider.style.visibility = "hidden"
        }
    </script>
@endsection
