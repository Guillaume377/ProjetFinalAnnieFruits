<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gamme;

class GammeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gammes = Gamme::with('articles')->get();

        return view('gammes/index', [
            'gammes' => $gammes,
        ]);
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) // $request c'est des données qui viennent du formulaire
    {                                      //$request['content'] = "Salut les gars"
        //1) On valide les champs en précisant les critères attendus
        $request->validate([
            //'name de l'input-> [critères]
            'nom' => 'required|min:5|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        //2) Sauvegarde du message => Va lancer un insert into en SQL
                // 3 syntaxe possibles pour accéder au contenu de $request
        $gamme= Gamme::create($request->all());
        
        // ([                                  
        //     'nom' => $request->nom
        // ]);

        // on fait appel au Helper pour charger l'image
        $gamme->image = isset($request['image']) ? uploadImage($request['image']) : $gamme->image;
        
        $gamme->save();

        //3) On redirige vers backoffice avec un message de succès
        return redirect()->route('backoffice')->with('message', 'Gamme créée avec succès');
    }

    
    
    /**
     * Affichage de la page catalogue des articles
     */
    public function show(Gamme $gamme)
    {
       
        // on charge les articles de la gamme via un eager loading
        $gamme->load('articles');


        return view("gammes/show", ['gamme' => $gamme]);
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gamme $gamme)
    {
      
        return view('gammes/edit', ['gamme' => $gamme]);
    
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gamme $gamme) 
    {
            $request->validate([
                'nom' => 'required|min:5|max:50',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
    
            //Sauvegarde du message => Va lancer un insert into en SQL
            $gamme->update($request->all());
    

            // On fait appel au Helper pour charger l'image
            $gamme->image = isset($request['image']) ? uploadImage($request['image']) : $gamme->image;
        
            $gamme->save();

            // On redirige vers l'accueil avec un message de succès
            return redirect()->route('backoffice')->with('message', 'Gamme modifiée avec succès'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gamme $gamme)
    {
        $gamme->delete();
        return redirect()->route('backoffice')->with('message', 'Gamme supprimée avec succès');
    }
}
