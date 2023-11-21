<?php

namespace App\Http\Controllers;

use App\Models\Favorito;
use App\Models\Game;
use App\Services\FiltroService;
use App\Services\RecomendadoService;
// use App\Models\Restricao;
use Illuminate\Http\Request;
use Inertia\Inertia;

class GameController extends Controller
{
    public function index(Request $request)
    {
        $minPrice = $request->input('minPrice');
        $maxPrice = $request->input('maxPrice');

        if (!empty($minPrice) && !empty($maxPrice)) {
            $games = FiltroService::getFilterForPreco($minPrice, $maxPrice);
        } else {
            $games = Game::all();
        }


        if (empty(auth()->user())) {
            return Inertia::render('Games/IndexGames', ['games' => $games]);
        }

        $favoritoslist = Favorito::query()->where('user_id', auth()->user()->id)->get();
        $favoritoslist = $favoritoslist->pluck('game_id')->toArray();
        // dd($favoritoslist);

        return Inertia::render('Games/IndexGames', ['games' => $games, 'favoritoslist' => $favoritoslist]);
    }

    public function show(Request $request)
    {
        $id = $request->input('id');
        if (empty($id)) {
            return redirect()->route('games.index');
        }

        $games = Game::query()
            ->with('ofertas', 'restricao')
            ->find($id);

        // dd($games->toArray());
        if (empty($games)) {
            return redirect()->route('games.index');
        }

        return Inertia::render('Games/SingleGame', ['games' => $games]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'game_id' => 'required|exists:games,id',
            // 'user_id' => 'required|exists:users,id', // passar dados sigiloso de forma que não fique amostrar para o usuario auth()->user()->id;
            'prioridade' => 'boolean',
        ]);

        $favorito = new Favorito();
        $favorito->game_id = $validatedData['game_id'];
        $favorito->user_id = auth()->user()->id;
        $favorito->prioridade = $validatedData['prioridade'] ?? false;
        if ($favorito->save()) {
            return response()->json([], 201);
        }

        return response()->json([
            'errors' => "Não foi possivel cadastrar o favorito"
        ], 404);
    }

    public function showFavorite(Request $request)
    {
        $id = $request->input('id');
        if (empty(auth()->user())) {
            return redirect()->route('games.index');
        }

        $favoritos = Favorito::query()
            ->where('user_id', auth()->user()->id)
            ->with('games')
            ->get();

        $games = Game::query()
            ->with('ofertas', 'restricao')
            ->find($id);

        $data = [
            'favoritos' => $favoritos,
            'games' => $games,
        ];

        return inertia('Games/Wishlist', $data);
    }
    public function destroyFavorite(Request $request)
    {
        $id = $request->input('game_id');
        if (empty($id)) {
            return response()->json(["Esse jogo não foi encontrado na sua wishlist"], 404);
        }
        Favorito::query()
            ->where('user_id', auth()->user()->id)
            ->where('game_id', $id)
            ->delete();
        return response()->json(['Esse jogo foi removido da sua wishlist com sucesso!'], 204);
    }
}
