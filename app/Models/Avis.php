<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avis extends Model
{
    use HasFactory;

    protected $fillable = [
        'commentaire',
        'note',
    ];

    //nom au singulier car un avis peut être associé qu'à un user
    // cardinalité 1,1
    public function user()
    {
        return $this->belongsTo(User::class);
    }

     //nom au singulier car un avis peut être associé qu'à un article
    // cardinalité 1,1
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
