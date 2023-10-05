import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, Link } from '@inertiajs/react';
import { PageProps } from '@/types';

export default function ShoppingCart({ auth, cart }: PageProps<{ cart: any }>) {
  console.log(cart)
  return (
    <AuthenticatedLayout
      user={auth.user}
      header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Carrinho de compras</h2>}
    >
      <Head title="Cart" />

      <div className="py-12">
        <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div className="overflow-hidden shadow-sm rounded-lg grid grid-cols-3 gap-5">
            <div className="flex gap-64 justify-center items-center mt-5">
              {cart.item_carrinhos.length === 0 ? (
                <div className="col-span-3">Seu carrinho está vazio!</div>
              ) : (
                cart.item_carrinhos.map((item_carrinho: any) => {
                  return(
                  <div className="" key={cart.id}>
                    <Link
                      href={route('games.show', { 'id': item_carrinho.ofertas.id })}
                      className="font-semibold text-gray-600 hover:text-gray-900 focus:rounded-sm"
                    >
                      <div className="bg-gray-200 hover:bg-slate-100 border-gray-700">
                        {cart.item_carrinhos.map((item: any) => (
                          <div className="">
                            <h1 className="text-2xl text-center font-bold uppercase">
                              {item.ofertas.nome || 'Nome do Jogo Não Disponível'}
                            </h1>
                            <img src={item.ofertas.imagem} alt="" className={"object-cover rounded-lg shadow-md"} />
                            <p className="leading-4 px-2">desconto:R${cart.desconto}</p>
                            <p className="leading-4 px-2">R${cart.total}</p>
                            <h2 className="px-2">{cart.situacao}</h2>
                          </div>
                        ))}

                      </div>
                    </Link>
                  </div>
                )}
                )
              )}
            </div>
          </div>
        </div>
      </div>
    </AuthenticatedLayout>
  );


}
