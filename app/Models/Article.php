<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'titre',
        'description',
        'image',
        'prix',
        'type_prix',
        'stock',
        'note',
        'gamme_id'
    ];

    //nom au pluriel car plusieurs articles peuvent être associés à une commande
    // cardinalité 0,n
    public function commandes(){
        return $this->belongsToMany(Commande::class, 'commandes_articles')->withPivot('quantite');
    }


    // relation avec les utilisateurs qui mettent l'article en favori
    // on précise le nom table intermédiaire : favoris (= users_articles)

    //nom au pluriel car plusieurs articles peuvent être mis dans les favoris
    // cardinalité 0,n

    public function users()
    {
        return $this->belongsToMany(User::class,'favoris');

    }
    

    //nom au pluriel car plusieurs articles peuvent être associé à un avis
    // cardinalité 0,n
    public function avis() 
    {
        return $this->hasMany(Avis::class);
    }

    //nom au singulier car article ne peut appartenir qu'à une seule gamme
    // // cardinalité 1,1
    public function gamme() 
    {
        return $this->belongsTo(Gamme::class);
    } 
}
