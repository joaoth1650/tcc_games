<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Favorito extends Model
{
    use HasFactory;
    protected $table = 'favoritos';

    protected $fillable = [
        'id',
        'game_id',
        'user_id',
        'prioridade'
    ];

    public function games(){
        return $this->belongsTo(Game::class, 'game_id', 'id');
    }
}
