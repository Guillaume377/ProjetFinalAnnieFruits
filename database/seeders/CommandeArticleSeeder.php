<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;
use Illuminate\Support\Facades\DB;
use App\Models\Commande;

class CommandeArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    for ($i = 1; $i < 61; $i++) {
        // Pour chaque commande de 1 à 60
        DB::table('commandes_articles')->insert([
            'article_id' => rand(1, Article::count()), // Sélectionne aléatoirement un article existant
            'commande_id' => $i, // Utilise l'ID de commande actuel dans la boucle
            'quantite' => rand(1, 3), // Attribue une quantité aléatoire (entre 1 et 3)
        ]);
    }
}

}
