<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Gamme;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        $gammes = Gamme::All();


        return view('backoffice.index', [
            'articles'      => $articles,
            'gammes'        => $gammes,
        ]);

    }
    

}
