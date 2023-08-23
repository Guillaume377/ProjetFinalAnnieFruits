<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'password',
        'telephone',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    //nom au pluriel car un user peut avoir plusieurs commandes
    // cardinalité 0,n

    public function commandes()
    {
        return $this->hasMany(Commande::class);
    }

    //nom au pluriel car un user peut avoir plusieurs avis
    // cardinalité 0,n

    public function avis()
    {
        return $this->hasMany(Avis::class);
    }

    //nom au pluriel car un user peut avoir plusieurs articles en favoris
    // cardinalité 0,n
    // "belongsToMany" car la table "favoris" est une table intermédiaire

    public function favoris()
    {
        return $this->belongsToMany(Article::class,'favoris');
    }

    //nom de la fonction au singulier car 1 seul rôle en relation
    // cardinalité 1,1
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function isAdmin()
    {
        //return $this->role == "admin";
        return $this->role_id == 2;
    }


    public function isInFavorites(Article $article)
    {
        return $article->users()->where('user_id', $this->id)->exists();
    }

}
