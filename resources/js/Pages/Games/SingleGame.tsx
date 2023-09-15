import VisitanteLayout from '@/Layouts/VisitanteLayout'
import { PageProps } from '@/types'
import React from 'react'

const GameIndividual = ({ auth, games }: PageProps<{ games: any }>) => {
  return (
    <VisitanteLayout auth={auth} title="Teste">
      <div className="bg-fixed bg-no-repeat p-5" style={{ backgroundImage: "url('" + games.imagem_principal + "')" }}>
        <div className="container w-8/12 mx-auto ">
          <div className="bg-gray-900 rounded-lg shadow-lg p-5">
            <div className="grid grid-cols-4 gap-4">
              <h1 className="text-4xl text-white font-bold uppercase">{games.nome}</h1>
              <span></span>
              <span></span>
              <span></span>
              <div className="flex col-span-2">
                <h1 className='text-3xl bg-blue-600 pl-2 p-1 text-white w-11 rounded-lg'>10</h1>
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
            
            {games.ofertas.map((oferta: any) => {
              return (
                <div className="grid grid-cols-2 gap-6" key={oferta.id}>
                <div>
                  <img src={oferta.imagem} alt="" />
                </div>
                <div>
                  <img src={oferta.imagem} alt="" />
                </div>
            </div>
              )
            })}
          </div>
        </div>
      </div>
    </VisitanteLayout>
  )
}

export default GameIndividual