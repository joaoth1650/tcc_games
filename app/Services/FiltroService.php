<?php

namespace App\Services;

use App\Models\CategoriaGame;
use App\Models\Game;

class FiltroService
{
    public static function getFilterForCategoria($categoriaId)
    {
        return CategoriaGame::query()
            ->where('categoria_id', $categoriaId)
            ->join('games', 'categoria_games.game_id', '=', 'games.id')
            ->get();
    }
    public static function getFilterForPreco($minPrice, $maxPrice)
    {
        return Game::whereBetween('preco', [$minPrice, $maxPrice])->get();
    }
    public static function getFilterForNome($name)
    {
        return Game::where('nome', 'like', '%' . $name . '%')->get();
    }
}
