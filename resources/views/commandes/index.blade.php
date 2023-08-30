@extends('layouts.app')

@section('content')

<!--TITRE PAGE-->
<h1 class="title_h1 text-center mx-auto">Mes commandes</h1>


    <!--BOUCLE SUR LES COMMANDES DU USER CONNECTE DANS UN TABLEAU-->
    <div class="container-fluid p-5">
        @foreach ($user->commandes as $commande)
            <div class="row table-responsive shadow mb-3"">
                <table class=" table table-bordered p-5">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">Numéro</th>
                            <th scope="col">Prix</th>
                            <th scope="col">Date</th>
                            <th scope="col">Détails</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <th scope="row">{{ $commande->numero }}</th>
                            <td>{{ $commande->prix }} €</td>
                            <td>{{ date('d/m/y', strtotime($commande->created_at)) }}</td>
                            <td>
                                <!--BOUTON DU DETAIL DE LA COMMANDE-->
                                <a class="link-offset-2 link-underline link-underline-opacity-0"
                                    href="{{ route('commandes.show', $commande) }}">
                                    Détail 
                                </a><i
                                    class="fa-solid fa-magnifying-glass"></i></td>
                        </tr>
                </table>
            </div>
        @endforeach
    </div>
@endsection
