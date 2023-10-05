<?php

namespace App\Http\Controllers;

use App\Enums\SituacaoEnum;
use App\Models\Carrinho;
use App\Models\ItemCarrinho;
use App\Services\ItemCarrinhoService;
use App\Services\OfertaService;
use App\Services\ValidaCarrinhoService;
use Illuminate\Http\Request;


class CartController extends Controller
{
    public function showCart()
    {
        $cart = Carrinho::query()
            ->where('user_id', auth()->user()->id)
            ->where('situacao', SituacaoEnum::Aberta)
            ->with('itemCarrinhos.ofertas.games')
            ->first();

        // $carts = Carrinho::query()
        // ->join('item_carrinho', 'carrinhos.id', '=', 'item_carrinho.carrinho_id')
        // ->join('oferta', 'item_carrinho.oferta_id', '=', 'oferta.id')
        // ->join('games', 'oferta.game_id', '=', 'games.id')
        // ->where('user_id', auth()->user()->id)
        // ->select('games.id as game_id', 'carrinhos.*', 'item_carrinho.*', 'oferta.*')
        // ->get();

        // dd($cart->toArray());
        return inertia('Games/ShoppingCart', ['cart' => $cart]);
    }
    public function addToCart(Request $request)
    {

        $validatedData = $request->validate([
            'oferta_id' => 'required|exists:oferta,id'
        ]);

        $Carrinho = ValidaCarrinhoService::hasCartOpen(auth()->user()->id);

        if (empty($Carrinho)) {
            $Carrinho = ValidaCarrinhoService::createCart(auth()->user()->id);
        }

        $oferta = OfertaService::getOferta($validatedData['oferta_id']); 

        if(empty($oferta)) {
            return response()->json([
                'errors' => "Não foi encontrado esta oferta do jogo"
            ], 404);
        }


        try {
            ItemCarrinhoService::addItemCarrinho($Carrinho, $oferta);

            return response()->json([
                'message' => "Item adicionado ao carrinho com sucesso!"
            ], 201);
        } catch (\Throwable $th) {
            
            return response()->json([
                'errors' => "Não foi possivel adicionar o item ao carrinho"
            ], 404);
        }

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
                'pago' => now()
            ]);
        return response()->json(['Esse item foi pago com sucesso!'], 204);
    }
}
