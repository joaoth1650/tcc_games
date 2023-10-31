<?php

namespace App\Services;

use App\Models\CategoriaGame;

class FiltroService
{
    public static function getFiltroForCategoria($categoriaId)
    {
        return CategoriaGame::query()->where('categoria_id', $categoriaId)->get();
    }
}
