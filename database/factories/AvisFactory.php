<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Article;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AvisFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'commentaire' =>$this->faker->paragraph(),
            'note' =>$this->faker->numberBetween(3, 5), // notes comprises entre 3 et 5
            'user_id' =>rand(1, User::count()), // génère un ID d'utilisateur aléatoire entre 1 et le nombre total d'utilisateurs dans le modèle User
            'article_id' =>rand(1, Article::count()), // génère un ID d'article aléatoire entre 1 et le nombre total d'articles dans le modèle Article
        ];
    }
}
