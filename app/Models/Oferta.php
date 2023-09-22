<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
