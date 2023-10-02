<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ItemCarrinho extends Model
{
  use HasFactory;
  protected $table = 'item_carrinho';

  protected $fillable = [
    'id',
    'oferta_id',
    'carrinho_id'
  ];

  public function ofertas()
  {
    return $this->belongsTo(Oferta::class, 'oferta_id', 'id');
  }

  public function carrinhos()
  {
    return $this->belongsTo(Carrinho::class, 'carrinho_id', 'id');
  }
}
