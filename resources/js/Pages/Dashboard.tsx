import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, Link } from '@inertiajs/react';
import { PageProps } from '@/types';
import { useState } from 'react';

export default function Dashboard({ auth, recomendados, promocoes }: PageProps<{ recomendados: any, promocoes: any }>) {
    console.log(recomendados)
    console.log(promocoes)
    const [imagemMouseHover, setImagemMouseHover] = useState<string | null>(null);
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>}
        >
            <Head title="Dashboard" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <div className="grid grid-cols-3">
                            <h1 className='text-2xl  float-left uppercase '>Recomendados</h1>
                            <span></span>
                            <h1 className='text-2xl text-right uppercase '>Promoção Especial</h1>
                        </div>
                        <div className="grid grid-cols-3 gap-7">
                            <div className="grid grid-rows-3 gap-5 col-span-2">
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
                            <div className="">
                                <img src={promocoes.imagem} className="rounded-lg shadow-md h-[100%]" alt="" />
                            </div>
                        </div>
                        <div className="rounded-xl mt-16" style={{ backgroundImage: `url(${imagemMouseHover})` }}>
                            <div className="flex justify-end">
                                <div className="grid grid-rows-4 gap-4 p-6">
                                    {recomendados.map((recomendado: any) => (
                                        <div
                                            key={recomendado.id}
                                            onMouseEnter={() => setImagemMouseHover(recomendado.imagem_principal)}
                                            onMouseLeave={() => setImagemMouseHover(null)}
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
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
