import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, Link } from '@inertiajs/react';
import { PageProps } from '@/types';
import axios from 'axios';
import { useEffect, useState } from 'react';

export default function Wishlist({ auth }: PageProps<{ favoritos: any }>) {
  const [favoritos, setFavoritos] = useState([]);

  useEffect(() => {
    axios.get(route('favorite.index')).then((response) => {
      setFavoritos(response.data.favoritos);
    })
  },[])
  
  console.log(favoritos)
  return (
    <AuthenticatedLayout
      user={auth.user}
      header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Wishlist</h2>}
    >
      <Head title="Wishlist" />

      <div className="py-12">
        <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div className="overflow-hidden shadow-sm rounded-lg grid grid-cols-3 gap-5">

            {favoritos.length === 0 ? (
              <div className="col-span-3">você não possui favoritos</div>
            ) : (
              favoritos.map((favorito: any) => (
                <div className="" key={favorito.id}>
                  <Link
                    href={route('games.show', { 'id': favorito.game_id })}
                    className="font-semibold text-gray-600 hover:text-gray-900  focus:rounded-sm ">
                    <img src={favorito.games.imagem_principal} alt="" className={"object-cover rounded-lg shadow-md"} />
                    <div className="bg-gray-200 hover:bg-slate-100 border-gray-700">
                      <h1 className="text-2xl text-center font-bold uppercase ">{favorito.games.nome}</h1>
                      <p className="leading-4 px-2">{favorito.games.descricao.substring(0, 50) + '...'}</p>
                      <h2 className="px-2">R${favorito.games.preco}</h2>
                    </div>
                  </Link>
                </div>
              ))
            )}
          </div>
        </div>
      </div>
    </AuthenticatedLayout>
  );


}
