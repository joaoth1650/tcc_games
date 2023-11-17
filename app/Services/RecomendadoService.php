<?php


namespace App\Services;
use App\Models\Game;
use App\Models\Oferta;
use Illuminate\Support\Collection;


class RecomendadoService
{
  public static function getRecomendados (): Collection
  {
    return Game::query()->whereIn('id', [22, 8, 3])->get();
  }
}

