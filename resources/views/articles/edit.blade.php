@extends('layouts.app')

@section('title')
    Modification article
@endsection

@section('content')

    <!-- SECTION MODIF ARTICLE
    ============================================================ -->

    <div class="container-fluid pt-5" id="section_modif_article">

        <!-- Titre section -->
        
        <h2 class="text-center">Modifier l'article {{ $article->nom }}</h2>
        <div class="row justify-content-center">
            <div class="col-md-5">


                <!-- CARD
                ============================================================ -->
                <div class="card border-secondary text-light mt-1">


                    <!-- CARD HEADER
                    ============================================================ -->
                    <div class="card-header border-bottom border-secondary d-flex justify-content-between" id="header_card_edit">

                        <small>{{ __('Modification article') }} {{ $article->nom }}</small>

                        <a href="{{ route('backoffice') }}">
                            <i class="fa-solid fa-xmark text-light fs-5"></i>
                        </a>

                    </div>


                    <!-- CARD BODY
                    ============================================================ -->
                    <div class="card-body" id="body_card_edit">


                        <!-- FORMULAIRE CREATION ARTICLE
                        ============================================================ -->
                        <form action="{{ route('articles.update', $article) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')


                            <!-- SECTION NOM + IMAGE
                            ============================================================ -->
                            <div class="d-flex justify-content-center gap-2">


                                <!-- NOM
                                ============================================================ -->
                                <div class="col mb-3">
                                    <label for="nom" class="col-form-label ms-1"><small>{{ __('Nouveau nom') }}</small></label>

                                    <div class="col-md-12">
                                        <input id="nom" type="text" placeholder="Nom" class="form-control @error('name') is-invalid @enderror" name="nom" value="{{ $article->nom }}">

                                        @error('nom')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <!-- IMAGE
                                ============================================================ -->
                                <div class="col mb-3">
                                    <label for="image" class="col-form-label ms-1"><small>{{ __('Nouvelle image')}}</small></label>

                                    <div class="col-md-12">
                                        <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" placeholder="image.jpg" value="{{ $article->image }}" autocomplete="image">

                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>


                            <!-- DESCRIPTION
                            ============================================================ -->
                            <div class="col mb-3">
                                <label for="description" class="col-form-label ms-1"><small>{{ __('Nouvelle description') }}</small></label>

                                <div class="col-md-12">
                                    <input id="description" type="text" placeholder="Description" class="form-control @error('descritpion') is-invalid @enderror" name="description" value="{{ $article->description }}">

                                    @error('descritpion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

    
                            <!-- DESCRIPTION DETAILLEE
                            ============================================================ -->
                            <div class="col mb-3">
                                <label for="description_detaillee" class="col-form-label ms-1"><small>{{ __('Nouvelle descritpion détaillée') }}</small></label>

                                <div class="col-md-12">
                                    <input id="description_detaillee" type="text" placeholder="Description détaillée" class="form-control @error('description_detaillee') is-invalid @enderror" name="description_detaillee" value="{{ $article->description_detaillee }}"></input>

                                    @error('description_detaillee')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <!-- SECTION PRIX + STOCK
                            ============================================================ -->
                            <div class="d-flex justify-content-center gap-2">


                                <!-- PRIX
                                ============================================================ -->
                                <div class="col mb-3">
                                    <label for="prix" class="col-form-label ms-1"><small>{{ __('Nouveau prix') }}</small></label>

                                    <div class="col-md-12">
                                        <input id="prix" type="number" placeholder="Prix" class="form-control @error('prix') is-invalid @enderror" name="prix" value="{{ $article->prix }}">

                                        @error('prix')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <!-- STOCK
                                ============================================================ -->
                                <div class="col mb-3">
                                    <label for="stock" class="col-form-label ms-1"><small>{{ __('Nouveau stock') }}</small></label>

                                    <div class="col-md-12">
                                        <input id="stock" type="number" placeholder="Stock" class="form-control @error('stock') is-invalid @enderror" name="stock" value="{{ $article->stock }}">

                                        @error('stock')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <!-- NOTE
                                ============================================================ -->
                                <div class="col mb-3">
                                    <label for="note" class="col-form-label ms-1"><small>{{ __('Nouvelle note') }}</small></label>

                                    <div class="col-md-12">
                                        <input id="note" type="number" placeholder="Note" class="form-control @error('note') is-invalid @enderror" name="note" value="{{ $article->note }}">

                                        @error('note')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                            </div>


                            <!-- BOUTTON VALIDATION ENREGISTREMENT
                            ============================================================ -->
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <button type="submit" class="btn col-12 border-secondary"><small class="text-light">{{ __('Valider la modification') }}</small></button>
                                </div>
                            </div>

                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection