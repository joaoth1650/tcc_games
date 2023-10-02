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

        Schema::create('item_carrinho', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('oferta_id');
            $table->foreign('oferta_id')->references('id')->on('oferta');
            $table->bigInteger('carrinho_id');
            $table->foreign('carrinho_id')->references('id')->on('carrinhos');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_carrinho');
    }
};
