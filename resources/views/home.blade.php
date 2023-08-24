@extends('layouts.app')

@section('content')
<header>

    <div class="base_line">
        <h1 class="base_line_h1 text-center">Bienvenue chez Annie fruits</h1>
        <h2 class="text-center pb-5">Votre magasin de proximité à Rochefort!</h2>
    </div>

</header>

<body>

    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="{{ asset('images/1_entree.jpg') }}" class="d-block w-100" alt="entrée du magasin">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('images/2_fraise2.jpg') }}" class="d-block w-100" alt="fraises">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('images/3_rayon.jpg') }}" class="d-block w-100" alt="rayon">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('images/4_corbeille.jpg') }}" class="d-block w-100" alt="corbeille de fruits">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

</body>





<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tableau de bord') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Vous êtes connectés!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
