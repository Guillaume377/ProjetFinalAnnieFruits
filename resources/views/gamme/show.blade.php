@extends('layouts.app')

@section('title')
    Catalogue - Annie fruits
@endsection

@section('content')
    <h1 class="title_h1 text-center mx-auto">{{$gamme->nom}}</h1>

    <!-- ========================== CARD GAMMES ========================== -->

    <div class="container">
        <div class="row d-flex justify-content-center">

            @foreach ($gamme->articles as $article)
            <div class="col-md-4 p-2">
                <div class="card text-bg-danger mb-5">
                    <a href="{{ route('articles.show',$article) }}">
                        <img src="{{ asset('images/'. $article->image) }}" class="card-img" alt="{{$article->nom}}">
                        <div class="card-img-overlay d-flex align-items-center justify-content-center">
                            <h5 class="card-title text-center px-4">{{$article->nom}}</h5>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach

        </div>
    </div>
@endsection
