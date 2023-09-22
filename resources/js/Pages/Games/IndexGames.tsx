import VisitanteLayout from "@/Layouts/VisitanteLayout";
import { PageProps } from "@/types";
import { Head, Link } from '@inertiajs/react';
import axios from 'axios';
import AddCircleOutlineTwoToneIcon from '@mui/icons-material/AddCircleOutlineTwoTone';
import RemoveCircleTwoToneIcon from '@mui/icons-material/RemoveCircleTwoTone';
import { IconButton } from "@mui/material";
import Swal from "sweetalert2";

export default function IndexGames({ auth, games }: PageProps<{ games: Array<any>, auth: object }>) {
  const handleClick = (userId: number | undefined, gameId: number) => {

    if (userId === undefined) {
      Swal.fire({
        title: 'Você precisa estar logado para adicionar um jogo à sua lista!',
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        html: `<a href="/register" >Criar conta agora!</a>`,
      });
      return;
    }

    axios.post( route('favorite.create'), { user_id: userId, game_id: gameId }).then((response) => {
      console.log(response.data);
    })

    // console.log('Clicado!', `User ID: ${userId}, Game ID: ${gameId}`);
  };

  console.log(typeof auth)

  return (
    <VisitanteLayout auth={auth} title="Teste">
      <div className="py-12">
        <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div className="overflow-hidden shadow-sm rounded-lg grid grid-cols-3 gap-5">
            {games.map((game: any) => (
              <div className="" key={game.id}>
                <div
                  onClick={() => handleClick(auth?.user?.id ?? undefined, game.id)}
                  className=" hover:scale-110 transform transition-transform cursor-pointer float-right">
                  <AddCircleOutlineTwoToneIcon className="text-green-500 text-4xl" />
                </div>
                <Link
                  href={route('games.show', { 'id': game.id })}
                  className="font-semibold text-gray-600 hover:text-gray-900  focus:rounded-sm ">
                  <img src={game.imagem_principal} alt="" className={"object-cover rounded-lg shadow-md"} />
                  <div className="bg-gray-200 hover:bg-slate-100 border-gray-700">
                    <h1 className="text-2xl text-center font-bold uppercase ">{game.nome}</h1>
                    <p className="leading-4 px-2">{game.descricao.substring(0, 50) + '...'}</p>
                    <h2 className="px-2">R${game.preco}</h2>
                  </div>
                </Link>
              </div>
            ))}
          </div>
        </div>
      </div>
    </VisitanteLayout>
  );
}
