<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    

    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Champ ID auto-incrémenté
            $table->string('nom', 50); // Champ pour le nom, une chaîne de caractères de maximum 50 caractères
            $table->string('prenom', 50); // Champ pour le prénom, une chaîne de caractères de maximum 50 caractères
            $table->string('email', 50)->unique(); // Champ pour l'adresse e-mail, unique
            $table->timestamp('email_verified_at')->nullable(); // Champ pour la date de vérification de l'e-mail, pouvant être nul
            $table->string('password', 255); // Champ pour le mot de passe, pouvant stocker une chaîne de caractères de maximum 255 caractères
            $table->string('telephone', 10); // Champ pour le numéro de téléphone, une chaîne de caractères de maximum 10 caractères
            $table->rememberToken(); // Champ pour le jeton de rappel (Remember Me)
            $table->timestamps(); // Champs de date de création et de mise à jour automatiques
    
            $table->foreignId('role_id')->default(1)->constrained(); // Clé étrangère vers la table des rôles, avec une valeur par défaut de 1
        });
    }
    





    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
