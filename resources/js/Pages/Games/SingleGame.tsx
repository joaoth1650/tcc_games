import VisitanteLayout from '@/Layouts/VisitanteLayout'
import { PageProps } from '@/types'
import AddShoppingCartRoundedIcon from '@mui/icons-material/AddShoppingCartRounded';
import ShoppingCartRoundedIcon from '@mui/icons-material/ShoppingCartRounded';
import { CardActionArea } from '@mui/material';
import axios from 'axios';
import React, { useState } from 'react'
import Swal from 'sweetalert2';

const GameIndividual = ({ auth, games }: PageProps<{ games: any }>) => {
  console.log(games);

  const [addAoCarrinho, setAddAoCarrinho] = useState<any>([]);

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
    }

    axios.post(route('cart.create'), { oferta_id: ofertaId }).then((response) => {

      setAddAoCarrinho([...addAoCarrinho, ofertaId]);
    })

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
                <h1 className='text-3xl bg-blue-600 pl-2 p-1 text-white w-11 rounded-lg' style={{ backgroundColor: games.restricao.background }}>{games.restricao.idade}</h1>
                <p className="mt-auto p-2 text-white">{games.restricao.descricao}</p>
              </div>
            </div>
            <div className="grid grid-cols-4 gap-4 mt-10">
              <div className="">
                <img className='rounded-lg w-72' src={games.standart1} alt="" />
              </div>
              <div className="">
                <img className='rounded-lg w-72' src={games.standart2} alt="" />
              </div>
              <div className="">
                <img className='rounded-lg w-72' src={games.standart3} alt="" />
              </div>
              <div className="">
                <img className='rounded-lg w-72' src={games.standart4} alt="" />
              </div>
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
            <div className="flex gap-20 justify-center items-center mt-5">
              {games.ofertas.map((oferta: any) => {
                return (
                  <div className="w-96 flex flex-col gap-5" key={oferta.id}>
                    <img src={oferta.imagem} alt="" className='rounded-xl w-96 h-52' />
                    <p className='text-3xl text-white  px-3 rounded-xl'>{oferta.nome}</p>

                    <div className="grid grid-flow-col gap-3">
                      <p className='text-lg text-white rounded-xl px-3'>R$ {oferta.preco}</p>
                      <CardActionArea >
                        <div className="bg-gray-500 rounded-xl px-1 text-center hover:bg-zinc-400" onClick={() => handleClick(auth, oferta.id)}>
                          <AddShoppingCartRoundedIcon className="text-3xl text-white" />
                        </div>
                      </CardActionArea>
                    </div>
                  </div>
                )
              })}
            </div>
          </div>
        </div>
      </div>
    </VisitanteLayout>
  )
}

export default GameIndividual