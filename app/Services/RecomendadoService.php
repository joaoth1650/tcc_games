<?php


namespace App\Services;
use App\Models\Game;
use App\Models\Oferta;

class RecomendadoService
{
  public static function getRecomendados ()
  {
    return Game::query()->whereIn('id', [1, 2, 3,4,5,6])->get();
  }
}

