<?php

namespace Database\Seeders;

use App\Models\Restricao;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

//sail artisan db:seed --class=RestricaoSeeder

class RestricaoSeeder extends Seeder
{
    public function run()
    {
        // Defina os dados das restrições de idade que você deseja inserir na tabela
        $restricoes = [
            [
                'id' => 1,
                'idade' => 18,
                'descricao' => "Contém violência intensa ou material adulto",
                'background' => "rgb(255, 0, 0)",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2,
                'idade' => 16,
                'descricao' => "Pode conter violência intensa e temas sugestivos",
                'background' => "rgb(255, 128, 0)",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 3,
                'idade' => 13,
                'descricao' => "temas levemente sugestivos",
                'background' => "rgb(255, 255, 0)",
                'created_at' => now(),
                'updated_at' => now()

            ],
            [
                'id' => 4,
                'idade' => 10,
                'descricao' => "Pode conter violência leve ou desenhos animados",
                'background' => "rgb(0, 255, 0)",
                'created_at' => now(),
                'updated_at' => now()

            ],
            [
                'id' => 5,
                'idade' => "L",
                'descricao' => "Adequado para todas as idades",
                'background' => "rgb(0, 255, 0)",
                'created_at' => now(),
                'updated_at' => now()

            ],
        ];

        Restricao::query()->insert($restricoes);
    }
}
