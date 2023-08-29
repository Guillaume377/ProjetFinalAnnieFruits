<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Je récupère le user connecté dans une variable
        $user = User::find(Auth::user()->id);

        //je récupère les commandes de mon user connecté dans une variable 
        $user->load('commandes');


        // Autre façon pour récupérer la commande du user connecté
        //$commandes = Commande::where('user_id', '=', Auth::user()->id)->get();


        //je retourne les commandes associées au user dans la vue commandes/index
        return view('commandes.index', ['user' => $user]);
    }


    public function store(Request $request)
    {
        // Créer et sauvegarder la commande

        $commande = new Commande();
        $commande->numero = rand(1000000,9999999);
        $commande->prix = session('totalapayer');
        $commande->user_id = Auth::user()->id;
        $commande->save();

        // Sauvegarder la commande articles

          // je récupère le panier (stocké dans une variable), et je boucle dessus
          $panier = session()->get("panier");

          foreach ($panier as $article) {
  
              // j'insère chacun de ses articles dans commande_articles (syntaxe attach)
              $commande->articles()->attach($article['id'], ['quantite' => $article['quantite']]);
          }

        // Redirection et afficher message de succès

        return redirect()->route('emptyAfterOrder');

    } 


    /**
     * Display the specified resource.
     */
    public function show(Commande $commande)
    {
        //je charge les articles de la commande
        //grace à Models/Commande qui lie cette table par la FK à la table articles
        $commande->load('articles');
    
        // je les retourne dans une page de détail et j'injecte les données de ma variable "$commande"
        // avec la fonction compact('commande')
        return view('commandes.detail', compact('commande'));
    }

}
