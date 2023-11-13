import { Link } from '@inertiajs/react';
import { useState } from 'react';
import ApplicationLogo from './ApplicationLogo';
import FacebookTwoToneIcon from '@mui/icons-material/FacebookTwoTone';
import InstagramIcon from '@mui/icons-material/Instagram';
import TwitterIcon from '@mui/icons-material/Twitter';

const FooterBox = () => {

    return (
        <>
            <footer className="bg-gray-800 border-b border-stone-800 text-white shadow-xl shadow-slate-300">
                <div className="px-16">
                    <div className="flex justify-between">
                        <div className="flex justify-start mt-4" style={{ fontFamily: 'Public Sans' }}>
                            <div className="shrink-0 flex items-center">
                                <Link href="/">
                                    <ApplicationLogo className="block h-9 w-auto fill-current text-gray-800" />
                                </Link>
                            </div>
                            <div className="grid grid-cols-2 gap-2 mt-[9px] cursor-default">
                                <h1 className='text-3xl'>BRANCH</h1>
                                <h1 className='text-3xl text-amber-400'>GAMES</h1>
                            </div>
                        </div>
                        <div className="grid grid-cols-3 gap-4 mt-5">
                            <a href="facebook.com"><FacebookTwoToneIcon sx={{ width: 40, height: 40 }}/></a>
                            <a href="facebook.com"><InstagramIcon sx={{ width: 40, height: 40 }}/></a>
                            <a href="facebook.com"><TwitterIcon sx={{ width: 40, height: 40 }}/></a>
                        </div>
                    </div>
                    <div className="grid grid-cols-5 gap-3 cursor-default">
                        <div className="col-span-3 px-3 mt-16">
                            <h1 className='uppercase text-lg'>Sobre o site</h1>
                            <p className='px-1'>Esse Site foi criado com o intuito de fornecer uma compra de jogos informativa, onde os jogadores terão acesso <br/> a informações do jogo e recursos necessários para uma melhor jogabilidade. Esse site passou a ser desenvolvido <br/>desde o dia 00/00/2023 para um projeto TCC.</p>
                        </div>
                        <span></span>
                        <div className="flex justify-end">
                            {/* //redes sociais */}
                        </div>
                    </div>
                </div>
                <div className="bg-gray-700 border-t border-stone-800 mt-16">
                    <p className="text-center cursor-default">© 2023, Blanch Games, Inc. Todos os direitos reservados. Outras marcas e nomes de produtos são marcas registradas de seus respectivos donos.</p>
                </div>
            </footer>
        </>
    )
}

export default FooterBox
