@extends('layouts.app')

@section('title')
    Vérification email - Annie fruits
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card-login col-md-8">


            <!-- ===== TABLEAU ===== -->

            <div class="tableau table-responsive card">


                <!-- ===== CARD HEADER ===== -->

                <div class="card-header">{{ __('Vérifiez votre e-mail') }}</div>


                <!-- ===== CARD BODY ===== -->

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Un nouveau lien de vérification a été envoyé à votre adresse email.') }}
                        </div>
                    @endif

                    {{ __('Avant de continuer, veuillez vérifier votre email pour un lien de vérification.') }}
                    {{ __("Si vous n'avez pas reçu l'e-mail") }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Cliquez ici pour demander un autre e-mail') }}</button>.
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
