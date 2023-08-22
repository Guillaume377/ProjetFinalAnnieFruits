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
            $table->primary(['commande_id', 'article_id']);
            $table->integer('quantite');
            $table->timestamps();

            $table->foreignId('commande_id')->constrained();
            $table->foreignId('article_id')->constrained()->onDelete('cascade');
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
