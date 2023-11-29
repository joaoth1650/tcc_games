import VisitanteLayout from "@/Layouts/VisitanteLayout";
import { PageProps } from "@/types";
import { Head, Link } from '@inertiajs/react';
import axios from 'axios';
import FavoriteRoundedIcon from '@mui/icons-material/FavoriteRounded';
import FavoriteBorderRoundedIcon from '@mui/icons-material/FavoriteBorderRounded';
import FilterAltRoundedIcon from '@mui/icons-material/FilterAltRounded';
import { IconButton } from "@mui/material";
import Swal from "sweetalert2";
import { useEffect, useState } from "react";


export default function IndexGames({ auth, games }: PageProps<{ games: Array<any>, auth: object }>) {
    const [minPrice, setMinPrice] = useState('0');
    const [maxPrice, setMaxPrice] = useState('0');
    const [displayData, setDisplayData] = useState<any>(games);
    const [showFilterBar, setShowFilterBar] = useState(false);
    const [favoritos, setFavoritos] = useState<any>([]);

    useEffect(() => {
        axios.get(route('favorite.index')).then((response) => {
            setFavoritos(response.data.favoritelist);
        })
    }, [])
    const handleClick = (auth: any, gameId: number) => {

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

        axios.post(route('favorite.store'), { game_id: gameId }).then((response) => {
            console.log(response.data);

            setFavoritos([...favoritos, gameId]);
        })

        // console.log('Clicado!', `User ID: ${userId}, Game ID: ${gameId}`);
    };

    const handleClickForDelete = (auth: any, gameId: number) => {

        if (auth.user === null) {
            Swal.fire({
                title: 'Você precisa estar logado para remover um jogo à sua lista!',
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                html: `<a href="/register" >Criar conta agora!</a>`,
            });
            return;
        }

        axios.delete(route('favorite.destroy', gameId)).then((response) => {
            console.log(response.data);

            setFavoritos(favoritos.filter((id: number) => id !== gameId));
        })

        // console.log('Clicado!', `User ID: ${userId}, Game ID: ${gameId}`);
    };

    const handleWithNumberInvalide = () => {
        if (minPrice > maxPrice) {
            Swal.fire({
                title: 'O preço inicial não pode ser maior que o preço final!',
                toast: true,
                icon: 'error',
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
            });
            return;
        }
        if (minPrice === '' || maxPrice === '') {
            Swal.fire({
                title: 'Preencha todos os campos do filtro!',
                toast: true,
                icon: 'error',
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
            return;
        }
        if (minPrice === maxPrice) {
            Swal.fire({
                title: 'O preço inicial não pode ser igual ao preço final!',
                toast: true,
                icon: 'error',
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
            });
            return;
        }
    }

    const handleClickForEffectFilter = () => {
        Swal.fire({
            title: 'Filtrando os jogos...',
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        });
    }



    return (
        <VisitanteLayout auth={auth} title="Teste" header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Carrinho de compras</h2>}>
            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="overflow-hidden shadow-sm rounded-lg">
                        {showFilterBar ? (
                        <div className="w-full flex justify-between items-center mb-3 bg-stone-700 rounded-md bg-clip-padding backdrop-filter backdrop-blur-md bg-opacity-50 px-4">
                            <h1 className="text-lg text-white font-bold uppercase p-2 ">Filtrar por valor</h1>
                            <div className="flex gap-2 justify-center">
                                <div className="flex items-center justify-end gap-2 w-fit">
                                    <label className="text-white text-sm font-bold mb-2 mt-2 " htmlFor="minPrice">
                                        Valor mínimo:
                                    </label>
                                    <input
                                        className="border rounded-lg py-1 px-3 text-gray-700 w-[30%]"
                                        type="text"
                                        id="minPrice"
                                        value={minPrice}
                                        onChange={(e) => setMinPrice(e.target.value.replace(/[^0-9]/g, '').slice(0, 3))}
                                    />
                                </div>
                                <div className="flex items-center gap-2">
                                    <label className="text-white text-sm font-bold mb-2 mt-2 " htmlFor="maxPrice">
                                        Valor máximo:
                                    </label>
                                    <input
                                        className="border rounded-lg py-1 px-3 text-gray-700 w-[30%]"
                                        type="text"
                                        id="maxPrice"
                                        value={maxPrice}
                                        onChange={(e) => setMaxPrice(e.target.value.replace(/[^0-9]/g, '').slice(0, 3))}
                                    />
                                </div>
                            </div>
                            <div className="flex items-center gap-2">
                                {minPrice !== '' && maxPrice !== '' && minPrice <= maxPrice && minPrice !== maxPrice ? (
                                <Link
                                    href={route('games.index', { 'minPrice': minPrice, 'maxPrice': maxPrice })}
                                    className="lh-btn-primary w-[50%]"
                                    onClick={handleClickForEffectFilter}>
                                    Filtrar
                                </Link>
                                ) : (
                                    <div className="lh-btn-default w-[50%]" onClick={handleWithNumberInvalide}>
                                        Filtrar
                                    </div>
                                )}
                                <Link
                                    href={route('games.index')}
                                    className="lh-btn-default  w-[50%]">
                                    Limpar
                                </Link>
                            </div>
                        </div>) : (
                            <div className="mb-4 flex justify-end">
                                <FilterAltRoundedIcon className="text-white bg-stone-700 rounded-xl cursor-pointer p-1" sx={{ fontSize: 40 }} 	onClick={() => setShowFilterBar(!showFilterBar)} />
                            </div>
                        )}
                        <div className="col-span-4 grid grid-cols-3 gap-3">
                            {displayData.map((game: any) => (
                                <div className="relative hover:bg-stone-600 rounded-xl" key={game.id}>
                                    {favoritos !== undefined && favoritos.includes(game.id) ? (
                                        <div onClick={() => handleClickForDelete(auth, game.id)} className="absolute top-1 right-1 hover:scale-110 transform transition-transform cursor-pointer float-right">
                                            <FavoriteRoundedIcon className="text-red-500 text-4xl" />
                                        </div>
                                    ) : (
                                        <div onClick={() => handleClick(auth, game.id)} className="absolute top-1 right-1 hover:scale-110 transform transition-transform cursor-pointer float-right">
                                            <FavoriteBorderRoundedIcon className="text-red-500 text-4xl" />
                                        </div>
                                    )}
                                    <Link
                                        href={route('games.show', { 'id': game.id })}
                                        className="font-semibold text-gray-600 hover:text-gray-900  focus:rounded-sm ">

                                        <img src={game.imagem_principal} alt="" className={"w-full object-cover rounded-lg shadow-md h-72"} />
                                        <div className="border-gray-700">
                                            <h1 className="text-2xl text-white font-bold uppercase p-2 ">{game.nome}</h1>
                                            {/* <p className="leading-4 px-2">{game.descricao.substring(0, 50) + '...'}</p> */}
                                            <h2 className="px-2 text-slate-300">R${game.preco}</h2>
                                        </div>
                                    </Link>

                                </div>
                            ))}
                        </div>
                    </div>
                </div>
            </div>
        </VisitanteLayout>
    );
}
