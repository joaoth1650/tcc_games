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
        $gamesOfMultiplayer = DashboardService::getOfMultiplayer();
        $gamesOfIndie = DashboardService::getOfIndie();
        $gamesOfAcao = DashboardService::getOfAcao();

        return Inertia::render('Dashboard', ['recomendados' => $recomendados, 'promocoes' => $promocoes, 'slides' => $slides, 'moreViews' => $moreViews, 'allGames' => $allGames, 'gamesOfTerror' => $gamesOfTerror, 'gamesOfMultiplayer' => $gamesOfMultiplayer, 'gamesOfIndie' => $gamesOfIndie, 'gamesOfAcao' => $gamesOfAcao]);
    }




}
