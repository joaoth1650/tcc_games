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
    public function show(Request $request){
        $id = $request->input('id');
        if(empty($id)){
            return redirect()->route('games.index');
        }

        $games = Game::with('ofertas')->find($id);
        if(empty($games)){
            return redirect()->route('games.index');
        }

        // dd($games->toArray());
        return Inertia::render('Games/SingleGame', ['games' => $games]);
    }
}
