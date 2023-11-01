<?php

namespace App\Services;

use App\Models\Game;
use App\Models\Oferta;
use Illuminate\Support\Collection;

class DashboardService
{
    public static function getOferta(): Oferta | null
    {
        return Oferta::query()->where('id', 2)->first();
    }

    public static function getSlide(): Collection
    {
        return Game::query()->whereIn('id', [17, 5, 8, 4])->get();
    }

    public static function getMaisAcessados(): Collection
    {
        return Game::whereIn('id', [6, 5, 17, 14, 19])->inRandomOrder()->get();
    }

    public static function getJogos(): Collection
    {
        $ids = [1,2,3,4,5,6,8,10,11,12,13,14,15,16,17,18,19];
        return Game::whereIn('id', $ids)->inRandomOrder()->take(4)->get();
    }

}
