import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, Link } from '@inertiajs/react';
import { PageProps } from '@/types';
import { useEffect, useState } from 'react';
import { Carousel } from '@trendyol-js/react-carousel';
import ScrollCarousel from 'scroll-carousel';
import ArrowBackIosRoundedIcon from '@mui/icons-material/ArrowBackIosRounded';
import ArrowForwardIosRoundedIcon from '@mui/icons-material/ArrowForwardIosRounded';

export default function Dashboard({ auth, recomendados, promocoes }: PageProps<{ recomendados: Array<any>, promocoes: any }>) {
    const [imagemIndex, setImagemIndex] = useState(0);
    const [imagemMouseHover, setImagemMouseHover] = useState<string | null>(null);

    useEffect(() => {
        const interval = setInterval(() => {
            setImagemIndex((prevIndex) => (prevIndex + 1) % recomendados.length);
        }, 5000);

        return () => clearInterval(interval);
    }, []);

    const handleClickItem = (index: any) => {
        setImagemIndex(index);
    };

    // new ScrollCarousel(".my-carousel") //carousel com scroll muito show de bola

    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>}
        >
            <Head title="Dashboard" />

            <div className="py-12 bg-stone-900 text-white">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    {/* <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6"> */}
                    <div>
                        <div className="grid grid-cols-3 mb-3">
                            <h1 className='text-2xl  float-left uppercase underline underline-offset-8  '>Recomendados</h1>
                            <span></span>
                            <h1 className='text-2xl text-right uppercase underline underline-offset-8 '>Promoção Especial</h1>
                        </div>
                        <div className="grid grid-cols-3 gap-7">
                            <div className="grid grid-rows-3 gap-6 col-span-2 ">
                                {recomendados.map((recomendado: any) => (
                                    <div key={recomendado.id} className='hover:scale-110 shadow-lg hover:shadow-stone-900'>
                                        <Link
                                            href={route('games.show', { 'id': recomendado.id })}
                                            className="font-semibold text-gray-600 hover:text-gray-900  focus:rounded-sm ">
                                            <img src={recomendado.imagem_principal} alt="" className={"object-cover rounded-lg shadow-md max-h-52 w-[100%]"} />
                                        </Link>
                                    </div>
                                ))}
                            </div>
                            <div className="">
                                <img src={promocoes.imagem} className="rounded-lg shadow-md h-[100%]" alt="" />
                            </div>
                        </div>
                        <div className="rounded-xl mt-16 bg-no-repeat bg-center bg-cover" style={{ backgroundImage: `url(${imagemMouseHover || recomendados[imagemIndex]?.imagem_principal || ''})` }}>
                            <div className="flex justify-end">
                                <div className="grid grid-rows-4 gap-4 p-6">
                                    {recomendados.map((recomendado: any, index: number) => (
                                        <div
                                            key={recomendado.id}
                                            onMouseEnter={() => setImagemMouseHover(recomendado.imagem_principal)}
                                            onMouseLeave={() => setImagemMouseHover(null)}
                                            onClick={() => handleClickItem(index)}
                                        >
                                            <Link
                                                href={route('games.show', { 'id': recomendado.id })}
                                                className="font-semibold text-gray-600 hover:text-gray-900 focus:rounded-sm"
                                            >
                                                <img
                                                    src={recomendado.imagem_principal}
                                                    alt=""
                                                    className="object-cover rounded-lg shadow-md max-h-36 w-[100%]"
                                                />
                                            </Link>
                                        </div>
                                    ))}
                                </div>
                            </div>
                        </div>
                        <div className="grid grid-rows-2">
                            <h1 className='text-2xl  float-left uppercase mt-24 underline underline-offset-8 '>Jogos</h1>
                            <div className="grid grid-cols-4 gap-5">
                                {recomendados.map((recomendado: any) => (
                                    <div key={recomendado.id} >
                                        <Link
                                            href={route('games.show', { 'id': recomendado.id })}
                                            className="font-semibold text-gray-600 hover:text-gray-900  focus:rounded-sm ">
                                            <img src={recomendado.imagem_principal} alt="" className={"object-cover rounded-lg shadow-md max-h-36 w-[100%]"} />
                                        </Link>
                                    </div>
                                ))}
                            </div>
                        </div>

                        <h1 className='text-2xl  float-left uppercase mt-24 underline underline-offset-8 mb-5'>Mais acessados</h1>
                        <div className="className='text-center">
                            <Carousel show={3} slide={2} transition={0.5} useArrowKeys={true} leftArrow={<ArrowBackIosRoundedIcon className='mt-14'/>} rightArrow={<ArrowForwardIosRoundedIcon className='mt-14'/>} >
                                {recomendados.map((recomendado: any) => (
                                    <div key={recomendado.id} >
                                        <Link
                                            href={route('games.show', { 'id': recomendado.id })}
                                            className="font-semibold text-gray-600 hover:text-gray-900  focus:rounded-sm ">
                                            <img src={recomendado.imagem_principal} alt="" className={"object-cover rounded-lg shadow-md max-h-36 w-[100%]"} />
                                        </Link>
                                    </div>
                                ))}
                            </Carousel>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}



