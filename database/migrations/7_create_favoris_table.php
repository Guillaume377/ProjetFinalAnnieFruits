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
        Schema::create('favoris', function (Blueprint $table) {
            $table->primary(['user_id', 'article_id']); // Définition d'une clé primaire composite
            $table->timestamps(); // Champs de date de création et de mise à jour automatiques

            $table->foreignId('article_id')->constrained()->onDelete('cascade');
            // Clé étrangère vers la table des articles, avec une action de suppression en cascade définie à 'cascade'

            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // Clé étrangère vers la table des utilisateurs, avec une action de suppression en cascade définie à 'cascade'
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favoris');
    }
};
