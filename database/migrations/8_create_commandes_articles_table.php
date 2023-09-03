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
        Schema::create('commandes_articles', function (Blueprint $table) {
            $table->primary(['commande_id', 'article_id']); // Définition d'une clé primaire composite
            $table->integer('quantite'); // Champ pour la quantité d'articles dans la commande
            $table->timestamps(); // Champs de date de création et de mise à jour automatiques

            $table->foreignId('commande_id')->constrained(); // Clé étrangère vers la table des commandes
            $table->foreignId('article_id')->constrained()->onDelete('cascade'); // Clé étrangère vers la table des articles, avec une action de suppression en cascade définie à 'cascade'
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandes_articles');
    }
};
