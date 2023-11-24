import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, Link } from '@inertiajs/react';
import { PageProps } from '@/types';
import axios from 'axios';
import Swal from 'sweetalert2';
import { useEffect, useState } from 'react';
import ShoppingCartOutlinedIcon from '@mui/icons-material/ShoppingCartOutlined';
import RemoveOutlinedIcon from '@mui/icons-material/RemoveOutlined';
import AddOutlinedIcon from '@mui/icons-material/AddOutlined';

export default function ShoppingCart({ auth, cart }: PageProps<{ cart: any }>) {
    const [removidos, setRemovidos] = useState<any>([]);
    const [quantidadeStatus, setQuantidadeStatus] = useState<any>([]);
    const [efeito, setEfeito] = useState('');

    useEffect(() => {
        if (cart.item_carrinhos.length === 0) {
            setEfeito('overflow-hidden shadow-sm rounded-lg grid grid-cols-5 gap-3');
        } else {
            setEfeito('overflow-hidden shadow-sm rounded-lg grid grid-cols-5 gap-2');
        }
    }, [cart.item_carrinhos])

    let total = 0;

    if (cart.item_carrinhos.length > 0) {
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

    const handleClickForFinalized = () => {
        axios.delete(route('cartShop.destroy')).then((response) => {
            window.location.reload();
        })
        Swal.fire({
            title: "Compra finalizada com sucesso!",
            text: "Agradecemos a sua compra!",
            imageUrl: "https://i.pinimg.com/564x/d4/28/91/d42891fe428976f4b3eac6fbfaaeccdb.jpg",
            imageWidth: 400,
            imageHeight: 200,
            imageAlt: "Custom image"
          });
    }

    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Carrinho de compras</h2>}
        >
            <Head title="Cart" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className={efeito}>
                        <div className="col-span-5 mx-auto mb-6">
                            <h1 className='text-3xl float-left uppercase  text-white '>Meu carrinho</h1>
                        </div>
                        {cart.item_carrinhos.length === 0 ? (
                            <>
                                <div className='col-span-4'>
                                    <div className="grid grid-cols-3 grid-rows-3 gap-2 bg-stone-800 border border-gray-800 text-white rounded-xl">
                                        <ShoppingCartOutlinedIcon className="row-span-3 justify-self-center mt-10 mb-10" sx={{ fontSize: 320 }} />
                                        <div className="row-span-2 col-span-2">
                                            <h1 className='text-3xl uppercase mt-32 mb-7'> Desculpe!</h1>
                                            <p className='text-2xl'>Não conseguimos encontrar nenhum jogo no seu carrinho de compras</p>
                                        </div>
                                        <span></span>
                                        <h1 className='text-xl text-sky-500 mt-20 cursor-pointer'>veja alguns jogos que talvez você goste!</h1>
                                    </div>
                                </div>
                            </>
                        ) : (
                            cart.item_carrinhos.map((item_carrinho: any) => (
                                <div className="col-span-4" key={item_carrinho.id}>
                                    <div className="grid grid-cols-4 grid-rows-3 gap-2 bg-stone-800 hover:bg-stone-700 text-white rounded-xl">
                                        <div className="px-2 row-span-3">
                                            <Link
                                                href={route('games.show', item_carrinho.ofertas.id)}
                                            >
                                            <img src={item_carrinho.ofertas.imagem} className="rounded-xl object-cover h-60 w-48 mt-3 mb-3" />
                                            </Link>
                                        </div>
                                        <div className="px-2 row-span-3 col-span-2 ">
                                            <h1 className='text-3xl mt-10'>{item_carrinho.ofertas.nome}</h1>
                                            <div className="flex justify-start gap-6 bg-gray-700 mt-6 w-[75%] p-4">
                                                <p className='text-2xl text-stone-700 px-4 rounded-xl p-3' style={{ backgroundColor: item_carrinho.ofertas.games.restricao.background }}>{item_carrinho.ofertas.games.restricao.idade}</p>
                                                <p className='text-lg'>{item_carrinho.ofertas.games.restricao.descricao}</p>
                                            </div>
                                            <div className="flex justify-start gap-2 mt-5">
                                                <div onClick={(e) => handleClickForRemove(auth, item_carrinho.id, e)}>
                                                    <RemoveOutlinedIcon className="text-white border border-gray-900 hover:bg-red-700 rounded" />
                                                </div>
                                                <p className='text-lg'>{item_carrinho.quantidade}</p>
                                                <div onClick={(e) => handleClickForAdd(auth, item_carrinho.ofertas.id, e)}>
                                                    <AddOutlinedIcon className="text-white border border-gray-900 hover:bg-green-700 rounded" />
                                                </div>
                                            </div>
                                        </div>
                                        <div className="row-span-3 flex justify-end">
                                            <h1 className='text-lg mt-3 px-5'>R$: {item_carrinho.ofertas.preco}</h1>
                                        </div>
                                    </div>
                                </div>
                            )
                            )
                        )}
                        <div className="col-span-1 text-white rounded-xl" style={{ position: 'fixed', top: '50%', transform: 'translateY(-50%)', right: '17%' }}>
                            <h1 className="text-center text-2xl uppercase">Resumo do pedido</h1>
                            <div className="flex justify-between mt-3 text-lg">
                                <p>Desconto:</p>
                                <p className='text-gray-400'>Desabilitado</p>
                            </div>
                            <div className="flex justify-between mt-3 text-lg">
                                <p>imposto:</p>
                                <p className='text-gray-400'>Desabilitado</p>
                            </div>
                            <div className="flex justify-between mt-3 text-lg">
                                <p>taxa entrega:</p>
                                <p className='text-gray-400'>Desabilitado</p>
                            </div>
                            <div className="flex justify-between mt-3 border-t-2 border-gray-200 text-lg">
                                <p>Total:</p>
                                <p>R$ {total}</p>
                            </div>
                            <div className="lh-btn-primary" onClick={handleClickForFinalized}>
                                Finalizar pedido
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </AuthenticatedLayout>
    );


}
