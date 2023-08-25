@extends('layouts.app')

@section('title')
    Gammes - Annie fruits
@endsection

@section('content')
    <h1 class="title_h1 text-center mx-auto">Nos univers</h1>

    <div class="container text-center">

        <p class="nos_univers py-5">Chez <span>Annie fruits</span>, venez découvrir nos univers :<br> nos fruits savoureux,
            nos légumes frais<br>et nos fromages qui donnent envie de ne pas laisser
            de place pour le dessert!</p>

    </div>





    <div class="container">
        <div class="row d-flex justify-content-center">

            <div class="col-md-4 p-2">
                <div class="card text-bg-danger mb-5" href="{{ route('articles.index') }}">
                    <img src="{{ asset('images/fruits.jpg') }}" class="card-img" alt="fruits">
                    <div class="card-img-overlay">
                        <h5 class="card-title text-center d-flex align-center">Nos fruits</h5>
                    </div>
                </div>
            </div>

            <div class="col-md-4 p-2">
                <div class="card text-bg-danger mb-5">
                    <img src="{{ asset('images/legumes.jpg') }}" class="card-img" alt="légumes">
                    <div class="card-img-overlay">
                        <h5 class="card-title text-center align-center">Nos légumes</h5>
                    </div>
                </div>
            </div>

            <div class="col-md-4 p-2">
                <div class="card text-bg-danger mb-5">
                    <img src="{{ asset('images/fromages.jpg') }}" class="card-img" alt="fromages">
                    <div class="card-img-overlay">
                        <h5 class="card-title text-center align-center">Nos fromages</h5>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
