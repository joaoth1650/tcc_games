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
        
        return Inertia::render('Dashboard', ['recomendados' => $recomendados, 'promocoes' => $promocoes]);
    }




}
