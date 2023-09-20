import VisitanteLayout from '@/Layouts/VisitanteLayout'
import { PageProps } from '@/types'
import React from 'react'

const GameIndividual = ({ auth, games }: PageProps<{ games: any }>) => {
  console.log(games);
  return (
    <VisitanteLayout auth={auth} title="Teste">
      <div className="bg-fixed bg-no-repeat p-5" style={{ backgroundImage: "url('" + games.background + "')" }}>
        <div className="container w-8/12 mx-auto ">
          <div className="bg-gray-900 rounded-xl shadow-lg p-5">
            <div className="grid grid-cols-4 gap-4">
              <h1 className="text-4xl text-white font-bold uppercase col-span-2">{games.nome}</h1>            
              <span></span>
              <span></span>
              <div className="flex col-span-2">
                <h1 className='text-3xl bg-blue-600 pl-2 p-1 text-white w-11 rounded-lg'>{}</h1>
                <p className="mt-auto p-2 text-white">Não Recomendado Para Crianças Menores de 10 anos.</p>
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
            <div className="flex gap-2 justify-center items-center mt-5">
            {games.ofertas.map((oferta: any) => {
              return (
              <div className="w-full flex flex-col items-center gap-5 " key={oferta.id}>
                  <img src={oferta.imagem} alt="" className='rounded-xl'  />
                  <p className='text-2xl text-white bg-orange-500 px-6 rounded-xl'>{oferta.nome}</p>
                  <p className='text-lg text-white bg-gray-500 rounded-xl px-3'>R$ {oferta.preco}</p>
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