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
        Schema::create('roles', function (Blueprint $table) {
            $table->id(); // Champ ID auto-incrémenté
            $table->string('role', 20); // Champ pour le rôle, une chaîne de caractères de maximum 20 caractères
            $table->timestamps(); // Champs de date de création et de mise à jour automatiques
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
