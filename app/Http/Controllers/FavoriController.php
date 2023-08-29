<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;

class FavoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Charger les favoris du user connecté pour les injecter dans la vue ('/favoris.index')
        
        //je récupère le user connecté dans une variable
        $user = User::find(Auth::user()->id); 

        // je charge les favoris du user connecté avec un eager loading
        $user->load('favoris.campagnes');

        // je retourne ces infos dans la view campagne pour les afficher
        return view ('favoris.index', ['user' => $user]);
                    
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, User $user)
    {
        // Si input= est un "hidden" et s'il est tout seul pas de validator
        // c'est le name de l'input qui est récupéré entre parenthèses 
        // je le récupère dans une variable
        $articleId = $request->input('articleId');

        // Je recupère le user connecté grace à son id
        $user = User::find(Auth::user()->id);
        
        // je vais inséré dans la table favoris : le user_id et l'article_id en question
        // $user -> la relation "favoris" (fonction dans le modèle -> attach (syntaxe laravel)
        // attach insère automatiquement  l'id du user + l'id de l'article fourni
        $user->favoris()->attach($articleId);

        return redirect()->back()->with ('message', 'Produit ajouté aux favoris !');
    }

        
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($articleId)
    {
        
        // Je recupère le user connecté grace à son id
        $user = User::find(Auth::user()->id);
        
        // je vais retirer dans la table favoris : le user_id et l'article_id en question
        // $user -> la relation "favoris" (fonction dans le modèle -> attach (syntaxe laravel)
        // detach  retire automatiquement  l'id du user + l'id de l'article fourni de la table favoris
        $user->favoris()->detach($articleId);

        return redirect()->back()->with ('message', 'Produit retiré des favoris !');
    }

}