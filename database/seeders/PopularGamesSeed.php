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
                'imagem' => "https://i.imgur.com/NtH7JxX.jpg",
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
            'imagem_principal' => "https://i.imgur.com/ErW82Zo.png",
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
                'imagem' => "https://i.imgur.com/ObcteyT.jpg",
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
            'imagem_principal' => "https://i.imgur.com/XzwWHEZ.jpg",
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Oferta::query()->insert([
            [
                'game_id' => $game->id,
                'imagem' => "https://i.imgur.com/uoDkyFm.jpg",
                'nome' => "$game->nome deluxe",
                'descricao' => "Delux " . fake()->words(20, true),
                'preco' => fake()->randomNumber(3, true),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'game_id' => $game->id,
                'imagem' => "https://i.imgur.com/XzwWHEZ.jpg",
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
            'video' => "3jDZfREYppk",
            'imagem_esquerda' => "___",
            'imagem_direita' => "___",
            'background' => "https://i.imgur.com/udSDq2k.jpg",
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
                'imagem' => "https://i.imgur.com/4P0WIpm.jpg",
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
            ],
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
            ],
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
            "restricao_id" => 4,
            'preco' => 162.00,
            'descricao' => "Inspirado na aventura e imaginação que nós amamos nos clássicos de ficção científica, No Man's Sky apresenta uma galáxia recheada de planetas e formas de vida únicas pronta para exploração, além de perigo e ação constante.

            Em No Man's Sky, todas as estrelas são a luz de um sol distante orbitado por planetas cheios de vida, e você pode ir a qualquer um que escolher. Voe suavemente do espaço profundo até as superfícies planetárias sem telas de carregamento e sem limites.
            Nesse universo de geração processual infinita, você descobrirá lugares e criaturas que nenhum outro jogador viu antes, e talvez nunca verá.",
            'video' => "nLtmEjqzg7M",
            'imagem_esquerda' => "___",
            'imagem_direita' => "___",
            'background' => "https://i.imgur.com/pGm7oVa.png",
            'standart1' => "https://i.imgur.com/xMSKEcb.png",
            'standart2' => "https://i.imgur.com/dszFOmH.png",
            'standart3' => "https://i.imgur.com/KfKNiaO.jpg",
            'standart4' => "https://i.imgur.com/dgpWTdq.png",
            'imagem_principal' => "https://i.imgur.com/TxWxaMl.png",
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Oferta::query()->insert([
            [
                'game_id' => $game->id,
                'imagem' => "https://i.imgur.com/xOHRmrm.png",
                'nome' => "$game->nome deluxe",
                'descricao' => "Delux " . fake()->words(20, true),
                'preco' => fake()->randomNumber(3, true),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'game_id' => $game->id,
                'imagem' => "https://i.imgur.com/TxWxaMl.png",
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
                'categoria_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'game_id' => $game->id,
                'categoria_id' => 3,
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
            ],
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
            "restricao_id" => 2,
            'preco' => 39.99,
            'descricao' => "é um jogo de tiro em primeira pessoa lançado em 2016 que oferece uma experiência de jogo única e uma narrativa intrigante que se desenrola de maneira não convencional. A narrativa de Superhot é minimalista, mas profundamente envolvente devido à sua abordagem única.

            A história de Superhot coloca os jogadores no controle de um protagonista anônimo que recebe um disco com um jogo chamado Superhot. No início, você está conectado a um chat de computador com outra pessoa que compartilha a experiência do jogo. O enredo se desenrola enquanto você joga as várias fases do jogo Superhot.
            
            A reviravolta central na narrativa de Superhot é que o tempo só avança quando você se move. Isso significa que, enquanto você está parado, tudo no jogo fica congelado, mas, assim que você se move, a ação continua. Isso cria uma dinâmica de jogo única, onde você deve planejar seus movimentos com cuidado e executá-los de forma estratégica para evitar ser atingido por inimigos e projéteis.
            
            Conforme você progride no jogo Superhot, você se depara com mensagens crípticas e estranhas que sugerem que algo está profundamente errado com a realidade do jogo. A narrativa começa a explorar conceitos de controle, manipulação e a natureza da realidade virtual.
            
            Sem entrar em muitos detalhes para evitar spoilers, a história de Superhot se desenrola gradualmente à medida que você completa níveis e desafios. Ela mergulha em questões existenciais e aborda a ideia de que o jogador está sendo controlado por uma força externa. A narrativa do jogo brinca com a fronteira entre o mundo virtual do jogo e a realidade do jogador.
            
            A narrativa de Superhot é envolvente devido à sua abordagem única e quebra de expectativas. Ela explora temas de controle, livre arbítrio e realidade de maneira criativa, o que torna o jogo uma experiência intrigante e memorável.",
            'video' => "nFo7755eWOY",
            'imagem_esquerda' => "___",
            'imagem_direita' => "___",
            'background' => "https://i.imgur.com/XC8eVGb.jpg",
            'standart1' => "https://i.imgur.com/QqkBmco.png",
            'standart2' => "https://i.imgur.com/F5TLl8S.png",
            'standart3' => "https://i.imgur.com/5XdLW8Y.png",
            'standart4' => "https://i.imgur.com/sAsx3cH.jpg",
            'imagem_principal' => "https://i.imgur.com/cpLRuYh.png",
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Oferta::query()->insert([
            [
                'game_id' => $game->id,
                'imagem' => "https://i.imgur.com/rJbeXYS.jpg",
                'nome' => "$game->nome deluxe",
                'descricao' => "Delux " . fake()->words(20, true),
                'preco' => fake()->randomNumber(3, true),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'game_id' => $game->id,
                'imagem' => "https://i.imgur.com/cpLRuYh.png",
                'nome' => "$game->nome default",
                'descricao' => "Default " . fake()->words(20, true),
                'preco' => 39.99,
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


        ///risco de ser removido

        /** Inscryption */
        $game = Game::create([
            'nome' => "Inscryption",
            "restricao_id" => 2,
            'preco' => 49.99,
            'descricao' => "Inscryption é um jogo de cartas e estratégia lançado em 2021, desenvolvido pela Daniel Mullins Games. O jogo combina elementos de construção de decks, narrativa de terror e quebra-cabeças em uma experiência única.
            
            A mecânica de jogo gira em torno da construção de um deck de cartas, com uma variedade de criaturas e feitiços, e da luta contra oponentes em partidas de cartas estratégicas. O jogo é notável por suas mecânicas únicas, como a capacidade de fundir cartas para criar criaturas mais poderosas e a exploração de um tabuleiro hexagonal para obter recursos e tomar decisões táticas.

            Além disso, Inscryption é conhecido por sua atmosfera de horror e narrativa intrigante, que se desenrola de maneira não convencional, desafiando as expectativas dos jogadores. O jogo é uma experiência envolvente e inquietante que combina elementos de jogos de cartas tradicionais com uma narrativa sombria e quebra-cabeças únicos.",
            'video' => "uAn7OxLub9Y",
            'imagem_esquerda' => "___",
            'imagem_direita' => "___",
            'background' => "https://i.imgur.com/msB4m7K.jpg",
            'standart1' => "https://i.imgur.com/fiOjLAa.jpg",
            'standart2' => "https://i.imgur.com/mhdSDmO.jpg",
            'standart3' => "https://i.imgur.com/s4XKYGt.jpg",
            'standart4' => "https://i.imgur.com/FHMkFIA.jpg",
            'imagem_principal' => "https://i.imgur.com/IAk1odf.jpg",
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Oferta::query()->insert([
            [
                'game_id' => $game->id,
                'imagem' => "https://i.imgur.com/FJmF2bg.jpg",
                'nome' => "$game->nome deluxe",
                'descricao' => "Delux " . fake()->words(20, true),
                'preco' => fake()->randomNumber(3, true),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'game_id' => $game->id,
                'imagem' => "https://i.imgur.com/IAk1odf.jpg",
                'nome' => "$game->nome default",
                'descricao' => "Default " . fake()->words(20, true),
                'preco' => 49.99,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        CategoriaGame::query()->insert([
            [
                'game_id' => $game->id,
                'categoria_id' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'game_id' => $game->id,
                'categoria_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'game_id' => $game->id,
                'categoria_id' => 7,
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

        /** Chants of Sennaar */
        $game = Game::create([
            'nome' => "Chants of Sennaar",
            "restricao_id" => 5,
            'preco' => 69,
            'descricao' => "Chants of Sennaar no Steam. Reza a lenda que, um dia, uma pessoa viajante voltará a unir os Povos da Torre, que não mais são capazes de comunicar-se uns com os outros. Observe, escute e decifre os idiomas ancestrais em um universo fascinante, inspirado pelo mito de Babel.",
            'video' => "__hzPH3tcvA",
            'imagem_esquerda' => "___",
            'imagem_direita' => "___",
            'background' => "https://i.imgur.com/jKDwIDM.jpg",
            'standart1' => "https://i.imgur.com/lAa9JL5.jpg",
            'standart2' => "https://i.imgur.com/9TP6txM.jpg",
            'standart3' => "https://i.imgur.com/LmXKjmb.jpg",
            'standart4' => "https://i.imgur.com/jUa4PN0.jpg",
            'imagem_principal' => "https://i.imgur.com/JeFwl2s.jpg",
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Oferta::query()->insert([
            [
                'game_id' => $game->id,
                'imagem' => "https://i.imgur.com/U5Xrg5g.jpg",
                'nome' => "$game->nome deluxe",
                'descricao' => "Delux " . fake()->words(20, true),
                'preco' => 89.50,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'game_id' => $game->id,
                'imagem' => "https://i.imgur.com/JeFwl2s.jpg",
                'nome' => "$game->nome default",
                'descricao' => "Default " . fake()->words(20, true),
                'preco' => 69,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        CategoriaGame::query()->insert([
            [
                'game_id' => $game->id,
                'categoria_id' => 7,
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

        /** Red Dead Redemption 2 */
        $game = Game::create([
            'nome' => "Red Dead Redemption 2",
            "restricao_id" => 1,
            'preco' => 299.90,
            'descricao' => "Red Dead Redemption 2 é um jogo de ação e aventura desenvolvido pela Rockstar Games e lançado em 2018. O jogo serve como uma prequela para o jogo anterior da série, Red Dead Redemption, e se passa no final do século XIX, no Velho Oeste dos Estados Unidos. A história gira em torno de Arthur Morgan, um fora-da-lei membro da gangue Van der Linde, liderada por Dutch van der Linde.

            A história começa com a gangue Van der Linde em fuga após um assalto a um banco em Blackwater ter dado errado. Os membros da gangue, incluindo Arthur, Dutch e John Marston, estão constantemente em movimento, buscando abrigo e oportunidades de saque para sobreviver. A narrativa se desenrola enquanto a gangue atravessa paisagens variadas, incluindo montanhas cobertas de neve, pântanos, florestas e cidades fronteiriças.
            
            Ao longo do jogo, os jogadores acompanham o desenvolvimento de Arthur Morgan como personagem, enquanto ele começa a questionar as ações da gangue e seu líder, Dutch. Conforme o grupo se envolve em uma série de assaltos, confrontos com autoridades e eventos dramáticos, Arthur se encontra em uma jornada de autodescoberta e redenção.
            
            A história também aborda temas complexos, como a luta dos nativos americanos por suas terras, a expansão da industrialização nos Estados Unidos e as mudanças na sociedade do Velho Oeste. Além disso, Arthur encontra uma série de personagens interessantes ao longo de sua jornada, cada um com sua própria história e motivos.
            
            A narrativa culmina em um clímax emocionante, com escolhas morais que afetam o destino de Arthur e a dinâmica da gangue Van der Linde. Os jogadores têm a liberdade de tomar decisões que podem levar a múltiplos finais, acrescentando uma dimensão de escolha e consequência à experiência de jogo.
            Red Dead Redemption 2 é amplamente elogiado por sua narrativa envolvente, personagens complexos e a recriação autêntica do Velho Oeste. O jogo também oferece uma experiência de mundo aberto rica em detalhes, permitindo aos jogadores explorar livremente o vasto cenário do jogo, caçar animais, jogar minijogos e realizar missões paralelas.",
            'video' => "PnCX8npep7k",
            'imagem_esquerda' => "___",
            'imagem_direita' => "___",
            'background' => "https://i.imgur.com/ySw198X.jpg",
            'standart1' => "https://i.imgur.com/0ksbw5z.png",
            'standart2' => "https://i.imgur.com/dsdq4NR.png",
            'standart3' => "https://i.imgur.com/jaGzq55.png",
            'standart4' => "https://i.imgur.com/szRlyH0.png",
            'imagem_principal' => "https://i.imgur.com/zbIUwpn.png",
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Oferta::query()->insert([
            [
                'game_id' => $game->id,
                'imagem' => "https://i.imgur.com/7uUg0h7.jpg",
                'nome' => "$game->nome deluxe",
                'descricao' => "Delux " . fake()->words(20, true),
                'preco' => 350,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'game_id' => $game->id,
                'imagem' => "https://i.imgur.com/zbIUwpn.png",
                'nome' => "$game->nome default",
                'descricao' => "Default " . fake()->words(20, true),
                'preco' => 299.90,
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
            ],
            [
                'game_id' => $game->id,
                'categoria_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        /** Destiny 2 */
        $game = Game::create([
            'nome' => "Destiny 2",
            "restricao_id" => 3,
            'preco' => 1.99,
            'descricao' => "Destiny 2 é um jogo de tiro em primeira pessoa online desenvolvido pela Bungie e publicado pela Activision. O jogo foi lançado em 2017 como uma sequência direta do jogo original, Destiny. A história do jogo se passa em um universo de ficção científica e é rica em elementos de narrativa e lore complexos.

            A narrativa de Destiny 2 gira em torno da luta da humanidade para sobreviver em um sistema solar devastado por uma ameaça conhecida como Os Sem Face (The Faceless). Os Sem Face são liderados por um ser poderoso chamado Dominus Ghaul, que lidera a Cabal, uma raça alienígena militarista, em uma invasão à Terra e a Torre, a última cidade segura da humanidade.
            
            Os jogadores assumem o papel dos Guardiões, guerreiros com habilidades especiais e imortais graças ao poder da Luz. No início do jogo, Ghaul lança um ataque devastador contra a cidade, despojando os Guardiões de seus poderes e forçando-os a fugir.
            
            A história segue a jornada do jogador, que busca reunir os Guardiões dispersos e recuperar seus poderes, enquanto confrontam Ghaul e os Cabal em várias missões e campanhas. Os jogadores viajam por diferentes planetas e luas em busca de artefatos e informações que podem levar à derrota de Ghaul.
            
            Ao longo da narrativa principal, os jogadores desvendam segredos sobre a natureza da Luz e das Trevas, bem como sobre as facções alienígenas que habitam o sistema solar, incluindo os Vex, os Caídos, os Decaídos, e outros.
            
            O jogo continua a expandir sua história com várias expansões, como Forsaken e Shadowkeep, que introduzem novos inimigos, personagens e reviravoltas na narrativa. A história se torna ainda mais complexa com a introdução de elementos cósmicos e temas metafísicos à medida que os Guardiões enfrentam ameaças intergalácticas e se aprofundam no universo de Destiny.
            A narrativa de Destiny 2 é contada por meio de missões, cutscenes, diálogos de personagens e lore espalhado pelo mundo do jogo. É uma história em constante evolução, com eventos e atualizações regulares que mantêm os jogadores imersos em um universo de ficção científica repleto de desafios e mistérios intergalácticos.",
            'video' => "z_vbe-trwo4",
            'imagem_esquerda' => "___",
            'imagem_direita' => "___",
            'background' => "https://i.imgur.com/ygnwqtI.jpg",
            'standart1' => "https://i.imgur.com/SQXfhvi.jpg",
            'standart2' => "https://i.imgur.com/0b45Elr.jpg",
            'standart3' => "https://i.imgur.com/BtDmXiV.jpg",
            'standart4' => "https://i.imgur.com/8zweb7u.jpg",
            'imagem_principal' => "https://i.imgur.com/Bl0QYD6.jpg",
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Oferta::query()->insert([
            [
                'game_id' => $game->id,
                'imagem' => "https://i.imgur.com/F5dVqOj.png",
                'nome' => "$game->nome deluxe",
                'descricao' => "Delux " . fake()->words(20, true),
                'preco' => 60,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'game_id' => $game->id,
                'imagem' => "https://i.imgur.com/Bl0QYD6.jpg",
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
            ],
        ]);

        /** Warframe */
        $game = Game::create([
            'nome' => "Warframe",
            "restricao_id" => 2,
            'preco' => 1.99,
            'descricao' => "A história de Warframe é um enredo complexo e em constante expansão dentro do jogo de tiro em terceira pessoa desenvolvido pela Digital Extremes. O jogo foi lançado em 2013 e desde então tem evoluído consideravelmente em termos de narrativa e jogabilidade.

            A narrativa de Warframe se passa em um futuro distante, onde a humanidade está à beira da extinção devido a uma série de ameaças intergalácticas. A história começa com os jogadores assumindo o papel de Tenno, guerreiros misteriosos equipados com armaduras biomecânicas chamadas Warframes. Essas armaduras concedem habilidades especiais aos Tenno e são a chave para enfrentar as ameaças que assolam o universo.
            
            A narrativa inicial do jogo gira em torno da guerra entre as facções Grineer e Corpus, que são duas das principais facções inimigas no universo de Warframe. Os jogadores são liderados por uma entidade conhecida como Lotus, que fornece orientação e missões. Conforme os jogadores progridem, eles começam a desvendar mistérios sobre o passado dos Tenno, o surgimento das Warframes e os segredos do universo.
            
            À medida que o enredo se desenvolve, os jogadores são apresentados a várias facções, inimigos poderosos e personagens-chave que desempenham papéis importantes na história, incluindo personagens como Alad V, Vor e Teshin. Os Tenno exploram diversos planetas e luas, cada um com sua própria história e conflitos, enquanto lutam para conter as ameaças que surgem.
            
            A narrativa de Warframe é contada principalmente por meio de missões e cinemáticas, mas também é complementada por eventos sazonais, atualizações e conteúdo adicional que a equipe de desenvolvimento adiciona regularmente. Os jogadores podem mergulhar na história do jogo e aprender mais sobre o universo por meio de quests, como A Second Dream e The War Within, que introduzem reviravoltas significativas e detalhes sobre a verdadeira natureza dos Tenno.
            A história de Warframe é em constante evolução, e novos elementos narrativos são adicionados regularmente, mantendo os jogadores envolvidos em um mundo de ficção científica repleto de intrigas e mistérios intergalácticos. É uma narrativa em expansão que cresce com o tempo, proporcionando aos jogadores uma experiência contínua e cativante.",
            'video' => "ue6EXMWMpc4",
            'imagem_esquerda' => "___",
            'imagem_direita' => "___",
            'background' => "https://i.imgur.com/xiqOXYr.jpg",
            'standart1' => "https://i.imgur.com/rmredGL.jpg",
            'standart2' => "https://i.imgur.com/nUsplwa.jpg",
            'standart3' => "https://i.imgur.com/4M4wVlA.jpg",
            'standart4' => "https://i.imgur.com/F5uc6qu.png",
            'imagem_principal' => "https://i.imgur.com/IpB1M7j.png",
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Oferta::query()->insert([
            [
                'game_id' => $game->id,
                'imagem' => "https://i.imgur.com/1QU9WYw.jpg",
                'nome' => "$game->nome deluxe",
                'descricao' => "Delux " . fake()->words(20, true),
                'preco' => fake()->randomNumber(3, true),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'game_id' => $game->id,
                'imagem' => "https://i.imgur.com/IpB1M7j.png",
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
                'categoria_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        /** Tunic */
        $game = Game::create([
            'nome' => "Tunic",
            "restricao_id" => 5,
            'preco' =>  56.99,
            'descricao' => "Seja valente, pequena raposa
            Explore uma terra repleta de lendas perdidas, poderes antigos e monstros ferozes em TUNIC, um jogo de ação isométrico sobre a grande aventura de uma pequena raposa. Presa em uma terra devastada e equipada somente com sua curiosidade, você confrontará feras colossais, coletará itens estranhos e poderosos e desvendará segredos há muito perdidos.
            TORNE-SE UMA LENDA
            As histórias dizem que um grande tesouro está escondido em algum lugar destas terras. Talvez repouse além da porta dourada? Ou em algum lugar nas profundezas da terra? Alguns contos descrevem um lugar acima das nuvens e seres ancestrais com poderes incríveis. O que você encontrará?
            RECONSTRUA UM LIVRO SAGRADO
            Durante suas viagens, você reconstruirá o manual de instruções do jogo. A cada página, você revelará mapas, dicas, técnicas especiais, e os segredos mais profundos. Se você encontrar cada uma delas, talvez algo bom aconteça...
            SEJA VALENTE, PEQUENINA!
            Mergulhe num combate diverso e repleto de técnicas. Esquive-se, bloqueie, apare golpes e acerte o alvo! Aprenda como conquistar uma ampla gama de monstros, grandes e pequenos, e descubra novos itens úteis que ajudarão você em seu caminho.
            Explore um mundo hostil e minuciosamente conectado de florestas frondosas, ruínas extensas e catacumbas labirínticas
            Duele contra chefes poderosos nas profundidades da terra, acima das nuvens e em lugares desconhecidos
            Colecione as páginas perdidas do manual, repletas de dicas e ilustrações originais e coloridas
            Descubra tesouros escondidos que ajudarão você em seu caminho
            Desenterre relíquias, técnicas e quebra cabeças secretos. Acredite quando digo que há muitos segredos!
            Design de som sob autoria da Power Up Audio
            Trilha sonora original composta por Lifeformed",
            'video' => "Q5XpgTO7YN0",
            'imagem_esquerda' => "___",
            'imagem_direita' => "___",
            'background' => "https://i.imgur.com/15WYh5H.png",
            'standart1' => "https://i.imgur.com/eFSsuxR.jpg",
            'standart2' => "https://i.imgur.com/X6dqibO.png",
            'standart3' => "https://i.imgur.com/79z7948.jpg",
            'standart4' => "https://i.imgur.com/KucOVHm.jpg",
            'imagem_principal' => "https://i.imgur.com/lhasPmZ.jpg",
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Oferta::query()->insert([
            [
                'game_id' => $game->id,
                'imagem' => "https://i.imgur.com/lhasPmZ.jpg",
                'nome' => "$game->nome collection edition",
                'descricao' => "Delux " . fake()->words(20, true),
                'preco' => 100,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'game_id' => $game->id,
                'imagem' => "https://i.imgur.com/lhasPmZ.jpg",
                'nome' => "$game->nome default",
                'descricao' => "Default " . fake()->words(20, true),
                'preco' => 56.99,
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
        ]);

        /** Stray */
        $game = Game::create([
            'nome' => "Stray",
            "restricao_id" => 4,
            'preco' => 69.99,
            'descricao' => "Perdido, sozinho e separado da sua família, um gato de rua precisa desvendar um mistério ancestral para fugir de uma cidade esquecida.

            Stray é um jogo de aventura felina em terceira pessoa que se passa nos detalhados becos iluminados por neon de uma cibercidade decadente e nos sombrios ambientes de seu submundo. Vague os arredores superiores e inferiores, defenda-se contra ameaças inesperadas e resolva os mistérios desse lugar hostil habitado por nada além de droides tranquilos e criaturas perigosas.
            
            Veja o mundo pelos olhos de um gato de rua e interaja com o ambiente de formas lúdicas. Seja furtivo, ágil, bobo e, às vezes, o mais irritante possível com os estranhos habitantes desse mundo exótico.
            
            Pelo caminho, o gato faz amizade com um pequeno drone voador, conhecido apenas como B-12. Com a ajuda de seu novo companheiro, a dupla vai tentar encontrar uma saída.
            
            Stray foi desenvolvido pela BlueTwelve Studio, uma pequena equipe do sul da França composta basicamente por gatos e alguns humanos.",
            'video' => "b-ugdyfd0ao",
            'imagem_esquerda' => "___",
            'imagem_direita' => "___",
            'background' => "https://i.imgur.com/43Cyr57.png",
            'standart1' => "https://i.imgur.com/DFAeT2F.png",
            'standart2' => "https://i.imgur.com/mg0yhSK.png",
            'standart3' => "https://i.imgur.com/eP8WmFd.png",
            'standart4' => "https://i.imgur.com/nhUK7Zm.png",
            'imagem_principal' => "https://i.imgur.com/nE9NoBt.png",
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Oferta::query()->insert([
            [
                'game_id' => $game->id,
                'imagem' => "https://i.imgur.com/WxI934A.png",
                'nome' => "$game->nome deluxe",
                'descricao' => "Delux " . fake()->words(20, true),
                'preco' => fake()->randomNumber(3, true),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'game_id' => $game->id,
                'imagem' => "https://i.imgur.com/nE9NoBt.png",
                'nome' => "$game->nome default",
                'descricao' => "Default " . fake()->words(20, true),
                'preco' => 69.99,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        CategoriaGame::query()->insert([
            [
                'game_id' => $game->id,
                'categoria_id' => 9,
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
                'categoria_id' => 6,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        /** The sims 4 */
        $game = Game::create([
            'nome' => "The sims 4",
            "restricao_id" => 4,
            'preco' => 55.99,
            'descricao' => "Crie Sims únicos
            Você tem uma variedade de Sims para personalizar, cada qual com aparências distintas, personalidades dinâmicas e aspirações inspiradoras. Use recursos poderosos de personalização para dar vida à sua imaginação. Crie você mesmo suas celebridades favoritas, suas fantasias, ou suas amizades! Troque as roupas de seus Sims para refletir o seu humor. Dê profundidade e propósito aos seus Sims com traços estranhos e grandes ambições.
            Construa a casa perfeita
            Projete facilmente as casas perfeitas para seus Sims usando o Modo Construção. Crie a casa dos seus sonhos planejando o layout, escolhendo a mobília e alterando a paisagem e o terreno. Você pode até construir uma piscina, subsolo e jardim. Não gostou do resultado? Descarte tudo e reconstrua facilmente usando novas ideias e projetos.
            Explore mundos vibrantes
            Seus Sims podem visitar novas comunidades para aumentar seu círculo social, passar o tempo com colegas e dar festas inesquecíveis.
            Jogue com a vida
            Suas escolhas definem todos os aspectos das vidas de seus Sims, do nascimento até a vida adulta. Nesse período, desenvolva habilidades, pratique passatempos, descubra a vocação de seus Sims, inicie novas famílias e muito mais.
            Descubra uma comunidade de gente que cria
            Use a Galeria para encontrar inspiração em uma rede de jogadores e jogadoras iguais a você, onde é possível adicionar conteúdo ao jogo e compartilhar suas próprias criações. Faça download, curta e deixe comentários para seus Sims, casas e cômodos favoritos. Participe da comunidade e participe da diversão!",
            'video' => "tJpxUUtdOS8",
            'imagem_esquerda' => "___",
            'imagem_direita' => "___",
            'background' => "https://i.imgur.com/ZfcB4N5.jpg",
            'standart1' => "https://i.imgur.com/IuKIIEb.jpg",
            'standart2' => "https://i.imgur.com/MfUavht.jpg",
            'standart3' => "https://i.imgur.com/zRFEsUs.jpg",
            'standart4' => "https://i.imgur.com/3DAYoQF.jpg",
            'imagem_principal' => "https://i.imgur.com/bDIQl0X.jpg",
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Oferta::query()->insert([
            [
                'game_id' => $game->id,
                'imagem' => "https://i.imgur.com/zqtTmVs.jpg",
                'nome' => "$game->nome deluxe",
                'descricao' => "Delux " . fake()->words(20, true),
                'preco' => fake()->randomNumber(3, true),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'game_id' => $game->id,
                'imagem' => "https://i.imgur.com/bDIQl0X.jpg",
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
        ]);

        /** Counter Strike*/
        $game = Game::create([
            'nome' => "Counter Strike",
            "restricao_id" => 2,
            'preco' => 76.49,
            'descricao' => "Jogue o jogo de ação número 1 no mundo. Junte-se a uma guerra incrivelmente realística contra o terrorismo neste jogo baseado em equipes. Alie-se com os seus colegas e complete missões estratégicas. Acabe com os inimigos. Resgate reféns. A forma como você joga afeta o sucesso da sua equipe. O sucesso da sua equipe afeta você.",
            'video' => "edYCtaNueQY",
            'imagem_esquerda' => "___",
            'imagem_direita' => "___",
            'background' => "https://i.imgur.com/wZLj4CF.png",
            'standart1' => "https://i.imgur.com/4vQqMGp.jpg",
            'standart2' => "https://i.imgur.com/evXhIaP.png",
            'standart3' => "https://i.imgur.com/GDP56AX.png",
            'standart4' => "https://i.imgur.com/l2xmKfy.png",
            'imagem_principal' => "https://i.imgur.com/FsYpYHW.jpg",
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Oferta::query()->insert([
            [
                'game_id' => $game->id,
                'imagem' => "https://i.imgur.com/AfGBeFO.png",
                'nome' => "$game->nome deluxe",
                'descricao' => "Delux " . fake()->words(20, true),
                'preco' => 76.49,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'game_id' => $game->id,
                'imagem' => "https://i.imgur.com/FsYpYHW.jpg",
                'nome' => "$game->nome default",
                'descricao' => "Default " . fake()->words(20, true),
                'preco' => 76.49,
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
        ]);
    }
}
