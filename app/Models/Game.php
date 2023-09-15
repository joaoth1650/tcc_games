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
        'id'
    ];

    public function ofertas(): HasMany
    {
        return $this->hasMany(Oferta::class, 'game_id', 'id');
    }


}
