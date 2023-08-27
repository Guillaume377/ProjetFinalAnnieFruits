@extends('layouts.app')

@section('title')
    Modifier une gamme - Annie fruits
@endsection


{{-- @section('content')
    <main class="container p-5">

        <h1 class="mb-5 pt-5">Modifier la gamme</h1>
        <div class="row text-center">

            <form class="formulaire col-4 mx-auto" action="{{ route('gammes.update', $gamme) }}" method="post">
                @csrf @method('put')
                <div class="form-group p-4">
                    <label for="content" class="text-dark">Nouveau nom</label>
                    <input required type="text" class="form-control" placeholder="modifier" name="nom"
                        value="{{ $gamme->nom }}" id="content">
                </div>
                <button type="submit" class="style_button btn btn-primary rounded-pill m-1">modifier</button>
            </form>
        </div>
    </main>
@endsection --}}