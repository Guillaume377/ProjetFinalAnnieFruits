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
        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->id(); // Champ ID auto-incrémenté
            $table->morphs('tokenable'); // Champ polymorphique pour lier le jeton à divers modèles
            $table->string('name'); // Champ pour le nom du jeton
            $table->string('token', 64)->unique(); // Champ pour le jeton lui-même, défini comme unique
            $table->text('abilities')->nullable(); // Champ pour les capacités ou autorisations associées au jeton (éventuellement nul)
            $table->timestamp('last_used_at')->nullable(); // Champ pour la date et l'heure de la dernière utilisation du jeton (éventuellement nul)
            $table->timestamp('expires_at')->nullable(); // Champ pour la date et l'heure d'expiration du jeton (éventuellement nul)
            $table->timestamps(); // Champs de date de création et de mise à jour automatiques
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_access_tokens');
    }
};
