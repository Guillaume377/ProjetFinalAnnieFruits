@extends('layouts.app')

@section('title')
    Back office - Annie fruits
@endsection

@section('content')

    <!-- ===== TITRE H1 ===== -->

    <h1 class="title_h1 text-center mx-auto">Back Office</h1>


    <!-- ===== LIENS VERS LES AUTRE SECTIONS ===== -->

    <div class="container">
        <div class="text-center">
            <a href="#creation-gamme" class="btn btn-ghost-bo pt-3 m-3">Section gamme</a>
            <a href="#liste-utilisateurs" class="btn btn-ghost-bo pt-3 m-3">Section utilisateurs</a>
            <a href="#liste-commandes" class="btn btn-ghost-bo pt-3 m-3">Section commandes</a>
        </div>
    </div>


    <!-- =============================== SECTION CREATION ARTICLE ============================= -->


    <!-- ===== TITRE ===== -->

    <section id="creation-article">
        <h3 class="text-center my-5">Enregistrer un article</h3>
    </section>


    <!-- ===== CARD ===== -->

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="tableau table-responsive card mb-5">


                    <!-- ===== CARD HEADER ===== -->

                    <div class="card-header border-bottom border-secondary" id="header_card_index">
                        <small>{{ __('Enregistrer un article') }}</small>
                    </div>


                    <!-- ===== CARD BODY ===== -->

                    <div class="card-body" id="body_card_index">


                        <!-- ===== FORMULAIRE CREATION ARTICLE ===== -->

                        <form method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data">
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

                                    <input type="file" name="image"
                                        class="form-control @error('image') is-invalid @enderror"
                                        placeholder="ex : image.jpg" value="{{ old('image') }}" autocomplete="image">

                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>


                            <!-- ===== TITRE ===== -->

                            <div class="col mb-3">
                                <label for="titre" class="col-form-label ms-1"><small>{{ __('Titre') }}</small></label>

                                <input id="titre" type="text" placeholder="ex : Conseils de préparation..."
                                    class="form-control @error('titre') is-invalid @enderror" name="titre"
                                    value="{{ old('titre') }}" required>

                                @error('titre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <!-- ===== DESCRIPTION ===== -->

                            <div class="col mb-3">
                                <label for="description"
                                    class="col-form-label ms-1"><small>{{ __('Description') }}</small></label>

                                <textarea id="description" name="description" type="text" rows="3" placeholder="ex : La tomate peut être..."
                                    class="form-control" @error('description') is-invalid @enderror value="{{ old('description') }}" required></textarea>
                                <div id="descriptionHelp"></div>

                                @error('description')
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

                                <div class="col-lg my-4 text-center">
                                    <label class="pb-2" for="type_prix">Pièce ou kilo</label>

                                    <div class="col-form-label">
                                        <select class="p-1" name="type_prix">

                                            <option value="pièce">pièce</option>
                                            <option value="kilo">kilo</option>

                                        </select>
                                    </div>

                                </div>


                                <!-- ===== GAMME ===== -->

                                <div class="col-lg my-4 text-center">
                                    <label class="pb-2" for="gamme_id">Choisissez une gamme</label>

                                    <div class="col-form-label">
                                        <select class="p-1" name="gamme_id">

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



    <!-- ================================= SECTION GESTION ARTICLES ======================================== -->

    <!-- ===== TITRE ===== -->

    <section id="gestion-articles">
        <h3 class="text-center my-5">Gestion des articles</h3>
    </section>


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
                                            src="{{ asset('images/' . $article->image) }}" class="rounded"
                                            alt="{{ $article->nom }}" style="width: 7rem"></td>

                                    <!-- Gamme -->
                                    <td class="border-end fs-5 text-center">{{ $article->gamme->nom }}</td>

                                    <!-- Prix -->
                                    <td class="border-end fs-5 text-center">{{ $article->prix }}€</td>

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



    <!-- ============================= SECTION CREATION GAMME ===================================== -->

    <!-- ===== LIENS VERS LES AUTRE SECTIONS ===== -->

    <div class="container pt-5 mt-5">
        <div class="text-center">
            <a href="#creation-article" class="btn btn-ghost-bo pt-3 m-3">Section articles</a>
            <a href="#liste-utilisateurs" class="btn btn-ghost-bo pt-3 m-3">Section utilisateurs</a>
            <a href="#liste-commandes" class="btn btn-ghost-bo pt-3 m-3">Section commandes</a>
        </div>
    </div>


    <!-- ===== TITRE ===== -->

    <section id="creation-gamme">
        <h3 class="text-center py-5">Créer une gamme</h3>
    </section>

    <!-- ===== CARD ===== -->

    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-md-5">
                <div class="tableau table-responsive card mb-5">


                    <!-- ===== CARD HEADER ===== -->

                    <div class="card-header border-bottom border-secondary" id="header_card_index">
                        <small>{{ __('Enregistrer une gamme') }}</small>
                    </div>


                    <!-- ===== CARD BODY ===== -->

                    <div class="card-body" id="body_card_index">


                        <!-- ===== FORMULAIRE CREATION GAMME ===== -->

                        <form method="POST" action="{{ route('gammes.store') }}" enctype="multipart/form-data">
                            @csrf


                            <!-- ===== SECTION NOM + IMAGE ===== -->


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

                                    <input type="file" name="image"
                                        class="form-control @error('image') is-invalid @enderror"
                                        placeholder="ex : image.jpg" value="{{ old('image') }}" autocomplete="image"
                                        required>

                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
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




    <!-- ========================== SECTION GESTION GAMMES =========================== -->

    <!-- ===== TITRE ===== -->

    <section id="gestion-gammes">
        <h3 class="text-center py-5">Liste des gammes</h3>
    </section>

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


                <!-- ===== BOUTON MOFIDIER ET SUPPRIMER ===== -->

                <div class="form-group d-flex justify-content-center">

                    <tbody>
                        @foreach ($gammes as $gamme)
                            <tr>
                                <td class="text-center fw-bolder">{{ $gamme->id }}</td>
                                <td class="text-center fw-bolder">{{ $gamme->nom }}</td>
                                <td class="d-flex justify-content-center">
                                    <img src="{{ asset('images/' . $gamme->image) }}" class="rounded"
                                        alt="{{ $gamme->nom }}" style="width: 7rem">
                                </td>


                                <!-- ===== BOUTON MOFIDIER ===== -->

                                <td class="text-center">
                                    <a href="{{ route('gammes.edit', $gamme) }}">
                                        <button class="btn btn-ajout mt-2">Modifier</button>
                                    </a>
                                </td>


                                <!-- ===== BOUTON SUPPRIMER ===== -->

                                <td class="text-center">
                                    <form action="{{ route('gammes.destroy', $gamme) }}" method="post">
                                        @method ("delete")
                                        @csrf
                                        <button type="submit" class="btn btn-suppr mt-2">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </div>

            </table>
        </div>

    </div>





    <!-- ============================== LISTE DES UTILISATEURS =================================== -->

    <!-- ===== LIENS VERS LES AUTRE SECTIONS ===== -->

    <div class="container pt-5 mt-5">
        <div class="text-center">
            <a href="#creation-article" class="btn btn-ghost-bo pt-3 m-3">Section articles</a>
            <a href="#creation-gamme" class="btn btn-ghost-bo pt-3 m-3">Section gammes</a>
            <a href="#liste-commandes" class="btn btn-ghost-bo pt-3 m-3">Section commandes</a>
        </div>
    </div>


    <!-- ===== TITRE ===== -->

    <section id="liste-utilisateurs">
        <h3 class="text-center py-5">Liste des utilisateurs</h3>
    </section>

    <div class="container">


        <!-- ===== TABLEAU ===== -->

        <div class="tableau table-responsive my-5">
            <table class="table table-striped mb-0">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prénom</th>
                        <th scope="col">Email</th>
                        <th scope="col">Téléphone</th>
                        <th scope="col">Supprimer</th>
                    </tr>
                </thead>

                <div class="form-group d-flex justify-content-center">

                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="text-center fw-bolder">{{ $user->id }}</td>
                                <td class="text-center fw-bolder">{{ $user->nom }}</td>
                                <td class="text-center fw-bolder">{{ $user->prenom }}</td>
                                <td class="text-center fw-bolder">{{ $user->email }}</td>
                                <td class="text-center fw-bolder">{{ $user->telephone }}</td>

                                <!-- ===== BOUTON SUPPRIMER ===== -->

                                <td class="text-center">
                                    <form action="{{ route('user.destroy', $user) }}" method="post">
                                        @method ("delete")
                                        @csrf
                                        <button type="submit" class="btn btn-suppr my-2">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </div>

            </table>
        </div>

    </div>


    <!-- ============================== LISTE DES COMMANDES =================================== -->


    <!-- ===== LIENS VERS LES AUTRE SECTIONS ===== -->

    <div class="container pt-5 mt-5">
        <div class="text-center">
            <a href="#creation-article" class="btn btn-ghost-bo pt-3 m-3">Section articles</a>
            <a href="#creation-gamme" class="btn btn-ghost-bo pt-3 m-3">Section gammes</a>
            <a href="#liste-utilisateurs" class="btn btn-ghost-bo pt-3 m-3">Section utilisateurs</a>
        </div>
    </div>


    <!-- ===== TITRE ===== -->

    <section id="liste-commandes">
        <h3 class="text-center py-5">Listes des commandes</h3>
    </section>


    <!-- ===== BOUCLE SUR LES COMMANDES DES USERS DANS UN TABLEAU ===== -->

    <div class="container-fluid p-5">


        <!-- ====== TABLEAU ===== -->

        <div class="row tableau table-responsive mb-5">
            <table class="table table-bordered bg-white mb-0">
                <thead class="text-center">
                    <tr>
                        <th scope="col">Numéro</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prénom</th>
                        <th scope="col">Prix</th>
                        <th scope="col">Date de commande</th>
                        <th scope="col">Date de retrait</th>
                        <th scope="col">Détails</th>
                    </tr>
                </thead>


                <!-- ====== INFORMATIONS COMMANDES ===== -->

                <tbody class="text-center">
                    @foreach ($commandes as $commande)
                        <tr>
                            <td scope="row">{{ $commande->numero }}</td>
                            <td>{{ $commande->user->nom }}</td>
                            <td>{{ $commande->user->prenom }}</td>
                            <td>{{ $commande->prix }} €</td>
                            <td>{{ date('d/m/Y', strtotime($commande->created_at)) }}</td>

                            <td
                                class="{{ strtotime($commande->date_retrait) < strtotime('+3 days') && strtotime($commande->date_retrait) >= strtotime('today') ? 'red-text' : '' }}">
                                <!-- code au dessus = la date de retrait s'affiche en rouge si elle est comprise entre 3 jours avant la date de retrait et jusqu'au jour de retrait -->

                                {{ date('d/m/Y', strtotime($commande->date_retrait)) }} à
                                {{ date('H', strtotime($commande->heure_retrait)) }}h
                                {{ date('i', strtotime($commande->heure_retrait)) }}
                            </td>

                            <td>
                                <!-- ====== BOUTON DU DETAIL DE LA COMMANDE ===== -->

                                <a class="link-offset-2 link-underline link-underline-opacity-0"
                                    href="{{ route('commandes.show', $commande) }}">
                                    Détail
                                </a><i class="fa-solid fa-magnifying-glass"></i>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

    </div>
@endsection
