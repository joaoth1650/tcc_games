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
        Schema::disableForeignKeyConstraints();

        Schema::create('oferta', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('game_id');
            $table->foreign('game_id')->references('id')->on('games');
            $table->float('preco');
            $table->string('imagem');
            $table->text('descricao');
            $table->string('nome', 60);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('oferta');
    }
};
