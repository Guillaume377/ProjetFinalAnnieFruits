<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Article;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AvisFActoryFactory extends Factory
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
            'note' =>$this->faker->numberBetween(1, 5),
            'user_id' =>rand(1, User::count()),
            'article_id' =>rand(1, Article::count()),
        ];
    }
}
