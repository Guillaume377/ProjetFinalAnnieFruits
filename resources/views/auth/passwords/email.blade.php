@extends('layouts.app')

@section('title')
    Réinitilialiser le mot de passe - Annie fruits
@endsection

@section('content')

<h1 class="title_h1 text-center mx-auto">Mot de passe oublié</h1>
<div class="container">
    <div class="row justify-content-center">
        <div class="card-login col-md-8">


            <!-- ===== TABLEAU===== -->

            <div class="tableau table-responsive card">

                
                <!-- ===== CARD HEADER ===== -->

                <div class="card-header">{{ __('Réinitialiser votre mot de passe') }}</div>


                <!-- ===== CARD BODY ===== -->

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- ===== EMAIL ===== -->

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

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


                        <!-- ===== BOUTON ===== -->

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4 text-center">
                                <button type="submit" class="btn btn-ajout">
                                    {{ __('Envoyer le lien') }}
                                </button>
                            </div>
                        </div>
                    </form>

                </div>

            </div>

        </div>
    </div>
</div>
@endsection
