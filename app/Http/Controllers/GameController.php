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

    public function addFav(Request $request)
    {
        
        $validatedData = $request->validate([
            'game_id' => 'required|exists:games,id',
            'user_id' => 'required|exists:users,id',
            'prioridade' => 'required|boolean',
        ]);

        $favorito = new Favorito;
        $favorito->game_id = $validatedData['game_id'];
        $favorito->user_id = $validatedData['user_id'];
        $favorito->prioridade = $validatedData['prioridade'];
        $favorito->save();

        return redirect('/addFav')->with('success', 'Registrado :)');
    }
}
