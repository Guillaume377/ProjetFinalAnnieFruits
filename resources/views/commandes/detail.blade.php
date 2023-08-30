@extends('layouts.app')

@section('content')
    <!--TITRE DE PAGE : NUMERO DE LA COMMANDE-->
    <h1 class="title_h1 text-center mx-auto">Détail de la commande</h1>
    <p class="text-center pt-5 fs-1">n° {{ $commande->numero }} </p>
    <!--MONTANT-->
    <p class="text-center pt-5 fs-3">Montant : <strong>{{ $commande->prix }} €</strong></p>


    <!--DATES DE COMMANDE-->
    <p class="text-center pt-3 fs-3">Date : <strong>
            {{ date('d/m/y', strtotime($commande->created_at)) }} à
            {{ date('H', strtotime($commande->created_at)) }}h
            {{ date('i', strtotime($commande->created_at)) }}</strong></p>


    <!--CONDITIONS D AFFICHAGE EN FONCTION DE L EXISTENCE DE REDUCTIONS-->
    <div class="container-fluid p-5">
        @php
            $totalsansfrais = 0;
        @endphp
        @foreach ($commande->articles as $article)
            <div class="table-responsive shadow mb-3">

                <table class=" table table-bordered  p-5 fs-5">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">Article</th>
                            <th scope="col">Prix unitaire</th>
                            <th scope="col">Description</th>
                            <th scope="col">Quantité</th>
                            <th scope="col">Prix</th>
                        </tr>
                    </thead>

                    <tbody class="text-center">
                        <tr>
                            <th scope="row">{{ $article->nom }}</th>
                            <td>{{ $article->prix }} €</td>
                            <td>{{ $article->description }}</td>
                            <td>{{ $article->quantite }}</td>

                            @php
                                $total = $article->prix * $article->quantite;
                            @endphp
                            <td>{{ number_format($total, 2, ',', ' ') }} €</td>

                        </tr>
                    </tbody>
                </table>
            </div>

            @php
                $totalsansfrais += $total;
            @endphp
        @endforeach

    </div>
@endsection
