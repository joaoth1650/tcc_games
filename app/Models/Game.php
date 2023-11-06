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
        'imagem_principal',
        'vizualicoes'
    ];

    public function ofertas(): HasMany
    {
        return $this->hasMany(Oferta::class, 'game_id', 'id');
    }
    ////
    public function restricao()
    {
        return $this->belongsTo(Restricao::class, 'restricao_id', 'id');
    }
    ////
    public function favoritos(): HasMany
    {
        return $this->hasMany(Favorito::class, 'game_id', 'id');
    }
    ////
    public function categoriasGames(): HasMany
    {
        return $this->hasMany(CategoriaGame::class, 'game_id', 'id');
    }

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class, 'categorias_games', 'game_id', 'categoria_id');
    }
}
