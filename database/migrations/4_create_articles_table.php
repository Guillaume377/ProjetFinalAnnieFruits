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
        Schema::create('articles', function (Blueprint $table) {
            $table->id(); // Champ ID auto-incrémenté
            $table->string('nom', 100); // Champ pour le nom de l'article, une chaîne de caractères de maximum 100 caractères
            $table->string('titre', 100); // Champ pour le titre de l'article, une chaîne de caractères de maximum 100 caractères
            $table->text('description'); // Champ pour la description de l'article, un texte libre
            $table->string('image', 50); // Champ pour le nom de l'image associée à l'article, une chaîne de caractères de maximum 50 caractères
            $table->float('prix'); // Champ pour le prix de l'article, de type float
            $table->enum('type_prix', array('pièce', 'kilo')); // Champ pour le type de prix, qui peut être 'pièce' ou 'kilo'
            $table->float('stock'); // Champ pour la quantité en stock de l'article, de type float
            $table->float('note')->nullable(); // Champ pour la note de l'article (éventuellement nul)
            $table->timestamps(); // Champs de date de création et de mise à jour automatiques

            $table->foreignId('gamme_id')->nullable()->constrained()->onDelete('set null');
            // Clé étrangère vers la table des gammes (peut être nulle), et action de suppression en cascade définie à 'set null'
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
