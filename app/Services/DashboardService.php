<?php

namespace App\Services;

use App\Models\Oferta;

class DashboardService
{
  public static function getOferta (): Oferta | null
  {
    return Oferta::query()->where('id', 2)->first();
  }
}
