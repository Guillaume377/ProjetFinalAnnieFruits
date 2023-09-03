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
        Schema::create('avis', function (Blueprint $table) {
            $table->id(); // Champ ID auto-incrémenté
            $table->timestamps(); // Champs de date de création et de mise à jour automatiques
            $table->text('commentaire', 1200); // Champ pour le commentaire, pouvant stocker un texte de maximum 1200 caractères
            $table->integer('note'); // Champ pour la note, de type entier

            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // Clé étrangère vers la table des utilisateurs (cascade sur suppression)

            $table->foreignId('article_id')->constrained()->onDelete('cascade');
            // Clé étrangère vers la table des articles (cascade sur suppression)
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avis');
    }
};
