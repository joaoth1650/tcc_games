<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Restricao extends Model
{
    use HasFactory;

    protected $table = 'restricao';

    protected $fillable = [
        'id',
        'idade',
        'descricao',
        'background',
    ];

    public function game(): HasMany
    {
        return $this->hasMany(Game::class, 'reistricao_id', 'id' );
    }
}
