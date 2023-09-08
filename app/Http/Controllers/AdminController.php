<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Gamme;
use App\Models\User;
use App\Models\Commande;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::with('gamme')->get();

        $gammes = Gamme::all();

        $users = User::all();

        // $commandes = Commande::all();

        $commandes = Commande::with('user')->get();


        return view('backoffice.index', [
            'articles'      => $articles,
            'gammes'        => $gammes,
            'users'         => $users,
            'commandes'     => $commandes,
        ]);

    }
    

}
