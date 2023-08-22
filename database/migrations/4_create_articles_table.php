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
            $table->id();
            $table->string('nom', 100);
            $table->string('description', 255);
            $table->text('description_detaillee');
            $table->string('image', 50);
            $table->float('prix');
            $table->enum ('type_prix',array('pièce','kilo'));
            $table->float('note');
            $table->integer('stock');
            $table->timestamps();

            $table->foreignId('gamme_id')->nullable()->constrained()->onDelete('set null');
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
