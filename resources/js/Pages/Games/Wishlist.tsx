import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, Link } from '@inertiajs/react';
import { PageProps } from '@/types';
import axios from 'axios';
import ShoppingCartIcon from '@mui/icons-material/ShoppingCart';
import FavoriteBorderIcon from '@mui/icons-material/FavoriteBorder';
import FavoriteRoundedIcon from '@mui/icons-material/FavoriteRounded';
import { useEffect, useState } from 'react';
import Swal from 'sweetalert2';

export default function Wishlist({ auth, games }: PageProps<{ favoritos: any, games: any }>) {
    const [favoritos, setFavoritos] = useState([]);
    const [efeito, setEfeito] = useState('');
    const [addAoCarrinho, setAddAoCarrinho] = useState<any>([]);

    useEffect(() => {
        axios.get(route('favorite.index')).then((response) => {
            setFavoritos(response.data.favoritos);
        })
    }, [])

    useEffect(() => {
        if (favoritos.length === 0) {
            setEfeito('overflow-hidden shadow-sm rounded-lg grid grid-cols-2');
        } else {
            setEfeito('overflow-hidden shadow-sm rounded-lg grid grid-cols-2 gap-6');
        }
    }, [favoritos])

    const handleClick = (auth: any, ofertaId: number) => {

        if (auth.user === null) {
            Swal.fire({
                title: 'Você precisa estar logado para adicionar um jogo ao seu carrinho!',
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                html: `<a href="/register" >Criar conta agora!</a>`,
            });
            return;
        } else if (addAoCarrinho.includes(ofertaId)) {
            Swal.fire({
                title: 'Jogo ja adicionado ao carrinho!',
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
            return;
        }

        axios.post(route('cart.create'), { oferta_id: ofertaId }).then((response) => {

            setAddAoCarrinho([...addAoCarrinho, ofertaId]);
        })

    };

    const handleClickForDelete = (auth: any, gameId: number) => {
        axios.delete(route('favorite.destroy', { 'id': gameId })).then(() => {
            window.location.reload();
        });
    };
    console.log(favoritos)
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Wishlist</h2>}
        >
            <Head title="Wishlist" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className={efeito}>
                        <div className="col-span-2 mb-6">
                            <h1 className='text-3xl float-left uppercase  text-white '>Lista de desejos</h1>
                        </div>

                        {favoritos.length === 0 ? (
                            <>
                                <div className='col-span-3'>
                                    <div className="grid grid-cols-3 grid-rows-3 gap-2 bg-stone-800 border border-gray-800 text-white rounded-xl">
                                        <FavoriteBorderIcon className="row-span-3 justify-self-center mt-10 mb-10" sx={{ fontSize: 320 }} />
                                        <div className="row-span-2 col-span-2">
                                            <h1 className='text-3xl uppercase mt-32 mb-7'> Desculpe!</h1>
                                            <p className='text-2xl'>Não conseguimos encontrar nenhum jogo na sua lista de desejos</p>
                                        </div>
                                        <span></span>
                                        <Link href={route('games.index')}>
                                            <h1 className='text-xl text-sky-500 mt-20 cursor-pointer'>veja alguns jogos que talvez você goste!</h1>
                                        </Link>
                                    </div>
                                </div>
                            </>
                        ) : (
                            favoritos.map((favorito: any) => (
                                <div className="bg-stone-900 hover:bg-stone-800 grid grid-cols-2 rounded-xl group" key={favorito.id}>
                                    <Link className='relative overflow-hidden group rounded-xl' href={route('games.show', { 'id': favorito.game_id })}>
                                        <img
                                            src={favorito.games.imagem_principal}
                                            alt={favorito.games.nome}
                                            title={favorito.games.nome}
                                            className={"object-cover bg-center rounded-2xl shadow-md max-h-96 h-80 w-[100%] transform scale-100 group-hover:scale-110 transition-transform duration-300 ease-in-out "}
                                        />
                                    </Link>

                                    <div className='grid grid-rows-4'>
                                        <div className="hidden group-hover:flex group-hover:justify-end hover:scale-105 transform transition-transform cursor-pointer float-right px-4 mt-4">
                                            <FavoriteRoundedIcon className="text-red-500 text-4xl" onClick={() => handleClickForDelete(auth, favorito.game_id)} />
                                        </div>

                                        <Link className='row-span-3' href={route('games.show', { 'id': favorito.game_id })}>
                                            <h1 className='text-3xl uppercase px-5 text-white mt-3'>{favorito.games.nome}</h1>
                                            <p className="leading-4 text-white px-8 mt-5">{favorito.games.descricao.substring(0, 50) + '...'}</p>
                                        </Link>

                                        <div className="flex justify-end text-center mt-8">
                                            <ShoppingCartIcon className="text-white hover:text-sky-400 cursor-crosshair" sx={{ fontSize: 30 }} onClick={() => handleClick(auth, games.ofertas.id)} />
                                            <h1 className='text-2xl px-5 text-white'>R${favorito.games.preco}</h1>
                                        </div>
                                    </div>
                                </div>
                            ))

                        )}
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );


}
