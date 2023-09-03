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
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary(); // Champ pour l'adresse e-mail, utilisé comme clé primaire
            $table->string('token'); // Champ pour le jeton de réinitialisation de mot de passe
            $table->timestamp('created_at')->nullable(); // Champ pour la date et l'heure de création du jeton (pouvant être nul)
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('password_reset_tokens');
    }
};
