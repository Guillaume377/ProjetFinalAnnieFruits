<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
{
    return [
        'nom' => fake()->lastName(), // Nom de famille aléatoire
        'prenom' => fake()->firstName(), // Prénom aléatoire
        'email' => fake()->unique()->safeEmail(), // Adresse e-mail unique générée de manière aléatoire
        'email_verified_at' => now(), // Date et heure de vérification de l'e-mail actuelle
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // Mot de passe fictif (crypté)
        'telephone' => '0123456789', // Numéro de téléphone fictif
        'remember_token' => Str::random(10), // Jeton de rappel aléatoire
    ];
}


    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
