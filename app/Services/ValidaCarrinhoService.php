<?php

namespace App\Services;

use App\Enums\SituacaoEnum;
use App\Models\Carrinho;
use GuzzleHttp\Psr7\Request;

class ValidaCarrinhoService
{
  public static function hasCartOpen($userId): Carrinho | null
  {
    return Carrinho::query()
      ->where('user_id', $userId)
      ->where('situacao', SituacaoEnum::Aberta)
      ->with('itemCarrinhos.ofertas.games')
      ->first();
  }

  public static function createCart($userId): Carrinho
  {

    $Carrinho = new Carrinho();
    $Carrinho->user_id = $userId;
    // $Carrinho->situacao = SituacaoEnum::Aberta;
    $Carrinho->situacao = SituacaoEnum::Aberta;
    $Carrinho->save();
    
    return $Carrinho;

  }
}
