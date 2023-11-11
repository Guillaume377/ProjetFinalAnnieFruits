<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\User;
use App\Models\Article;
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

        //je fais un eager loading pour récupérer les commandes de mon user connecté
        $user->load('commandes');

        //je retourne les commandes associées au user dans la vue commandes/index
        return view('commandes.index',['user' => $user]);
    }


    public function store(Request $request)
    {
        // Créer et sauvegarder la commande
        $commande = new Commande();
        $commande->numero = rand(1000000, 9999999);
        $commande->prix = session('totalCommande');
        $commande->date_retrait = session('date_retrait');
        $commande->heure_retrait = session('heure_retrait');
        $commande->user_id = Auth::user()->id;

        // Sauvegarder la commande articles
        $commande->save();
        
        // Vider la session créneau après la sauvegarde commande 
        //(pour obliger le user à valider le créneau horaire après chaque commande)
        session()->forget(['date_retrait', 'heure_retrait']);

        // je récupère le panier (stocké dans une variable), et je boucle dessus
        $panier = session()->get("panier");

        foreach ($panier as $article) {

            // j'insère chacun de ses articles dans commande_articles (syntaxe attach)
            $commande->articles()->attach($article['id'], ['quantite' => $article['quantite']]);

            // je fais baisser le stock de chaque article (stock actuel - stock commandé)
            $articleInDatabase = Article::find($article['id']);

            if ($article['type_prix'] == 'kilo') {
                $articleInDatabase->stock -= $article['quantite'] / 1000;
            } else {
                $articleInDatabase->stock -= $article['quantite'];
            }
            $articleInDatabase->save();
        }
        // Redirection et afficher message de succès
        return redirect()->route('emptyAfterOrder');
    }


    /**
     * Display the specified resource.
     */
    public function show(Commande $commande)
    {
        //je charge les articles de la commande via un eager loading
        $commande->load('articles');

        // je les retourne dans une page de détail et j'injecte les données de ma variable "$commande"
        // avec la fonction compact('commande')
        return view('commandes.detail', compact('commande'));
    }
}
