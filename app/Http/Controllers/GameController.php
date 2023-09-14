<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Inertia\Inertia;

class GameController extends Controller
{
    public function index()
    {   
        $games = Game::all();
        return Inertia::render('Games/IndexGames', ['games' => $games]);

    }
    public function show($id){
        $games = Game::find($id);
        return Inertia::render('Games/SingleGame', ['games' => $games]);
    }
}
