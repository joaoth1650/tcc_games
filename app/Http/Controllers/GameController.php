<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Restricao;
use Illuminate\Http\Request;
use Inertia\Inertia;

class GameController extends Controller
{
    public function index()
    {   
        $games = Game::all();
        return Inertia::render('Games/IndexGames', ['games' => $games]);

    }
    public function show(Request $request){
        $id = $request->input('id');
        if(empty($id)){
            return redirect()->route('games.index');
        }

        $games = Game::query()
        ->with('ofertas', 'restricao')
        ->find($id);
        
        // dd($games->toArray());
        if(empty($games)){
            return redirect()->route('games.index');
        }

        return Inertia::render('Games/SingleGame', ['games' => $games]);
    }
}
