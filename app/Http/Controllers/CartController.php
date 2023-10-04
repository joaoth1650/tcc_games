<?php

namespace App\Http\Controllers;

use App\Models\Carrinho;
use App\Models\ItemCarrinho;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function showCart()
    {
        $carts = Carrinho::query()
        ->where('user_id', auth()->user()->id)
        ->with('itemCarrinhos.ofertas.games')
        ->get();

        // $carts = Carrinho::query()
        // ->join('item_carrinho', 'carrinhos.id', '=', 'item_carrinho.carrinho_id')
        // ->join('oferta', 'item_carrinho.oferta_id', '=', 'oferta.id')
        // ->join('games', 'oferta.game_id', '=', 'games.id')
        // ->where('user_id', auth()->user()->id)
        // ->select('games.id as game_id', 'carrinhos.*', 'item_carrinho.*', 'oferta.*')
        // ->get();

        // dd($carts->toArray());
        return inertia('Games/ShoppingCart', ['carts' => $carts]);
    }
    public function addToCart(Request $request)
    {
        $validatedData = $request->validate([
            'oferta_id' => 'required|exists:oferta,id',
            'carrinho_id' => 'required|exists:carrinho,id',
        ]);

        $ItemCart = new ItemCarrinho();
        $ItemCart->oferta_id = $validatedData['oferta_id'];
        $ItemCart->carrinho_id = $validatedData['carrinho_id'];

        if ($ItemCart->save()) {
            return response()->json([
                'message' => "Item adicionado ao carrinho com sucesso!"
            ], 201);
        }

        return response()->json([
            'errors' => "Não foi possivel adicionar o item ao carrinho"
        ], 404);
    }
    public function removeFromCart(Request $request)
    {
        $id = $request->input('id');
        if (empty($id)) {
            return response()->json(["Não foi encontrado este item no carrinho"], 404);
        }
        ItemCarrinho::query()
            ->where('user_id', auth()->user()->id)
            ->where('oferta_id', $id)
            ->delete();
        return response()->json(['Esse item foi removido do carrinho com sucesso!'], 204);
    }
    public function statusCart(Request $request)
    {
        $id = $request->input('id');
        if (empty($id)) {
            return response()->json(["Não foi encontrado este item no carrinho"], 404);
        }
        Carrinho::query()
            ->where('user_id', auth()->user()->id)
            ->where('id', $id)
            ->update([
                'pago' => true
            ]);
        return response()->json(['Esse item foi pago com sucesso!'], 204);
            
    }
}
