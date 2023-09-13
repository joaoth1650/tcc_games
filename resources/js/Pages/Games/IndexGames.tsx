import VisitanteLayout from "@/Layouts/VisitanteLayout";
import { PageProps } from "@/types";

export default function IndexGames({ auth, games }: PageProps<{ games: any }>) {
  console.log(games)
  return <VisitanteLayout auth={auth} title="Teste">
    <div className="py-12">
        <div className="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg grid grid-cols-4 gap-2">
            {games.map((game: any) => (
        <div key={game.id} className="border-b border-gray-200 rounded">
            <img src={game.imagem_principal} alt="" className={" w- border  object-cover"} />
            <h1>{game.nome}</h1>
            <h2>{game.preco}</h2>
            
        </div>
      ))}
            </div>
        </div>
    </div>
  </VisitanteLayout>;


}