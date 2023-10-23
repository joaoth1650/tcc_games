import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, Link } from '@inertiajs/react';
import { PageProps } from '@/types';
import KeyboardArrowRightIcon from '@mui/icons-material/KeyboardArrowRight';
import KeyboardArrowLeftIcon from '@mui/icons-material/KeyboardArrowLeft';
import { useEffect, useState } from 'react';

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

    const slides = [
        {
            url: 'https://images.unsplash.com/photo-1531297484001-80022131f5a1?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2620&q=80',
        },
        {
            url: 'https://images.unsplash.com/photo-1488590528505-98d2b5aba04b?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2670&q=80',
        },
        {
            url: 'https://images.unsplash.com/photo-1661961112951-f2bfd1f253ce?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2672&q=80',
        },

        {
            url: 'https://images.unsplash.com/photo-1512756290469-ec264b7fbf87?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2253&q=80',
        },
        {
            url: 'https://images.unsplash.com/photo-1496181133206-80ce9b88a853?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2671&q=80',
        },
    ];

    const [currentIndex, setCurrentIndex] = useState(0);

    const prevSlide = () => {
        const isFirstSlide = currentIndex === 0;
        const newIndex = isFirstSlide ? slides.length - 1 : currentIndex - 1;
        setCurrentIndex(newIndex);
    };

    const nextSlide = () => {
        const isLastSlide = currentIndex === slides.length - 1;
        const newIndex = isLastSlide ? 0 : currentIndex + 1;
        setCurrentIndex(newIndex);
    };

    const goToSlide = (slideIndex: any) => {
        setCurrentIndex(slideIndex);
    };

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
                                    <div key={recomendado.id} className='hover:scale-110 shadow-lg hover:shadow-slate-400'>
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
                        <div className="rounded-xl mt-16 " style={{ backgroundImage: `url(${imagemMouseHover || recomendados[imagemIndex]?.imagem_principal || ''})`  }}>
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

                        <div className="grid grid-rows-2">
                            <h1 className='text-2xl  float-left uppercase mt-24 underline underline-offset-8 '>Mais acessados</h1>
                            <div className='max-w-[1400px] h-[780px] w-full m-auto py-16 px-4 relative group'>
                                <div
                                    style={{ backgroundImage: `url(${slides[currentIndex].url})` }}
                                    className='w-full h-full rounded-2xl bg-center bg-cover duration-500'
                                ></div>
                                {/* Left Arrow */}
                                <div className='hidden group-hover:block absolute top-[50%] -translate-x-0 translate-y-[-50%] left-5 text-2xl rounded-full p-2 bg-black/20 text-white cursor-pointer' onClick={prevSlide} >
                                    <KeyboardArrowLeftIcon/>
                                </div>
                                {/* Right Arrow */}
                                <div className='hidden group-hover:block absolute top-[50%] -translate-x-0 translate-y-[-50%] right-5 text-2xl rounded-full p-2 bg-black/20 text-white cursor-pointer' onClick={nextSlide}>
                                    <KeyboardArrowRightIcon />
                                </div>
                                <div className='flex top-4 justify-center py-2'>
                                    {slides.map((slide, slideIndex) => (
                                        <div
                                            key={slideIndex}
                                            onClick={() => goToSlide(slideIndex)}
                                            className='text-2xl cursor-pointer'
                                        >
                                            <p>.</p>
                                        </div>
                                    ))}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
