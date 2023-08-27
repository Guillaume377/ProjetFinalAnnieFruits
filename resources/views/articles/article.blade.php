@extends('layouts.app')


<!-- formulaire ajout produit dans le panier-->

<form method="POST" action="{{ route('panier.add', 1) }}" class="form-inline d-inline-block" >
	{{ csrf_field() }}
	<input type="number" name="quantite" placeholder="Quantité ?" class="form-control mr-2" >
    {{-- value="{{ isset(session('panier')[$article->id]) ? session('panier')[$article->id]['quantite'] : null }}"> --}}
    {{-- <!-- value = afficher la quantité du produit s'il se trouve au panier--> --}}
    
	<button type="submit" class="ajoutPanier btn" >+ Ajouter au panier</button>             
</form>




























