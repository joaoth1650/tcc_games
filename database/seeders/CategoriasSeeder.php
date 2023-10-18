<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    /**
     * sail artisan db:seed --class=CategoriasSeeder
     */
    public function run(): void
    {
        $categorias = [
            [
                'id' => 1,
                'nome' => 'Ação',
            ],
            [
                'id' => 2,
                'nome' => 'Aventura',
            ],
            [
                'id' => 3,
                'nome' => 'multiplayer',  
            ],
            [
                'id' => 4,
                'nome' => 'Estratégia',
            ],
            [
                'id' => 5,
                'nome' => 'Terror',
            ],
            [
                'id' => 6,
                'nome' => 'Simulação',
            ],
            [
                'id' => 7,
                'nome' => 'Puzzle',
            ],
            [
                'id' => 8,
                'nome' => 'RPG',
            ],
            [
                'id' => 9,
                'nome' => 'Indie',
            ]
        ];

        Categoria::query()->insert($categorias);
    }
}
