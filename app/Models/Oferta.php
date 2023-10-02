<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Oferta extends Model
{
    use HasFactory;

    protected $table = 'oferta';

    protected $fillable = [
        'id',
        'game_id',
        'imagem',
        'nome',
        'descricao',
        'preco'
    ];

    public function games(){
        return $this->belongsTo(Game::class, 'id', 'game_id');
    }

    public function itemCarrinhos(): HasMany
    {
        return $this->hasMany(ItemCarrinho::class, 'oferta_id', 'id');
    }
}
