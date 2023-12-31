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

        Schema::create('favoritos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('game_id');
            $table->foreign('game_id')->references('id')->on('games');
            $table->bigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->boolean('prioridade');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favoritos');
    }
};
