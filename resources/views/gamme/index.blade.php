@extends('layouts.app')

@section('title')
    Gammes - Annie fruits
@endsection

@section('content')

    <!-- ====== TITRE ===== -->

    <h1 class="title_h1 text-center mx-auto">Nos produits</h1>

    <div class="container text-center">

        <p class="nos_univers py-5">Chez <span>Annie fruits</span>, venez découvrir nos univers :<br> nos fruits savoureux,
            nos légumes frais<br>et nos fromages qui donnent envie de ne pas laisser
            de place pour le dessert!</p>

    </div>

    <!-- ========================== CARD GAMMES ========================== -->

    <div class="container">
        <div class="row d-flex justify-content-center">

            @foreach ($gammes as $gamme)
            <div class="col-md-4 p-2">
                <div class="card text-bg-danger mb-5">
                    <a href="{{ route('gammes.show',$gamme) }}">
                        <img src="{{ asset('images/'. $gamme->image) }}" class="card-img" alt="{{$gamme->nom}}">
                        <div class="card-img-overlay d-flex align-items-center justify-content-center">
                            <h5 class="card-title text-center px-4">{{$gamme->nom}}</h5>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach

        </div>
    </div>
@endsection
