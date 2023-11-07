import VisitanteLayout from '@/Layouts/VisitanteLayout';
import { Head, Link } from '@inertiajs/react';
import { PageProps } from '@/types';
import { useEffect, useState } from 'react';
import { Carousel } from '@trendyol-js/react-carousel';
import ScrollCarousel from 'scroll-carousel';
import ArrowBackIosRoundedIcon from '@mui/icons-material/ArrowBackIosRounded';
import ArrowForwardIosRoundedIcon from '@mui/icons-material/ArrowForwardIosRounded';

export default function Dashboard({ auth, recomendados, promocoes, slides, moreViews, allGames, gamesOfTerror }: PageProps<{ allGames: Array<any>, recomendados: Array<any>, promocoes: any, slides: Array<any>, moreViews: Array<any>, gamesOfTerror: Array<any> }>) {
    const [imagemIndex, setImagemIndex] = useState(0);
    const [imagemMouseHover, setImagemMouseHover] = useState<string | null>(null);

    useEffect(() => {
        const interval = setInterval(() => {
            setImagemIndex((prevIndex) => (prevIndex + 1) % slides.length);
        }, 5000);

        return () => clearInterval(interval);
    }, []);

    const handleClickItem = (index: any) => {
        setImagemMouseHover(slides[index].imagem_principal);
        setImagemIndex(index);
    };

    // new ScrollCarousel(".my-carousel") //carousel com scroll muito show de bola

    return (
        <VisitanteLayout
            auth={auth}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>}
        >
            <Head title="Dashboard" />

            <div className="py-12 bg-stone-900 text-white">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    {/* <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6"> */}
                    <div>
                        <div className="grid grid-cols-3 mb-3 ">
                            <h1 className='text-2xl  float-left uppercase underline underline-offset-8  '>Recomendados</h1>
                            <span></span>
                            <h1 className='text-2xl text-right uppercase underline underline-offset-8 '>Promoção Especial</h1>
                        </div>
                        <div className="grid grid-cols-3 gap-7">
                            <div className="grid grid-rows-3 gap-6 col-span-2 ">
                                {recomendados.map((recomendado: any) => (
                                    <div key={recomendado.id} className='hover:scale-105 shadow-lg hover:shadow-stone-900'>
                                        <Link
                                            href={route('games.show', { 'id': recomendado.id })}
                                            className="font-semibold text-gray-600 hover:text-gray-900  focus:rounded-sm ">
                                            <img src={recomendado.imagem_principal} alt={recomendado.nome}
                                                title={recomendado.nome} className={"object-cover bg-center rounded-lg shadow-md max-h-52 w-[100%]"} />
                                        </Link>
                                    </div>
                                ))}
                            </div>
                            <div className="relative overflow-hidden group">
                                <div className="absolute inset-0 transform scale-100 group-hover:scale-110 transition-transform duration-300 ease-in-out cursor-pointer">
                                    <img src={promocoes.imagem} className="object-cover rounded-lg shadow-md h-[100%]" alt="" />
                                </div>
                            </div>
                        </div>
                        <div className="rounded-xl th-espace-default bg-no-repeat bg-center bg-cover shadow-2xl shadow-stone-600" style={{ backgroundImage: `url(${imagemMouseHover || slides[imagemIndex]?.imagem_principal || ''})` }}>
                            <div className="flex justify-end">
                                <div className="grid grid-rows-4 gap-4 cursor-pointer p-6">
                                    {slides.map((slide: any, index: number) => (
                                        <div
                                            key={slide.id}
                                            onClick={() => handleClickItem(index)}
                                            className={index === imagemIndex ? 'th-card_full_opacity' : 'th-card_dashboard'}
                                        >
                                            <img
                                                src={slide.imagem_principal}
                                                alt={slide.nome}
                                                title={slide.nome}
                                                className="object-cover rounded-lg shadow-md max-h-36 w-[100%]"
                                            />
                                        </div>
                                    ))}
                                </div>
                            </div>
                        </div>

                        <div className="grid grid-rows-2">
                            <div className="flex justify-between">
                                <h1 className='text-2xl  float-left uppercase th-espace-default underline underline-offset-8 '>Jogos</h1>
                                <a href="/" className='text-xl float-left mt-28 hover:text-sky-400'>——  veja mais</a>
                            </div>
                            <div className="grid grid-cols-4 gap-5">
                                {allGames.map((allGame: any) => (
                                    <div key={allGame.id} className='th-card_dashboard ' >
                                        <Link
                                            href={route('games.show', { 'id': allGame.id })}
                                            className="font-semibold text-gray-600 hover:text-gray-900  focus:rounded-sm ">
                                            <img src={allGame.imagem_principal} alt="" className={"object-cover rounded-lg shadow-md max-h-36 w-[100%]"} />
                                        </Link>
                                    </div>
                                ))}
                            </div>
                        </div>

                        <h1 className='text-2xl  float-left uppercase th-espace-default underline underline-offset-8 mb-5'>Mais acessados</h1>
                        <Carousel show={3} slide={2} transition={0.5} useArrowKeys={true} leftArrow={<ArrowBackIosRoundedIcon className='mt-16 cursor-pointer' />} rightArrow={<ArrowForwardIosRoundedIcon className='mt-16 cursor-pointer' />}>
                            {moreViews.map((moreView: any) => (
                                <div key={moreView.id} className='px-2 th-card_dashboard relative'>
                                    <Link href={route('games.show', { 'id': moreView.id })} className="font-semibold text-gray-600 hover:text-gray-900 focus:rounded-sm">
                                        <div className="relative">
                                            <img src={moreView.imagem_principal} alt="" className="object-cover bg-cover rounded-lg shadow-md max-h-40 w-full" />
                                            <div className="absolute inset-0 flex items-center justify-center">
                                                <div className="absolute bottom-0 left-0 right-0 bg-green-900 opacity-70 rounded-sm py-[2px]">
                                                    <h1 className='text-white text-lg float-left  '>R$ {moreView.preco}</h1>
                                                </div>
                                            </div>
                                        </div>
                                    </Link>
                                </div>
                            ))}
                        </Carousel>

                        <div className="flex justify-between">
                            <h1 className='text-2xl  float-left uppercase th-espace-default underline underline-offset-8 '>Terror</h1>
                            <a href="/" className='text-xl float-left mt-28 hover:text-sky-400'> ——  veja mais</a>
                        </div>
                        <div className="grid grid-cols-2 gap-4 mt-4">
                            <div className="grid grid-cols-2 grid-rows-2 gap-4">
                                {gamesOfTerror.map((gameOfTerror: any, index: number) => (
                                    <div key={gameOfTerror.id} className="col-span-1 row-span-1 th-card_dashboard hover:scale-110">
                                        <Link
                                            href={route('games.show', { 'id': gameOfTerror.id })}
                                            className="font-semibold text-gray-600 hover:text-gray-900 focus:rounded-sm"
                                        >
                                            <img
                                                src={gameOfTerror.imagem_principal}
                                                alt=""
                                                className=" object-cover bg-cover rounded-lg shadow-md max-h-96 w-[100%]"
                                            />
                                        </Link>
                                    </div>
                                ))}
                            </div>
                            <div className="col-span-2 md:col-span-1 th-card_dashboard">
                                <img src={promocoes.imagem} alt="promoção especial" className='cursor-pointer object-cover rounded-lg shadow-md  hover:duration-300 hover:-translate-y-4' />
                            </div>
                        </div>

                        <div className="grid grid-rows-2">
                            <div className="flex justify-between">
                                <h1 className='text-2xl  float-left uppercase th-espace-default underline underline-offset-8 '>Jogos</h1>
                                <a href="/" className='text-xl float-left mt-28 hover:text-sky-400'>——  veja mais</a>
                            </div>
                            <div className="grid grid-cols-4 gap-5">
                                {allGames.map((allGame: any) => (
                                    <div key={allGame.id} className='th-card_dashboard ' >
                                        <Link
                                            href={route('games.show', { 'id': allGame.id })}
                                            className="font-semibold text-gray-600 hover:text-gray-900  focus:rounded-sm ">
                                            <img src={allGame.imagem_principal} alt="" className={"object-cover rounded-lg shadow-md max-h-36 w-[100%]"} />
                                        </Link>
                                    </div>
                                ))}
                            </div>
                        </div>
                        
                        <div className="flex justify-between">
                            <h1 className='text-2xl  float-left uppercase th-espace-default underline underline-offset-8 '>Terror</h1>
                            <a href="/" className='text-xl float-left mt-28 hover:text-sky-400'> ——  veja mais</a>
                        </div>
                        <div className="grid grid-cols-2 gap-4 mt-4">
                            <div className="grid grid-cols-2 grid-rows-2 gap-4">
                                {gamesOfTerror.map((gameOfTerror: any, index: number) => (
                                    <div key={gameOfTerror.id} className="col-span-1 row-span-1 th-card_dashboard hover:scale-110">
                                        <Link
                                            href={route('games.show', { 'id': gameOfTerror.id })}
                                            className="font-semibold text-gray-600 hover:text-gray-900 focus:rounded-sm"
                                        >
                                            <img
                                                src={gameOfTerror.imagem_principal}
                                                alt=""
                                                className=" object-cover bg-cover rounded-lg shadow-md max-h-96 w-[100%]"
                                            />
                                        </Link>
                                    </div>
                                ))}
                            </div>
                            <div className="col-span-2 md:col-span-1 th-card_dashboard">
                                <img src={promocoes.imagem} alt="promoção especial" className='cursor-pointer object-cover rounded-lg shadow-md  hover:duration-300 hover:-translate-y-4' />
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </VisitanteLayout >
    );
}



