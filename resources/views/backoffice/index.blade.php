@extends('layouts.app')

{{-- @section('title')
    Back office - Annie fruits
@endsection --}}

@section('content')

    <h1 class="title_h1 text-center mx-auto">Back Office</h1>




    <!-- SECTION CREATION ARTICLE
                        ============================================================ -->
    <div id="section_cration_article">
        <div class="container-fluid">

            <!-- Titre section -->

            <h3 class="text-center my-5">Enregistrer un article</h3>

            <div class="row justify-content-center">
                <div class="col-md-5">


                    <!-- CARD
                                        ============================================================ -->
                    <div class="tableau table-responsive card mb-5">


                        <!-- CARD HEADER
                                            ============================================================ -->
                        <div class="card-header border-bottom border-secondary" id="header_card_index">
                            <small>{{ __('Enregistrer un article') }}</small>
                        </div>


                        <!-- CARD BODY
                                            ============================================================ -->
                        <div class="card-body" id="body_card_index">


                            <!-- FORMULAIRE CREATION ARTICLE
                                                ============================================================ -->
                            <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf


                                <!-- SECTION NOM + IMAGE
                                                    ============================================================ -->
                                <div class="d-flex justify-content-center gap-2">


                                    <!-- NOM
                                                        ============================================================ -->
                                    <div class="col mb-3">
                                        <label for="nom"
                                            class="col-form-label ms-1"><small>{{ __('Nom') }}</small></label>

                                        <div class="col-md-12">
                                            <input id="nom" type="text" placeholder="Nom"
                                                class="form-control @error('name') is-invalid @enderror" name="nom"
                                                value="{{ old('nom') }}" required>

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
                                        <label for="image"
                                            class="col-md-4 col-form-label text-center text-light"><small>{{ __('image') }}</small></label>

                                        <div class="col-md-12">
                                            <input id="image" type="file"
                                                class="form-control @error('image') is-invalid @enderror" name="image"
                                                placeholder="image.jpg" value="{{ old('image') }}" autocomplete="image"
                                                required>

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
                                    <label for="description"
                                        class="col-form-label ms-1"><small>{{ __('Description') }}</small></label>

                                    <div class="col-md-12">
                                        <input id="description" type="text" placeholder="Description"
                                            class="form-control @error('descritpion') is-invalid @enderror"
                                            name="description" value="{{ old('description') }}" required>

                                        @error('descritpion')
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
                                        <label for="prix"
                                            class="col-form-label ms-1"><small>{{ __('Prix') }}</small></label>

                                        <div class="col-md-12">
                                            <input id="prix" type="number" placeholder="Prix"
                                                class="form-control @error('prix') is-invalid @enderror" name="prix"
                                                value="{{ old('prix') }}" required>

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
                                        <label for="stock"
                                            class="col-form-label ms-1"><small>{{ __('Stock') }}</small></label>

                                        <div class="col-md-12">
                                            <input id="stock" type="number" placeholder="Stock"
                                                class="form-control @error('stock') is-invalid @enderror" name="stock"
                                                value="{{ old('stock') }}" required>

                                            @error('stock')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                </div>


                                <!-- SECTION NOTE + GAMME
                                                    ============================================================ -->
                                <div class="d-flex justify-content-center gap-2">


                                    <!-- NOTE
                                                        ============================================================ -->
                                    <div class="col mb-3">
                                        <label for="note"
                                            class="col-form-label ms-1"><small>{{ __('Note') }}</small></label>

                                        <div class="col-md-12">
                                            <input id="note" type="number" placeholder="Note"
                                                class="form-control @error('note') is-invalid @enderror" name="note"
                                                value="{{ old('note') }}" required>

                                            @error('note')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <!-- GAMME
                                                        ============================================================ -->
                                    <div class="col ">
                                        <label class="pb-2" for="gamme_id"></label>

                                        <div class="col-md-12 text-center">
                                            <select class="p-1" name="gamme_id" id="gamme_id">
                                                <option value="">--Choisissez une gamme--</option>
                                                @foreach ($gammes as $gamme)
                                                    <option value="{{ $gamme->id }}">{{ $gamme->nom }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                </div>


                                <!-- BOUTON VALIDATION ENREGISTREMENT
                                                    ============================================================ -->
                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-ajout"
                                            id="button_validation_enregistrement">
                                            <small>{{ __('Enregistrer') }}</small></button>
                                    </div>
                                </div>

                            </form>
                        </div>

                    </div>

                </div>
            </div>
        </div>



        <!-- SECTION GESTION ARTICLES
                            ============================================================ -->
        <!-- Titre section -->
        <h3 class="text-center my-5">Gestion des articles</h3>

        <div class="container-fluid col-lg-11 p-1 mt-2 justify-content-center">

            <div class="row justify-content-center">
                <div class="col">


                    <!-- TABLE
                                        ============================================================ -->
                    <div class="tableau table-responsive">
                        <table class="table table-striped mb-0">

                            <!-- TITRE DES COLONNES
                                                ============================================================ -->
                            <thead>
                                
                                    <!-- Nom -->
                                    <th scope="col">Nom</th>
                                    <!-- Description -->
                                    <th scope="col">Description</th>
                                    <!-- Image -->
                                    <th scope="col">Image</th>
                                    <!-- Prix -->
                                    <th scope="col">Prix</th>
                                    <!-- Stock -->
                                    <th scope="col">Stock</th>
                                    <!-- Note -->
                                    <th scope="col">Note</th>
                                    <!-- Boutons modifier et supprimer -->
                                    <th scope="col">Modifier / Supprimer</th>
            
                            </thead>

                            <!-- BOUCLE AFFICHAGE INFOS ARTICLES
                                                ============================================================ -->
                            @foreach ($articles as $article)
                                <!-- ARTICLES
                                                    ============================================================ -->
                                <tbody>
                                    <tr class="border-secondary">
                                        <!-- Nom -->
                                        <td class="border-end fs-5">{{ $article->nom }}</td>
                                        <!-- Description -->
                                        <td class="border-end">{{ $article->description }}</td>
                                        <!-- Image -->
                                        <td class="border-end text-center"><img
                                                src="{{ asset('images/' . $article->image) }}" class="rounded-top"
                                                alt="{{ $article->nom }}" style="width: 7rem"></td>
                                        <!-- Prix -->
                                        <td class="border-end fs-5 text-center">{{ $article->prix }} €</td>
                                        <!-- Stock -->
                                        <td class="border-end fs-5 text-center">{{ $article->stock }}</td>
                                        <!-- Note -->
                                        <td class="border-end fs-5 text-center">{{ $article->note }}</td>


                                        <!-- Boutton modifier -->
                                        <td>
                                            <a href="{{ route('articles.edit', $article) }}">
                                                <button type="button mx-auto" class="btn btn-ajout my-2">Modifier</button>
                                            </a>
                                       
                                        <!-- Boutton supprimer -->
                                       
                                            <form action="{{ route('articles.destroy', $article) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-suppr my-2">Supprimer</button>
                                            </form>
                                        </td>


                                    </tr>
                                </tbody>
                            @endforeach

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- SECTION CREATION GAMMES -->

@section('content')

    <div class="text-center mx-auto">
        <h3 class="my-5">Créer une gamme</h3>
        <form class="p-3" action="{{ route('gammes.store') }}" method="POST">
            @csrf
            <!-- Champs du formulaire -->
            <input type="text" name="nom" placeholder="Nom de la gamme">

            <!-- Bouton de soumission -->
            <button type="submit" class="btn btn-ajout">Ajouter</button>
        </form>
        <div class="mx-auto text-center">

            <h3 class="my-5">Liste des gammes</h3>

            <div class="container">
                <div class="tableau table-responsive my-5">
                    <table class="table table-striped mb-0">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Modifier</th>
                                <th scope="col">Supprimer</th>
                            </tr>
                        </thead>

                        <div class="form-group d-flex justify-content-center">


                            <tbody>
                                @foreach ($gammes as $gamme)
                                    <tr>
                                        <td class="bo-gamme text-center fw-bolder">{{ $gamme->id }}</td>
                                        <td class="bo-gamme text-center fw-bolder">{{ $gamme->nom }}</td>

                                        <td class="text-center">
                                            <a href="{{ route('gammes.edit', $gamme) }}">
                                                <button class="btn btn-ajout">Modifier</button>
                                            </a>
                                        </td>

                                        <td class="text-center">
                                            <form action="{{ route('gammes.destroy', $gamme) }}" method="post">
                                                @method ("delete")
                                                @csrf
                                                <button type="submit" class="btn btn-suppr">Supprimer</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </div>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Créer une gamme -->

    <div class="container w-50 p-5" style="display:none" id="rangesForm">
        <h3>Créer une gamme</h3>
        <form method="post" action="{{ route('gammes.store') }}">
            @csrf
            <div class="form-group">
                <label for="nom">nom</label>
                <input required type="text" class="form-control" name="nom" placeholder="moulin à café"
                    id="nom">
            </div>
            <button type="submit" class="btn btn-info text-light mt-4">Valider</button>
        </form>
    </div>



    <!-- Liste des gammes -->

    <div class="container w-50" style="display:none" id="rangesList">
        <h3 class="mb-3">Liste des gammes</h3>

        <table class="table table-info">
            <thead class="thead-dark">
                <th>id</th>
                <th>nom</th>
                <th>modifier</th>
                <th>supprimer</th>
            </thead>
            @foreach ($gammes as $gamme)
                <tr>
                    <td>{{ $gamme->id }}</td>
                    <td>{{ $gamme->nom }}</td>
                    <td><a href="{{ route('gammes.edit', $gamme) }}"><button
                                class="btn btn-warning">Modifier</button></a>
                    </td>
                    <td>
                        <form method="post" action="{{ route('gammes.destroy', $gamme) }}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
