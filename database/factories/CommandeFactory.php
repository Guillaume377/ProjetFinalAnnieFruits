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
            
                'numero' => $this->faker->randomNumber(7, true), // génère un numéro aléatoire de 7 chiffres ou moins
                'prix' => $this->faker->randomFloat(2, 10, 80), // génère un prix aléatoire avec deux décimales, compris entre 10 et 80
                'date_retrait' => $this->faker->dateTimeBetween('-1 week', '+1 week'), // génère une date et une heure aléatoires situées dans la plage d'une semaine (7 jours) avant ou après la date actuelle
                'heure_retrait'=> $this->faker->time('H:i'), // génère une heure aléatoire au format 'HH:MM'
                'user_id' =>rand(1, User::count()), // génère un ID d'utilisateur aléatoire entre 1 et le nombre total d'utilisateurs dans le modèle User
            ];
    }
}
