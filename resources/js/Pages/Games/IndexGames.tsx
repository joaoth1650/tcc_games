import VisitanteLayout from "@/Layouts/VisitanteLayout";
import { PageProps } from "@/types";
import { Head, Link } from '@inertiajs/react';
import axios from 'axios';
import FavoriteRoundedIcon from '@mui/icons-material/FavoriteRounded';
import FavoriteBorderRoundedIcon from '@mui/icons-material/FavoriteBorderRounded';
import { IconButton } from "@mui/material";
import Swal from "sweetalert2";
import { useEffect, useState } from "react";
import PriceFilter from "@/Components/FilterGamesByPrice";

export default function IndexGames({ auth, games }: PageProps<{ games: Array<any>, auth: object }>) {
    const [favoritos, setFavoritos] = useState<any>([]);
    const [filteredGames, setFilteredGames] = useState([]);

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

    const [minPrice, setMinPrice] = useState('');
    const [maxPrice, setMaxPrice] = useState('');

    const handleFilterChange = (onFilterChange: any) => {
        if (onFilterChange) {
            axios.get(`/navegar?minPrice=${minPrice}&maxPrice=${maxPrice}`)
                .then((response) => {
                    onFilterChange(response);
                })
                .catch((error) => {
                    console.error(error);
                });
        }
    };

    return (
        <VisitanteLayout auth={auth} title="Teste" header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Carrinho de compras</h2>}>
            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="overflow-hidden shadow-sm rounded-lg grid grid-cols-5 gap-2">
                        <div className="col-span-4 grid grid-cols-3 gap-3">
                            {games.map((game: any) => (
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
                        <div className="bg-white rounded-lg shadow p-4">
                        <div className="mb-4">
                            <label className="block text-gray-700 text-sm font-bold mb-2" htmlFor="minPrice">
                                Valor mínimo:
                            </label>
                            <input
                                className="border rounded-lg py-2 px-3 text-gray-700 w-full"
                                type="number"
                                id="minPrice"
                                value={minPrice}
                                onChange={(e) => setMinPrice(e.target.value)}
                            />
                        </div>

                        <div className="mb-4">
                            <label className="block text-gray-700 text-sm font-bold mb-2" htmlFor="maxPrice">
                                Valor máximo:
                            </label>
                            <input
                                className="border rounded-lg py-2 px-3 text-gray-700 w-full"
                                type="number"
                                id="maxPrice"
                                value={maxPrice}
                                onChange={(e) => setMaxPrice(e.target.value)}
                            />
                        </div>

                        <button
                            className="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                            onClick={handleFilterChange}
                        >
                            Filtrar
                        </button>
                    </div>
                    </div>
                </div>
            </div>
        </VisitanteLayout>
    );
}
