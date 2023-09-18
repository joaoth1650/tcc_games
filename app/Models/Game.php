<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Game extends Model
{
    use HasFactory;
    protected $table = 'games';

    protected $fillable = [
        'id',
        'restricao_id',
        'nome',
        'preco',
        'descricao',
        'video',
        'imagem_esquerda',
        'imagem_direita',
        'background',
        'standart1',
        'standart2',
        'standart3',
        'standart4',
        'imagem_principal' 
    ];

    public function ofertas(): HasMany
    {
        return $this->hasMany(Oferta::class, 'game_id', 'id');
    }
    public function restricao(){
        return $this->belongsTo(Restricao::class, 'id', 'restricao_id');
    }


}
