<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Article;

class FavoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    for ($i = 1; $i < 31; $i++) {
        // Pour chaque utilisateur de 1 à 30
        DB::table('favoris')->insert([
            'article_id' => rand(1, Article::count()), // Sélectionne aléatoirement un article existant
            'user_id' => $i, // Utilise l'ID d'utilisateur actuel dans la boucle
        ]);
    }
}

}
