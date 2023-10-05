<?php

namespace App\Services;

use App\Models\Oferta;

class OfertaService
{
  public static function getOferta ($ofertaId): Oferta | null
  {
    return Oferta::query()->find($ofertaId);
  }
}
