<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Carrinho extends Model
{
    use HasFactory;
    protected $table = 'carrinhos';

    protected $fillable = [
        'id',
        'user_id',
        'pago',
        'desconto',
        'total',
        'situacao'
    ];

    public function itemCarrinhos(): HasMany
    {
        return $this->hasMany(ItemCarrinho::class, 'carrinho_id', 'id')->orderBy('item_carrinho.id', 'desc');
    }
}
