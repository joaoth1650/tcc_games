import { Link, InertiaLinkProps } from '@inertiajs/react';

export default function NavLink({ active = false, className = '', children, ...props }: InertiaLinkProps & { active: boolean }) {
    return (
        <Link
            {...props}
            className={
                'inline-flex items-center px-1 pt-1 border-b-2 text-lg font-medium leading-5 transition duration-150 ease-in-out focus:outline-none ' +
                (active
                    ? 'border-amber-400 text-gray-200 focus:border-x-amber-400 '
                    : 'border-transparent text-gray-500 hover:text-gray-300 hover:border-gray-300 focus:text-gray-300 focus:border-gray-300 ') +
                className
            }
        >
            {children}
        </Link>
    );
}
