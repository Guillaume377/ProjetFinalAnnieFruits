@extends('layouts.app')

@section('title')
    Modifier gamme 
@endsection


@section('content')
   

    <!-- ====== SECTION MODIFICATION GAMME ====== -->


    <!-- ===== TITRE ===== -->

    <h1 class="title_h1 text-center mx-auto">Modifier la gamme " {{ $gamme->nom }} "</h1>
    
    <div class="container-fluid pt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-5">


                <!-- ===== CARD ===== -->

                <div class="tableau table-responsive card mb-5">


                    <!-- ===== CARD HEADER ===== -->

                    <div class="card-header border-bottom border-secondary" id="header_card_index">
                        <small>{{ __('Modifier la gamme') }}</small>
                    </div>


                    <!-- ===== CARD BODY ===== -->

                    <div class="card-body" id="body_card_index">


                        <!-- ===== FORMULAIRE CREATION GAMME ===== -->

                        <form method="POST" action="{{ route('gammes.update', $gamme) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- ===== SECTION NOM + IMAGE ===== -->

                            <div class="d-flex flex-column gap-2">


                                <!-- ===== NOM ===== -->

                                <div class="col mb-3">
                                    <label for="nom"
                                        class="col-form-label ms-1"><small>{{ __('Nom') }}</small></label>

                                    <input id="nom" type="text" placeholder="Nouveau nom"
                                        class="form-control @error('name') is-invalid @enderror" name="nom"
                                        value="{{ $gamme->nom }}" required>

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
                                        class="form-control @error('image') is-invalid @enderror">
                                        
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>


                            <!-- ===== BOUTON VALIDATION MODIFICATION ===== -->

                            <div class="row mt-4">
                                <div class="text-center mx-auto">
                                    <button type="submit" class="btn btn-ajout">
                                        <small>{{ __('Valider la modification') }}</small></button>
                                </div>
                            </div>

                        </form>

                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
