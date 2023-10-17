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
            'imagem_esquerda' => "",
            'imagem_direita' => "",
            'background' => "https://i.imgur.com/NPLRamD.jpg",
            'standart1' => "https://i.imgur.com/0pB7vn6.jpg",
            'standart2' => "https://i.imgur.com/8BE8Akl.png",
            'standart3' => "https://i.imgur.com/g3a6oRK.png",
            'standart4' => "https://i.imgur.com/FxGC5da.png",
            'imagem_principal' => "https://i.imgur.com/T1oeJJB.jpeg",
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Oferta::query()->insert([
            [
                'game_id' => $game->id,
                'imagem' => "https://i.imgur.com/AfZ9FeG.jpg",
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
            'background' => "https://i.imgur.com/4anEvVN.jpg",
            'standart1' => "https://i.imgur.com/MmR9EHN.png",
            'standart2' => "https://i.imgur.com/rSTiWJ1.png",
            'standart3' => "https://i.imgur.com/sIveYLp.png-",
            'standart4' => "https://i.imgur.com/JDkEJyI.jpg",
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
            'video' => "8A7A1X1TVNc",
            'imagem_esquerda' => "___",
            'imagem_direita' => "___",
            'background' => "https://i.imgur.com/7FJoLnI.png",
            'standart1' => "https://i.imgur.com/ZMkXZrH.png",
            'standart2' => "https://i.imgur.com/fcMZGrI.png",
            'standart3' => "https://i.imgur.com/Du7J7DJ.png",
            'standart4' => "https://i.imgur.com/ylZjtPh.jpg",
            'imagem_principal' => "https://i.imgur.com/usHci8P.jpg",
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Oferta::query()->insert([
            [
                'game_id' => $game->id,
                'imagem' => "https://i.imgur.com/HQ3vM7k.png",
                'nome' => "$game->nome deluxe",
                'descricao' => "Delux " . fake()->words(20, true),
                'preco' => fake()->randomNumber(4, true),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'game_id' => $game->id,
                'imagem' => "https://i.imgur.com/oH4vJhU.jpg",
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
            'video' => "UAO2urG23S4",
            'imagem_esquerda' => "___",
            'imagem_direita' => "___",
            'background' => "https://i.imgur.com/M7c6UF8.jpg",
            'standart1' => "https://i.imgur.com/WY7rAdU.jpg",
            'standart2' => "https://i.imgur.com/w1tLQVH.jpg",
            'standart3' => "https://i.imgur.com/epiVtAY.jpg",
            'standart4' => "https://i.imgur.com/c7pzkzw.jpg",
            'imagem_principal' => "https://i.imgur.com/tzO90ud.jpg",
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Oferta::query()->insert([
            [
                'game_id' => $game->id,
                'imagem' => "https://i.imgur.com/QBskoJ6.jpg",
                'nome' => "$game->nome deluxe",
                'descricao' => "Delux " . fake()->words(20, true),
                'preco' => fake()->randomNumber(4, true),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'game_id' => $game->id,
                'imagem' => "https://i.imgur.com/tzO90ud.jpg",
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
