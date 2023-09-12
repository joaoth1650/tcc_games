import VisitanteLayout from "@/Layouts/VisitanteLayout";
import { PageProps } from "@/types";

export default function IndexGames({ auth, games }: PageProps<{ games: any }>) {
  console.log(games)
  return <VisitanteLayout auth={auth} title="Teste">
    <div className="text-white w-full">
      {games.map((game: any) => (
        <div key={game.id} className="border-b border-gray-200">
            <img src={game.imagem_principal} alt="" className={"w-96 border h-32 object-cover"} />
        </div>
      ))}
    </div>
  </VisitanteLayout>;


}