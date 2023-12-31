<?php

namespace App\Services;

use App\Enums\SituacaoEnum;
use App\Models\Carrinho;
use App\Models\Oferta;
use GuzzleHttp\Psr7\Request;

class ValidaCarrinhoService
{
  public static function hasCartOpen($userId): Carrinho | null
  {
    return Carrinho::query()
      ->where('user_id', $userId)
      ->where('situacao', SituacaoEnum::Aberta)
      ->with('itemCarrinhos.ofertas.games.restricao')
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

  public static function destroyCart(Carrinho $carrinho)
  {
    
    $carrinho->situacao = SituacaoEnum:: Pago;

  }

  public static function refreshTotal(Carrinho $carrinho, Oferta $oferta)
  {

    $carrinho->total = $carrinho->total + $oferta->preco;
    // dd($carrinho->total);
    $carrinho->save();
  }
  public static function updateStatus(Carrinho $carrinho, SituacaoEnum $situacao)
  {
    $carrinho->situacao = $situacao;
    $carrinho->save();
  }
}
