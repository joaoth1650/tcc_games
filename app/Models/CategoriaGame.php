<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaGame extends Model
{
    use HasFactory;
    protected $table = 'categorias_games';

    protected $fillable = [
        'id',
        'game_id',
        'categoria_id',
    ];

    public function games()
    {
      return $this->belongsTo(Game::class, 'game_id', 'id');
    }
  
    public function categorias()
    {
      return $this->belongsTo(Categoria::class, 'categoria_id', 'id');
    }
}
