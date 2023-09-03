<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gamme extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'image',
    ];

    //nom au pluriel car une gamme peut regrouper plusieurs articles
    //cardinalité 1,n
    public function articles()
    {
        return $this->hasMany(Article::class);
    }

}
