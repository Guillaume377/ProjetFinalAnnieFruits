@extends('layouts.app')

@section('title')
    Mes commandes - Annie fruits
@endsection

@section('content')
    <!-- ===== TITRE PAGE ===== -->

    <h1 class="title_h1 text-center mx-auto">Mes commandes</h1>


    <!-- ===== BOUCLE SUR LES COMMANDES DU USER CONNECTE DANS UN TABLEAU ===== -->

    <div class="container-fluid p-5">


        <!-- ====== TABLEAU ===== -->

        <div class="row tableau table-responsive mb-5">
            <table class="table table-bordered bg-white mb-0">
                <thead class="text-center">
                    <tr>
                        <th scope="col">Numéro</th>
                        <th scope="col">Prix</th>
                        <th scope="col">Date de commande</th>
                        <th scope="col">Date de retrait</th>
                        <th scope="col">Détails</th>
                    </tr>
                </thead>


                <!-- ====== ELEMENTS DU TABLEAU ===== -->

                <tbody class="text-center">
                    @foreach ($user->commandes as $commande)
                        <tr>
                            <td scope="row">{{ $commande->numero }}</td>
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
