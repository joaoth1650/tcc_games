<?php

namespace App\Http\Controllers;

use App\Services\DashboardService;
use App\Services\RecomendadoService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $recomendados = RecomendadoService::getRecomendados();
        $promocoes = DashboardService::getOferta();
        $slides = DashboardService::getSlide();
        $moreViews = DashboardService::getMaisAcessados();
        $allGames = DashboardService::getJogos();
        $gamesOfTerror = DashboardService::getOfTerror();

        return Inertia::render('Dashboard', ['recomendados' => $recomendados, 'promocoes' => $promocoes, 'slides' => $slides, 'moreViews' => $moreViews, 'allGames' => $allGames, 'gamesOfTerror' => $gamesOfTerror]);
    }




}
