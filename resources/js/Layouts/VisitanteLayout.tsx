import ApplicationLogo from '@/Components/ApplicationLogo';
import Dropdown from '@/Components/Dropdown';
import FooterBox from '@/Components/FooterBox';
import NavLink from '@/Components/NavLink';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink';
import { PageProps } from '@/types';
import { Head, Link } from '@inertiajs/react';
import { ReactNode, useState } from 'react';

export default function VisitanteLayout({ auth, children, title, header }: PageProps<{ header: any, children?: ReactNode | undefined, title?: string | undefined }>) {
    const [showingNavigationDropdown, setShowingNavigationDropdown] = useState(false);

    return (
        <>
            <div className="min-h-screen bg-gray-100">
                <nav className="bg-gray-800 border-b border-stone-800">
                    <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div className="flex justify-between h-16">
                            <div className="flex">
                                <div className="shrink-0 flex items-center">
                                    <Link href="/">
                                        <ApplicationLogo className="block h-9 w-auto fill-current text-gray-800" />
                                    </Link>
                                </div>


                            </div>

                            <div className="hidden sm:flex sm:items-center sm:ml-6">
                                <div className="ml-3 relative">
                                    {auth?.user?.name ? <Dropdown>
                                        <Dropdown.Trigger>
                                            <span className="inline-flex rounded-md">
                                                <button
                                                    type="button"
                                                    className="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                                                >
                                                    {auth.user.name}

                                                    <svg
                                                        className="ml-2 -mr-0.5 h-4 w-4"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 20 20"
                                                        fill="currentColor"
                                                    >
                                                        <path
                                                            fillRule="evenodd"
                                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                            clipRule="evenodd"
                                                        />
                                                    </svg>
                                                </button>
                                            </span>
                                        </Dropdown.Trigger>

                                        <Dropdown.Content>
                                            <Dropdown.Link href={route('profile.edit')}>Profile</Dropdown.Link>
                                            <a href={route('get.logout')} className="block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                                                Log Out
                                            </a>
                                        </Dropdown.Content>
                                    </Dropdown>
                                        : (
                                            <>
                                                <Link
                                                    href={route('login')}
                                                    className="font-semibold text-gray-500 hover:text-gray-300 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                                                >
                                                    Log in
                                                </Link>

                                                <Link
                                                    href={route('register')}
                                                    className="ml-4 font-semibold text-gray-500 hover:text-gray-300 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                                                >
                                                    Register
                                                </Link>
                                            </>
                                        )}
                                </div>
                            </div>

                            <div className="-mr-2 flex items-center sm:hidden">
                                <button
                                    onClick={() => setShowingNavigationDropdown((previousState) => !previousState)}
                                    className="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"
                                >
                                    <svg className="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                        <path
                                            className={!showingNavigationDropdown ? 'inline-flex' : 'hidden'}
                                            strokeLinecap="round"
                                            strokeLinejoin="round"
                                            strokeWidth="2"
                                            d="M4 6h16M4 12h16M4 18h16"
                                        />
                                        <path
                                            className={showingNavigationDropdown ? 'inline-flex' : 'hidden'}
                                            strokeLinecap="round"
                                            strokeLinejoin="round"
                                            strokeWidth="2"
                                            d="M6 18L18 6M6 6l12 12"
                                        />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div className={(showingNavigationDropdown ? 'block' : 'hidden') + ' sm:hidden'}>
                        <div className="pt-2 pb-3 space-y-1">
                            <ResponsiveNavLink href={route('dashboard')} active={route().current('dashboard')}>
                                Dashboard
                            </ResponsiveNavLink>
                        </div>

                        <div className="pt-4 pb-1 border-t border-gray-200">
                            <div className="px-4">
                                <div className="font-medium text-base text-gray-800">
                                    {auth?.user?.name || "Não Logado"}
                                </div>
                                <div className="font-medium text-sm text-gray-500">{auth?.user?.email || "Não Logado"}</div>
                            </div>

                            <div className="mt-3 space-y-1">
                                <ResponsiveNavLink href={route('profile.edit')}>Profile</ResponsiveNavLink>
                                <ResponsiveNavLink method="post" href={route('logout')} as="button">
                                    Log Out
                                </ResponsiveNavLink>
                            </div>
                        </div>
                    </div>
                </nav>

                {header && (
                    <header className="bg-stone-900 shadow">
                        <div className="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            <div className=" hidden space-x-8 sm:-my-px sm:ml-10 sm:flex text-xl">
                                <NavLink href={route('dashboard')} active={route().current('dashboard')}>
                                    Descobrir
                                </NavLink>
                                <NavLink href={route('games.index')} active={route().current('games.index')}>
                                    Navegar
                                </NavLink>
                                {auth?.user?.name && (
                                    <>
                                        <NavLink href={route('favorites')} active={route().current('favorites')}>
                                            Lista de Desejos
                                        </NavLink>
                                        <NavLink href={route('cart.show')} active={route().current('cart.show')}>
                                            Carrinho
                                        </NavLink>
                                        <div className="justify-end">
                                            <div className="rondered-full w-20">
                                                {/* //search */}
                                            </div>
                                        </div>
                                    </>
                                )}
                            </div>
                        </div>
                    </header>
                )}

                <main className='bg-stone-900'>{children}</main>
                <FooterBox />
            </div>
        </>
    );
}
