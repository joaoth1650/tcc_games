import VisitanteLayout from "@/Layouts/VisitanteLayout";
import { PageProps } from "@/types";
import { Head, Link } from '@inertiajs/react';
import StarOutlineIcon from '@mui/icons-material/StarOutline';

export default function IndexGames({ auth, games }: PageProps<{ games: any }>) {
  console.log(games)
  return (
    <VisitanteLayout auth={auth} title="Teste">
      <div className="py-12">
        <div className="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
          <div className=" overflow-hidden shadow-sm rounded-lg grid grid-cols-3 gap-5">
            {games.map((game: any) => (
              <Link href={route('games.show', { 'id': game.id })}
                className="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
              >
                <div key={game.id} className=" bg-gray-300 rounded-lg hover:bg-slate-100  border-gray-700">
                  <img src={game.imagem_principal} alt="" className={"border object-cover rounded-lg shadow-md"} />

                  <h1 className="text-2xl text-center font-bold uppercase">{game.nome}</h1>
                  
                  <p className="leading-4 px-2">{game.descricao.substring(0, 50) + '...'}     </p>
                  <h2 className="px-2">R${game.preco}</h2>

                </div>
              </Link>
            ))}
          </div>
        </div>
      </div>
    </VisitanteLayout>

  )
}