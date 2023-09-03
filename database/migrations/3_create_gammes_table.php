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
        Schema::create('gammes', function (Blueprint $table) {
            $table->id(); // Champ ID auto-incrémenté
            $table->string('nom', 50); // Champ pour le nom de la gamme, une chaîne de caractères de maximum 50 caractères
            $table->string('image', 50); // Champ pour le nom de l'image associée à la gamme, une chaîne de caractères de maximum 50 caractères
            $table->timestamps(); // Champs de date de création et de mise à jour automatiques
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gammes');
    }
};
