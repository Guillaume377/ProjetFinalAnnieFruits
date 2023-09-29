<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Middleware\IsAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('user/edit', ['user' => $user]) ;
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, User $user)
        {
            $request->validate([
                'nom'       => 'required|max:50',
                'prenom'    => 'required|max:50',
                'telephone' => 'required|digits:10',
                'email'     => 'required|min:6|max:50',
            ]);
    
            $user->nom = $request->input('nom');
            $user->prenom = $request->input('prenom');
            $user->telephone = $request->input('telephone');
            $user->email = $request->input('email');
    
            $user->save();
    
            return back()->with('message', 'Vos informations ont bien été modifiées');
        }
    

        public function updatePassword(Request $request, User $user)
    {
        $request->validate([
            'actuel_password' => 'required',
            'nouveau_password' => [

                // toutes versions de laravel confondues
                'required', 'confirmed',
                // ancienne syntaxe avant laravel 8
                // regex ..

                Password::min(8)    // minimum 8 caractères 
                    ->mixedCase()   // une minuscule, une majuscule 
                    ->letters()     // min 1 lettre
                    ->numbers()     // min 1 chiffre
                    ->symbols()     // caractères speciaux 
            ]
        ]);
        // On met en place les variables necessaires
        $user = User::find(Auth::user()->id);                      // l'utilisateur connecté
        $actuelPassword = $request->actuel_password;               // mot de passe actuel saisie ( en clair )
        $actuelPasswordHashed = $user->password;                   // mot de passe en base ( hashé)
        $nouveau_password = $request->nouveau_password;            // nouveau mot de passe saisie ( en clair )

        // test 1 : si mot de passe actuel saisie = mot de passe actuel bdd => ok, sinon => erreur
        if (Hash::check($actuelPassword, $actuelPasswordHashed)) {

            // test 2 si ancien et nouveau mdp différents => ok, sinon => erreur 
            if ($actuelPassword !== $nouveau_password) {
                $user->password = Hash::make($nouveau_password);    // on remplace l'ancien mdp par le nouveau mdp(hash) 
                $user->save();                                      // on sauvegarde le changement en bdd 
                return redirect()->back()->with('message', 'le mot de passe a bien été modifié');
            } else {
                return redirect()->back()->withErrors(['password_error', 'ancien et nouveau mot de passe identique']);
            }
            // cas d'erreur test 1: 
        } else {
            return redirect()->back()->withErrors(['password_error', 'mot de passe actuel saisie incorrect']);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
   

    public function destroy(User $user)
    {
        if (Auth::user()->id == $user->id) { 
            $user->delete();
            return redirect()->route('home')->with('message', 'Le compte a bien été supprimé');
        } else if 
            (Auth::user()->role_id == 2) { 
                $user->delete();
                return redirect()->route('backoffice')->with('message', 'Le compte a bien été supprimé');
        } else {
            return redirect()->back()->withErrors(['erreur' => 'Suppression du compte impossible']);
        }
    }




}
