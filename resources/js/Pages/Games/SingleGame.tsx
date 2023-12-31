import VisitanteLayout from '@/Layouts/VisitanteLayout'
import { PageProps } from '@/types'
import ArrowBackIosRoundedIcon from '@mui/icons-material/ArrowBackIosRounded';
import ArrowForwardIosRoundedIcon from '@mui/icons-material/ArrowForwardIosRounded';
import { CardActionArea } from '@mui/material';
import axios from 'axios';
import React, { useState } from 'react'
import Swal from 'sweetalert2';

const GameIndividual = ({ auth, games }: PageProps<{ games: any }>) => {
    console.log(games);

    const [addAoCarrinho, setAddAoCarrinho] = useState<any>([]);
    const [imagemPrincipal, setImagemPrincipal] = useState(games.standart1);
    const [posicaoAtual, setPosicaoAtual] = useState(0);

    const handleClick = (auth: any, ofertaId: number) => {

        if (auth.user === null) {
            Swal.fire({
                title: 'Você precisa estar logado para adicionar um jogo ao seu carrinho!',
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                html: `<a href="/register" >Criar conta agora!</a>`,
            });
            return;
        } else if (addAoCarrinho.includes(ofertaId)) {
            Swal.fire({
                title: 'Jogo ja adicionado ao carrinho!',
                toast: true,
                icon: 'warning',
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
            return;
        }

        axios.post(route('cart.create'), { oferta_id: ofertaId }).then((response) => {

            setAddAoCarrinho([...addAoCarrinho, ofertaId]);
            Swal.fire({
                title: 'Jogo adicionado ao carrinho!',
                toast: true,
                icon: 'success',
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            })
        })

    };

    const handleMouseEnter = (numero: number) => {
        setImagemPrincipal(games[`standart${numero}`]);
    };

    const handleNextImage = () => {
        const newposition = (posicaoAtual + 1) % 4;
        setImagemPrincipal(games[`standart${newposition + 1}`]);
        setPosicaoAtual(newposition);
    };

    const handlePrevImage = () => {
        const newposition = (posicaoAtual - 1 + 4) % 4;
        setImagemPrincipal(games[`standart${newposition + 1}`]);
        setPosicaoAtual(newposition);
    };

    return (
        <VisitanteLayout auth={auth} title="Teste" header={<h2 className="font-semibold text-xl text-gray-800 leading-tight"></h2>}>
            <div className="bg-fixed bg-no-repeat p-5 bg-cover" style={{ backgroundImage: "url('" + games.background + "')" }}>
                <div className="container w-8/12 mx-auto ">
                    <div className="bg-stone-900 rounded-xl shadow-lg p-5">
                        <div className="grid grid-cols-4 gap-4">
                            <h1 className="text-4xl text-white font-bold uppercase col-span-2">{games.nome}</h1>
                            <span></span>
                            <span></span>
                            <div className="flex col-span-2">
                                <h1 className='text-3xl bg-blue-600 pl-2 p-1 text-stone-900 w-11 rounded-lg ' style={{ backgroundColor: games.restricao.background }}>{games.restricao.idade}</h1>
                                <p className="mt-auto p-2 text-white">{games.restricao.descricao}</p>
                            </div>
                        </div>
                        <div className="justify-center px-16 mt-9 flex">
                            <CardActionArea className='hover:bg-stone-800 hover:opacity-80' onClick={handlePrevImage}>
                                <div  className="flex justify-center items-center">
                                    <ArrowBackIosRoundedIcon className='text-white cursor-pointer' sx={{ fontSize: 50 }} />
                                </div>
                            </CardActionArea>
                            <img className="rounded-lg w-full" src={imagemPrincipal} alt="" />
                            <CardActionArea className='hover:bg-stone-800 hover:opacity-80' onClick={handleNextImage}>
                                <div  className="flex justify-center items-center ">
                                    <ArrowForwardIosRoundedIcon className='text-white cursor-pointer' sx={{ fontSize: 50 }} />
                                </div>
                            </CardActionArea>
                        </div>
                        <div className="grid grid-cols-4 gap-4 mt-10">
                            {[1, 2, 3, 4].map((numero) => (
                                <div key={numero} onMouseEnter={() => handleMouseEnter(numero)} className={imagemPrincipal === games[`standart${numero}`] ? 'shadow-lg shadow-stone-700 opacity-100' : 'opacity-60'}>
                                    <img className="rounded-lg w-72" src={games[`standart${numero}`]} alt="" />
                                </div>
                            ))}
                        </div>
                        <h1 className="text-2xl text-white font-bold uppercase mt-10 mb-7">Visão Geral do Jogo</h1>
                        <p className="leading-6 px-28 text-white text-justify">{games.descricao}</p>
                        <div className="px-28 mt-16">
                            <div className="relative" style={{ paddingBottom: '56.25%', height: 0 }}>
                                <iframe
                                    className="absolute rounded-xl inset-0 px-16  w-full h-full"
                                    src={`https://www.youtube.com/embed/${games.video}`}
                                    title="YouTube video"
                                    allowFullScreen
                                />
                            </div>
                        </div>
                        <div className="flex gap-20 justify-center items-center mt-5 cursor-default">
                            {games.ofertas.map((oferta: any) => {
                                return (
                                    <div className="w-96 flex flex-col gap-5 hover:bg-stone-800 rounded-xl" key={oferta.id}>
                                        <img src={oferta.imagem} alt="" className='rounded-lg object-cover bg-center w-96 h-52 shadow-xl shadow-slate-700' />
                                        <p className='text-2xl text-white uppercase  rounded-xl px-2'>{oferta.nome}</p>
                                        <p className='text-2xl text-white px-4'>R$ {oferta.preco}</p>
                                        <div className="lh-btn-default" onClick={() => handleClick(auth, oferta.id)}>Adicionar ao carrinho</div>
                                    </div>
                                )
                            })}
                        </div>
                    </div>
                </div>
            </div>
        </VisitanteLayout >
    )
}

export default GameIndividual
