<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\Oferta;
use App\Models\Restricao;
use GMP;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//sail artisan db:seed --class=PopularGamesSeed

class PopularGamesSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /** GOD OF WAR */
        $game = Game::create([
            'nome' => "god of war",
            "restricao_id" => 1,
            'preco' => 55.99,
            'descricao' => "Um novo começo ousado: sua vingança contra os deuses do Olimpo agora é passado e Kratos vive como um homem comum no reino dos monstros e deuses nórdicos. E é nesse mundo inóspito e implacável que ele precisa lutar para sobreviver... e ensinar seu filho a fazer o mesmo. Essa nova versão surpreendente de God of War desconstrói os principais elementos que definiram a série (combates gratificantes, proporção espetacular e uma narrativa poderosa), combinando-os de uma forma diferente.• Uma segunda oportunidade: Kratos é pai novamente. Assumindo o papel de mentor e protetor de seu filho, Atreus, que está determinado a conquistar seu respeito, Kratos é forçado a lidar e controlar a fúria que, por muito tempo, foi sua essência, e a explorar um mundo extremamente perigoso com seu filho.• Um mundo mais sombrio e elementar: desde as colunas de mármore de ornamentação do Olimpo até as florestas, montanhas e cavernas realistas do universo nórdico pré-viking, esse é um reino claramente novo com seu próprio panteão de criaturas, monstros e deuses. Com uma nova ênfase na descoberta e na exploração, esse mundo atrairá os jogadores para explorar cada centímetro do cenário surpreendentemente ameaçador de God of War, que é, sem dúvida, o maior da série.• Combates físicos violentos: com uma câmera livre e por cima do corpo que aproxima ainda mais o jogador da ação, as lutas de God of War refletem o panteão de criaturas nórdicas que Kratos enfrentará: grandiosas, realistas e exaustivas. Uma nova arma principal e novas habilidades mantêm o espírito que define God of War, além de apresentarem uma visão de conflitos violentos que criam uma nova base para o gênero.",
            'video' => "9i_198DnQO8",
            'imagem_esquerda' => "https://imgur.com/a/8nTrY18",
            'imagem_direita' => "https://imgur.com/a/8nTrY18",
            'background' => "https://imgur.com/a/KUQ9KXB",
            'standart1' => "https://i.imgur.com/W4RZrY7.jpeg",
            'standart2' => "https://i.imgur.com/OX5DxhF.jpeg",
            'standart3' => "https://i.imgur.com/5HxUUuC.jpeg",
            'standart4' => "https://i.imgur.com/bhtYMVh.jpeg",
            'imagem_principal' => "https://i.imgur.com/T1oeJJB.jpeg",
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Oferta::query()->insert([
            [
                'game_id' => $game->id,
                'imagem' => "https://i.imgur.com/W4RZrY7.jpeg",
                'nome' => "god of war deluxe",
                'descricao' => "Delux " . fake()->words(20, true),
                'preco' => fake()->randomNumber(4, true),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'game_id' => $game->id,
                'imagem' => "https://i.imgur.com/T1oeJJB.jpeg",
                'nome' => "god of war default",
                'descricao' => "Default " . fake()->words(20, true),
                'preco' => fake()->randomNumber(4, true),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        /** CELESTE */
        $game = Game::create([
            'nome' => "Celeste",
            "restricao_id" => 2,
            'preco' => 36.99,
            'descricao' => "Ajude Madeline a enfrentar seus demônios internos em sua jornada até o topo da Montanha Celeste nesse jogo de plataforma superafiado dos criadores de TowerFall. Desbrave centenas de desafios meticulosos, descubra segredos ardilosos e desvende o mistério da montanha.",
            'video' => "70d9irlxiB4",
            'imagem_esquerda' => "https://i.imgur.com/7UN2h94.png",
            'imagem_direita' => "https://i.imgur.com/dCCdJjj.png",
            'background' => "https://i.imgur.com/tn7KlxP.jpeg",
            'standart1' => "https://i.imgur.com/MmR9EHN.png",
            'standart2' => "https://i.imgur.com/rSTiWJ1.png",
            'standart3' => "https://i.imgur.com/sIveYLp.png-",
            'standart4' => "https://i.imgur.com/tJ6YVtD.jpeg",
            'imagem_principal' => "https://i.imgur.com/r70jIX3.jpeg",
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Oferta::query()->insert([
            [
                'game_id' => $game->id,
                'imagem' => "https://i.imgur.com/r70jIX3.jpeg",
                'nome' => "$game->nome deluxe",
                'descricao' => "Delux " . fake()->words(20, true),
                'preco' => fake()->randomNumber(4, true),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'game_id' => $game->id,
                'imagem' => "https://i.imgur.com/hxnK8bo.jpeg",
                'nome' => "$game->nome default",
                'descricao' => "Default " . fake()->words(20, true),
                'preco' => fake()->randomNumber(4, true),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        /** stardew valley */
        $game = Game::create([
            'nome' => "Stardew valley",
            "restricao_id" => 1,
            'preco' => 55.99,
            'descricao' => "",
            'video' => "____",
            'imagem_esquerda' => "___",
            'imagem_direita' => "___",
            'background' => "____",
            'standart1' => "___",
            'standart2' => "___",
            'standart3' => "___",
            'standart4' => "___",
            'imagem_principal' => "___",
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Oferta::query()->insert([
            [
                'game_id' => $game->id,
                'imagem' => "_____",
                'nome' => "$game->nome deluxe",
                'descricao' => "Delux " . fake()->words(20, true),
                'preco' => fake()->randomNumber(4, true),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'game_id' => $game->id,
                'imagem' => "_____",
                'nome' => "$game->nome default",
                'descricao' => "Default " . fake()->words(20, true),
                'preco' => fake()->randomNumber(4, true),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        /** hollow knight  */
        $game = Game::create([
            'nome' => "Hollow knight ",
            "restricao_id" => 1,
            'preco' => 55.99,
            'descricao' => "",
            'video' => "____",
            'imagem_esquerda' => "___",
            'imagem_direita' => "___",
            'background' => "____",
            'standart1' => "___",
            'standart2' => "___",
            'standart3' => "___",
            'standart4' => "___",
            'imagem_principal' => "___",
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Oferta::query()->insert([
            [
                'game_id' => $game->id,
                'imagem' => "_____",
                'nome' => "$game->nome deluxe",
                'descricao' => "Delux " . fake()->words(20, true),
                'preco' => fake()->randomNumber(4, true),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'game_id' => $game->id,
                'imagem' => "_____",
                'nome' => "$game->nome default",
                'descricao' => "Default " . fake()->words(20, true),
                'preco' => fake()->randomNumber(4, true),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        /** gris */
        $game = Game::create([
            'nome' => "Gris",
            "restricao_id" => 1,
            'preco' => 55.99,
            'descricao' => "",
            'video' => "____",
            'imagem_esquerda' => "___",
            'imagem_direita' => "___",
            'background' => "____",
            'standart1' => "___",
            'standart2' => "___",
            'standart3' => "___",
            'standart4' => "___",
            'imagem_principal' => "___",
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Oferta::query()->insert([
            [
                'game_id' => $game->id,
                'imagem' => "_____",
                'nome' => "$game->nome deluxe",
                'descricao' => "Delux " . fake()->words(20, true),
                'preco' => fake()->randomNumber(4, true),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'game_id' => $game->id,
                'imagem' => "_____",
                'nome' => "$game->nome default",
                'descricao' => "Default " . fake()->words(20, true),
                'preco' => fake()->randomNumber(4, true),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        /** Cuphead */
        $game = Game::create([
            'nome' => "Cuphead",
            "restricao_id" => 1,
            'preco' => 55.99,
            'descricao' => "",
            'video' => "____",
            'imagem_esquerda' => "___",
            'imagem_direita' => "___",
            'background' => "____",
            'standart1' => "___",
            'standart2' => "___",
            'standart3' => "___",
            'standart4' => "___",
            'imagem_principal' => "___",
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Oferta::query()->insert([
            [
                'game_id' => $game->id,
                'imagem' => "_____",
                'nome' => "$game->nome deluxe",
                'descricao' => "Delux " . fake()->words(20, true),
                'preco' => fake()->randomNumber(4, true),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'game_id' => $game->id,
                'imagem' => "_____",
                'nome' => "$game->nome default",
                'descricao' => "Default " . fake()->words(20, true),
                'preco' => fake()->randomNumber(4, true),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        /** Undertale */
        $game = Game::create([
            'nome' => "Undertale",
            "restricao_id" => 1,
            'preco' => 55.99,
            'descricao' => "",
            'video' => "____",
            'imagem_esquerda' => "___",
            'imagem_direita' => "___",
            'background' => "____",
            'standart1' => "___",
            'standart2' => "___",
            'standart3' => "___",
            'standart4' => "___",
            'imagem_principal' => "___",
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Oferta::query()->insert([
            [
                'game_id' => $game->id,
                'imagem' => "_____",
                'nome' => "$game->nome deluxe",
                'descricao' => "Delux " . fake()->words(20, true),
                'preco' => fake()->randomNumber(4, true),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'game_id' => $game->id,
                'imagem' => "_____",
                'nome' => "$game->nome default",
                'descricao' => "Default " . fake()->words(20, true),
                'preco' => fake()->randomNumber(4, true),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        /** No Man's Sky */
        $game = Game::create([
            'nome' => "No Man's Sky",
            "restricao_id" => 1,
            'preco' => 55.99,
            'descricao' => "",
            'video' => "____",
            'imagem_esquerda' => "___",
            'imagem_direita' => "___",
            'background' => "____",
            'standart1' => "___",
            'standart2' => "___",
            'standart3' => "___",
            'standart4' => "___",
            'imagem_principal' => "___",
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Oferta::query()->insert([
            [
                'game_id' => $game->id,
                'imagem' => "_____",
                'nome' => "$game->nome deluxe",
                'descricao' => "Delux " . fake()->words(20, true),
                'preco' => fake()->randomNumber(4, true),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'game_id' => $game->id,
                'imagem' => "_____",
                'nome' => "$game->nome default",
                'descricao' => "Default " . fake()->words(20, true),
                'preco' => fake()->randomNumber(4, true),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        /** Among Us */
        $game = Game::create([
            'nome' => "Among Us",
            "restricao_id" => 1,
            'preco' => 55.99,
            'descricao' => "",
            'video' => "____",
            'imagem_esquerda' => "___",
            'imagem_direita' => "___",
            'background' => "____",
            'standart1' => "___",
            'standart2' => "___",
            'standart3' => "___",
            'standart4' => "___",
            'imagem_principal' => "___",
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Oferta::query()->insert([
            [
                'game_id' => $game->id,
                'imagem' => "_____",
                'nome' => "$game->nome deluxe",
                'descricao' => "Delux " . fake()->words(20, true),
                'preco' => fake()->randomNumber(4, true),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'game_id' => $game->id,
                'imagem' => "_____",
                'nome' => "$game->nome default",
                'descricao' => "Default " . fake()->words(20, true),
                'preco' => fake()->randomNumber(4, true),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
        /** SuperHot */
        $game = Game::create([
            'nome' => "SuperHot",
            "restricao_id" => 1,
            'preco' => 55.99,
            'descricao' => "",
            'video' => "____",
            'imagem_esquerda' => "___",
            'imagem_direita' => "___",
            'background' => "____",
            'standart1' => "___",
            'standart2' => "___",
            'standart3' => "___",
            'standart4' => "___",
            'imagem_principal' => "___",
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Oferta::query()->insert([
            [
                'game_id' => $game->id,
                'imagem' => "_____",
                'nome' => "$game->nome deluxe",
                'descricao' => "Delux " . fake()->words(20, true),
                'preco' => fake()->randomNumber(4, true),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'game_id' => $game->id,
                'imagem' => "_____",
                'nome' => "$game->nome default",
                'descricao' => "Default " . fake()->words(20, true),
                'preco' => fake()->randomNumber(4, true),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
