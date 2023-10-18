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

        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('restricao_id');
            $table->foreign('restricao_id')->references('id')->on('restricao');
            $table->string('nome', 60)->index();
            $table->float('preco');
            $table->text('descricao');
            $table->string('video', 100);
            $table->string('imagem_esquerda', 50);
            $table->string('imagem_direita', 50);
            $table->string('background', 50);
            $table->string('standart1', 50);
            $table->string('standart2')->nullable();
            $table->string('standart3')->nullable();
            $table->string('standart4')->nullable();
            $table->string('imagem_principal');
            $table->bigInteger('vizualicoes')->default(0);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
