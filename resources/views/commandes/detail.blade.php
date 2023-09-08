@extends('layouts.app')

@section('content')


    <!-- ========== TITRE DE PAGE : NUMERO DE LA COMMANDE ========== -->

    <h1 class="title_h1 text-center mx-auto">Détail de la commande</h1>
    <p class="text-center pt-5 fs-1">n° {{ $commande->numero }} </p>
    <!--MONTANT-->
    <p class="text-center pt-5 fs-3">Montant : <strong>{{ $commande->prix }} €</strong></p>


    <!-- ========== DATES DE COMMANDE =========== -->

    <p class="text-center pt-3 fs-3">Date de commande : <strong>
            {{ date('d/m/Y', strtotime($commande->created_at)) }} à
            {{ date('H', strtotime($commande->created_at)) }}h
            {{ date('i', strtotime($commande->created_at)) }}</strong></p>

    <p class="text-center pt-3 fs-3 {{ strtotime($commande->date_retrait) < strtotime('+3 days') && strtotime($commande->date_retrait) >= strtotime('today') ? 'red-text' : '' }}">Date de retrait :
            <!-- code au dessus = la date de retrait s'affiche en rouge si elle est comprise entre 3 jours avant la date de retrait et jusqu'au jour de retrait -->
            
            {{ date('d/m/Y', strtotime($commande->date_retrait)) }} à
            {{ date('H', strtotime($commande->heure_retrait)) }}h
            {{ date('i', strtotime($commande->heure_retrait)) }}
        
        </p>


    <!-- ========== AFFICHAGE ========== -->

    <div class="container-fluid p-5">
        @php
            $totalsansfrais = 0;
        @endphp
        
            <div class="tableau table-responsive  my-5">
                <table class=" table table-bordered table-success table-striped bg-white mb-0 fs-5">
                    <thead class="text-center">


                        <!-- ========== EN-TETE TABLEAU ========== -->

                        <tr>
                            <th scope="col" >Article</th>
                            <th scope="col" >Prix unitaire</th>
                            <th scope="col" >Quantité</th>
                            <th scope="col" >Prix</th>
                        </tr>

                    </thead>


                    <!-- ========== ELEMENTS TABLEAU ========== -->

                    <tbody class="text-center">

                        @foreach ($commande->articles as $article)
                        <tr>
                            <td scope="row">{{ $article->nom }}</td>
                            <td>{{ $article->prix }} €</td>
                            <td>{{ $article->pivot->quantite }}
                                @if ($article['type_prix'] == 'pièce')
                                unités
                                @else
                                grammes
                                @endif
                            
                            
                            </td> <!-- "->pivot" : pour récupérer un élement d'une table intermédiaire -->
                            
                            <td>                        
                            @if ($article['type_prix'] == 'pièce')
                                @php $prixLigne = $article['prix'] * $article->pivot['quantite'];
                                    echo number_format($prixLigne, 2, ',', ' ') . '€';
                                @endphp
                            @else
                                @php $prixLigne = ($article['prix'] * $article->pivot['quantite']) / 1000;
                                    echo number_format($prixLigne, 2, ',', ' ') . '€';
                                @endphp
                            @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

    </div>
@endsection
