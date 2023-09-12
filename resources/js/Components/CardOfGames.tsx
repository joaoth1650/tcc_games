import { PageProps } from '@/types'
import React from 'react'

const CardOfGames = ({ auth, games }: PageProps<{ games: any }>) => {
  return (
    <div className="text-white w-full">
      <table className="table-auto">
        <thead>
          <tr>
            <th>name</th>
            <th>price</th>
            <th>image</th>
          </tr>
        </thead>
        <tbody>
        {games.map((game: any) => (
          <tr className="border-b border-gray-200 even:bg-slate-900 odd:bg-slate-700" key={game.id}>
            <td className="px-32">{game.nome}</td>
            <td className="px-32">{game.preco}</td>
            <td className="px-32"> <img  className="w-20" src={game.imagem_principal} alt="" /></td>
          </tr>
        ))}
        </tbody>
      </table>
    </div>
  )
}

export default CardOfGames