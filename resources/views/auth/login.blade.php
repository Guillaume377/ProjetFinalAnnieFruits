@extends('layouts.app')

@section('content')

<h1 class="title_h1 text-center mx-auto">Connexion</h1>
<div class="container">
    <div class="row justify-content-center">
        <div class="card-login col-md-8">


            <!-- ===== TABLEAU ===== -->

            <div class="tableau table-responsive card">


                <!-- ===== CARD HEADER ===== -->

                <div class="card-header">{{ __('Connexion') }}</div>


                <!-- ===== CARD BODY ===== -->

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        
                        <!-- ===== EMAIL ===== -->

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('e-mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <!-- ===== MOT DE PASSE ===== -->

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Mot de passe') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                         <!-- ===== CHECKBOX ===== -->

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Se souvenir de moi') }}
                                    </label>
                                </div>
                            </div>
                        </div>


                        <div class="row mb-0">

                        <!-- ===== BOUTON SE CONNECTER ===== -->

                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-ajout">
                                    {{ __('Se connecter') }}
                                </button>


                                 <!-- ===== MOT DE PASSE OUBLIE ===== -->

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Mot de passe oublié?') }}
                                    </a>
                                @endif
                            </div>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
