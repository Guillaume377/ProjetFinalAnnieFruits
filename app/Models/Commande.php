<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero',
        'prix',
    ];

    //nom au singulier car une commande peut être associée qu'à un user
    // cardinalité 1,1
    public function user()
    {
        return $this->belongsTo(User::class);
    }

     //nom au pluriel car plusieurs articles peuvent être associés à plusieurs commandes
    // cardinalité 1,n
    public function articles()
    {
        //withPivot(array('quantite')) = car on rajoute 1 champ supplémentaire : quantite
        return $this->belongsToMany(Article::class,'commandes_articles')->withPivot(array('quantite')); //ou [quantite] au lieu de array('quantite')
    }
}
