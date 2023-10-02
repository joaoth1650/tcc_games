import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, Link } from '@inertiajs/react';
import { PageProps } from '@/types';

export default function ShoppingCart({ auth, carts }: PageProps<{ carts: any }>) {
  console.log(carts)
  return (
    <AuthenticatedLayout
      user={auth.user}
      header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Wishlist</h2>}
    >
      <Head title="Wishlist" />

      <div className="py-12">
        <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div className="overflow-hidden shadow-sm rounded-lg grid grid-cols-3 gap-5">

            {carts.length === 0 ? (
              <div className="col-span-3">você não possui favoritos</div>
            ) : (
              carts.map((cart: any) => (
                <div className="" key={cart.id}>
                  <Link
                    href={route('games.show', { 'id': cart.game_id })}
                    className="font-semibold text-gray-600 hover:text-gray-900  focus:rounded-sm ">
                    <img src={cart.games.imagem_principal} alt="" className={"object-cover rounded-lg shadow-md"} />
                    <div className="bg-gray-200 hover:bg-slate-100 border-gray-700">
                      <h1 className="text-2xl text-center font-bold uppercase ">{cart.games.nome}</h1>
                      <p className="leading-4 px-2">{cart.games.descricao.substring(0, 50) + '...'}</p>
                      <h2 className="px-2">R${cart.games.preco}</h2>
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
