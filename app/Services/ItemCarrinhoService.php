<?php

namespace App\Services;

use App\Models\Carrinho;
use App\Models\ItemCarrinho;
use App\Models\Oferta;

class ItemCarrinhoService
{
  public static function addItemCarrinho(Carrinho $carrinho, Oferta $oferta)
  {
    $ItemCart = new ItemCarrinho();
    $ItemCart->oferta_id = $oferta->id;
    $ItemCart->carrinho_id = $carrinho->id;
    $ItemCart->save();
    
    self::refreshTotal($carrinho, $oferta);
    
  }

  public static function refreshTotal(Carrinho $carrinho, Oferta $oferta)
  { 
    $carrinho->total = $carrinho->total + $oferta->preco;
    $carrinho->save();
  }
}
