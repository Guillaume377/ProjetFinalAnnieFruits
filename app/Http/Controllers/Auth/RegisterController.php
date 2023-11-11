<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nom' => ['required', 'string', 'max:50'],
            'prenom' => ['required', 'string', 'max:50'],
            'telephone' => ['required', 'digits:10'], //digits:10 = imposer le nombre de 10 chiffres
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'password' => [
                'required', 'confirmed',
                Password::min(8)    // minimum 8 caractères 
                    ->mixedCase()   // une minuscule, une majuscule 
                    ->letters()     // min 1 lettre
                    ->numbers()     // Min 1 chiffre
                    ->symbols()     // carctère speciaux 
            ],
            'politique' => 'required', 
            /*--> pour empêcher l’inscription d’une personne qui aurait rendu le bouton
            visible sans cocher la checkbox (en modifiant le code dans l’inspecteur)*/
        ],
        ['politique.required' => 'Veuillez cocher la case pour accepter la politique de confidentialité et les mentions légales']
        );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'telephone' => $data['telephone'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

}
