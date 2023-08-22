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
            DB::table('commandes_articles')->insert([
                'article_id' => rand(1, Article::count()),
                'commande_id' => $i,
                'quantite' => rand(1, 10),
            ]);
        }
    }
}
