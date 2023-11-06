<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categoria extends Model
{
    use HasFactory;
    protected $table = 'categorias';

    protected $fillable = [
        'id',
        'nome',
    ];

    public function categoriasGames(): HasMany
    {
        return $this->hasMany(CategoriaGame::class, 'categoria_id', 'id');
    }

    public function games()
    {
        return $this->belongsToMany(Game::class, 'categorias_games', 'categoria_id', 'game_id');
    }
}
