import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, Link } from '@inertiajs/react';
import { PageProps } from '@/types';
import axios from 'axios';
import Swal from 'sweetalert2';
import { useState } from 'react';

export default function ShoppingCart({ auth, cart }: PageProps<{ cart: any }>) {
  const [removidos, setRemovidos] = useState<any>([]);
  const [quantidadeStatus, setQuantidadeStatus] = useState<any>([]);

  let total = 0;
  if(cart.item_carrinhos.length > 0) {
    cart.item_carrinhos.map((item_carrinho: any) => total += parseInt(item_carrinho.ofertas.preco) * item_carrinho.quantidade);
  }

  const handleClickForRemove = (auth: any, id: number, e: any) => {
    e.preventDefault(); 
    if (auth.user === null) {
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

    axios.delete(route('cart.destroy', { id })).then((response) => {
      window.location.reload();
    })
  };

  const handleClickForAdd = (auth: any, id: number, e: any) => {
    e.preventDefault(); 
    axios.post(route('cart.create', { 'oferta_id': id })).then((response) => {
      window.location.reload();
    })
  }

  

  return (
    <AuthenticatedLayout
      user={auth.user}
      header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Carrinho de compras</h2>}
    >
      <Head title="Cart" />

      <div className="py-12">
        <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div className="overflow-hidden shadow-sm rounded-lg flex flex-col gap-1">

            {cart.item_carrinhos.length === 0 ? (
              <div className="col-span-3">Seu carrinho está vazio!</div>
            ) : (
              cart.item_carrinhos.map((item_carrinho: any) => (
                <div key={item_carrinho.id}>
                  <div className="flex">
                    <Link href={route('games.show', { 'id': item_carrinho.ofertas.game_id })}
                      className="font-semibold text-gray-600 hover:text-gray-900 focus:rounded-sm justify-start w-full">
                      <div className="flex justify-between items-center bg-gray-200 hover:bg-slate-100 border-gray-700 p-4">
                        <img src={item_carrinho.ofertas.imagem} alt="" className="object-cover rounded-lg shadow-md w-32" />
                        <h1 className="text-xl text-center font-bold uppercase">
                          {item_carrinho.ofertas.nome || 'Nome do Jogo Não Disponível'}
                        </h1>
                        <div className="grid grid-cols-3">
                          <div onClick={(e) => handleClickForRemove(auth, item_carrinho.id, e)}>
                            <p className="leading-4 px-3 border border-gray-700 rounded "> -</p>
                          </div>
                          <p className='text-center'>{item_carrinho.quantidade}</p>
                          <div onClick={(e) => handleClickForAdd(auth, item_carrinho.ofertas.id, e)}>
                            <p className="leading-4 px-3 border border-gray-700 rounded">+</p>
                          </div>
                        </div>
                        <p className="leading-4 px-2">R$ {item_carrinho.ofertas.preco}/Unid</p>
                        <h2 className="px-2">{cart.situacao}</h2>
                      </div>
                    </Link>
                  </div>
                </div>
              )
              )
            )}
            
            <div className="flex justify-between items-center">
              <h4>total</h4>
              <h4>R$ {total}</h4>
            </div>
          </div>
        </div>
      </div>

    </AuthenticatedLayout>
  );


}
