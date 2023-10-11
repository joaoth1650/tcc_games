<?php

namespace App\Services;

use App\Models\Carrinho;
use App\Models\ItemCarrinho;
use App\Models\Oferta;

class ItemCarrinhoService
{
  public static function addItemCarrinho(Carrinho $carrinho, Oferta $oferta)
  {
    $itemNoCarrinho = ItemCarrinho::where('carrinho_id', $carrinho->id)
    ->where('oferta_id', $oferta->id)
    ->first();
    
    if ($itemNoCarrinho) {

      $itemNoCarrinho->increment('quantidade');
    } else {
      itemCarrinho::create([
          'carrinho_id' => $carrinho->id,
          'oferta_id' => $oferta->id,
          'quantidade' => 1, 
      ]);
    }
    
    // self::refreshTotal($carrinho, $oferta);
    
  }

}
