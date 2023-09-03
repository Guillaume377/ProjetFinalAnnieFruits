<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index(); // Champ pour l'adresse e-mail, avec un index pour des recherches plus rapides
            $table->string('token'); // Champ pour le jeton de réinitialisation de mot de passe
            $table->timestamp('created_at')->nullable(); // Champ pour la date et l'heure de création du jeton (pouvant être nul)
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('password_resets');
    }
};
