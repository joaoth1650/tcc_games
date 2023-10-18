<?php

namespace Database\Seeders;

use App\Models\CategoriaGame;
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
            'preco' => 85.99,
            'descricao' => "Um novo começo ousado: sua vingança contra os deuses do Olimpo agora é passado e Kratos vive como um homem comum no reino dos monstros e deuses nórdicos. E é nesse mundo inóspito e implacável que ele precisa lutar para sobreviver... e ensinar seu filho a fazer o mesmo. Essa nova versão surpreendente de God of War desconstrói os principais elementos que definiram a série (combates gratificantes, proporção espetacular e uma narrativa poderosa), combinando-os de uma forma diferente.• Uma segunda oportunidade: Kratos é pai novamente. Assumindo o papel de mentor e protetor de seu filho, Atreus, que está determinado a conquistar seu respeito, Kratos é forçado a lidar e controlar a fúria que, por muito tempo, foi sua essência, e a explorar um mundo extremamente perigoso com seu filho.• Um mundo mais sombrio e elementar: desde as colunas de mármore de ornamentação do Olimpo até as florestas, montanhas e cavernas realistas do universo nórdico pré-viking, esse é um reino claramente novo com seu próprio panteão de criaturas, monstros e deuses. Com uma nova ênfase na descoberta e na exploração, esse mundo atrairá os jogadores para explorar cada centímetro do cenário surpreendentemente ameaçador de God of War, que é, sem dúvida, o maior da série.• Combates físicos violentos: com uma câmera livre e por cima do corpo que aproxima ainda mais o jogador da ação, as lutas de God of War refletem o panteão de criaturas nórdicas que Kratos enfrentará: grandiosas, realistas e exaustivas. Uma nova arma principal e novas habilidades mantêm o espírito que define God of War, além de apresentarem uma visão de conflitos violentos que criam uma nova base para o gênero.",
            'video' => "OvvKn488jfc",
            'imagem_esquerda' => "___",
            'imagem_direita' => "___",
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
                'imagem' => "https://i.imgur.com/0pB7vn6.jpg",
                'nome' => "god of war deluxe",
                'descricao' => "Delux " . fake()->words(20, true),
                'preco' => fake()->randomNumber(3, true),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'game_id' => $game->id,
                'imagem' => "https://i.imgur.com/T1oeJJB.jpeg",
                'nome' => "god of war default",
                'descricao' => "Default " . fake()->words(20, true),
                'preco' => fake()->randomNumber(3, true),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        CategoriaGame::query()->insert([
            [
                'game_id' => $game->id,
                'categoria_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'game_id' => $game->id,
                'categoria_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'game_id' => $game->id,
                'categoria_id' => 8,
                'created_at' => now(),
                'updated_at' => now()
            ]
            ]);

        /** CELESTE */
        $game = Game::create([
            'nome' => "Celeste",
            "restricao_id" => 3,
            'preco' => 36.99,
            'descricao' => "Ajude Madeline a enfrentar seus demônios internos em sua jornada até o topo da Montanha Celeste, nesse jogo de plataforma super afiado dos criadores de TowerFall. Desbrave centenas de desafios meticulosos, descubra segredos complicados e desvende o mistério da montanha.",
            'video' => "70d9irlxiB4",
            'imagem_esquerda' => "___",
            'imagem_direita' => "___",
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
                'preco' => fake()->randomNumber(3, true),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'game_id' => $game->id,
                'imagem' => "https://i.imgur.com/hxnK8bo.jpeg",
                'nome' => "$game->nome default",
                'descricao' => "Default " . fake()->words(20, true),
                'preco' => fake()->randomNumber(3, true),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        CategoriaGame::query()->insert([
            [
                'game_id' => $game->id,
                'categoria_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'game_id' => $game->id,
                'categoria_id' => 9,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        /** stardew valley */
        $game = Game::create([
            'nome' => "Stardew valley",
            "restricao_id" => 3,
            'preco' => 24.99,
            'descricao' => "Você herdou a antiga fazenda do seu avô, em Stardew Valley. Com ferramentas de segunda-mão e algumas moedas, você parte para dar início a sua nova vida. Será que você vai aprender a viver da terra, a transformar esse matagal em um próspero lar?",
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
                'preco' => fake()->randomNumber(3, true),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'game_id' => $game->id,
                'imagem' => "https://i.imgur.com/oH4vJhU.jpg",
                'nome' => "$game->nome default",
                'descricao' => "Default " . fake()->words(20, true),
                'preco' => fake()->randomNumber(3, true),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        CategoriaGame::query()->insert([
            [
                'game_id' => $game->id,
                'categoria_id' => 6,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'game_id' => $game->id,
                'categoria_id' => 9,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        /** hollow knight  */
        $game = Game::create([
            'nome' => "Hollow knight ",
            "restricao_id" => 3,
            'preco' => 45.99,
            'descricao' => "O jogo começa com o personagem principal, O Cavaleiro, entrando nas ruínas de Hallownest, um reino que era habitado por insetos antropomórficos, e vai descobrindo, conforme dialoga com os personagens e explora Hallownest, que ele é um dos receptáculos criados para selar uma entidade divina chamada Radiância que há muito tempo era idolatrada, até a chegada do Rei Pálido, que deu sapiência aos insetos de Hallownest e, em turno, fez eles esquecerem da Radiância e o idolatrarem em vez disso. A Radiância foi o que causou a ruína de Hallownest; ela não possui um corpo físico, mas ela consegue invadir a mente dos insetos, levando-os à loucura e assim criando 'A Infecção'.

            Numa tentativa de impedi-la, o governador de Hallownest, o Rei Pálido criou vários receptáculos com uma substância chamada Vazio para sela-la, porém só um desses receptáculos conseguiu ser 'vazio' e desprovido de emoções o bastante para a tarefa, ganhando assim o nome Cavaleiro Vazio (Hollow Knight). Com o seu receptáculo perfeito, o Rei Pálido selou a Radiância dentro do Cavaleiro Vazio, que também foi selado dentro de um templo, trazendo paz para Hallownest até a Radiância romper o selo e infectar todos novamente. Com isso o reino entrou em colapso, cidades foram destruídas, insetos foram mortos, e o Rei Pálido desapareceu junto com o seu palácio.
            
            Depois de O Cavaleiro descobris tudo que aconteceu no passado, cabe-lhe abrir o selo, derrotar o Cavaleiro Vazio e carregar o fardo de ter a Radiância aprisionada dentro de si, ou enfrentar a entidade e pôr um fim ao caos que ela trouxe.",
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
                'imagem' => "https://i.imgur.com/tzO90ud.jpg",
                'nome' => "$game->nome deluxe",
                'descricao' => "Delux " . fake()->words(20, true),
                'preco' => fake()->randomNumber(3, true),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'game_id' => $game->id,
                'imagem' => "https://i.imgur.com/tzO90ud.jpg",
                'nome' => "$game->nome default",
                'descricao' => "Default " . fake()->words(20, true),
                'preco' => fake()->randomNumber(3, true),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
        
        CategoriaGame::query()->insert([
            [
                'game_id' => $game->id,
                'categoria_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'game_id' => $game->id,
                'categoria_id' => 9,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        /** gris */
        $game = Game::create([
            'nome' => "Gris",
            "restricao_id" => 5,
            'preco' => 46.99,
            'descricao' => "Gris é uma jovem esperançosa, perdida em seu próprio mundo, que lida com uma dolorosa experiência. Sua jornada pela tristeza se manifesta em seu vestido, que concede a ela novas habilidades para navegar melhor por sua realidade desbotada. Ao longo da história, Gris evolui emocionalmente e passa a ver o mundo de outra forma, revelando novos caminhos para explorar com o uso de suas novas habilidades.

            GRIS é uma experiência serena e evocativa, sem perigos, frustrações ou mortes. O jogador deve explorar um mundo elaborado meticulosamente, com um estilo delicado, animações detalhadas e uma elegante trilha sonora. Ao longo do jogo, irão se revelar quebra-cabeças simples, sequências de plataformas e desafios opcionais baseados em habilidades, à medida que você vai abrindo o mundo de Gris.
            
            GRIS é uma experiência quase sem texto, apenas com simples lembretes de controles representados por ícones universais. Qualquer um pode jogar, seja qual for seu idioma.",
            'video' => "xtWnBHG6dis",
            'imagem_esquerda' => "___",
            'imagem_direita' => "___",
            'background' => "https://i.imgur.com/XAPqKvB.jpg",
            'standart1' => "https://i.imgur.com/vyrNQEA.jpg",
            'standart2' => "https://i.imgur.com/z7E5nTA.jpg",
            'standart3' => "https://i.imgur.com/aoiH447.jpg",
            'standart4' => "https://i.imgur.com/L45mwGT.jpg",
            'imagem_principal' => "https://i.imgur.com/uoDkyFm.jpg",
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Oferta::query()->insert([
            [
                'game_id' => $game->id,
                'imagem' => "https://i.imgur.com/r11j8JK.jpg",
                'nome' => "$game->nome deluxe",
                'descricao' => "Delux " . fake()->words(20, true),
                'preco' => fake()->randomNumber(3, true),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'game_id' => $game->id,
                'imagem' => "https://i.imgur.com/uoDkyFm.jpg",
                'nome' => "$game->nome default",
                'descricao' => "Default " . fake()->words(20, true),
                'preco' => fake()->randomNumber(3, true),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        CategoriaGame::query()->insert([
            [
                'game_id' => $game->id,
                'categoria_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'game_id' => $game->id,
                'categoria_id' => 9,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        /** Cuphead */
        $game = Game::create([
            'nome' => "Cuphead",
            "restricao_id" => 4,
            'preco' => 54.99,
            'descricao' => "Cuphead é um jogo de ação e tiros clássico, com enorme ênfase nas batalhas de chefes. Inspirado nas animações infantis da década de 1930, 
            os visuais e efeitos sonoros foram minuciosamente recriados com as mesmíssimas técnicas dessa era, com destaque para desenhos feitos à mão, fundos",
            'video' => "NN-9SQXoi50",
            'imagem_esquerda' => "___",
            'imagem_direita' => "___",
            'background' => "https://i.imgur.com/4xaGdqM.png",
            'standart1' => "https://i.imgur.com/OPyvdJw.png",
            'standart2' => "https://i.imgur.com/k2nDD7l.png",
            'standart3' => "https://i.imgur.com/qIoFQSL.png",
            'standart4' => "https://i.imgur.com/LaYYXnF.png",
            'imagem_principal' => "https://i.imgur.com/at30apR.png",
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Oferta::query()->insert([
            [
                'game_id' => $game->id,
                'imagem' => "https://i.imgur.com/at30apR.png",
                'nome' => "$game->nome deluxe",
                'descricao' => "Delux " . fake()->words(20, true),
                'preco' => 78.82,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'game_id' => $game->id,
                'imagem' => "https://i.imgur.com/at30apR.png",
                'nome' => "$game->nome default",
                'descricao' => "Default " . fake()->words(20, true),
                'preco' => $game->preco,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        CategoriaGame::query()->insert([
            [
                'game_id' => $game->id,
                'categoria_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'game_id' => $game->id,
                'categoria_id' => 9,
                'created_at' => now(),
                'updated_at' => now()
            ]
            ,
            [
                'game_id' => $game->id,
                'categoria_id' => 5,
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
                'preco' => fake()->randomNumber(3, true),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'game_id' => $game->id,
                'imagem' => "_____",
                'nome' => "$game->nome default",
                'descricao' => "Default " . fake()->words(20, true),
                'preco' => fake()->randomNumber(3, true),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        CategoriaGame::query()->insert([
            [
                'game_id' => $game->id,
                'categoria_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'game_id' => $game->id,
                'categoria_id' => 9,
                'created_at' => now(),
                'updated_at' => now()
            ]
            ,
            [
                'game_id' => $game->id,
                'categoria_id' => 5,
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
                'preco' => fake()->randomNumber(3, true),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'game_id' => $game->id,
                'imagem' => "_____",
                'nome' => "$game->nome default",
                'descricao' => "Default " . fake()->words(20, true),
                'preco' => fake()->randomNumber(3, true),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
        
        CategoriaGame::query()->insert([
            [
                'game_id' => $game->id,
                'categoria_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'game_id' => $game->id,
                'categoria_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]
            ,
            [
                'game_id' => $game->id,
                'categoria_id' => 6,
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
                'preco' => fake()->randomNumber(3, true),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'game_id' => $game->id,
                'imagem' => "_____",
                'nome' => "$game->nome default",
                'descricao' => "Default " . fake()->words(20, true),
                'preco' => fake()->randomNumber(3, true),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        CategoriaGame::query()->insert([
            [
                'game_id' => $game->id,
                'categoria_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'game_id' => $game->id,
                'categoria_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]
            ,
            [
                'game_id' => $game->id,
                'categoria_id' => 7,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'game_id' => $game->id,
                'categoria_id' => 5,
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
                'preco' => fake()->randomNumber(3, true),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'game_id' => $game->id,
                'imagem' => "_____",
                'nome' => "$game->nome default",
                'descricao' => "Default " . fake()->words(20, true),
                'preco' => fake()->randomNumber(3, true),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        CategoriaGame::query()->insert([
            [
                'game_id' => $game->id,
                'categoria_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]
            ,
            [
                'game_id' => $game->id,
                'categoria_id' => 9,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

    }
}
