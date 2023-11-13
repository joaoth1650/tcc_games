<?php

namespace App\Http\Controllers;

use App\Models\Favorito;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (empty(auth()->user())) {
            return redirect()->route('games.index');
        }

        $favoritos = Favorito::query()
            ->where('user_id', auth()->user()->id)
            ->with('games')
            ->get();

        return response()->json(["favoritos" => $favoritos, "favoritelist" => $favoritos->pluck('game_id')->toArray()], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'game_id' => 'required|exists:games,id',
            // 'user_id' => 'required|exists:users,id', // passar dados sigiloso de forma que não fique amostrar para o usuario auth()->user()->id;
            'prioridade' => 'boolean',
        ]);

        Favorito::firstOrCreate(["game_id" => $validatedData['game_id']], ["user_id" => auth()->user()->id, "prioridade" => $validatedData['prioridade'] ?? false]);
        return response()->json([], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id )
    {
        Favorito::query()
            ->where('user_id', auth()->user()->id)
            ->where('game_id', $id)
            ->delete();
            return response ()->json(['Esse jogo foi removido da sua wishlist com sucesso!'], 200);

    }
}
