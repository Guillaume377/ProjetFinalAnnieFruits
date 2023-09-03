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
        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id(); // Champ ID auto-incrémenté
            $table->string('uuid')->unique(); // Champ pour l'identifiant unique de la tâche échouée
            $table->text('connection'); // Champ pour la connexion associée à la tâche
            $table->text('queue'); // Champ pour la file d'attente associée à la tâche
            $table->longText('payload'); // Champ pour les données de la tâche (payload)
            $table->longText('exception'); // Champ pour les informations sur l'exception qui a provoqué l'échec
            $table->timestamp('failed_at')->useCurrent(); // Champ pour la date et l'heure de l'échec, avec utilisation de la date et de l'heure actuelles
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('failed_jobs');
    }
};
