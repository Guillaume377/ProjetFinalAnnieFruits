<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Gamme;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // on renvoie la vue articles/index (catalogue) 
        // on y injecte la liste des articles, que l'on récupère simultanément
        return view('articles/index', [
            'articles' => Article::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        // on met en place un validateur avec les critères attendus
        $request->validate([
            'nom' => 'required|string|min:2|max:30',
            'description' => 'required|min:10|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'prix' => 'required',
            'stock' => 'required',
            'type_prix' => 'required|in:piece,kilo',
            'gamme_id' => 'required'
        ]);

        // on sauvegarde l'article en base de données en se basant sur les champs du formulaire
        $article= Article::create($request->all());
        
        // on fait appel au Helper pour charger l'image
        $article->image = isset($request['image']) ? uploadImage($request['image']) : $article->image;
        
        $article->save();

        // on redirige vers l'accueil du back-office
        return back()->with('message', 'Article créé avec succès');
    }

    /**
     * Display the specified resource.
     */

    /* Affichage du détail article */

    public function show(Article $article)
    {

        // on charge les avis via un eager loading
        $article->load('avis');


        return view("articles/show", ['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('articles/edit', [
            'article' => $article,
            'gammes' => Gamme::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'nom' => 'required|string|min:2|max:30',
            'description' => 'required|min:10|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'prix' => 'required',
            'stock' => 'required',
            'type_prix' => 'required',
            'gamme_id' => 'required'
        ]);


        $article->update($request->except('_token'));
        
        // on fait appel au Helper pour charger l'image
        $article->image = isset($request['image']) ? uploadImage($request['image']) : $article->image;

        $article->save();


        return redirect()->route('backoffice')->with('message', 'L\'article a bien été modifié');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('backoffice')->with('message', 'L\'article a bien été supprimé');
    }
}
