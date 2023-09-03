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
        Schema::create('commandes', function (Blueprint $table) {
            $table->id(); // Champ ID auto-incrémenté
            $table->string('numero', 7); // Champ pour le numéro de commande, une chaîne de caractères de 7 caractères
            $table->float('prix'); // Champ pour le prix de la commande, de type float
            $table->date('date_retrait'); // Champ pour la date de retrait de la commande, de type date
            $table->time('heure_retrait', 4); // Champ pour l'heure de retrait de la commande, de type time
            $table->timestamps(); // Champs de date de création et de mise à jour automatiques
    
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            // Clé étrangère vers la table des utilisateurs (peut être nulle), et action de suppression en cascade définie à 'set null'
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandes');
    }
};
