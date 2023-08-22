<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Commande>
 */
class CommandeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            
                'numero' => $this->faker->randomNumber(7, true),
                'prix' => $this->faker->randomFloat(2, 10, 80),
                'user_id' =>rand(1, User::count()),
            ];
    }
}
