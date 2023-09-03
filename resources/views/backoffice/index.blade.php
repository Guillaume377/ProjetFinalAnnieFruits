@extends('layouts.app')

{{-- @section('title')
    Back office - Annie fruits
@endsection --}}

@section('content')

    <h1 class="title_h1 text-center mt-5 mx-auto">Back Office</h1>




    <!-- ====== SECTION CREATION ARTICLE ====== -->

    <div id="section_creation_article">
        <div class="container-fluid">

            <!-- ===== TITRE ===== -->

            <h3 class="text-center my-5">Enregistrer un article</h3>

            <!-- ===== CARD ===== -->

            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="tableau table-responsive card mb-5">


                        <!-- ===== CARD HEADER ===== -->

                        <div class="card-header border-bottom border-secondary" id="header_card_index">
                            <small>{{ __('Enregistrer un article') }}</small>
                        </div>


                        <!-- ===== CARD BODY ===== -->

                        <div class="card-body" id="body_card_index">


                            <!-- ===== FORMULAIRE CREATION ARTICLE ===== -->

                            <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf


                                <!-- ===== SECTION NOM + IMAGE ===== -->

                                <div class="d-flex justify-content-center gap-2">


                                    <!-- ===== NOM ===== -->

                                    <div class="col mb-3">
                                        <label for="nom"
                                            class="col-form-label ms-1"><small>{{ __('Nom') }}</small></label>

                                        <input id="nom" type="text" placeholder="ex : Tomate"
                                            class="form-control @error('name') is-invalid @enderror" name="nom"
                                            value="{{ old('nom') }}" required>

                                        @error('nom')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>


                                    <!-- ===== IMAGE ===== -->

                                    <div class="col mb-3">
                                        <label for="image"
                                            class="col-md-4 col-form-label text-center text-light"><small>{{ __('image') }}</small></label>

                                        <input type="file" class="form-control @error('image') is-invalid @enderror"
                                            name="image" placeholder="ex : image.jpg" value="{{ old('image') }}"
                                            autocomplete="image" required>

                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>


                                <!-- ===== TITRE ===== -->

                                <div class="col mb-3">
                                    <label for="titre"
                                        class="col-form-label ms-1"><small>{{ __('Titre') }}</small></label>

                                    <input id="titre" type="text" placeholder="ex : Conseils de préparation..."
                                        class="form-control @error('titre') is-invalid @enderror" name="titre"
                                        value="{{ old('titre') }}" required>

                                    @error('descritpion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <!-- ===== DESCRIPTION ===== -->

                                <div class="col mb-3">
                                    <label for="description"
                                        class="col-form-label ms-1"><small>{{ __('Description') }}</small></label>

                                    {{-- <input id="description" type="text" placeholder="ex : La tomate peut être..."
                                            class="form-control" @error('description') is-invalid @enderror
                                            name="description" value="{{ old('description') }}" required> --}}

                                    <textarea id="description" name="description" type="text" rows="3" placeholder="ex : La tomate peut être..."
                                        class="form-control" @error('description') is-invalid @enderror value="{{ old('description') }}" required>
                                        </textarea>
                                    <div id="descriptionHelp" class="form-text ms-1">ex : La tomate peut être conservée ...
                                    </div>

                                    @error('descritpion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <!-- ===== SECTION PRIX + STOCK ===== -->

                                <div class="d-flex justify-content-center gap-2">


                                    <!-- ===== PRIX ===== -->

                                    <div class="col mb-3">
                                        <label for="prix"
                                            class="col-form-label ms-1"><small>{{ __('Prix') }}</small></label>

                                        <div class="col-md-12">
                                            <input id="prix" type="number" step="0.01" placeholder="ex : 1,50"
                                                class="form-control @error('prix') is-invalid @enderror" name="prix"
                                                value="{{ old('prix') }}" required>

                                            @error('prix')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <!-- ===== STOCK ===== -->

                                    <div class="col mb-3">
                                        <label for="stock"
                                            class="col-form-label ms-1"><small>{{ __('Stock') }}</small></label>

                                        <div class="col-md-12">
                                            <input id="stock" type="number" step="0.01" placeholder="ex :2,50"
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


                            <!-- ===== SECTION TYPE PRIX + GAMME ===== -->

                                <div class="d-flex justify-content-center gap-2">

                                    <!-- ===== TYPE PRIX ===== -->

                                    <div class="col my-4">
                                        <label class="pb-2" for="article_id"></label>

                                        <div class="col-form-label text-center">
                                            <select class="p-1" name="article_id">
                                                <option>Pièce ou kilo</option>
                                                @foreach ($articles as $article)
                                                    <option value="{{ $article->id }}">{{ $article->type_prix }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>


                                    <!-- ===== GAMME ===== -->

                                    <div class="col my-4">
                                        <label class="pb-2" for="gamme_id"></label>

                                        <div class="col-form-label text-center">
                                            <select class="p-1" name="gamme_id">
                                                <option>Choisissez une gamme</option>
                                                @foreach ($gammes as $gamme)
                                                    <option value="{{ $gamme->id }}">{{ $gamme->nom }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                                </div>

                                <!-- ===== BOUTON VALIDATION ENREGISTREMENT ===== -->

                                <div class="row mt-4">
                                    <div class="text-center mx-auto">
                                        <button type="submit" class="btn btn-ajout">
                                            <small>{{ __('Enregistrer') }}</small></button>
                                    </div>
                                </div>

                            </form>

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>


    <!-- ===== SECTION GESTION ARTICLES ===== -->

    <!-- ===== TITRE ===== -->

    <h3 class="text-center my-5">Gestion des articles</h3>

    <div class="container-fluid col-lg-11 p-1 mt-2 justify-content-center">

        <div class="row justify-content-center">
            <div class="col">

                <!-- ===== TABLE ===== -->

                <div class="tableau table-responsive">
                    <table class="table table-striped mb-0">

                        <!-- ===== TITRE DES COLONNES ===== -->

                        <thead>

                            <!-- Nom -->
                            <th scope="col">Nom</th>
                            <!-- Description -->
                            <th scope="col">Description</th>
                            <!-- Image -->
                            <th scope="col">Image</th>
                            <!-- Gamme -->
                            <th scope="col">Gamme</th>
                            <!-- Prix -->
                            <th scope="col">Prix</th>
                            <!-- Stock -->
                            <th scope="col">Stock</th>
                            <!-- Type_prix -->
                            <th scope="col">Type prix</th>
                            <!-- Boutons modifier et supprimer -->
                            <th scope="col">Modifier / Supprimer</th>

                        </thead>

                        <!-- ===== BOUCLE AFFICHAGE INFOS ARTICLES ===== -->

                        @foreach ($articles as $article)


                            <!-- ===== ARTICLES ===== -->

                            <tbody>
                                <tr class="border-secondary">

                                    <!-- Nom -->
                                    <td class="border-end fs-5">{{ $article->nom }}</td>

                                    <!-- Description -->
                                    <td class="text-description border-end">{{ $article->description }}</td>

                                    <!-- Image -->
                                    <td class="border-end text-center"><img
                                            src="{{ asset('images/' . $article->image) }}" class="rounded-top"
                                            alt="{{ $article->nom }}" style="width: 7rem"></td>

                                    <!-- Gamme -->
                                    <td class="border-end fs-5 text-center">{{ $article->gamme->nom }}</td>

                                    <!-- Prix -->
                                    <td class="border-end fs-5 text-center">{{ $article->prix }} €</td>

                                    <!-- Stock -->
                                    <td class="border-end fs-5 text-center">{{ $article->stock }}</td>

                                    <!-- Type_Prix -->
                                    <td class="border-end fs-5 text-center">{{ $article->type_prix }}</td>

                                    <!-- Bouton modifier -->
                                    <td>
                                        <a href="{{ route('articles.edit', $article) }}">
                                            <button type="button mx-auto" class="btn btn-ajout my-2">Modifier</button>
                                        </a>

                                        <!-- Bouton supprimer -->

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



    <!-- SECTION CREATION GAMMES -->



    {{-- <div class="text-center mx-auto">
        <h3 class="my-5">Créer une gamme</h3>
        <form class="p-3" action="{{ route('gammes.store') }}" method="POST">
            @csrf

            <!-- ====== GAMME ===== -->

            <input type="text" name="nom" placeholder="Nom de la gamme">

            
            <!-- Bouton de soumission -->
            <button type="submit" class="btn btn-ajout">Ajouter</button>
        </form> --}}



    <!-- ====== SECTION CREATION GAMME ====== -->

    <div id="section_creation_article">
        <div class="container-fluid">

            <!-- ===== TITRE ===== -->

            <h3 class="text-center pt-5 my-5">Créer une gamme</h3>

            <!-- ===== CARD ===== -->

            <div class="row d-flex justify-content-center">
                <div class="col-md-5">
                    <div class="tableau table-responsive card mb-5">


                        <!-- ===== CARD HEADER ===== -->

                        <div class="card-header border-bottom border-secondary" id="header_card_index">
                            <small>{{ __('Enregistrer une gamme') }}</small>
                        </div>


                        <!-- ===== CARD BODY ===== -->

                        <div class="card-body" id="body_card_index">


                            <!-- ===== FORMULAIRE CREATION ARTICLE ===== -->

                            <form action="{{ route('gammes.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf


                                <!-- ===== SECTION NOM + IMAGE ===== -->

                                <div class="d-flex flex-column gap-2">


                                    <!-- ===== NOM ===== -->

                                    <div class="col mb-3">
                                        <label for="nom"
                                            class="col-form-label ms-1"><small>{{ __('Nom') }}</small></label>

                                        <input id="nom" type="text" placeholder="ex : Nos fruits"
                                            class="form-control @error('name') is-invalid @enderror" name="nom"
                                            value="{{ old('nom') }}" required>

                                        @error('nom')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>


                                    <!-- ===== IMAGE ===== -->

                                    <div class="col mb-3">
                                        <label for="image"
                                            class="col-md-4 col-form-label text-center text-light"><small>{{ __('image') }}</small></label>

                                        <input type="file" class="form-control @error('image') is-invalid @enderror"
                                            name="image" placeholder="ex : image.jpg" value="{{ old('image') }}"
                                            autocomplete="image" required>

                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>


                                <!-- ===== BOUTON VALIDATION ENREGISTREMENT ===== -->

                                <div class="row mt-4">
                                    <div class="text-center mx-auto">
                                        <button type="submit" class="btn btn-ajout">
                                            <small>{{ __('Enregistrer') }}</small></button>
                                    </div>
                                </div>

                            </form>

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>






    <!-- ===== SECTION GESTION GAMMES ===== -->

    <!-- ===== TITRE ===== -->

    <div class="mx-auto text-center">

        <h3 class="my-5">Liste des gammes</h3>

        <div class="container">


            <!-- ===== TABLEAU ===== -->

            <div class="tableau table-responsive my-5">
                <table class="table table-striped mb-0">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Image</th>
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
                                    <td class="bo-gamme" img src="{{ asset('images/' . $gamme->image) }}" class="rounded-top"
                                        alt="{{ $gamme->nom }}" style="width: 7rem"></td>
                                    
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
