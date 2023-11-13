import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, Link } from '@inertiajs/react';
import { PageProps } from '@/types';
import axios from 'axios';
import ShoppingCartIcon from '@mui/icons-material/ShoppingCart';
import FavoriteBorderIcon from '@mui/icons-material/FavoriteBorder';
import { useEffect, useState } from 'react';

export default function Wishlist({ auth }: PageProps<{ favoritos: any }>) {
    const [favoritos, setFavoritos] = useState([]);
    const [efeito, setEfeito] = useState('');

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
                                        <h1 className='text-xl text-sky-500 mt-20 cursor-pointer'>veja alguns jogos que talvez voce goste!</h1>
                                    </div>
                                </div>
                            </>
                        ) : (
                            favoritos.map((favorito: any) => (
                                <div className="bg-stone-900 hover:bg-stone-800  grid grid-cols-2 rounded-xl" key={favorito.id}>
                                    <Link className='relative overflow-hidden group rounded-xl'
                                        href={route('games.show', { 'id': favorito.game_id })}>
                                        <img src={favorito.games.imagem_principal} alt={favorito.games.nome}
                                            title={favorito.games.nome} className={"object-cover bg-center rounded-2xl shadow-md max-h-96 h-80 w-[100%] transform scale-100 group-hover:scale-110 transition-transform duration-300 ease-in-out "} />
                                    </Link>
                                    <Link className='grid grid-rows-4'
                                        href={route('games.show', { 'id': favorito.game_id })}>
                                        <h1 className='text-3xl uppercase px-5 text-white'>{favorito.games.nome}</h1>
                                        <p className="leading-4 text-white px-8 mt-2">{favorito.games.descricao.substring(0, 50) + '...'}</p>
                                        <span></span>
                                        <div className="flex justify-end text-center mt-8">
                                            <ShoppingCartIcon className="text-white hover:text-sky-400 cursor-crosshair" sx={{ fontSize: 30 }} />
                                            <h1 className='text-2xl px-5 text-white'>R${favorito.games.preco}</h1>
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
